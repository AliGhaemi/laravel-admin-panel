<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AiService
{
    public function getSummeryForString(string $text): string
    {
        $data = [
            'system_instruction' => [
                'parts' => [
                    'text' => 'Write a summery as summerized and readable as possible'
                ]
            ],
            'contents' => [
                'parts' => [
                    'text' => $text
                ]
            ]
        ];

        $headers = [
            'Content-Type' => 'application/json',
            'X-goog-api-key' => env('GEMINI_API_KEY')
        ];

        try {
            $response = Http::withHeaders($headers)->withOptions(['verify' => false])->post('https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent', $data);
            $responseData = $response->json();
            $responseText = $responseData['candidates'][0]['content']['parts'][0]['text'];

            if ($response->successful()) {
                Log::info(response()->json([
                    'message' => 'Success',
                    'data' => $response->json()
                ]));
                return $responseText;
            } else {
                return response()->json([
                    'message' => 'Error',
                    'status' => $response->status(),
                    'data' => $response->body()
                ], $response->status());
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error',
                'data' => $e->getMessage()
            ], 500);
        }

    }
}
