@extends('layouts.app')

@section('content')
    <h1>Criar novo Post</h1>

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


    <form enctype="multipart/form-data" action="{{ route('posts.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Título:</label>
            <input name="title" type="text" class="form-control"/>
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Post:</label>
            <textarea name="body" cols="15" rows="10" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">Imagem:</label>
            <input type="file" name="image" class="form-control" />
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>

    </form>
@endsection
