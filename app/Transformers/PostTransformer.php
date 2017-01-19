<?php

namespace App\Transformers;

use Carbon\Carbon;
use Ramsey\Uuid\Uuid;
use Mni\FrontYAML\Parser as YAMLParser;

class PostTransformer implements Transformer {

    public function transform($toTransform)
    {

        return array_map(function($post) {
            return [
                'id' => Uuid::uuid1()->toString(),
                'type' => 'post',
                'slug' => $post['yaml']['slug'],
                'meta_content' => json_encode($this->getMetaContent($post)),
                'content' => json_encode($this->getContent($post)),
                'item_created_at' => Carbon::parse($post['yaml']['pubdate'])->timezone(env('APP_TIMEZONE')),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }, $toTransform);
    }

    private function getMetaContent($post)
    {}

    private function getContent($post)
    {}
}