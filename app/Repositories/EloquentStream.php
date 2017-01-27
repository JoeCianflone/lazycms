<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Models\Stream as StreamModel;

class EloquentStream implements Stream {

    private $model;

    public function __construct(StreamModel $model)
    {
        $this->model = $model;
    }

    public function getAllStreamItems()
    {
        return $this->model->orderBy('item_created_at', 'desc')->paginate(20)->toArray();
    }

    public function getStreamByType($type)
    {
        return $this->model->where('type', $type)->orderBy('item_created_at', 'desc')->paginate(20);
    }

    public function getPinnedItem()
    {
        return $this->model->where('is_pinned', true)->first();
    }

    public function getPostBySlug($slug)
    {
        return $this->model->where('slug', $slug)->first();
    }

    public function saveNewTweets($tweets)
    {
        collect($tweets)->each(function($tweet) {
            $this->saveNewItem($tweet);
        });
    }

    public function saveNewPosts($posts)
    {
        collect($posts)->each(function($post) {
            $this->saveNewItem($post);
        });
    }

    // TODO: there could be a case where you have
    // two posts with the same date: Jan 25, 2017
    // the second one won't get inserted
    private function saveNewItem($item)
    {
        $exists = $this->model->where('item_created_at', '=', Carbon::parse($item['item_created_at'])->toDateTimeString())->get();

        if ($exists->count() < 1) {
            $this->model->insert($item);
        }
    }

    public function updatePost($post)
    {}
}