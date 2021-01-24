@extends('backendtemplate')

@section('content')


<div class="container-fluid">

	<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Create Music</h1>
    <a href="{{route('musics.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-arrow-left"></i> Back</a>
  </div>

		<!-- Content Row -->
		<div class="row">
     <div class="col-md-12">            
      <main class="app-content">
        <div class="app-title">
          <div class="row">
            <div class="offset-md-2 col-md-8">
              <form method="post" action="{{route('musics.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="title">Song Name(Title):</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title"  value="{{old('title')}}">
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="song">Photo:</label>
                    <input type="file" name="photo" class="form-control-file @error('photo') is-invalid @enderror" id="photo">
                    @error('photo')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                  <label for="song">Song:</label>
                    <input type="file" name="song" class="form-control-file @error('song') is-invalid @enderror" id="song">
                    @error('song')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                  <label for="artist">Artist:</label>
                    <input type="text" name="artist" class="form-control @error('artist') is-invalid @enderror" id="artist"  value="{{old('artist')}}">
                    @error('artist')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                  <label for="album">Album:</label>
                    <input type="text" name="album" class="form-control @error('album') is-invalid @enderror" id="album"  value="{{old('album')}}">
                    @error('album')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <div class="form-group">
                  <label for="desc">Description:</label>
                    <textarea name="desc" class="form-control @error('desc') is-invalid @enderror" id="desc" >{{old('desc')}}</textarea>
                    @error('desc')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <input type="submit" name="btnsubmit" value="Save" class="btn btn-success btn-block shadow-sm">
              </form>

            </div>
          </div>
        </main>

      </div>




    </div>
	</div>
</div>


@endsection