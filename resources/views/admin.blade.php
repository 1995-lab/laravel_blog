@extends('layouts.master')
@section('content')
<div class="row" style="margin-top: 30px;">
	<div class="col-md-6">
<button class="btn btn-primary"><a style="color:white;text-decoration: none;" href="{{URL::route('posts.admin')}}"><i class="fa fa-list"></i>Gestion des postes</a></button><br><br>
<button class="btn btn-success"><a style="color:white;text-decoration: none;" href="{{route('comments.admin')}}"><i class="fa fa-list"></i>Gestion des commentaires</a></button><br><br>
<button class="btn btn-secondary"><a style="color:white;text-decoration: none;" href="{{route('users.admin')}}"><i class="fa fa-list"></i>Gestion des utilisateurs</a></button><br><br>
</div>
<div class="col-md-6">
	<img style="width: 100%;height: 100%;" class="card-img-top" src="images/admin.jpg" alt="Card image cap">
</div>
</div>
@stop