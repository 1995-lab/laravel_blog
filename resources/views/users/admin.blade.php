@extends('layouts.master')
@section('content')
<table class="table table-stripped table-bordered" style="margin-top: 50px;">
	
	<thead>
		<tr>
			<th>Nom</th>
			<th>status</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		@foreach($users as $user)
		<tr>
			<td>{{$user->name}}</td>
			<td>
				@if($user->is_admin)
				Administrateur
				@else
				Membre
				@endif
			</td>
			<td>
				<form action="{{route('users.permission',$user->id)}}" method="POST">
            		@csrf
            		{{-- @method('PUT') --}}
            		@if($user->is_admin)
					   <button type="submit" class="btn btn-primary"><i class="fa fa-user"></i>Rendre membre</button>
					@else
					 <button type="submit" class="btn btn-primary"><i class="fa fa-user"></i>Rendre administrateur</button>
					@endif
        		</form>
        		<form action="{{route('users.delete',$user->id)}}" method="get">
            		@csrf
            	{{-- 	@method('delete') --}}
					   <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sur de vouloir supprimer?')"><i class="fa fa-trash"></i>supprimer</button>
        		</form>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@stop