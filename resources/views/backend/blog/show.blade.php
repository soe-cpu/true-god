@extends('backendtemplate')

@section('content')


<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">View Blog</h1>
    	<a href="{{route('blogs.index')}}" class="btn btn-sm btn-success shadow-sm"><i class="fas fa-arrow-left"></i> Back</a>
		
	</div>
	<div class="row py-3">
		<div class="col-md-6">
			<img src="{{$blog->photo}}" width="100%" height="100%">
		</div>
		<div class="col-md-6">
			<h4>Blog Name(Title): <span>{{$blog->title}}</span></h4>
			<br><br>
			<a href="{{route('blogs.edit',$blog->id)}}" class="btn btn-warning btn-sm shadow-sm px-2"><i class="far fa-edit"></i> Edit</a>
			<a href="{{route('blogs.create')}}" class="btn btn-sm btn-success shadow-sm"><i
			class="fas fa-plus fa-sm text-white-50"></i> Add New</a>
		</div>
		</div>	
		{{-- <div class="col-md-4">
			<img src="{{$video->photo}}" width="100%" height="100%">
		</div> --}}
		<div class="col-md-12">
			<h4 style="border-left: 4px solid red;"> &nbsp;Description</h4>
			<p class="py-2 ">{{$blog->description}}</p>
		</div>
	</div>
</div>


@endsection