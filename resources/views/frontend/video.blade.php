@extends('frontendtemplate')
@section('content')
<section class="main">
  <div class="container">
    <div class="row">
      <div class="col-md-8 py-1">
        <div class="row">               
          @foreach($video as $row)
          <div class="col-md-6 pb-3">
            <div class="card h-100 shadow">
              <div class="card_img1">
                <img class="image card-img-top" src="{{$row->photo}}" alt="">
                <div class="music1">
                  <i class="far fa-play-circle text-light"></i>
                </div>
                <div class="add_button">
                      <a href="{{route('videodetail',$row->id)}}">
                        <i class="fas fa-play"></i>
                      </a>
                    </div>
              </div>
              <div class="card-body">
                <div class="container-float">
                  <div class="row">
                    <div class="col-12">
                      <p class="card-title ln">
                        {{$row->title}}
                      </p>
                      <p>
                        <i class="fas fa-clock"></i> {{$row->updated_at->toFormattedDateString()}}
                      </p>
                    </div>
                  </div>
                </div>  
              </div>
            </div>
            
          </div>
          {{-- <img class="image card-img-top" src="{{$row->photo}}" alt=""> --}}
          @endforeach
        </div>
      </div>
      <div class="col-md-4 py-1">
        <div class="row">
          <div class="col-md-12 py-1">
            <div class="bg-success rounded">
              <h3 class="py-3 text-center text-light">
                အကြောင်းအရာများ
              </h3>
            </div>
            <ul class="list-unstyled side bg-light scor_video">
            @foreach($blog as $row)
              <li class="media py-1">
                <img class="mr-3" src="{{$row->photo}}" alt="image" class="rounded" style="height: 90px; width:100px;border-radius: 5px;">
                <div class="media-body pt-2">
                  <a href="{{route('blogdetail', $row->id)}}"><p class="mt-0 b mb-3">{{$row->title}}</p></a>
                  <p>
                        <i class="fas fa-clock"></i> {{$row->updated_at->toFormattedDateString()}}
                   </p>
                </div>
              </li>
             @endforeach 
            </ul>
            </div>
            <div class="col-md-12 py-1">
              <div class="bg-success rounded">
              <h3 class="py-3 text-center text-light">
                ဓမ္မသီချင်းများ
              </h3>
            </div>
            <ul class="list-unstyled side bg-light scor_video">
            @foreach($music as $row)
              <li class="media py-1">
                <img class="mr-3" src="{{$row->photo}}" alt="image" class="rounded" style="height: 90px; width:100px;border-radius: 5px;">
                <div class="media-body pt-2">
                  <a href="{{route('musicdetail', $row->id)}}"><p class="mt-0 b mb-3">{{$row->title}}</p></a>
                  <p>
                        <i class="fas fa-clock"></i> {{$row->updated_at->toFormattedDateString()}}
                   </p>
                </div>
              </li>
             @endforeach 
            </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
