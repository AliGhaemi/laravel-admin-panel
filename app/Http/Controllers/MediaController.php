<?php

namespace App\Http\Controllers;

use App\Services\MediaManagerService;
use Inertia\Inertia;

class MediaController extends Controller
{
    protected $mediaManagerService;

    public function __construct(MediaManagerService $mediaManagerService)
    {
        $this->mediaManagerService = $mediaManagerService;
    }

    public function index()
    {
        $folders = $this->mediaManagerService->getPublicFolderNames();
        $images = $this->mediaManagerService->getImagePaths();

        return Inertia::render('Media', [
            'folders' => $folders,
            'images' => $images,
        ]);
    }
}
