<x-layout.main>
    <main class="sm:ml-64 min-h-screen pt-10 mt-5">
        <div class="px-5 flex flex-col gap-5 max-w-2xl mx-auto">
            <h1 class="text-4xl font-bold mt-10">Fish Classification Model</h1>
            
            <div class="flex gap-2">
                <span id="model-status" class="bg-yellow-100 text-yellow-800 text-sm font-medium px-2.5 py-0.5 rounded">Ready to train</span>
                <span id="training-status" class="hidden bg-blue-100 text-blue-800 text-sm font-medium px-2.5 py-0.5 rounded">Training progress: 0%</span>
                <span id="prediction-confidence" class="hidden bg-green-100 text-green-800 text-sm font-medium px-2.5 py-0.5 rounded">Confidence: 0%</span>
            </div>

            <div class="w-full aspect-square bg-gray-100 rounded-lg overflow-hidden">
                <img id="preview-image" src="/api/placeholder/400/400" alt="Preview" class="w-full h-full object-cover">
            </div>

            <div class="bg-white p-4 rounded-lg shadow">
                <p>Prediction: <span id="prediction-result" class="font-semibold">None</span></p>
            </div>

            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-900">Upload Fish Image</label>
                <input type="file" id="image-upload" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
            </div>

            <div class="flex gap-4">
                <button id="train-button" class="flex-1 py-2 px-4 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
                    Train Model
                </button>
                <button id="predict-button" disabled class="flex-1 py-2 px-4 bg-gray-400 text-white rounded-lg">
                    Predict
                </button>
            </div>

            <div id="training-metrics" class="hidden bg-white p-4 rounded-lg shadow space-y-2">
                <h3 class="font-semibold">Training Progress</h3>
                <div class="space-y-1">
                    <p>Epoch: <span id="current-epoch">0</span>/<span id="total-epochs">10</span></p>
                    <p>Loss: <span id="current-loss">0</span></p>
                    <p>Accuracy: <span id="current-accuracy">0</span></p>
                </div>
            </div>
        </div>
    </main>

    <!-- TensorFlow.js Library -->
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@3.11.0/dist/tf.min.js"></script>

    <script>
        let model;
        let genusMap = [];
        const IMAGE_SIZE = 224;
        const BATCH_SIZE = 16;
        const EPOCHS = 10;

        // Fetch Fish Data from API
        async function fetchFishData() {
            try {
                const response = await $.ajax({
                    url: '/api/fishes',
                    method: 'GET',
                    dataType: 'json',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + localStorage.getItem('token'),
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        withImages: true
                    }
                });

                const fishes = response.data.filter(fish => fish.images && fish.images.length > 0);
                genusMap = [...new Set(fishes.map(fish => fish.genus))];

                return fishes.map(fish => ({
                    genus: fish.genus,
                    images: fish.images.map(image => image.url).filter(url => url)
                }));
            } catch (error) {
                console.error('Error fetching fish data:', error);
                throw error;
            }
        }

        // Load and preprocess image
        async function loadAndPreprocessImage(url) {
            return new Promise(async (resolve, reject) => {
                try {
                    const img = new Image();
                    img.crossOrigin = 'anonymous';
                    img.onload = () => {
                        const tensor = tf.tidy(() => {
                            const tensor = tf.browser.fromPixels(img)
                                .resizeNearestNeighbor([IMAGE_SIZE, IMAGE_SIZE])
                                .toFloat()
                                .div(255.0)
                                .expandDims();
                            return tensor;
                        });
                        resolve(tensor);
                    };
                    img.onerror = () => reject(new Error(`Failed to load image: ${url}`));
                    img.src = url;
                } catch (error) {
                    reject(error);
                }
            });
        }

        // Create model architecture
        function createModel() {
            const model = tf.sequential();

            // Feature extraction layers
            model.add(tf.layers.conv2d({
                inputShape: [IMAGE_SIZE, IMAGE_SIZE, 3],
                filters: 32,
                kernelSize: 3,
                activation: 'relu'
            }));
            model.add(tf.layers.maxPooling2d({ poolSize: 2 }));
            
            model.add(tf.layers.conv2d({
                filters: 64,
                kernelSize: 3,
                activation: 'relu'
            }));
            model.add(tf.layers.maxPooling2d({ poolSize: 2 }));
            
            model.add(tf.layers.conv2d({
                filters: 64,
                kernelSize: 3,
                activation: 'relu'
            }));
            model.add(tf.layers.maxPooling2d({ poolSize: 2 }));

            // Classification layers
            model.add(tf.layers.flatten());
            model.add(tf.layers.dense({ units: 128, activation: 'relu' }));
            model.add(tf.layers.dropout({ rate: 0.5 }));
            model.add(tf.layers.dense({ units: genusMap.length, activation: 'softmax' }));

            model.compile({
                optimizer: 'adam',
                loss: 'categoricalCrossentropy',
                metrics: ['accuracy']
            });

            return model;
        }

        // Prepare training data
        async function prepareTrainingData(fishes) {
            const trainingData = [];
            const trainingLabels = [];

            for (const fish of fishes) {
                const genusIndex = genusMap.indexOf(fish.genus);
                
                for (const imageUrl of fish.images) {
                    try {
                        const tensor = await loadAndPreprocessImage(imageUrl);
                        trainingData.push(tensor);
                        trainingLabels.push(genusIndex);
                    } catch (error) {
                        console.warn(`Skipping image ${imageUrl}:`, error);
                    }
                }
            }

            // Stack all image tensors
            const xs = tf.concat(trainingData, 0);
            
            // Convert labels to one-hot encoding
            const ys = tf.oneHot(tf.tensor1d(trainingLabels, 'int32'), genusMap.length);

            // Clean up individual tensors
            trainingData.forEach(tensor => tensor.dispose());

            return [xs, ys];
        }

        // Train model
        async function trainModel(model, xs, ys) {
            const trainLogs = [];
            
            await model.fit(xs, ys, {
                epochs: EPOCHS,
                batchSize: BATCH_SIZE,
                validationSplit: 0.2,
                shuffle: true,
                callbacks: {
                    onEpochBegin: async (epoch) => {
                        $('#current-epoch').text(epoch + 1);
                    },
                    onEpochEnd: async (epoch, logs) => {
                        trainLogs.push(logs);
                        $('#current-loss').text(logs.loss.toFixed(4));
                        $('#current-accuracy').text((logs.acc * 100).toFixed(2) + '%');
                        $('#training-status').text(`Training progress: ${Math.round((epoch + 1) / EPOCHS * 100)}%`);
                    }
                }
            });

            return trainLogs;
        }

        // Predict function
        async function predict(imgElement) {
            return tf.tidy(() => {
                const tensor = tf.browser.fromPixels(imgElement)
                    .resizeNearestNeighbor([IMAGE_SIZE, IMAGE_SIZE])
                    .toFloat()
                    .div(255.0)
                    .expandDims();

                const prediction = model.predict(tensor);
                const predictionArray = prediction.dataSync();
                const maxProbability = Math.max(...predictionArray);
                const predictedClass = predictionArray.indexOf(maxProbability);

                return {
                    genus: genusMap[predictedClass],
                    confidence: maxProbability
                };
            });
        }

        // UI Event Handlers
        $(document).ready(function() {
            // Train button handler
            $('#train-button').click(async function() {
                try {
                    $(this).prop('disabled', true);
                    $('#model-status').text('Fetching training data...');
                    $('#training-metrics').removeClass('hidden');
                    $('#training-status').removeClass('hidden');

                    // Fetch and prepare data
                    const fishes = await fetchFishData();
                    $('#model-status').text('Preparing training data...');
                    
                    const [xs, ys] = await prepareTrainingData(fishes);
                    
                    // Create and train model
                    $('#model-status').text('Training model...');
                    model = createModel();
                    const trainLogs = await trainModel(model, xs, ys);

                    // Clean up tensors
                    xs.dispose();
                    ys.dispose();

                    $('#model-status').removeClass('bg-yellow-100 text-yellow-800')
                                    .addClass('bg-green-100 text-green-800')
                                    .text('Model trained successfully');
                    $('#predict-button').prop('disabled', false)
                                      .removeClass('bg-gray-400')
                                      .addClass('bg-green-600 hover:bg-green-700');
                } catch (error) {
                    console.error('Training error:', error);
                    $('#model-status').removeClass('bg-yellow-100 text-yellow-800')
                                    .addClass('bg-red-100 text-red-800')
                                    .text('Training failed');
                } finally {
                    $(this).prop('disabled', false);
                    $('#training-status').addClass('hidden');
                }
            });

            // Image upload preview
            $('#image-upload').change(function(e) {
                if (e.target.files && e.target.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('#preview-image').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(e.target.files[0]);
                }
            });

            // Predict button handler
            $('#predict-button').click(async function() {
                if (!model) {
                    alert('Please train the model first');
                    return;
                }

                const fileInput = $('#image-upload')[0];
                if (!fileInput.files || !fileInput.files[0]) {
                    alert('Please select an image first');
                    return;
                }

                try {
                    $(this).prop('disabled', true);
                    $('#prediction-result').text('Processing...');
                    $('#prediction-confidence').addClass('hidden');

                    const img = await new Promise((resolve) => {
                        const img = new Image();
                        img.onload = () => resolve(img);
                        img.src = URL.createObjectURL(fileInput.files[0]);
                    });

                    const result = await predict(img);

                    $('#prediction-result').text(result.genus);
                    $('#prediction-confidence').removeClass('hidden')
                        .text(`Confidence: ${(result.confidence * 100).toFixed(2)}%`);
                } catch (error) {
                    console.error('Prediction error:', error);
                    $('#prediction-result').text('Error during prediction');
                } finally {
                    $(this).prop('disabled', false);
                }
            });
        });
    </script>
    
</x-layout.main>

