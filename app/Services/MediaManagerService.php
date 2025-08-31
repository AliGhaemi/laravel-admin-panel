<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class MediaManagerService
{
    public function getPublicFolderNames(): array
    {
        return Storage::disk('public')->directories();
    }

    public function getImagePaths(): array
    {
        return Storage::disk('public')->files('images');
    }
}
