<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class MediaManagerService
{
    public function getPublicFolderNames(): array
    {
        return Storage::disk('public')->directories();
    }

    public function getImagePaths(string $folder_name): array
    {
        return Storage::disk('public')->files($folder_name);
    }

    public function getMediaPaths()
    {
        $folders = collect($this->getPublicFolderNames());
        $reformedFolders = $folders->mapWithKeys(function ($folder) {
            $images = collect($this->getImagePaths($folder))->map(fn($path) => Storage::disk('public')->url($path));
            return [
                'name'=> $folder,
                'content' => $images
            ];
        });

        return $reformedFolders;
    }
}
