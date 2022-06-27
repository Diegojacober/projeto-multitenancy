@extends('layouts.app')

@section('content')
    <h1>Editar Post</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="alert-success p-2">
        {{session('success')}}
    </div>
@endif


    <form action="{{ route('posts.update', $post->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Título:</label>
            <input name="title" type="text" class="form-control" value="{{$post->title}}"/>
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Post:</label>
            <textarea name="body" cols="15" rows="10" class="form-control">{{$post->body}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>

    </form>
@endsection
