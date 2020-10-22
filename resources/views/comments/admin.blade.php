@extends('layouts.master')
@section('content')

<table class="table table-stripped table-bordered">
	
	<thead>
		<tr>
			<th>Commentaire</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		@foreach($comments as $comment)
		<tr>
			<td>{{$comment->content}}</td>
			<td>
				
				   <form action="{{route('comments.delete',$comment->id)}}" method="get" >
            		@csrf
            		{{-- @method('delete') --}} 
					   <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sur de vouloir supprimer?')"><i class="fa fa-trash"></i>supprimer</button>
        			</form>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@stop