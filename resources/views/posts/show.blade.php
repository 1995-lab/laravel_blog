@extends('layouts.master')
@section('content')
<h1>{{$post->name}}</h2>
<p>Posté par : {{$post->user->name}} |
@if($post->counts_comments==0)
pas de commentaire
@elseif($post->counts_comments==1)
1 commentaire
@else
{{$post->counts_comments}} commentaires
@endif
</p>
<p>Contenu: {{$post->content}}</p>
<h3 style="text-decoration: underline;">les commentaires: </h3>
@if($post->counts_comments==0)
pas encore de commentaire
@else
@foreach($comments as $comment)
<h4>commentaire posté par : <span style="font-weight: bold;">{{$comment->user->name}}</span></h4>
<p>{{$comment->content}}</p>
@endforeach
@endif

<h2>Poster un commentaire</h2>
@if(Auth::check())
        <form action="{{route('comments.create',$post->id)}}" method="POST">
            @csrf
            {{ method_field('POST')}}
            <div class="form-group">
                <textarea type="text" class="form-control" aria-describedby="nameHelp"
                    name="content" style="height: 200px;"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
  @else
  Pour poster un commentaire: <a href="{{route('login')}}">veuillez vous connecter svp?</a>
  @endif
@stop
