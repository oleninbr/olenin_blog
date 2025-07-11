<?php

namespace App\Jobs;

use App\Models\BlogPost;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class BlogPostAfterCreateJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var BlogPost
     */
    private $blogPost;

    public function __construct(BlogPost $blogPost)
    {
        $this->blogPost = $blogPost;
    }

    public function handle()
    {
        logs()->info("Створено новий запис в блозі [{$this->blogPost->id}]");
    }
}
