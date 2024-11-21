<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aquarium;
use App\Models\Fish;
use App\Models\AquariumFish;
use App\Http\Resources\AquariumResource;

class AquariumController extends Controller
{
    function getAllAquarium(){
        

        return AquariumResource::collection(Aquarium::with('aquariumfishes')->get());

    }

    function getAquariumById($id){
        $aquarium = Aquarium::with('aquariumfishes')->where('id', $id)->first();
        $volume = $aquarium->volume; 
        $fish = $aquarium->aquariumfishes; 
        

        $warning = [
            [
                "name"=> "Warning 1",
                "description"=> "Warning 1 description"
            ],
            [
                "name"=> "Warning 2",
                "description"=> "Warning 2 description"
            ]
        ];

        // tentukan rekomendasi volume aquarium berdasarkan jumlah ikan dan atribut minimum volume air pada ikan
            // jika volume aquarium kurang dari akumulasi minimum volume air ikan maka berikan warning (tidak cocok karena volume air kurang dan berikan rekomendasi solusi menambahkan ruang atau volume ait 5-10% dari volume sebelumnya)

        // tentukan rekomendasi kompatimilitas dari habitat list ikan yang dipilih
            // jika terdapat ikan yang habitatnya marine dan juga ikan freshwater maka berikan warning (tidak cocok karena habitat berbeda dan berikan warning danger)
            // jika terdapat ikan yang yang memiliki salinitas air yang maksimal nya di bawah minimal ikan ikan lain maka kasih warning (tidak cocok karena salinitas air berbeda berikan danger dan berikan warning danger)
           
        // tentukan rekomendasi kompatibilitas dari tipe ukuran dan makanan ikan yang dipilih 
            

        // tentukan rekomendasi kompatibilitas dari suhu air ikan yang dipilih
            // jika terdapat ikan yang yang memiliki suhu air yang maksimal nya di bawah minimal ikan ikan lain maka kasih warning (ikan a tidak cocok dengan ikan b karena suhu air tidak sesuai dan berikan warning danger)
            // jika terdapat ikan yang yang memiliki suhu air yang minimal nya di atas maksimal ikan ikan lain maka kasih warning (ikan a tidak cocok dengan ikan b karena suhu air tidak sesuai dan berikan warning danger)
        
        return new AquariumResource(Aquarium::find($id) , $warning);
    }





    public function createAquarium(Request $request)
    {
        $volume = $request->volume_size; 
        $fishIds = $request->fishes;
        $warning = [];

        // Validasi daftar ikan
        if (is_null($fishIds)) {
            throw new \Exception("Daftar ikan tidak boleh kosong");
        }

        // Ambil data ikan yang dipilih
        $selectedFishes = Fish::whereIn('id', $fishIds)->get();
    
        // 1. Set Volume Akuarium
        $totalMinimumVolume = $selectedFishes->sum('min_water_volume');
        $volumeWarning = $this->validateAndSetVolume($volume, $totalMinimumVolume);
        if ($volumeWarning) {
            $warning[] = $volumeWarning;
        }
    
        // 2. Set dan Validasi Habitat dan Salinitas
        $minSalinity = $selectedFishes->min('min_salinity');
        $maxSalinity = $selectedFishes->max('max_salinity');
        $salinityWarnings = $this->validateAndSetSalinity($selectedFishes, $minSalinity, $maxSalinity);
        $warning = array_merge($warning, $salinityWarnings);
    
        // 3. Set dan Validasi Ukuran dan Makanan
        $sizeAndFoodWarnings = $this->validateAndSetSizeAndFood($selectedFishes);
        $warning = array_merge($warning, $sizeAndFoodWarnings);
    
        // 4. Set dan Validasi Suhu Air
        $minTemperature = $selectedFishes->min('min_temperature');
        $maxTemperature = $selectedFishes->max('max_temperature');
        $temperatureWarnings = $this->validateAndSetTemperature($selectedFishes, $minTemperature, $maxTemperature);
        $warning = array_merge($warning, $temperatureWarnings);
    
        // 5. Set dan Validasi pH Air
        $minPH = $selectedFishes->min('min_ph');
        $maxPH = $selectedFishes->max('max_ph');
        $phWarnings = $this->validateAndSetPH($selectedFishes, $minPH, $maxPH);
        $warning = array_merge($warning, $phWarnings);
    
        // Buat Akuarium dengan parameter yang telah di-set
        $aquarium = Aquarium::create([
            'user_id' => $request->user_id,
            'name' => $request->name ?? 'Akuarium Baru',
            'volume_size' => $volume,
            'min_temperature' => $minTemperature,
            'max_temperature' => $maxTemperature,
            'min_ph' => $minPH,
            'max_ph' => $maxPH,
            'min_salinity' => $minSalinity,
            'max_salinity' => $maxSalinity
        ]);
    
        // Tambahkan ikan ke akuarium
        foreach ($selectedFishes as $fish) {
            AquariumFish::create([
                'aquarium_id' => $aquarium->id,
                'fish_id' => $fish->id,
                'quantity' => $request->fish_quantities[$fish->id] ?? 1
            ]);
        }
    
        return new AquariumResource($aquarium, $warning);
    }
    
