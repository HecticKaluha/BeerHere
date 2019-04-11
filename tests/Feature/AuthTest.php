<?php

namespace Tests\Feature;

use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testLogin()
    {
        //Create user
        User::create([
            'email' => 'test@gmail.com',
            'name' => 'Test',
            'gender' => 'M',
            'birthdate' => Carbon::now()->subYears(22)->startOfDay(),
            'place' => 'Oosterhout',
            'password' => Hash::make('secret123'),
            'last_login' => Carbon::now(),
        ]);
        //attempt login
        $response = $this->json('POST',route('api.authenticate'),[
            'email' => 'test@gmail.com',
            'password' => 'secret123',
        ]);
        //Assert it was successful and a token was received
        $response->assertStatus(200);
        $this->assertArrayHasKey('token',$response->json());
        //Delete the user
        User::where('email','test@gmail.com')->delete();
    }

    public function testRegister(){
        //User's data
        $data = [
            'email' => 'test@gmail.com',
            'name' => 'Test',
            'gender' => 'M',
            'birthdate' => '1997-04-11 00:00:00.000000',
            'place' => 'Oosterhout',
            'password' => 'secret123',
            'password_confirmation' => 'secret123',
        ];
        //Send post request
        $response = $this->json('POST',route('api.register'),$data);
        //Assert it was successful
        $response->assertStatus(200);
        //Assert we received a token
        $this->assertArrayHasKey('token',$response->json());
        //Delete data
        User::where('email','test@gmail.com')->delete();
    }
}
