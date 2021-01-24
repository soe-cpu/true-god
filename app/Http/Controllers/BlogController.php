<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Blog::all();
        return view('backend.blog.index',compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.blog.create');
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
            "photo" => "required|mimes:jpeg,bmp,png", // a.jpg
            "description" => "required", 
        ],[
            "title.required" => "Pleace Enter Blog Title"
        ]);
        // If include file, upload
        if($request->file()) {
            // 624872374523_a.jpg
            $fileName = time().'_'.$request->photo->getClientOriginalName();
            // itemimg/624872374523_a.jpg
            $filePath = $request->file('photo')->storeAs('blog', $fileName, 'public');
            $path = '/storage/'.$filePath;
        }
        // Object Relational Mapping (Eloquent ORM)
        $blog = new Blog;
        $blog->title = $request->title;
        $blog->photo = $path;
        $blog->description = $request->description;
        $blog->save();
        return redirect()->route('blogs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view('backend.blog.show',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('backend.blog.edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            "title" => 'required',
            "photo" => "sometimes|mimes:jpeg,bmp,png", // a.jpg
            "oldphoto" => "required",
            "description" => "required", 
        ],[
            "title.required" => "Pleace Enter Blog Title"
        ]);
        // If include file, upload
        if($request->file()) {
            // 624872374523_a.jpg
            $fileName = time().'_'.$request->photo->getClientOriginalName();
            // itemimg/624872374523_a.jpg
            $filePath = $request->file('photo')->storeAs('blog', $fileName, 'public');
            $path = '/storage/'.$filePath;
        }else{
            $path = $request->oldphoto;
        }
        // Object Relational Mapping (Eloquent ORM)
        $blog->title = $request->title;
        $blog->photo = $path;
        $blog->description = $request->description;
        $blog->save();
        return redirect()->route('blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('blogs.index');
    }
}
