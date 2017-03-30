<?php

namespace App\Console\Commands;

use Storage;
use App\Repositories\Page;
use Illuminate\Console\Command;
use App\Transformers\PageTransformer;

class GetPagesAndSave extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stream:pages';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pull in all the pages';

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
    public function handle(PageTransformer $transformer, Page $page)
    {
        $allFiles = collect(Storage::disk('dropbox')->files(getenv('DROPBOX_PAGE_PATH')));

        $pages = $transformer->transform($allFiles->filter(function($value, $key) {
            return ends_with($value, getenv('DROPBOX_PAGE_EXTENSION'));
        }));

        $page->saveNewAndUpdatePages($pages);
    }
}
