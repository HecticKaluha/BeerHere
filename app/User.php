<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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

    public function orderedInterests()
    {
        return $this->interests()
            ->orderBy('interests.name', 'asc')
            ->get();
    }

    public function notSubscribedInterests()
    {
        return Interest::with('users')->whereDoesntHave('users', function ($query) {
            $query->where('user_id', Auth::user()->id);
        })->orderBy('name', 'asc');
    }

    public function orderedNotSubscribedInterests()
    {
        return $this->notSubscribedInterests()
            ->get()
            ->sortBy(function ($interest) {
                return $interest->users->count();
            }, SORT_REGULAR, true);
    }

    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes', 'user_id', 'likes_user_id')->withPivot(['user_id', 'likes_user_id', 'liked_on']);
    }

    public function dislikes()
    {
        return $this->belongsToMany(User::class, 'dislikes', 'user_id', 'dislikes_user_id')->withPivot(['user_id', 'dislikes_user_id', 'disliked_on']);
    }

    public function expiredDislikes()
    {
        return $this->dislikes()->where('disliked_on', '<=', Carbon::now()->subDays(7))->get();
    }

    public function nonExpiredDislikes()
    {
        return $this->dislikes()->where('disliked_on', '>=', Carbon::now()->subDays(7));
    }

    public function orderedLikes()
    {
        return $this->likes()->orderBy('likes.liked_on', 'DESC');
    }

    public function likedBy()
    {
        return $this->belongsToMany(User::class, 'likes', 'likes_user_id', 'user_id')->withPivot(['user_id', 'likes_user_id', 'liked_on']);
    }

    public function likedByWhenAway()
    {
        return $this->belongsToMany(User::class, 'likes', 'likes_user_id', 'user_id')->withPivot(['user_id', 'likes_user_id', 'liked_on'])->where('liked_on', '>', $this->last_login);
    }

    public function matches()
    {
        $likedBy = $this->likedBy->pluck('id')->toArray();
        return $this->likes()->wherePivotIn('likes_user_id', $likedBy);
    }

    public function orderedMatches()
    {
        return $this->matches()->orderBy('likes.liked_on', 'DESC');
    }

    public function suggestions()
    {
        $interests = $this->interests()->with('users')->get();
        $users = collect();
        foreach ($interests as $interest) {
            $users = $users->merge($interest->users);
        }
        $uniqueUsers = $users->unique('email');
        $thisUser = $this;
        $filtered = $uniqueUsers->reject(function ($value, $key) use ($thisUser) {
            return $value->id == $thisUser->id || $thisUser->nonExpiredDislikes->contains($value->id) || $thisUser->likes->contains($value->id);
        });

//        dd($filtered->pluck('name')->sortBy('name'));
//        dd($filtered->count());
        if ($filtered->isEmpty()) {
            return null;
        } else {
            $filtered = array_values($filtered->all());
            return $filtered[0];
        }
    }

    public function getCommonInterests()
    {
        $interests = Auth::User()->interests->pluck('id');
        $common = $this->interests()->whereIn('interest_id', $interests);
        return $common;
    }

    public function matchesWhenAway()
    {
        $likedByWhenAway = $this->likedByWhenAway()->pluck('id')->toArray();
        $matchesWhenAway = $this->likes()->wherePivotIn('likes_user_id', $likedByWhenAway);
        return $matchesWhenAway->count();
    }

}
