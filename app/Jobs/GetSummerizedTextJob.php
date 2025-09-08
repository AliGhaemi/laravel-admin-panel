<?php

namespace App\Jobs;

use App\Models\Post;
use App\Services\AiService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

class GetSummerizedTextJob implements ShouldQueue
{
    use Queueable;

    public $postId;

    /**
     * Create a new job instance.
     */
    public function __construct(int $postId)
    {
        $this->postId = $postId;
    }

    /**
     * Execute the job.
     */
    public function handle(AiService $service): void
    {
        $post = Post::find($this->postId);
        if ($post) {
            // Todo: for now there is no description_summery column for posts, add it later.
            $descriptionSummery = $service->getSummeryForString($post->description);
//            $post->description_summery = $descriptionSummery;
//            $post->save();
            Log::info($descriptionSummery);
        }
    }
}
