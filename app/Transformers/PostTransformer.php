<?php

namespace App\Transformers;

use Storage;
use Carbon\Carbon;
use Ramsey\Uuid\Uuid;
use Mni\FrontYAML\Parser as YAMLParser;

class PostTransformer implements Transformer {

    private $parser;

    public function __construct(YAMLParser $parser)
    {
        $this->parser = $parser;
    }

    public function transform($toTransform)
    {
        return $toTransform->map(function($postFilePath) {
            $post = $this->getPostItems($postFilePath);

            return [
                'id' => Uuid::uuid1()->toString(),
                'type' => 'post',
                'slug' => $this->getSlug($post),
                'meta_content' => json_encode($this->getMetaContent($post)),
                'content' => json_encode($this->getContent($post)),
                'is_pinned' => $this->getPinStatus($post),
                'item_created_at' => Carbon::parse($post['yaml']['pubdate'])->timezone(env('APP_TIMEZONE')),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        });
    }

    private function getPostItems($listing)
    {
        $file = Storage::disk('dropbox')->get($listing);
        $parsedFile = $this->parser->parse($file);

        return [
            'filename' => $this->cleanFileName($listing),
            'yaml' => $parsedFile->getYaml(),
            'content' => $parsedFile->getContent()
        ];
    }

    private function getPinStatus($post)
    {
        return isset($post['yaml']['pin']) ? $post['yaml']['pin'] : false;
    }

    private function getSlug($post)
    {
        return isset($post['yaml']['slug']) ? $post['yaml']['slug'] : $post['filename'];
    }

    private function cleanFileName($item)
    {
        $item = str_replace(getenv('DROPBOX_POST_PATH').'/','', $item);
        return str_replace(getenv('DROPBOX_POST_EXTENSION'), '', $item);
    }

    private function getMetaContent($post)
    {
        return [
            'author' => isset($post['yaml']['author']) ? $post['yaml']['author'] : getenv('POST_AUTHOR'),
            'tags' => isset($post['yaml']['tags']) ? explode(',', $post['yaml']['tags']) : '',
            'title' => isset($post['yaml']['headline']) ? $post['yaml']['headline'] : '',
        ];
    }

    private function getContent($post)
    {
        return [
            'headline' => isset($post['yaml']['headline']) ? $post['yaml']['headline'] : '',
            'subhead' => isset($post['yaml']['subhead']) ? $post['yaml']['subhead'] : '',
            'summary' => isset($post['yaml']['summary']) ? $post['yaml']['summary'] : '',
            'body' => $post['content']
        ];
    }
}