    // Set dan Validasi Volume
    private function validateAndSetVolume($volume, $totalMinimumVolume)
    {
        if ($totalMinimumVolume > $volume) {
            return [
                "status" => "danger",
                "name" => "Volume Air Tidak Mencukupi",
                "description" => "Volume akuarium kurang dari kebutuhan ikan",
                "solution" => "Tambahkan volume air sebesar " . 
                              number_format(($totalMinimumVolume - $volume) * 1.1, 2) . 
                              " liter (ditambah 10% cadangan)"
            ];
        }
        return null;
    }
    
    // Set dan Validasi Salinitas
    private function validateAndSetSalinity($fishes, $minSalinity, $maxSalinity)
    {
        $warnings = [];
        $habitats = $fishes->pluck('habitat')->unique();
    
        // Cek habitat berbeda
        if ($habitats->count() > 1) {
            $warnings[] = [
                "status" => "danger",
                "name" => "Habitat Ikan Berbeda",
                "description" => "Terdapat ikan dengan habitat yang tidak sama",
                "solution" => "Pilih ikan dengan habitat yang sama"
            ];
        }
    
        // Cek kompatibilitas salinitas
        if ($minSalinity > $maxSalinity) {
            $warnings[] = [
                "status" => "danger",
                "name" => "Salinitas Tidak Kompatibel",
                "description" => "Rentang salinitas ikan tidak sesuai",
                "solution" => "Pilih ikan dengan rentang salinitas yang kompatibel"
            ];
        }
    
        return $warnings;
    }
    
    // Set dan Validasi Ukuran dan Makanan
    private function validateAndSetSizeAndFood($fishes)
    {
        $warnings = [];
        $sizes = $fishes->pluck('average_size');
        $foodTypes = $fishes->pluck('food_type')->unique();
    
        // Cek ukuran ikan
        if ($sizes->max() - $sizes->min() > 5) {
            $warnings[] = [
                "status" => "danger", 
                "name" => "Ukuran Ikan Tidak Sesuai",
                "description" => "Terdapat perbedaan ukuran ikan yang signifikan",
                "solution" => "Pilih ikan dengan ukuran serupa"
            ];
        }
    
        // Cek tipe makanan
        if ($foodTypes->count() > 1) {
            $warnings[] = [
                "status" => "warning",
                "name" => "Tipe Makanan Berbeda",
                "description" => "Ikan memiliki tipe makanan yang berbeda",
                "solution" => "Pertimbangkan kebutuhan makanan setiap ikan"
            ];
        }
    
        return $warnings;
    }
    
    // Set dan Validasi Suhu
    private function validateAndSetTemperature($fishes, $minTemperature, $maxTemperature)
    {
        $warnings = [];
    
        // Cek kompatibilitas suhu
        if ($minTemperature > $maxTemperature) {
            $warnings[] = [
                "status" => "danger",
                "name" => "Suhu Air Tidak Kompatibel",
                "description" => "Rentang suhu ikan tidak sesuai",
                "solution" => "Pilih ikan dengan rentang suhu yang kompatibel"
            ];
        }
    
        return $warnings;
    }
    
    // Set dan Validasi pH
    private function validateAndSetPH($fishes, $minPH, $maxPH)
    {
        $warnings = [];
    
        // Cek kompatibilitas pH
        if ($minPH > $maxPH) {
            $warnings[] = [
                "status" => "danger",
                "name" => "pH Air Tidak Kompatibel",
                "description" => "Rentang pH ikan tidak sesuai",
                "solution" => "Pilih ikan dengan rentang pH yang kompatibel"
            ];
        }
    
        return $warnings;
    }





    function updateAquarium(Request $request, $id){
        $aquarium = Aquarium::find($id);

        if (!$aquarium) {
            return response()->json([
                'message' => 'Aquarium not found'
            ], 404);
        }

        $aquarium->update($request->all());

        return response()->json([
            'message' => 'Aquarium updated successfully',
            'data' => new AquariumResource($aquarium)
        ]);
    }

    function deleteAquarium($id){
        $aquarium = Aquarium::find($id);

        if (!$aquarium) {
            return response()->json([
                'message' => 'Aquarium not found'
            ], 404);
        }

        $aquarium->delete();

        return response()->json([
            'message' => 'Aquarium deleted successfully'
        ]);
    }
}
