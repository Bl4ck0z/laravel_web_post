@extends('layouts.app')

@section('title', 'Crear Nuevo Post')

@section('content')
    <div class="row">
        <div class="col-md-6 mx-auto">
            <h1 class="text-center">Crear Nuevo Post</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('posts.store') }}" method="POST">
                @csrf

                <div class="form-group mb-3">
                    <label for="title">Título:</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
                </div>

                <div class="form-group mb-3">
                    <label for="content">Contenido:</label>
                    <textarea name="content" id="content" class="form-control" rows="4">{{ old('content') }}</textarea>
                </div>

                <button type="submit" class="btn btn-success">Guardar</button>
                <a href="{{ route('posts.index') }}" class="btn btn-secondary">Volver</a>
            </form>
        </div>
    </div>
@endsection
