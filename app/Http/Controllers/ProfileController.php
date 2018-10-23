<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('profile.profile_overview', compact('user', 'interests', 'displayAll'));

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
        $suggestions = Auth::user()->suggestions();
        $displayAll = true;
        return view('suggestion.suggestions', compact('suggestions', 'displayAll'));

    }

    public function like(){
        $user = Auth::user();
        $userToLike = User::find(request('id'));
        $user->likes()->attach([1 => ['user_id' => $user->id, 'likes_user_id' => $userToLike->id, 'liked_on' => Carbon::now()]]);
        return response()->json(['msg'=>'You succesfully liked ' . $userToLike->name ]);
    }

    public function dislike(){
        $user = Auth::user();
        $userToDislike = User::find(request('id'));
        return response()->json(['msg'=>'You disliked ' . $userToDislike->name ]);
    }
}
