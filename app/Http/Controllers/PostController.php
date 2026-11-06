<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Mostrar la carta oficial de platos en el Menú.
     */
    public function index()
    {
        $posts = Post::with('user')->latest()->get();

        return view('posts.index', compact('posts'));
    }

    /**
     * Formulario para añadir un nuevo plato a la carta.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Almacenar un nuevo plato con soporte de imagen dinámica.
     */
    public function store(StorePostRequest $request)
    {
        $data = $request->validated();

        // Si se subió un archivo de imagen, guardarlo en storage/app/public/platos
        if ($request->hasFile('imagen')) {
            $data['imagen'] = $request->file('imagen')->store('platos', 'public');
        }

        $post = $request->user()->posts()->create($data);

        return redirect()->route('posts.show', $post)->with('success', '¡Plato añadido a la carta con éxito!');
    }

    /**
     * Mostrar la ficha técnica de un plato.
     */
    public function show(Post $post)
    {
        $post->load('user');

        return view('posts.show', compact('post'));
    }

    /**
     * Formulario para editar un plato (restringido al autor).
     */
    public function edit(Post $post)
    {
        Gate::authorize('update', $post);

        return view('posts.edit', compact('post'));
    }

    /**
     * Actualizar los datos del plato y sustituir la imagen si se envía una nueva.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        Gate::authorize('update', $post);

        $data = $request->validated();

        if ($request->hasFile('imagen')) {
            // Eliminar la imagen previa si está almacenada en el disco público
            if ($post->imagen && Storage::disk('public')->exists($post->imagen)) {
                Storage::disk('public')->delete($post->imagen);
            }

            // Guardar el nuevo archivo en storage/app/public/platos
            $data['imagen'] = $request->file('imagen')->store('platos', 'public');
        }

        $post->update($data);

        return redirect()->route('posts.show', $post)->with('success', '¡Plato actualizado con éxito!');
    }

    /**
     * Eliminar un plato de la carta y borrar su imagen asociada del servidor.
     */
    public function destroy(Post $post)
    {
        Gate::authorize('delete', $post);

        if ($post->imagen && Storage::disk('public')->exists($post->imagen)) {
            Storage::disk('public')->delete($post->imagen);
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'El plato ha sido eliminado de la carta oficial.');
    }
}
