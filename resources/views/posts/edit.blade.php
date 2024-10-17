@extends('layouts.app')

@section('title', 'Editar Post')

@section('content')
    <div class="row">
        <div class="col-md-6 mx-auto">
            <h1 class="text-center">Editar Post</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('posts.update', $post->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label for="title">Título:</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $post->title) }}">
                </div>

                <div class="form-group mb-3">
                    <label for="content">Contenido:</label>
                    <textarea name="content" id="content" class="form-control" rows="4">{{ old('content', $post->content) }}</textarea>
                </div>

                <button type="submit" class="btn btn-success">Actualizar</button>
                <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
