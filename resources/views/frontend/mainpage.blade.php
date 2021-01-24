@extends('frontendtemplate')
@section('content')

  {{-- main --}}
    <section class="main">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
               <!-- Blog Post -->
            <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    @foreach($musicd as $m)
                  <div class="carousel-item active">
                    <img class="d-block img-fluid" src="{{$m->photo}}" alt="First slide" class="rounded" width="900PX" height="350px">
                  </div>
                    @endforeach
                  @foreach($blog as $b)
                  <div class="carousel-item">
                    <img class="d-block img-fluid" src="{{$b->photo}}" alt="Second slide" class="rounded" width="900PX" height="350px">
                  </div>
                  @endforeach
                  @foreach($videod as $v)
                  <div class="carousel-item">
                    <img class="d-block img-fluid" src="{{$v->photo}}" alt="Third slide" class="rounded" width="900PX" height="350px">
                  </div>
                  @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
                    
          </div>
          <div class="col-md-4">
            <div class="row">
              <div class="col-md-12">
                <div class="bg-success">
                  <h4 class="py-3 text-center text-light">
                    ဓမ္မသီချင်းများ
                  </h4>
                </div>
                <ul class="list-unstyled side bg-light">
                  @foreach($vid as $row)
                  <li class="media py-1">               
                    <img class="mr-3" src="{{$row->photo}}" alt="image" class="rounded" style="height: 90px; width:100px;border-radius: 5px;">
                    <div class="media-body pt-2">
                      <a href="{{route('blogdetail', $row->id)}}"><p class="mt-0 mb-3 b" style="background-color: #f8f9fa;">{{$row->title}}</p></a>
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
 
    </section>

<section class="main bg-light">
  <div class="container">
    <div class="row mx-1 py-2">
      <div class="col-md-12">
        <h3 class="text-center py-2 text-bold">အကြောင်းအရာများ</h3>
      </div>
    </div>
    <div class="row my-2">
      @foreach($blog as $row)
      <div class="col-md-6 py-1">
        <img src="{{asset($row->photo)}}" width="100%" height="350px" class="rounded">
      </div>
      <div class="col-md-6 py-1">
        <h5 class="pb-1"><b>{{$row->title}}</b></h5>
        <p class="scro1">{{$row->description}}</p>
      </div>
      <div class="col-md-12  py-2" style="text-align: center;">
        <a href="{{route('blogdetail', $row->id)}}" class="btn btn-outline-success align-center">Read More</a>
      </div>
      @endforeach
    </div>

  </div>
</section>
   
  <!-- Video -->
    <section class="main">
      <div class="container">
        <div class="row mx-1 py-2">
          <div class="col-md-12">
            <h2 align="center">ဓမ္မဗီဒီယိုများ</h2>
          </div>          
        </div>
        <div class="owl-carousel owl-theme my-4">
          @foreach($video as $row)
          <div class="col-md-12 col-sm-6 py-2">
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
                        <i class="fas fa-clock"></i>
                         {{ 
                          $row->updated_at->toFormattedDateString()
                        }}

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
    </section>

    
@endsection

@section('script')
  <script type="text/javascript">
    $(document).ready(function (argument) {
      var owl = $('.owl-carousel').owlCarousel({
        loop:true,
        nav:true,
        margin:10,
        autoplay:true,
        autoplayTimeout:10,
        autoplayHoverPause:true,
        autoHeight:true,
        responsiveClass:true,
        responsive:{
          0:{
            items:1,
          },
          600:{
            items:4,
            nav:false
          }
        }
      });
      $('.play').on('click',function(){
        owl.trigger('play.owl.autoplay',[30])
      })
      $('.stop').on('click',function(){
        owl.trigger('stop.owl.autoplay')
      })

    })
  </script>
@endsection