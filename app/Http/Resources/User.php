<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Interest as InterestResource;
use App\Http\Resources\Picture as PictureResource;
use App\Http\Resources\Role as RoleResource;
use App\Http\Resources\User as UserResource;


class User extends JsonResource
{
    /**
     * Indicates if the resource's collection keys should be preserved.
     *
     * @var bool
     */
    public $preserveKeys = true;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'about' => $this->about,
            'gender' => $this->gender,
            'birthdate' => $this->birthdate,
            'place' => $this->place,
            'avatar_url' => $this->avatar_url,
            'email' => $this->email,
            'email_verified_at' => $this->email_verified_at,
            'role_id' => $this->role_id,
            'lat_login' => $this->last_login,
            'interests' => InterestResource::collection($this->whenLoaded('interests')),
            'pictures' => PictureResource::collection($this->whenLoaded('pictures')),
            'role' => RoleResource::collection($this->whenLoaded('role')),
            'likes' => UserResource::collection($this->whenLoaded('likes')),
            'dislikes' => UserResource::collection($this->whenLoaded('dislikes')),
            'likedBy' => UserResource::collection($this->whenLoaded('likedBy')),
            'likedByWhenAway' => UserResource::collection($this->whenLoaded('likedByWhenAway')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
