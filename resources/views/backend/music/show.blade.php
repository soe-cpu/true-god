@extends('backendtemplate')

@section('content')


<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">View Music</h1>
    	<a href="{{route('musics.index')}}" class="btn btn-sm btn-success shadow-sm"><i class="fas fa-arrow-left"></i> Back</a>
		
	</div>
	<div class="row py-3">
		<div class="col-md-6">
			<img src="{{$music->photo}}" width="100%" height="100%">
		</div>
		<div class="col-md-6">
			<h4>Song Name(Title): <span>{{$music->title}}</span></h4>
			<h4>Artist Name: <span>{{$music->artist}}</span></h4>
			<h4>Song Name: <span>{{$music->title}}</span></h4>
			<br><br>
			<audio controls  loop>
                <source src="{{$music->song}}" type="audio/ogg">
            </audio>
			<br><br>
			<a href="{{route('musics.edit',$music->id)}}" class="btn btn-warning btn-sm shadow-sm px-2"><i class="far fa-edit"></i> Edit</a>
			<a href="{{route('musics.create')}}" class="btn btn-sm btn-success shadow-sm"><i
			class="fas fa-plus fa-sm text-white-50"></i> Add New</a>
		</div>
		{{-- <div class="col-md-4">
			<img src="{{$video->photo}}" width="100%" height="100%">
		</div> --}}
	</div>
	<div class="row">
		<div class="col-md-12">
			<h4 style="border-left: 4px solid red;"> &nbsp;Description</h4>
			<p class="py-2 ">{{$music->desc}}</p>
		</div>
	</div>
</div>


@endsection