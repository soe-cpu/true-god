@extends('backendtemplate')
@section('content')
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Update Music</h1>
    <a href="{{route('musics.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-arrow-left"></i> Back</a>
    </div>

    <!-- Content Row -->
    <div class="row">
      <div class="col-md-12">
        
      
        <main class="app-content">
          <div class="app-title">
            <div class="row">
              <div class="offset-md-2 col-md-8">
                <div class="tile">
             
              <form action="{{route('musics.update',$music->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                      <label for="title">Sone Nanme(Title):</label>
                      <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="@error('title') {{old('title')}} @else {{$music->title}} @enderror" required>
                      @error('title')
                      <span  class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>                    
                    <div class="form-group">
                      <label for="photo">Photo:</label>
                      <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Old</a>
                        </li>
                        <li class="nav-item" role="presentation">
                          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">New</a>
                        </li>
                      </ul>
                      <div class="tab-content mt-3" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                          <img src="{{$music->photo}}" class="img-fluid" width="100">
                          <input type="hidden" name="oldphoto" value="{{$music->photo}}">
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                          <input type="file" class="form-control-file @error('photo') is-invalid @enderror" name="photo" id="photo">
                          @error('photo')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="song">Mp3 Song:</label>
                      <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home1" role="tab" aria-controls="home" aria-selected="true">Old</a>
                        </li>
                        <li class="nav-item" role="presentation">
                          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile1" role="tab" aria-controls="profile" aria-selected="false">New</a>
                        </li>
                      </ul>
                      <div class="tab-content mt-3" id="myTabContent">
                        <div class="tab-pane fade show active" id="home1" role="tabpanel" aria-labelledby="home-tab">
                          <audio controls  loop>
                            <source src="{{$music->song}}" type="audio/ogg">
                            </audio>
                          <input type="hidden" name="oldsong" value="{{$music->song}}">
                        </div>
                        <div class="tab-pane fade" id="profile1" role="tabpanel" aria-labelledby="profile-tab">
                          <input type="file" class="form-control-file @error('photo') is-invalid @enderror" name="song" id="song">
                          @error('song')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="artist">Artist</label>
                      <input type="text" name="artist" id="artist" class="form-control @error('artist') is-invalid @enderror" value="@error('artist') {{old('artist')}} @else {{$music->artist}} @enderror" required>
                      @error('artist')
                      <span  class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="album">Album Name</label>
                      <input type="text" name="album" id="album" class="form-control @error('album') is-invalid @enderror" value="@error('album') {{old('album')}} @else {{$music->album}} @enderror" required>
                      @error('album')
                      <span  class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="desc">Description</label>
                      <textarea name="desc" id="desc" class="form-control" height="400">@error('desc') {{old('desc')}} @else {{$music->desc}} @enderror</textarea>
                    </div>
                    
                    <input type="submit" name="btnsubmit" value="Update" class="btn btn-success btn-block shadow-sm">
                  </form>

                </div>
              </div>
            </div>
          </main>

      </div>
    </div>
  </div>
</div>
  
@endsection