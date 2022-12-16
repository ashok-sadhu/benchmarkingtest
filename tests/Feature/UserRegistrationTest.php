<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserRegistrationTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_register_screen_can_be_rendered()
    {
        $response = $this->get('/registration');
        $this->assertGuest();
        $response->assertStatus(200);
    }

    public function test_users_register_validation()
    {
        $response = $this->post('/custom-registration', [
            'name' => '',
            'email' => 'not email',
            'password' => 'password',
        ]);

        $response->assertSessionHasErrors('name');
        $response->assertSessionHasErrors('email');
    }

 
    public function test_users_can_register_using_the_register_screen()
    {
        $response = $this->post('/custom-registration', [
            'name' => $this->faker->name(),
            'email' => 'example@test.com',
            'password' => 'password',
            'confirm_password' => 'password'
        ]);

        $this->assertDatabaseHas('users', [
            'email' => 'example@test.com',
        ]);
    }
    
    public function test_users_register_validation_email_already_register()
    {
        $email = 'example@test.com';
        $response = $this->post('/custom-registration', [
            'name' => $this->faker->name(),
            'email' => $email,
            'password' => 'password',
            'confirm_password' => 'password'
        ]);

        $this->assertDatabaseHas('users', [
            'email' => $email,
        ]);

        $response2 = $this->post('/custom-registration', [
            'name' => $this->faker->name(),
            'email' => $email,
            'password' => 'password',
            'confirm_password' => 'password'
        ]);

        $response->assertSessionHasErrors('email', 'The email has already been taken.');
    }
}
