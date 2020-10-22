@extends('layouts.master')
@section('content')

<div class="card">
    <div class="card-body">
        <form action="{{route('posts.update',$posts->id)}}" method="get">
            @csrf
            {{-- @method('put') --}}
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" name="name" class="form-control" id="name" aria-describedby="nameHelp"
                    value="{{ old('name',$posts->name) }}" required="required">
            </div>
            <div class="form-group">
                <label for="description">Contenu</label>
                <textarea type="text" name="content" class="form-control" id="content" aria-describedby="nameHelp"
                    value="{{ old('content',$posts->content) }}" required="required"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
</div>

{{-- {{Form::open()}}
<div class="form-group">
	{{Form::label('name','Nom:')}}
	{{Form::text('name',$post->name,['class'=>'form-control'])}}
</div>
<div class="form-group">
	{{Form::label('content','Contenu:')}}
	{{Form::textarea('content',$post->content,['class'=>'form-control'])}}
</div>
{{Form::submit('Envoyer',['class'=>'btn btn-primary'])}}
{{Form::close()}} --}}
@stop