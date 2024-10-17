<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Mostrar la lista de posts
    public function index()
    {
        // Obtenemos todos los posts de la base de datos
        $posts = Post::all();

        // Retornamos la vista 'posts.index' con los datos de los posts
        return view('posts.index', compact('posts'));
    }

    // Mostrar el formulario de creación
    public function create()
    {
        // Retornamos la vista 'posts.create' para mostrar el formulario de creación
        return view('posts.create');
    }

    // Guardar un nuevo post
    public function store(Request $request)
    {
        // Validación con mensajes personalizados
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required|min:10',
        ], [
            'title.required' => 'El título es obligatorio.',
            'title.max' => 'El título no puede tener más de 255 caracteres.',
            'content.required' => 'El contenido es obligatorio.',
            'content.min' => 'El contenido debe tener al menos 10 caracteres.',
        ]);

        // Crear un nuevo post utilizando los datos validados
        Post::create($request->only('title', 'content'));

        // Redirigir a la lista de posts con un mensaje de éxito
        return redirect()->route('posts.index')->with('success', 'Post creado correctamente.');
    }

    // Mostrar el formulario de edición
    public function edit(Post $post)
    {
        // Retornamos la vista 'posts.edit' con los datos del post seleccionado
        return view('posts.edit', compact('post'));
    }

    // Actualizar un post
    public function update(Request $request, Post $post)
    {
        // Validación con mensajes personalizados
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required|min:10',
        ], [
            'title.required' => 'El título es obligatorio.',
            'title.max' => 'El título no puede tener más de 255 caracteres.',
            'content.required' => 'El contenido es obligatorio.',
            'content.min' => 'El contenido debe tener al menos 10 caracteres.',
        ]);

        // Actualizar el post con los datos validados
        $post->update($request->only('title', 'content'));

        // Redirigir a la lista de posts con un mensaje de éxito
        return redirect()->route('posts.index')->with('success', 'Post actualizado correctamente.');
    }

    // Eliminar un post
    public function destroy(Post $post)
    {
        // Eliminar el post seleccionado
        $post->delete();

        // Redirigir a la lista de posts con un mensaje de éxito
        return redirect()->route('posts.index')->with('success', 'Post eliminado correctamente.');
    }
}
