@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
   
    <div class="table-responsive">
        <table class="table table-hover mt-5">
            <tbody>
                @forelse ($posts as $post)
                    <tr>
                        <th scope="row"><img style="border-radius: 10%" class="" width="50" height="50"  src="https://ui-avatars.com/api/?name={{$post->user->name}}&rounded=true&background=random" alt="{{$post->user->name}}" >
                        </th>
                        <td>{{$post->title}} </td>
                        <td><a href="{{route('posts.show',$post->id)}}" class="btn btn-success">Ver</a></td>
                        <td><a href="{{route('posts.edit',$post->id)}}" class="btn btn-info">Editar</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="py-4">
        {{ $posts->links() }}
    </div>
@endsection


