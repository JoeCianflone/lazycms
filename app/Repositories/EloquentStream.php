<?php

namespace App\Repositories;

use App\Models\Stream as StreamModel;

class EloquentStream implements Stream {

    private $model;

    public function __construct(StreamModel $model)
    {
        $this->model = $model;
    }

    public function saveNewTweets($tweets)
    {

        collect($tweets)->each(function($tweet) {

            $exists = $this->model->where('item_created_at', $tweet['item_created_at'])->get();

            if ($exists->count() < 1) {
                $this->model->insert($tweet);
            }

        }, $tweets);
    }
}