@extends('layouts.master')
@section('content')

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="margin-bottom: 100px;box-shadow: 10px 10px 8px #888888;width: 1265px;margin-left: -80px;">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="images/blog1.jpg" alt="First slide" style="height: 400px;">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/blog4.jpg" alt="Second slide" style="height: 400px;">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/blog3.jpg" alt="Third slide" style="height: 400px;">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<div class="row"> 
  <div class="col-md-9"> 
<div class="row">
@foreach($posts as $post)
  <div class="col-md-6">
	<a href="{{route('posts.show',$post->slug) }}"style="text-decoration: none;color: black;">
    <div class="card shadow-lg mb-5 bg-white rounded" style="width: 25rem;">
        <img class="card-img-top" src="images/blog4.jpg" alt="Card image cap">
          <div class="card-body" style="text-align: center;">
              <h5 class="card-title">{{$post->name}}</h5>
              <p class="card-text">{{$post->content}}</p>
              <p class="card-text">crée le: {{$post->created_at}}</p>
              <p class="card-text">Par: {{$post->user->name}}</p>
            <p style="color:blue;">voir detail</p>
          </div>
    </div>
    </a>
  </div>
@endforeach
<div style="margin-bottom: 70px;">{{$posts->links()}}</div>
</div>
</div>
<div class="col-md-3">
  <h3 style="text-align: center;">DEFARSCI</h3>
  <img class="card-img-top" src="images/defar.jpg" alt="Card image cap">
  <p style="font-weight: bold;">Derniéres postes</p>
  <div class="row">
@foreach($postes as $post)
  <div class="col-md-6" >
    <a href="{{route('posts.show',$post->slug) }}">
      <img class="card-img-top" src="images/blog3.jpg" alt="Card image cap">
    </a>
  </div>
  <div class="col-md-6">
  <a href="{{route('posts.show',$post->slug) }}"style="text-decoration: none;color: black;">
    <div class="card shadow-lg mb-5 rounded" style="width: 8rem;margin-left: -30px;">
          <div class="card-body">
              <h5 class="card-title">{{$post->name}}</h5>
          {{--     <p class="card-text">{{$post->content}}</p> --}}
          </div>
    </div>
    </a>
  </div>
@endforeach
</div>
<hr>
</div>
</div>
{{-- {{$posts->links()}} --}}



{{-- <h1 style="margin-bottom: 50px;text-align: center"><i class="fa fa-list"></i>Articles du plus récentes</h1>
<div class="row">
@foreach($postes as $post)
  <div class='col-md-4'>
	<a href="{{route('posts.show',$post->slug) }}"style="text-decoration: none;color: black;">
    <div class="card shadow-lg mb-5 bg-white rounded" style="width: 18rem;">
        <img class="card-img-top" src="images/image.png" alt="Card image cap">
          <div class="card-body">
              <h5 class="card-title">{{$post->name}}</h5>
              <p class="card-text">{{$post->content}}</p>
              <p class="card-text">crée le: {{$post->created_at}}</p>
              <p class="card-text">Par: {{$post->user->name}}</p>
            <p style="margin-left: 70px;color:blue;">voir detail</p>
          </div>
    </div>
    </a>
  </div>
@endforeach
</div>
{{$posts->links()}} --}}
@stop

 {{-- background-image: url('{{ asset('images/blog.jpg') }}');  --}}

