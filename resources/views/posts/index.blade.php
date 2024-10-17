@extends('layouts.app')

@section('title', 'Lista de Posts')

@section('content')
    <h1 class="text-center mb-4">Lista de Posts</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Crear Nuevo Post</a>

    <ul class="list-group">
        @foreach ($posts as $post)
            <li class="list-group-item mb-2">
                <h3>{{ $post->title }}</h3>
                <p>{{ $post->content }}</p>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-warning">
                        <i class="bi bi-pencil-square"></i> Editar
                    </a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">
                            <i class="bi bi-trash"></i> Eliminar
                        </button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
@endsection
