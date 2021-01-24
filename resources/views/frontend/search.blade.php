@extends('frontendtemplate')
@section('content')
<section class="main">
  <div class="container">
    <div class="row">
      <div class="col-md-8 py-1">
        <div class="row">
        	@foreach($musics as $row)
        	<div class="col-md-6 pb-3">
        		<div class="card h-100 shadow">
        			<div class="card_img1">
        				<img class="image card-img-top" src="{{$row->photo}}" alt="">
        				<div class="music">
        					<i class="fas fa-music text-light"></i>
        				</div>
        				<div class="add_button">
		                  <a href="{{route('musicdetail',$row->id)}}">
		                    <i class="fas fa-play"></i>
		                  </a>
		                </div>
        			</div>
        			<div class="card-body">
        				<div class="container-float">
        					<div class="row">
        						<div class="col-12">
        							<p class="card-title">
        								{{$row->title}}
        							</p>
                      <p>
                        <i class="fas fa-clock"></i> {{$row->updated_at}}
                      </p>
        						</div>
        					</div>
        				</div>  
        			</div>
        		</div>
        		
        	</div>    
        	@endforeach  	
          @foreach($videos as $row)
          <div class="col-md-6 pb-3">
            <div class="card h-100 shadow">
              <div class="card_img1">
                <img class="image card-img-top" src="{{$row->photo}}" alt="">
                <div class="music">
                  <i class="fas fa-music text-light"></i>
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
                      <p class="card-title">
                        {{$row->title}}
                      </p>
                      <p>
                        <i class="fas fa-clock"></i> {{$row->updated_at}}
                      </p>
                    </div>
                  </div>
                </div>  
              </div>
            </div>
            
          </div>    
          @endforeach   
        
    </div>
  </div>
</section>
@endsection
