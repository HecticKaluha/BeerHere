<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tymon\JWTAuth\Facades\JWTAuth;

class SettingsTest extends TestCase
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

    protected function authenticate()
    {
        //Create user
        $user = User::find(5);
        $token = JWTAuth::fromUser($user);
        //return token
        return $token;
    }

    public function testSettings(){
        //Get token
        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $token,
        ])->json('GET',route('api.settings'));
        $response->assertStatus(200);

//        Log::info($response->json());
    }

    public function testEditProfile(){
        //Get token
        $token = $this->authenticate();
        $data = [
            'name' => 'Updated',
            'gender' => 'F',
            'birthdate' => '1996-04-11 00:00:00.000000',
            'place' => 'Papendrecht',
            'about' => 'Nieuwe about',
        ];
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $token,
        ])->json('PUT',route('api.editProfile', $data));
        $response->assertStatus(200);

//        $response = $response->json();
//        Log::info($response->json());
    }
}
