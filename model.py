import tensorflow as tf
from tensorflow.keras.applications import MobileNetV2
from tensorflow.keras.preprocessing.image import ImageDataGenerator
from tensorflow.keras.models import Sequential
from tensorflow.keras.layers import Dense, GlobalAveragePooling2D, Dropout
import numpy as np
import requests
from PIL import Image
from io import BytesIO
import pandas as pd
from sklearn.model_selection import train_test_split
from sklearn.preprocessing import LabelEncoder

# Function to load and preprocess image from URL
def load_image_from_url(url, target_size=(224, 224)):
    try:
        response = requests.get(url)
        img = Image.open(BytesIO(response.content))
        img = img.convert('RGB')  # Ensure image is RGB
        img = img.resize(target_size)
        img_array = np.array(img)
        img_array = img_array / 255.0  # Normalize
        return img_array
    except Exception as e:
        print(f"Error loading image from {url}: {e}")
        return None

# Fetch data from API and create DataFrame
def fetch_fish_data(api_url):
    headers = {
        'Accept': 'application/json',
        'Content-Type': 'application/json',
    }
    
    response = requests.get(
        api_url,
        params={'withImages': 'true'},
        headers=headers
    )
    
    if response.status_code == 200:
        data = response.json()
        paths = []
        labels = []
        
        for fish in data['data']:
            if fish['images']:
                for image in fish['images']:
                    if image.get('url'):
                        paths.append(image['url'])
                        labels.append(fish['genus'])
        
        return pd.DataFrame({'path': paths, 'label': labels})
    else:
        raise Exception(f"API request failed with status {response.status_code}")

# Load and prepare data
api_url = 'http://localhost:8000/api/fishes'
df = fetch_fish_data(api_url)

# Encode labels
le = LabelEncoder()
encoded_labels = le.fit_transform(df['label'])
num_classes = len(le.classes_)

# Load and preprocess all images
X = []
y = []

print("Loading images...")
for i, row in df.iterrows():
    img_array = load_image_from_url(row['path'])
    if img_array is not None:
        X.append(img_array)
        y.append(encoded_labels[i])
    if i % 50 == 0:
        print(f"Processed {i} images")

X = np.array(X)
y = np.array(y)

# Split the data
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42, stratify=y)

# Data augmentation
train_datagen = ImageDataGenerator(
    rotation_range=20,
    width_shift_range=0.2,
    height_shift_range=0.2,
    horizontal_flip=True,
    fill_mode='nearest'
)

# Create the model
base_model = MobileNetV2(
    weights='imagenet',
    include_top=False,
    input_shape=(224, 224, 3)
)

# Freeze the base model layers
base_model.trainable = False

model = Sequential([
    base_model,
    GlobalAveragePooling2D(),
    Dense(1024, activation='relu'),
    Dropout(0.5),
    Dense(512, activation='relu'),
    Dropout(0.3),
    Dense(num_classes, activation='softmax')
])

# Compile the model
model.compile(
    optimizer='adam',
    loss='sparse_categorical_crossentropy',
    metrics=['accuracy']
)

# Train the model
epochs = 20
batch_size = 5

history = model.fit(
    train_datagen.flow(X_train, y_train, batch_size=batch_size),
    validation_data=(X_test, y_test),
    epochs=epochs,
    steps_per_epoch = max(1, len(X_train) // batch_size)
)

# Plot training results
import matplotlib.pyplot as plt

plt.figure(figsize=(12, 4))

# Plot training & validation accuracy
plt.subplot(1, 2, 1)
plt.plot(history.history['accuracy'])
plt.plot(history.history['val_accuracy'])
plt.title('Model accuracy')
plt.ylabel('Accuracy')
plt.xlabel('Epoch')
plt.legend(['Train', 'Validation'], loc='upper left')

# Plot training & validation loss
plt.subplot(1, 2, 2)
plt.plot(history.history['loss'])
plt.plot(history.history['val_loss'])
plt.title('Model loss')
plt.ylabel('Loss')
plt.xlabel('Epoch')
plt.legend(['Train', 'Validation'], loc='upper left')

plt.tight_layout()
plt.show()

# Function to predict new images
def predict_fish(image_url):
    img_array = load_image_from_url(image_url)
    if img_array is not None:
        img_array = np.expand_dims(img_array, axis=0)
        predictions = model.predict(img_array)
        predicted_class = le.inverse_transform([np.argmax(predictions[0])])[0]
        confidence = np.max(predictions[0])
        return predicted_class, confidence
    return None, None

# Example prediction
sample_url = "http://localhost:8000/data/images/1731757802.PNG"
predicted_class, confidence = predict_fish(sample_url)
print(f"Predicted fish genus: {predicted_class}")
print(f"Confidence: {confidence:.2f}")

# Save the model
model.save('fish_classification_model.h5')