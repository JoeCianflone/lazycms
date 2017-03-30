<?php

namespace App\Transformers;

use Storage;
use Carbon\Carbon;
use Ramsey\Uuid\Uuid;
use Mni\FrontYAML\Parser as YAMLParser;

class FileTransformer implements Transformer {

    private $parser;

    public function __construct(YAMLParser $parser)
    {
        $this->parser = $parser;
    }

    public function transform($toTransform)
    {
        return $toTransform->map(function($pageFilePath) {
            $page = $this->getPageItems($pageFilePath);

            return [
                'title'           => $this->getTitle($page),
                'slug'            => $this->getSlug($page),
                'use_layout'      => $this->getLayout($page),
                'meta_content'    => json_encode($this->getMetaContent($post)),
                'content'         => json_encode($this->getContent($post)),
                'created_at'      => Carbon::now(),
                'updated_at'      => Carbon::now(),
            ];
        });
    }

    private function getTitle($post)
    {

    }


    private function getPageItems($listing)
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
        $item = str_replace(getenv('DROPBOX_PAGE_PATH').'/','', $item);
        return str_replace(getenv('DROPBOX_PAGE_EXTENSION'), '', $item);
    }

    private function getMetaContent($post)
    {
        return [
            'author' => isset($post['yaml']['author']) ? $post['yaml']['author'] : getenv('POST_AUTHOR'),
            'tags'   => isset($post['yaml']['tags']) ? explode(',', $post['yaml']['tags']) : '',
            'title'  => isset($post['yaml']['headline']) ? $post['yaml']['headline'] : '',
        ];
    }

    private function getContent($post)
    {
        return [
            'headline' => isset(var)t($post['yaml']['headline']) ? $post['yaml']['headline'] : '',
            'subhead' => isset($post['yaml']['subhead']) ? $post['yaml']['subhead'] : '',
            'summary' => isset($post['yaml']['summary']) ? $post['yaml']['summary'] : '',
            'body' => $post['content']
        ];
    }
}
