<?php

namespace App\Console\Commands;

use Twitter;
use App\Repositories\Stream;
use Illuminate\Console\Command;
use App\Transformers\TweetTransformer;

class GetTweetsAndSave extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stream:tweets {--count=20}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pull in X latest tweets from Twitter';

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
    public function handle(TweetTransformer $transformer, Stream $stream)
    {
        // get raw tweets from twitter
        // transform data into something meaningful

        // save transformed data to DB

        $tweets = $transformer->transform(
            Twitter::getUserTimeline([
                            'count' => $this->option('count'),
                            'format' => 'array',
                            'tweet_mode' => 'extended',
            ])
        );
        $stream->saveNewTweets($tweets);
    }
}
