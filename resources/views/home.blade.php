@extends('layouts.master')

@section('content')
<h1>Liste des articles</h1>
@foreach($posts as $post)
<a href="{{route('posts.show',$post->slug) }}">
<h2>{{$post->name}}</h2>
</a>
@endforeach
@endsection
