@extends('layouts.master')
@section('content')
<h2>Créer un article</h2>
<div class="card">
    <div class="card-body">
        <form action="{{route('posts.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" name="name" class="form-control" id="name" aria-describedby="nameHelp"
                    value="{{ old('name','') }}" required="required">
            </div>
            <div class="form-group">
                <label for="content">Contenu</label>
                <textarea type="text" name="content" class="form-control" id="content" aria-describedby="nameHelp"
                    value="{{ old('content','') }}" required="required"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
</div>
@stop