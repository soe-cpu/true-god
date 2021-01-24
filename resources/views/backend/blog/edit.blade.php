@extends('backendtemplate')
@section('content')
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Update Blog</h1>
    <a href="{{route('blogs.index')}}" class="btn btn-sm btn-success shadow-sm"><i class="fas fa-arrow-left"></i> Back</a>
    </div>

    <!-- Content Row -->
    <div class="row pb-5">
      <div class="col-md-12">
        
      
        <main class="app-content">
          <div class="app-title">
            <div class="row">
              <div class="offset-md-2 col-md-8">
                <div class="tile">
                  <form action="{{route('blogs.update',$blog->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                      <label for="title">Blog Name</label>
                      <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="@error('title') {{old('title')}} @else {{$blog->title}} @enderror" required>
                      @error('name')
                      <span  class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPhoto">Photo:</label>

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
                          <img src="{{$blog->photo}}" class="img-fluid" width="100">
                          <input type="hidden" name="oldphoto" value="{{$blog->photo}}">
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                          <input type="file" class="form-control-file @error('photo') is-invalid @enderror" name="photo" id="exampleInputPhoto">
                          @error('photo')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                    </div>
                    {{-- <div class="form-group">
                      <label for="photo">Photo</label>
                      <input type="file" name="photo" id="photo" class="form-control-file" accept="image/*" value="{{old('photo')}}" required>
                    </div> --}}
                    <div class="form-group">
                      <label for="description">Description</label>
                      <textarea name="description" id="description" class="form-control" rows="10" cols="10">@error('description') {{old('description')}} @else {{$blog->description}} @enderror</textarea>
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