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

    public function saveNewPages($things) {
        dd($things);
    }
}