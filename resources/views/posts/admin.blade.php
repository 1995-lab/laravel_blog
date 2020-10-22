@extends('layouts.master')
@section('content')
<h1><i class="fa fa-list"></i>Listes des articles</h1>&nbsp;<a class="btn btn-success" href="{{route('posts.create')}}">Créer un article</a><br><br>

<table class="table table-stripped table-bordered">
	
	<thead>
		<tr>
			<th>ID</th>
			<th>Nom</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		@foreach($posts as $post)
		<tr>
			<td>{{$post->id}}</td>
			<td>{{$post->name}}</td>
			<td>
				<a class="btn btn-primary" href="{{URL::route('posts.edit',$post->id)}}"><i class="fa fa-edit"></i>Editer</a><br><br>
				   <form action="{{route('posts.delete',$post->id)}}" method="get" >
            		@csrf
            		{{-- @method('get') --}}
					   <button type="submit" onclick="return confirm('Êtes-vous sur de vouloir supprimer?')" class="btn btn-danger"><i class="fa fa-trash"></i>supprimer</button>
        			</form>
					
				{{-- <a class="btn btn-danger" href="#">supprimer</a> --}}
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@stop