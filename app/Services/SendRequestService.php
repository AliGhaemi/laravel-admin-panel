<?php

namespace App\Services;

use App\Models\SentRequest;
use Illuminate\Support\Facades\Auth;

class SendRequestService
{
    public function storeSentRequest(array $data)
    {
        $imagePath = $data['image-input']->store('sent-requests', 'public');
        $filePath = $data['file-input']->store('sent-requests', 'public');
        $sentRequest = SentRequest::create([
            'user_id' => Auth::id(),
            'city_id' => $data['city'],
            'country_id' => $data['country'],
            'name' => $data['request-name'],
            'email' => $data['request-email'],
            'telephone' => $data['request-tel'],
            'date' => $data['request-date'],
            'image_path' => $imagePath,
            'file_path' => $filePath,
            'terms_agreement' => $data['request-checkbox'],
        ]);
        return $sentRequest;
    }
}
