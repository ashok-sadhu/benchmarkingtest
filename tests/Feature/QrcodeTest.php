<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Providers\RouteServiceProvider;

class QrcodeTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_qrcode_generate_screen()
    {
        $user = User::factory()->create([
            'password' => bcrypt('password')
        ]);
 
        $response = $this->post('/custom-login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);

        $response2 = $this->post('/generateqr', [
            'background_color' => 'rgb(0, 0, 0)',
            'fill_color' => 'rgb(255, 255, 255)'
        ]);

        $response2->assertStatus(200);
    }
}
