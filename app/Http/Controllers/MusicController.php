<?php

namespace App\Http\Controllers;

use App\Music;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $music = Music::all();
        return view('backend.music.index',compact('music'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
           return view('backend.music.create');
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
            "title" => "required",
            "artist" => "required",
            "album" => "required",
            "desc" => "required",
            "song" => "required|mimes:mp3", // a.jpg
              "photo" => "required|mimes:jpeg,bmp,png",
        ]);
           // If include file, upload
        if($request->file()) {
            // 624872374523_a.jpg
            $fileName = time().'_'.$request->photo->getClientOriginalName();
            // itemimg/624872374523_a.jpg
            $filePath = $request->file('photo')->storeAs('music', $fileName, 'public');
            $photopath = '/storage/'.$filePath;
        }
        if($request->file()) {
            // 624872374523_a.jpg
            $fileName = time().'_'.$request->song->getClientOriginalName();
            // itemimg/624872374523_a.jpg
            $filePath = $request->file('song')->storeAs('song', $fileName, 'public');
            $path = '/storage/'.$filePath;
        }
          // If include file, upload

        // store
        $song = new Music;
        $song->title = $request->title;      
        $song->album = $request->album;
        $song->artist = $request->artist;
        $song->desc = $request->desc;
        $song->song = $path;
        $song->photo= $photopath;
        $song->save();

        // redirect
        return redirect()->route('musics.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Music  $music
     * @return \Illuminate\Http\Response
     */
    public function show(Music $music)
    {
        return view('backend.music.show',compact('music'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Music  $music
     * @return \Illuminate\Http\Response
     */
    public function edit(Music $music)
    {
        return view('backend.music.edit',compact('music'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Music  $music
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Music $song)
    {
        $request->validate([
            "title" => "required",
            "artist" => "required",
            "album" => "required",
            "desc" => "required",
            "song" => "sometimes|mimes:mp3", // a.jpg
            "oldsong" => "required",
              "photo" => "sometimes|mimes:jpeg,bmp,png",
              "oldphoto" => "required"
        ]);
           // If include file, upload
        if($request->file()) {
            // 624872374523_a.jpg
            $fileName = time().'_'.$request->photo->getClientOriginalName();
            // itemimg/624872374523_a.jpg
            $filePath = $request->file('photo')->storeAs('music', $fileName, 'public');
            $photopath = '/storage/'.$filePath;
        }else{
            $photopath = $request->oldsong;
        }
        if($request->file()) {
            // 624872374523_a.jpg
            $fileName = time().'_'.$request->song->getClientOriginalName();
            // itemimg/624872374523_a.jpg
            $filePath = $request->file('song')->storeAs('song', $fileName, 'public');
            $path = '/storage/'.$filePath;
        }
        else{
            $path = $request->oldphoto;
          // If include file, upload
        }

        // store
        
        $song->title = $request->title;      
        $song->album = $request->album;
        $song->artist = $request->artist;
        $song->desc = $request->desc;
        $song->song = $path;
        $song->photo= $photopath;
        $song->save();

        // redirect
        return redirect()->route('musics.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Music  $music
     * @return \Illuminate\Http\Response
     */
    public function destroy(Music $music)
    {
        $music->delete();
        return redirect()->route('musics.index');
    }
}
