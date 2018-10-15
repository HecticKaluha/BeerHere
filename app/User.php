<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
//    protected $fillable = [
//        'name', 'email', 'password',
//    ];
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function interests()
    {
        return $this->belongsToMany(Interest::class, 'interest_user');
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes', 'user_id', 'likes_user_id')->withPivot(['user_id', 'likes_user_id', 'liked_on']);
    }

    public function orderedLikes(){
        return $this->likes()->orderBy('likes.liked_on', 'DESC');
    }

    public function likedBy()
    {
        return $this->belongsToMany(User::class, 'likes', 'likes_user_id', 'user_id')->withPivot(['user_id', 'likes_user_id', 'liked_on']);
    }

    public function matches()
    {
        return $this->likes()->wherePivotIn('likes_user_id', $this->likedBy->pluck('id')->toArray());
    }

    public function orderedMatches(){
        return $this->matches()->orderBy('likes.liked_on', 'DESC');

    }

    public function suggestions(){
//        $user_interests = $this->interests->pluck('id')->toArray();

//        $get_similar = DB::table('interest_user')
//            ->select(DB::raw('count(*) as common_interests, user_id'))
//            ->whereIn('interest_id', $user_interests)
//            ->groupBy('user_id')
//            ->get();
        return User::all();
    }
}
