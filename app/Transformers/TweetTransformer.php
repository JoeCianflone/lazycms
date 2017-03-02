<?php

namespace App\Transformers;

use Carbon\Carbon;
use Ramsey\Uuid\Uuid;

class TweetTransformer implements Transformer {

    public function transform($toTransform)
    {
        return $toTransform->map(function($tweet) {
          return [
            'id' => Uuid::uuid1()->toString(),
            'type' => 'tweet',
            'sub_type' => isset($tweet['retweeted_status']) ? "retweet" : null,
            'content' => json_encode($this->getTweetContent($tweet)),
            'item_created_at' => Carbon::parse($tweet['created_at'])->timezone(env('APP_TIMEZONE')),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
          ];
        });
    }

    private function getTweetContent($response)
    {
        $tweet = $response;
        if (isset($tweet['retweeted_status'])) {
            $tweet = $tweet['retweeted_status'];
        }

        return [
            'user' => [
                'realName' => $tweet['user']['name'],
                'screenName' => $tweet['user']['screen_name'],
                'avatar' => $tweet['user']['profile_image_url_https'],
            ],
            'text' => $tweet['full_text'],
            'media' => isset($tweet['entities']['media']) ? $tweet['entities']['media'] : null,
        ];
    }
}
