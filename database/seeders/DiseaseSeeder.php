<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class DiseaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Betta fish diseases
        $bettaDiseases = [
            [
                'name' => 'Fin Rot',
                'description' => 'This disease causes the fins to become ragged and discolored, leading to progressive deterioration.',
                'symptoms' => 'Frayed, shredded, or discolored fins; lethargy; loss of appetite.',
                'cause_agent' => 'Bacterial infection (Aeromonas, Pseudomonas)',
                'affected_part' => 'Fins',
                'prevention' => 'Improve water quality, avoid overfeeding, add aquarium salt.',
                'note' => 'Can be treated with antibiotics and antifungal medications.',
                'disease_type' => 1 // Bacterial
            ],
            [
                'name' => 'Ich (White Spot Disease)',
                'description' => 'A common parasitic infection causing white spots to appear on the fish\'s body and fins.',
                'symptoms' => 'Small white spots on the body, fins, and gills; scratching against objects; lethargy.',
                'cause_agent' => 'Parasite (Ichthyophthirius multifiliis)',
                'affected_part' => 'Skin, Gills',
                'prevention' => 'Maintain good water quality, use a UV sterilizer, avoid stress.',
                'note' => 'Treat with medication containing malachite green or copper sulfate.',
                'disease_type' => 3 // Parasitic
            ],
            [
                'name' => 'Dropsy',
                'description' => 'A condition where the fish\'s body becomes severely swollen due to fluid buildup.',
                'symptoms' => 'Protruding scales resembling pine cones; loss of appetite; lethargy.',
                'cause_agent' => 'Bacterial infection, organ failure, poor water quality',
                'affected_part' => 'Body',
                'prevention' => 'Maintain water quality, avoid overfeeding, reduce stress.',
                'note' => 'Difficult to treat, often fatal. Euthanasia may be necessary.',
                'disease_type' => 1 // Bacterial
            ],
            [
                'name' => 'Swim Bladder Disorder',
                'description' => 'A condition that affects the fish\'s ability to maintain proper buoyancy and swim normally.',
                'symptoms' => 'Floating at the surface, sinking to the bottom, erratic swimming, difficulty maintaining position.',
                'cause_agent' => 'Dietary issues, physical injury, genetic defects',
                'affected_part' => 'Swim Bladder',
                'prevention' => 'Feed a balanced diet, avoid overfeeding, maintain water quality.',
                'note' => 'Can be managed through dietary changes and environmental improvements.',
                'disease_type' => 4 // Physiological
            ]
        ];

        // Goldfish diseases
        $goldfishDiseases = [
            [
                'name' => 'Fin and Tail Rot',
                'description' => 'A bacterial infection that causes the fins and tail to become discolored, ragged, and deteriorate.',
                'symptoms' => 'Frayed, shredded, or discolored fins and tail; lethargy; loss of appetite.',
                'cause_agent' => 'Bacterial infection (Aeromonas, Pseudomonas)',
                'affected_part' => 'Fins, Tail',
                'prevention' => 'Maintain water quality, avoid overfeeding, add aquarium salt.',
                'note' => 'Can be treated with antibiotics and antifungal medications.',
                'disease_type' => 1 // Bacterial
            ],
            [
                'name' => 'Swim Bladder Disorder',
                'description' => 'A condition that affects the fish\'s ability to maintain proper buoyancy and swim normally.',
                'symptoms' => 'Floating at the surface, sinking to the bottom, erratic swimming, difficulty maintaining position.',
                'cause_agent' => 'Dietary issues, physical injury, genetic defects',
                'affected_part' => 'Swim Bladder',
                'prevention' => 'Feed a balanced diet, avoid overfeeding, maintain water quality.',
                'note' => 'Can be managed through dietary changes and environmental improvements.',
                'disease_type' => 4 // Physiological
            ],
            [
                'name' => 'Goldfish Pox',
                'description' => 'A viral infection that causes white or gray lesions to appear on the fish\'s body and fins.',
                'symptoms' => 'White or gray raised lesions on the skin and fins; lethargy; loss of appetite.',
                'cause_agent' => 'Virus (Cyprinid herpesvirus 2)',
                'affected_part' => 'Skin, Fins',
                'prevention' => 'Maintain water quality, avoid introducing new fish, reduce stress.',
                'note' => 'No effective treatment, supportive care is recommended.',
                'disease_type' => 2 // Viral
            ],
            [
                'name' => 'Anchor Worm Infestation',
                'description' => 'A parasitic infestation caused by a crustacean parasite that attaches to the fish\'s skin and scales.',
                'symptoms' => 'Visible white or yellow parasites attached to the fish\'s body; increased scratching behavior.',
                'cause_agent' => 'Parasite (Lernaea cyprinacea)',
                'affected_part' => 'Skin, Scales',
                'prevention' => 'Maintain water quality, quarantine new fish, use a parasite-specific medication.',
                'note' => 'Can be treated with anti-parasitic medications.',
                'disease_type' => 3 // Parasitic
            ]
        ];

        // Insert Betta fish diseases
        $bettas = DB::table('fishes')->where('name', 'Cupang')->pluck('id');
        foreach ($bettaDiseases as $disease) {
            $diseaseId = DB::table('diseases')->insertGetId($disease);
            foreach ($bettas as $bettaId) {
                DB::table('affected_disease_fish')->insert([
                    'disease_id' => $diseaseId,
                    'fish_id' => $bettaId,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }

        // Insert Goldfish diseases
        $goldfishs = DB::table('fishes')->where('name', 'Ikan Mas')->pluck('id');
        foreach ($goldfishDiseases as $disease) {
            $diseaseId = DB::table('diseases')->insertGetId($disease);
            foreach ($goldfishs as $goldfishId) {
                DB::table('affected_disease_fish')->insert([
                    'disease_id' => $diseaseId,
                    'fish_id' => $goldfishId,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }
    }
}