<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use App\Http\Resources\User as UserResource;
use App\Http\Resources\Interest as InterestResource;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user = null)
    {
        if (!isset($user)) {
            $user = Auth::user();
        }
        $interests = $user->interests;
        $displayAll = true;
        $truncate = false;
        //non-api
//        return view('profile.profile_overview', compact('user', 'interests', 'displayAll', 'truncate'));
        //api
//        return Response::json(array('user' => $user,'interests' => $interests ,'displayAll' => $displayAll, 'truncate' => $truncate));
        return Response::json(array(
            'user' => new UserResource($user),
            'interests' => InterestResource::collection($user->interests),
            'displayAll' => $displayAll,
            'truncate' => $truncate,
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getSuggestions()
    {
        $user = Auth::user()->suggestions();
        $displayAll = true;
        $truncate = true;
        //non-api
//        return view('suggestion.suggestions', compact('user', 'displayAll', 'truncate'));
        //api
//        return Response::json(array('user' => $user,'displayAll' => $displayAll, 'truncate' => $truncate));
        return Response::json(array(
            'user' => new UserResource(Auth::user()->suggestions()),
            'displayAll' => $displayAll,
            'truncate' => $truncate,
        ));
    }

    public function like()
    {
        $user = Auth::user();
        $userToLike = User::find(request('id'));
        try {
            if(!$user->nonExpiredDislikes->contains($userToLike->id))
            {
                $user->likes()->attach([1 => ['user_id' => $user->id, 'likes_user_id' => $userToLike->id, 'liked_on' => Carbon::now()]]);
            }
            else{
                return array(
                    'fail' => true,
                    'errors' => collect(['error' => 'You already disliked this user, you can\'t take that back!'])
                );
            }
        }
        catch (\Illuminate\Database\QueryException $e) {
            return array(
                'fail' => true,
                'errors' => collect(['error' => 'You already liked this user'])
            );
        }
        return array(
            'fail' => false,
            'message' => collect(['message' => 'You liked ' . $userToLike->name])
        );
    }

    public function dislike()
    {
        $user = Auth::User();
        $userToDislike = User::find(request('id'));
        if($user->expiredDislikes()->contains($userToDislike->id))
        {
            $userToDislikeAgain = $user->dislikes->find($userToDislike->id);
            $userToDislikeAgain->pivot->disliked_on = Carbon::now();
            $userToDislikeAgain->pivot->update();
        }
        else{
            try {
                if(!$user->likes->contains($userToDislike->id))
                {
                    $user->dislikes()->attach([1 => ['user_id' => $user->id, 'dislikes_user_id' => $userToDislike->id, 'disliked_on' => Carbon::now()]]);
                }
                else{
                    return array(
                        'fail' => true,
                        'errors' => collect(['error' => 'You already liked this user, you can\'t take that back!'])
                    );
                }
            } catch (\Illuminate\Database\QueryException $e) {
                return array(
                    'fail' => true,
                    'errors' => collect(['error' => 'You already disliked this user'])
                );
            }
        }
        return array(
            'fail' => false,
            'message' => collect(['message' => 'You disliked ' . $userToDislike->name])
        );
    }

    public function getNextSuggestion(){
        $nextSuggestion = Auth::User()->suggestions();
        if(isset($nextSuggestion)){
            return array(
                'fail' => false,
                'message' => $nextSuggestion,
            );
        }
        else{
            return array(
                'fail' => true,
                'message' => "No more users found with common interests...",
            );
        }
    }

    public function getCommonInterests(){
        $user = User::find(request('id'));

        $common = $user->getCommonInterests;
        if(isset($common)){
            return array(
                'fail' => false,
                'message' => $common->all(),
            );
        }
        else{
            return array(
                'fail' => true,
                'message' => collect(['error' => "No common interests found"])
            );
        }
    }
}
