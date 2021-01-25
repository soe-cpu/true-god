<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="icon" href="{{asset('frontend_asset/image/favicon.ico')}}" type="image/x-icon">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend_asset/css/style.css')}}">
    <link href="{{asset('backend_asset/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    {{-- owl carousel --}}
    <link rel="stylesheet" href="{{ asset('frontend_asset/owlcarousel/dist/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend_asset/owlcarousel/dist/assets/owl.theme.default.min.css')}}">

    <title>True God</title>
  </head>
  <body>
  <div class="container-fluid" style="border-top:2px solid  #3e3">
      <div class="container">    
      <div class="row logo">
        <div class="col-6">
          <img src="{{asset('frontend_asset/image/logo.png')}}">
          {{-- <h4 class="pt-1">True God</h4> --}}
        </div>
        <div class="col-6 pt-4">
          <form
          class="form-inline  navbar-search float-right" method="GET" action="{{route('searchpage')}}">
          <div class="input-group">
            <input type="text" name="query" class="form-control bg-light border-0 " placeholder="Search for..."
            aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
              <button class="btn btn-success" >
                <i class="fas fa-search fa-sm"></i>
              </button>
            </div>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success nav-bg" id="navbar_top">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="container">        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">              
           <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
              <a class="nav-link" href="{{route('mainpage')}}">မူလစာမျက်နှာ <span class="sr-only">(current)</span></a>
            </li>           
              
              <li class="nav-item {{Request::is('music')? 'active':''}}">
                <a class="nav-link " href="{{route('musicpage')}}">ဓမ္မသီချင်းများ</a>
              </li>
              <li class="nav-item {{Request::is('video')? 'active':''}}">
                <a class="nav-link " href="{{route('videopage')}}">ဓမ္မဗီဒီယိုများ</a>
              </li>
              <li class="nav-item {{Request::is('blog')? 'active':''}}">
                <a class="nav-link " href="{{route('blogpage')}}">အကြောင်းအရာများ</a>
              </li>
             
            </ul>
          
        </div>
      </div>
    </nav>
    @yield('content')     
    <footer class="footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12 contact">
            <h5 class="text-light my-2">&nbsp;Contact Us</h5><br>
         <i class="fas fa-map-marker text-light fa-2x"></i> :<label> &nbsp;3/9/129/B Myalay bwint Lane, Shwe Pyi Thar, Yangon </label><br>
          <i class="fas fa-envelope-open-text text-light  fa-2x "></i>
          <label> &nbsp;<a href="">tpungsar@gmail.com</a></label> 
          </div> 
        </div>
      </div>
       <hr>
       <p class="text-center text-white">By2021</p>
        <a href="#" class="back-to-top">
        <i class="far fa-arrow-alt-circle-up"></i>
        </a>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="{{ asset('frontend_asset/owlcarousel/dist/owl.carousel.min.js')}}"></script>
        <script src="{{ asset('frontend_asset/js/bootstrap.bundle.mmin.js')}}"></script>
    
    @yield('script')
    <script>
        //Back to top button
  // $(window).scroll(function() {
  //   if($(this).scrollTop() > 100) {
  //     $('.back-to-top').fadeIn('slow');
  //   } else {
  //     $('.back-to-top').fadeOut();
  //   }
  // });


if ($(window).width() > 992) {
  $(window).scroll(function(){  
     if ($(this).scrollTop() > 100) {
        $('#navbar_top').addClass("fixed-top");
        // add padding top to show content behind navbar
        $('body').css('padding-top', $('.navbar').outerHeight() + 'px');
      }else{
        $('#navbar_top').removeClass("fixed-top");
         // remove padding top from body
        $('body').css('padding-top', '0');
      }   
  });
}
</script>
  </body>

</html>