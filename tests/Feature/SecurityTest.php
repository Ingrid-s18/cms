<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class SecurityTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Un visitante no autenticado no puede acceder al dashboard.
     */
    public function test_guest_cannot_access_dashboard(): void
    {
        $response = $this->get(route('dashboard'));

        $response->assertRedirect(route('login'));
    }

    /**
     * Un visitante no autenticado no puede acceder a las publicaciones.
     */
    public function test_guest_cannot_access_posts(): void
    {
        $response = $this->get(route('posts.index'));

        $response->assertRedirect(route('login'));
    }

    /**
     * Un usuario autenticado puede acceder al dashboard.
     */
    public function test_authenticated_user_can_access_dashboard(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('dashboard'));

        $response->assertOk();
    }

    /**
     * Un usuario autenticado puede consultar las publicaciones.
     */
    public function test_authenticated_user_can_access_posts(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('posts.index'));

        $response->assertOk();
    }

    /**
     * Un usuario no puede editar publicaciones de otra persona.
     */
    public function test_user_cannot_edit_another_users_post(): void
    {
        $owner = User::factory()->create();
        $otherUser = User::factory()->create();

        $post = $owner->posts()->create([
            'title' => 'Plato de prueba',
            'body' => 'Descripción del plato de prueba.',
            'price' => 25000,
            'category' => 'Comida',
        ]);
        $response = $this->actingAs($otherUser)
            ->get(route('posts.edit', $post));

        $response->assertForbidden();
    }

    /**
     * Un usuario no puede eliminar publicaciones de otra persona.
     */
    public function test_user_cannot_delete_another_users_post(): void
    {
        $owner = User::factory()->create();
        $otherUser = User::factory()->create();

        $post = $owner->posts()->create([
            'title' => 'Plato de prueba',
            'body' => 'Descripción del plato de prueba.',
        ]);

        $response = $this->actingAs($otherUser)
            ->delete(route('posts.destroy', $post));

        $response->assertForbidden();

        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
        ]);
    }

    /**
     * El propietario sí puede acceder a la edición de su publicación.
     */
    public function test_post_owner_can_edit_own_post(): void
    {
        $user = User::factory()->create();

        $post = $user->posts()->create([
            'title' => 'Plato propio',
            'body' => 'Descripción del plato propio.',
        ]);

        $response = $this->actingAs($user)
            ->get(route('posts.edit', $post));

        $response->assertOk();
    }

    /**
     * No permite crear publicaciones sin título.
     */
    public function test_post_creation_requires_a_title(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('posts.store'), [
            'title' => '',
            'body' => 'Descripción de prueba.',
            'price' => 25000,
            'category' => 'Comida',
        ]);

        $response->assertSessionHasErrors('title');

        $this->assertDatabaseCount('posts', 0);
    }

    /**
     * No permite cargar archivos que no sean imágenes válidas.
     */
    public function test_post_creation_rejects_invalid_image_files(): void
    {
        $user = User::factory()->create();

        Storage::fake('public');

        $file = UploadedFile::fake()
            ->create('documento.pdf', 100, 'application/pdf');

        $response = $this->actingAs($user)->post(route('posts.store'), [
            'title' => 'Plato de prueba',
            'body' => 'Descripción de prueba.',
            'imagen' => $file,
        ]);

        $response->assertSessionHasErrors('imagen');

        $this->assertDatabaseCount('posts', 0);
    }

    /**
     * Un visitante puede registrarse con datos válidos.
     */
    public function test_guest_can_register_with_valid_data(): void
    {
        $response = $this->post(route('register.store'), [
            'name' => 'Usuario de prueba',
            'email' => 'usuario@test.com',
            'password' => 'SeguraCMS2026!',
            'password_confirmation' => 'SeguraCMS2026!',
        ]);

        $response->assertRedirect(route('dashboard'));

        $this->assertDatabaseHas('users', [
            'email' => 'usuario@test.com',
        ]);

        $this->assertAuthenticated();
    }

    /**
     * El sistema rechaza contraseñas que no cumplen los requisitos.
     */
    public function test_registration_rejects_weak_passwords(): void
    {
        $response = $this->post(route('register.store'), [
            'name' => 'Usuario de prueba',
            'email' => 'usuario2@test.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertSessionHasErrors('password');

        $this->assertDatabaseMissing('users', [
            'email' => 'usuario2@test.com',
        ]);
    }

    /**
     * Un usuario puede iniciar sesión con credenciales correctas.
     */
    public function test_user_can_login_with_valid_credentials(): void
    {
        $user = User::factory()->create();

        $response = $this->post(route('login.store'), [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response->assertRedirect(route('dashboard'));

        $this->assertAuthenticatedAs($user);
    }

    /**
     * El sistema rechaza credenciales incorrectas.
     */
    public function test_login_rejects_invalid_credentials(): void
    {
        $response = $this->post(route('login.store'), [
            'email' => 'inexistente@test.com',
            'password' => 'ClaveIncorrecta2026!',
        ]);

        $response->assertSessionHasErrors('email');

        $this->assertGuest();
    }

    /**
     * El cierre de sesión termina la autenticación del usuario.
     */
    public function test_user_can_logout(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->post(route('logout'));

        $response->assertRedirect(route('home'));

        $this->assertGuest();
    }

    /**
     * El sistema limita los intentos repetidos de inicio de sesión.
     */
    public function test_login_is_rate_limited_after_five_attempts(): void
    {
        for ($attempt = 0; $attempt < 5; $attempt++) {
            $response = $this->post(route('login.store'), [
                'email' => 'inexistente@test.com',
                'password' => 'ClaveIncorrecta2026!',
            ]);

            $response->assertStatus(302);
        }

        $response = $this->post(route('login.store'), [
            'email' => 'inexistente@test.com',
            'password' => 'ClaveIncorrecta2026!',
        ]);

        $response->assertStatus(429);
    }
}
