<?php

namespace App\Transformers;

use Carbon\Carbon;
use Ramsey\Uuid\Uuid;

class GithubTransformer implements Transformer {

    public function transform($toTransform)
    {
        /**
         * id
         * type: github
         * sub_type: event_type
         * content: {
         *     user => {}
         *     message => {}
         *     action => ""
         *     repo => {}
         * }
         * item_created_at
         */

        return $toTransform->map(function($githubEvent) {
            return [
                'id' => Uuid::uuid1()->toString(),
                'type' => 'github',
                'sub_type' => str_replace('event', "", strtolower($githubEvent['type'])),
                'content' => json_encode($this->getContent($githubEvent)),
                'item_created_at' => Carbon::parse($githubEvent['created_at'])->timezone(env('APP_TIMEZONE')),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        });
    }

    private function getContent($githubEvent)
    {
        return [
            'repo' => $githubEvent['repo'],
            'user' => [
                'username' => $githubEvent['actor']['display_login'],
                'url' => $githubEvent['actor']['url'],
                'avatar' => $githubEvent['actor']['avatar_url'],
            ],
            'payload' => $githubEvent['payload']
        ];
    }
}
