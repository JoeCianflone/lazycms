<?php

namespace App\Console\Commands;

use Storage;
use Illuminate\Console\Command;

class GetAssets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stream:assets';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pulls in all the images';

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
    public function handle()
    {
        $drop = Storage::disk('dropbox');
        $local = Storage::disk('local_assets');

        $assetList = collect($drop->files(getenv('DROPBOX_ASSET_PATH')));

        $assetList->each(function($asset) use ($drop, $local) {
            $item = $drop->readStream($asset);
            $local->putStream(str_replace('assets/', '', $asset), $item);
        });
    }
}
