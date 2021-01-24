<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $video = Video::all();
        return view('backend.video.index',compact('video'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.video.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => 'required',
            "artist" => "required",
            "photo" => "required|mimes:jpeg,bmp,png",
            "description" => "required",
            "link" => "required"
        ],[
            "title.required" => "Pleace Enter Video Title"
        ]);
        // If include file, upload
        if($request->file()) {
            // 624872374523_a.jpg
            $fileName = time().'_'.$request->photo->getClientOriginalName();
            // itemimg/624872374523_a.jpg
            $filePath = $request->file('photo')->storeAs('video', $fileName, 'public');
            $path = '/storage/'.$filePath;
        }
        // Object Relational Mapping (Eloquent ORM)
        $video = new Video;
        $video->title = $request->title;
        $video->artist = $request->artist;
        $video->photo = $path;
        $video->description = $request->description;
        $video->link = $request->link;
        $video->save();
        return redirect()->route('videos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        return view('backend.video.show',compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        return view('backend.video.edit',compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        $request->validate([
            "title" => 'required',
            "artist" => "required",
            "photo" => "sometimes|mimes:jpeg,bmp,png",
            "oldphoto" => "required",
            "description" => "required",
            "link" => "required"
        ],[
            "title.required" => "Pleace Enter Video Title"
        ]);
        // If include file, upload
        if($request->file()) {
            // 624872374523_a.jpg
            $fileName = time().'_'.$request->photo->getClientOriginalName();
            // itemimg/624872374523_a.jpg
            $filePath = $request->file('photo')->storeAs('video', $fileName, 'public');
            $path = '/storage/'.$filePath;
        }else{
            $path = $request->oldphoto;
        }
        // Object Relational Mapping (Eloquent ORM)
        $video->title = $request->title;
        $video->artist = $request->artist;
        $video->photo = $path;
        $video->description = $request->description;
        $video->link = $request->link;
        $video->save();
        return redirect()->route('videos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        $video->delete();
        return redirect()->route('videos.index');
    }
}
