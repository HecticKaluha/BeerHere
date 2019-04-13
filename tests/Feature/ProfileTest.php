<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tymon\JWTAuth\Facades\JWTAuth;

class ProfileTest extends TestCase
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
        $user = User::find(1);
        $token = JWTAuth::fromUser($user);
        //return token
        return $token;
    }



    public function testGetProfile(){
        //Get token
        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $token,
        ])->json('GET',route('api.getProfile', 3));
        $response->assertStatus(200);

//        Log::info($response->json());
    }
}
