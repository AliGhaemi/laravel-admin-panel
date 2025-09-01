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
        return Inertia::render('Media', [
            'media_paths' => $this->mediaManagerService->getMediaPaths()
        ]);
    }
}
