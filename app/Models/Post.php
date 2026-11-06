<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    protected $fillable = ['title', 'body', 'imagen', 'price', 'category'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Obtener la URL pública de la imagen del plato con resolución inteligente.
     * 
     * Prioridad:
     * 1. Imagen subida por el chef en storage (ej. 'platos/abc.jpg' -> /storage/platos/abc.jpg)
     * 2. Imagen de catálogo local en public (ej. 'images/sancocho.jpg' -> /images/sancocho.jpg)
     * 3. URL externa (http/https)
     * 4. Asignación automática por título de plato tradicional (Sancocho, Churrasco, Arroz con Pollo, Bandeja Paisa, Ajiaco)
     * 5. Imagen colombiana por defecto
     */
    public function getImageUrlAttribute(): string
    {
        if (!empty($this->imagen)) {
            // URL externa
            if (str_starts_with($this->imagen, 'http://') || str_starts_with($this->imagen, 'https://')) {
                return $this->imagen;
            }

            // Archivo local en public/images/
            if (str_starts_with($this->imagen, 'images/')) {
                return asset($this->imagen);
            }

            // Archivo subido en el disco público (storage/app/public)
            return asset('storage/' . $this->imagen);
        }

        // Resolución inteligente según el título del plato si la columna imagen estuviera vacía
        $lowerTitle = mb_strtolower($this->title);

        if (str_contains($lowerTitle, 'sancocho')) {
            return asset('images/sancocho.jpg');
        }
        if (str_contains($lowerTitle, 'churrasco') || str_contains($lowerTitle, 'carne') || str_contains($lowerTitle, 'lomo')) {
            return asset('images/churrasco.jpg');
        }
        if (str_contains($lowerTitle, 'arroz') || str_contains($lowerTitle, 'pollo')) {
            return asset('images/arroz-con-pollo.jpg');
        }
        if (str_contains($lowerTitle, 'bandeja') || str_contains($lowerTitle, 'paisa')) {
            return asset('images/bandeja-paisa.jpg');
        }
        if (str_contains($lowerTitle, 'ajiaco')) {
            return asset('images/ajiaco-santafereno.jpg');
        }

        // Fallback por defecto a una receta insignia tradicional
        return asset('images/bandeja-paisa.jpg');
    }
}
