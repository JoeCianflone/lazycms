<?php

namespace App\Console\Commands;

use Storage;
use App\Repositories\Stream;
use Illuminate\Console\Command;
use App\Transformers\PostTransformer;

class GetPostsAndSave extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stream:posts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pull in X number of posts {--count=20}';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(PostTransformer $transformer, Stream $stream)
    {
        $allFiles = collect(Storage::disk('dropbox')->files(getenv('DROPBOX_POST_PATH')));

        $posts = $transformer->transform($allFiles->filter(function($value, $key) {
            return ends_with($value, getenv('DROPBOX_POST_EXTENSION'));
        }));

        $stream->saveNewPosts($posts);
    }
}
