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
    public function handle(PostsTransformer $transformer, Stream $stream)
    {
        // Get all the articles out of Dropbox
        $allFiles = collect(Storage::disk('dropbox')->files(getenv('DROPBOX_POST_PATH')));

        // Filter to only the things we want (only markdown)
        $markdownFiles = $allFiles->filter(function($value, $key) {
            return ends_with($value, getenv('DROPBOX_POST_EXTENSION'));
        });


        // Transform data
        // save data to DB
    }
}
