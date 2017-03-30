<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Models\Page as PageModel;

class EloquentPage implements Page {

    private $model;

    public function __construct(PageModel $model)
    {
        $this->model = $model;
    }

    public function saveNewAndUpdatePages($pages)
    {
        collect($pages)->each(function($page) {
            $existingPage = $this->model->where('slug', $page['slug']);

            if ($existingPage->count() > 0) {
                return $existingPage->update($page);
            }

            return $this->model->insert($page);
        });
    }

    public function findBySlug($slug)
    {
        return $this->model->where('slug', $slug)->firstOrFail();
    }
}