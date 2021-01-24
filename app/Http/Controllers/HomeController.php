<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Music;
use App\Video;
use App\Blog;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
          $music = Music::all();  
          $video=Video::all();
          $blog=Blog::all();    
        return view('backend.index',compact('music','video','blog'));
    }
}
