<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
                'name'=> Str::of($folder)->replace('_', ' ')->title(),
                'content' => $images
            ];
        });

        return $reformedFolders;
    }
}
