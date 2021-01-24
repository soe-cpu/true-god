<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Video;
use App\Music;
use Carbon\Carbon;
class FrontendController extends Controller
{
    public function main($value='')
  {
  	$blog = Blog::take(1)->orderBy('id','desc')->get();
    $vid = Video::take(3)->orderBy('id','desc')->get();
    $muc = Music::take(3)->orderBy('id','desc')->get();
  	$video = Video::all();
    $music = Music::all();
    $videod = Video::take(1)->orderBy('id','desc')->get();
    $musicd = Music::take(1)->orderBy('id','desc')->get();
    return view('frontend.mainpage',compact('blog','video','vid','muc','music','musicd','videod'));
  }
  public function video($value='')
  {
     $music = Music::all();
    $video = Video::all();
    $blog = Blog::all();
    return view('frontend.video',compact('music','video','blog'));
  }

  public function videodetail($id)
  {
    $videodetail = Video::find($id);
    $video = Video::all();
    $music = Music::all();
    $blog =  Blog::all();
    return view('frontend.videodetail',compact('videodetail','video','music','blog'));
  }
  public function music($value='')
  {
    $music = Music::all();
    $video = Video::all();
    $blog = Blog::all();
    return view('frontend.music',compact('music','video','blog'));
  }
  public function musicdetail($id)
  {
    $musicdetail = Music::find($id);
    $music = Music::all();
    $video = Video::all();
    $blog= Blog::all();
    return view('frontend.musicdetail',compact('musicdetail','music','video','blog'));
  }

   public function blog($value='')
  {
    $music = Music::all();
    $video = Video::all();
    $blog = Blog::all();
    return view('frontend.blog',compact('music','video','blog'));
  }
public function blogdetail($id)
  {
    $blogdetail = Blog::find($id);
    $video = Video::all();
    $music = Music::all();
    $blog = Blog::all();
    return view('frontend.blogdetail',compact('blogdetail','video','music','blog'));
  }
  public function search(){
        //dd(request()->query('query'));
        $search_text = $_GET['query'];
        $musics = Music::where('title', 'LIKE', '%'.$search_text.'%')->get();
        $videos = Video::where('title', 'LIKE', '%'.$search_text.'%')->get();

        return view ('frontend.search', compact('musics','videos'));
    }
}
