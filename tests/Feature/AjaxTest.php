<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tymon\JWTAuth\Facades\JWTAuth;

class AjaxTest extends TestCase
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

    public function testLike(){
        //Get token
        $token = $this->authenticate();
        $data = [
            'id' => 6,
        ];
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $token,
        ])->json('POST',route('api.like', $data));
        $response->assertStatus(200);

//        Log::info($response->json());
    }

    public function testDislike(){
        //Get token
        $token = $this->authenticate();
        $data = [
            'id' => 7,
        ];
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $token,
        ])->json('POST',route('api.dislike', $data));
        $response->assertStatus(200);

//        Log::info($response->json());
    }

    public function testNextSuggestion(){
        //Get token
        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $token,
        ])->json('GET',route('api.nextSuggestion'));
        $response->assertStatus(200);

//        Log::info($response->json());
    }

    public function testGetCommonInterests(){
        //Get token
        $token = $this->authenticate();
        $data = [
            'id' => 3,
        ];
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $token,
        ])->json('POST',route('api.getCommonInterests', $data));
        $response->assertStatus(200);

//        Log::info($response->json());
    }
}
