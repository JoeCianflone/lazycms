<?php

namespace App\Console\Commands;

use Github\Client as GithubClient;
use Github\HttpClient\Message\ResponseMediator;
use App\Repositories\Stream;
use Illuminate\Console\Command;
use App\Transformers\GithubTransformer;


class GetGithubEventsAndSave extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stream:github {--count=20}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get the last X number of events from Github';

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
    public function handle(GithubTransformer $transformer, Stream $stream)
    {
        $client   = new GithubClient();
        $client->authenticate(config('github.token'), null, \Github\Client::AUTH_HTTP_TOKEN);
        $response = $client->getHttpClient()->get('/users/joecianflone/events');
        $githubEvents = ResponseMediator::getContent($response);

        $githubEvents = $transformer->transform(collect($githubEvents));

        $stream->saveNewGithubEvents($githubEvents);
    }
}
