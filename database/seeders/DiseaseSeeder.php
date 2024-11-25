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
        // Penyakit ikan cupang
        $bettaDiseases = [
            [
                'name' => 'Busuk Sirip',
                'description' => 'Penyakit ini menyebabkan sirip menjadi compang-camping dan berubah warna, yang mengarah pada kerusakan progresif.',
                'symptoms' => 'Sirip yang compang-camping, robek, atau berubah warna; lesu; kehilangan nafsu makan.',
                'cause_agent' => 'Infeksi bakteri (Aeromonas, Pseudomonas)',
                'affected_part' => 'fins',
                'prevention' => 'Perbaiki kualitas air, hindari memberi makan berlebihan, tambahkan garam akuarium.',
                'note' => 'Dapat diobati dengan antibiotik dan obat antijamur.',
                'disease_type' => 'Bakteri' // Bakteri
            ],
            [
                'name' => 'Ich (Penyakit Bintik Putih)',
                'description' => 'Infeksi parasit umum yang menyebabkan bintik-bintik putih muncul di tubuh dan sirip ikan.',
                'symptoms' => 'Bintik-bintik putih kecil di tubuh, sirip, dan insang; menggaruk benda; lesu.',
                'cause_agent' => 'Parasit (Ichthyophthirius multifiliis)',
                'affected_part' => 'scales, gills',
                'prevention' => 'Pertahankan kualitas air yang baik, gunakan sterilisator UV, hindari stres.',
                'note' => 'Diobati dengan obat yang mengandung malachite green atau tembaga sulfat.',
                'disease_type' => 'Parasit' // Parasit
            ],
            [
                'name' => 'Dropsy',
                'description' => 'Kondisi di mana tubuh ikan menjadi sangat bengkak karena penumpukan cairan.',
                'symptoms' => 'Sisik yang menonjol menyerupai kerucut pinus; kehilangan nafsu makan; lesu.',
                'cause_agent' => 'Infeksi bakteri, kegagalan organ, kualitas air yang buruk',
                'affected_part' => 'body',
                'prevention' => 'Pertahankan kualitas air, hindari memberi makan berlebihan, kurangi stres.',
                'note' => 'Sulit diobati, seringkali fatal. Eutanasia mungkin diperlukan.',
                'disease_type' => 'Bakteri' // Bakteri
            ],
            [
                'name' => 'Gangguan Kandung Kemih Renang',
                'description' => 'Kondisi yang mempengaruhi kemampuan ikan untuk menjaga daya apung yang tepat dan berenang dengan normal.',
                'symptoms' => 'Mengapung di permukaan, tenggelam ke dasar, berenang tidak teratur, kesulitan menjaga posisi.',
                'cause_agent' => 'Masalah diet, cedera fisik, cacat genetik',
                'affected_part' => 'swimming',
                'prevention' => 'Berikan diet seimbang, hindari memberi makan berlebihan, pertahankan kualitas air.',
                'note' => 'Dapat dikelola melalui perubahan diet dan perbaikan lingkungan.',
                'disease_type' => 'Fisiologis' // Fisiologis
            ]
        ];

        // Penyakit ikan mas
        $goldfishDiseases = [
            [
                'name' => 'Busuk Sirip dan Ekor',
                'description' => 'Infeksi bakteri yang menyebabkan sirip dan ekor berubah warna, compang-camping, dan memburuk.',
                'symptoms' => 'Sirip dan ekor yang compang-camping, robek, atau berubah warna; lesu; kehilangan nafsu makan.',
                'cause_agent' => 'Infeksi bakteri (Aeromonas, Pseudomonas)',
                'affected_part' => 'fins, tails',
                'prevention' => 'Pertahankan kualitas air, hindari memberi makan berlebihan, tambahkan garam akuarium.',
                'note' => 'Dapat diobati dengan antibiotik dan obat antijamur.',
                'disease_type' => 'Bakteri' // Bakteri
            ],
            [
                'name' => 'Gangguan Kandung Kemih Renang',
                'description' => 'Kondisi yang mempengaruhi kemampuan ikan untuk menjaga daya apung yang tepat dan berenang dengan normal.',
                'symptoms' => 'Mengapung di permukaan, tenggelam ke dasar, berenang tidak teratur, kesulitan menjaga posisi.',
                'cause_agent' => 'Masalah diet, cedera fisik, cacat genetik',
                'affected_part' => 'swimming',
                'prevention' => 'Berikan diet seimbang, hindari memberi makan berlebihan, pertahankan kualitas air.',
                'note' => 'Dapat dikelola melalui perubahan diet dan perbaikan lingkungan.',
                'disease_type' => 'Fisiologis' // Fisiologis
            ],
            [
                'name' => 'Goldfish Pox',
                'description' => 'Infeksi virus yang menyebabkan lesi putih atau abu-abu muncul di tubuh dan sirip ikan.',
                'symptoms' => 'Lesi putih atau abu-abu yang terangkat di kulit dan sirip; lesu; kehilangan nafsu makan.',
                'cause_agent' => 'Virus (Cyprinid herpesvirus 2)',
                'affected_part' => 'scales, fins',
                'prevention' => 'Pertahankan kualitas air, hindari memperkenalkan ikan baru, kurangi stres.',
                'note' => 'Tidak ada pengobatan yang efektif, perawatan suportif dianjurkan.',
                'disease_type' => 'Virus' // Virus
            ],
            [
                'name' => 'Infestasi Cacing Jangkar',
                'description' => 'Infestasi parasit yang disebabkan oleh parasit krustasea yang menempel pada kulit dan sisik ikan.',
                'symptoms' => 'Parasit putih atau kuning yang terlihat menempel pada tubuh ikan; peningkatan perilaku menggaruk.',
                'cause_agent' => 'Parasit (Lernaea cyprinacea)',
                'affected_part' => 'scales, gills',
                'prevention' => 'Pertahankan kualitas air, karantina ikan baru, gunakan obat khusus parasit.',
                'note' => 'Dapat diobati dengan obat antiparasit.',
                'disease_type' => 'Parasit' // Parasit
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