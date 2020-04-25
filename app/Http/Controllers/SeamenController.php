<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \FFMpeg;

class SeamenController extends Controller
{
    
    public function __construct()
    {
        //$this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('seamen.index');
    }
    public function test()
    {
        return view('seamen.test');
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

    public  function video(){
        return  view('seamen.video');
    }
    
    public function videoSend(Request $request){
            $data = $this->validate($request, [
                'blob'        => 'required',
            ]);
    
           // dd($data['blob']);
            Storage::disk('public')
                ->put('videos/'.'video.webm', file_get_contents($request->blob));
            //\CloudConvert::file('videos/'.'video.webm')->to('videos/'.'video2.mp4');
           
            

            FFMpeg::fromDisk('local')->open('public/videos/' . 'video.webm')
            //FFMpeg::open('videos/'.'video.webm')
            // optionally you could set the visibility
            // of the exported file
            ->export()
            ->inFormat(new FFMpeg\Format\Video\X264)
            ->withVisibility('public')
            ->save('videos/'.'my_movie.mp4');
            return response()->json(['status'=>'success']);
    }
    
    public function videoWatch(){
        return view('seamen.video-watch');
    }
}
