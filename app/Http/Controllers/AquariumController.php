<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aquarium;
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

    function createAquarium(Request $request){
        $volume = $request->volume; // volume 
        $fish = $request->fish; // array fish id
        $warning  = [];
        $aquarium = [];

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
            
            //set nilai volume air pada aquarium berdasarkan request volume 

        // tentukan rekomendasi kompatimilitas dari habitat list ikan yang dipilih
            // jika terdapat ikan yang habitatnya marine dan juga ikan freshwater maka berikan warning (tidak cocok karena habitat berbeda dan berikan warning danger)
            // jika terdapat ikan yang yang memiliki salinitas air yang maksimal nya di bawah minimal ikan ikan lain maka kasih warning (tidak cocok karena salinitas air berbeda berikan danger dan berikan warning danger)
           
        // tentukan rekomendasi kompatibilitas dari tipe ukuran dan makanan ikan yang dipilih 
            

        // tentukan rekomendasi kompatibilitas dari suhu air ikan yang dipilih
            // jika terdapat ikan yang yang memiliki suhu air yang maksimal nya di bawah minimal ikan ikan lain maka kasih warning (ikan a tidak cocok dengan ikan b karena suhu air tidak sesuai dan berikan warning danger)
            // jika terdapat ikan yang yang memiliki suhu air yang minimal nya di atas maksimal ikan ikan lain maka kasih warning (ikan a tidak cocok dengan ikan b karena suhu air tidak sesuai dan berikan warning danger)
        
        return new AquariumResource(Aquarium::find($id) , $warning);
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
