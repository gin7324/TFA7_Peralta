<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class UserAccountTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_creation_requires_valid_username_and_full_name(): void
    {
        $response = $this->post('/users', [
            'username' => '',
            'full_name' => '',
        ]);

        $response->assertSessionHasErrors(['username', 'full_name']);
    }

    public function test_user_account_can_be_created_updated_and_avatar_prepared(): void
    {
        Storage::fake('public');

        $createResponse = $this->post('/users', [
            'username' => 'ava',
            'full_name' => 'Ava Stone',
            'password' => 'secret123',
        ]);

        $createResponse->assertRedirect('/users');
        $this->assertDatabaseHas('users', [
            'username' => 'ava',
            'full_name' => 'Ava Stone',
        ]);

        $user = User::first();

        $file = UploadedFile::fake()->image('avatar.jpg', 400, 400);

        $updateResponse = $this->put('/users/' . $user->id, [
            'username' => 'ava_updated',
            'full_name' => 'Ava Stone Updated',
            'avatar' => $file,
        ]);

        $updateResponse->assertRedirect('/users');

        $user->refresh();
        $this->assertNotNull($user->avatar);
        $this->assertStringStartsWith('avatars/', $user->avatar);
        $this->assertTrue(Storage::disk('public')->exists($user->avatar));
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'username' => 'ava_updated',
            'full_name' => 'Ava Stone Updated',
        ]);
    }
}
