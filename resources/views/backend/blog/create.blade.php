@extends('backendtemplate')
@section('content')
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Create Blog</h1>
    <a href="{{route('blogs.index')}}" class="btn btn-sm btn-success shadow-sm"><i class="fas fa-arrow-left"></i> Back</a>
    </div>

    <!-- Content Row -->
    <div class="row">
      <div class="col-md-12">
        
      
        <main class="app-content">
          <div class="app-title">
            <div class="row">
              <div class="offset-md-2 col-md-8">
                <div class="tile">
                  <form action="{{route('blogs.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="title">Blog Name(Title)</label>
                      <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{old('title')}}" required>
                      @error('name')
                      <span  class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="photo">Photo</label>
                      <input type="file" name="photo" id="photo" class="form-control-file" accept="image/*" value="{{old('photo')}}" required>
                    </div>
                    <div class="form-group">
                      <label for="description">Description</label>
                      <textarea name="description" id="description" class="form-control" rows="10" cols="10"></textarea>
                    </div>
                    <input type="submit" name="btnsubmit" value="Save" class="btn btn-success btn-block shadow-sm">
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