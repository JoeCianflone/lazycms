<?php

namespace App\Http\Controllers;

use Storage;
use App\Repositories\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    private $page;

    public function __construct(Page $page)
    {
        $this->page = $page;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug, $deepUri)
    {
        $page = $this->page->findBySlug($slug);

        return view($page->use_layout)->with(compact('page'));
    }
}
