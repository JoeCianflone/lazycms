<?php

namespace App\Http\Controllers;

use Twitter;
use App\Repositories\Stream;
use Illuminate\Http\Request;

class StreamController extends Controller
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
    public function index()
    {
        $stream = $this->stream->getAllStreamItems();

        return view('stream')->with(compact('stream'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($type)
    {
        $stream = $this->stream->getStreamByType($type);
        // dd ($stream->items());
        return view('filtered-stream')->with(compact('stream', 'type'));
    }

}