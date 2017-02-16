<?php

namespace App\Http\Controllers;

use Storage;
use App\Repositories\Stream;
use Illuminate\Http\Request;

class PageController extends Controller
{
    private $stream;

    public function __construct(Stream $stream)
    {
        $this->stream = $stream;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug, $deepUri)
    {
        /**
         * check to see if pages.slug exists as a page or
         * a folder. If it's a folder then go into that
         * folder and use deepUri to try and find the
         * page. If at the end of deepUri we get to
         * another folder...then we add "index" to
         * the end of it see if that page exists
         * if it does, show it, if not throw a
         * 404
         */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
