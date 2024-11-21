<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Disease;
use App\Http\Resources\DiseaseResource;
use Illuminate\Support\Facades\Log;

class DiagnosisController extends Controller
{
    public function diagnosis(Request $request)
    {
        $apiKey = env('GEMINI_API_KEY');
        $prompt = $request->prompt;

        try {
            // Ambil semua data penyakit
            $diseases = DiseaseResource::collection(
                Disease::with('affected_fish', 'product_recommendation')->get()
            );

            $diseasesJson = json_encode($diseases);

            $fullPrompt = "Berdasarkan data penyakit berikut: {$diseasesJson}, 
            tolong temukan ID penyakit yang sesuai dengan gejala: {$prompt}. 
            Kembalikan hanya ID penyakit yang paling cocok dalam format: ID: [nomor_id]";

            // Kirim request ke Gemini API dengan opsi SSL aman
            $response = Http::withOptions([
                'verify' => true,
                'curl' => [
                    CURLOPT_CAINFO => 'C:\Users\Zolla\Documents\Project Fishco\fishco-api\app\Http\Controllers\cacert.pem',
                    CURLOPT_SSL_VERIFYPEER => true,
                    CURLOPT_SSL_VERIFYHOST => 2
                ]
            ])->withHeaders([
                        'Content-Type' => 'application/json'
                    ])->post("https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key={$apiKey}", [
                        'contents' => [
                            [
                                'role' => 'user',
                                'parts' => [
                                    ['text' => $fullPrompt]
                                ]
                            ]
                        ],
                        'generationConfig' => [
                            'temperature' => 0.7,
                            'topK' => 40,
                            'topP' => 0.95,
                            'maxOutputTokens' => 256,
                            'responseMimeType' => 'text/plain'
                        ]
                    ]);

            // Periksa response
            if ($response->successful()) {
                $responseBody = $response->json();
                $responseText = $responseBody['candidates'][0]['content']['parts'][0]['text'] ?? null;

                // Log respons untuk debugging
                Log::info('Gemini Response: ' . $responseText);

                $diseaseId = $this->extractDiseaseId($responseText);

                // Cari penyakit berdasarkan ID
                $result = DiseaseResource::collection(
                    Disease::with('affected_fish', 'product_recommendation')
                        ->where('id', $diseaseId)
                        ->get()
                );

                return $result;
            } else {
                // Tangani error response
                Log::error('Gemini API Error: ' . $response->body());
                return response()->json([
                    'error' => 'Gagal mendapatkan respons dari Gemini API',
                    'details' => $response->body()
                ], 500);
            }
        } catch (\Exception $e) {
            // Tangani exception
            Log::error('Diagnosis Error: ' . $e->getMessage());
            return response()->json([
                'error' => 'Terjadi kesalahan dalam proses diagnosis',
                'details' => $e->getMessage()
            ], 500);
        }
    }

    private function extractDiseaseId($responseText)
    {
        // Ekstrak ID penyakit dari respons
        preg_match('/ID:\s*(\d+)/', $responseText, $matches);
        return $matches[1] ?? null;
    }
}