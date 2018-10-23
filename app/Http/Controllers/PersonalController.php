<?php

namespace App\Http\Controllers;

use App\Interest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function interests(){
        $user = Auth::user();
        $interests = $user->interests;
        $allInterests = Interest::all();
        return view('personal.interests', compact('interests', 'allInterests', 'user'));
    }

    public function unsubscribe($interest){
        Auth::user()->interests()->detach($interest);
        return redirect()->back();
    }

    public function subscribe($interest){
        try{
            Auth::user()->interests()->attach($interest);
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withErrors(array('error' => 'You are already subscribed to this interest.'));
        }

        return redirect()->back();
    }

    public function getLikes(){
        $likes = Auth::user()->likes;
        $displayAll = false;
        $truncate = false;
        return view('personal.likes', compact('likes', 'displayAll', 'truncate'));
    }

    public function getMatches(){
        $matches = Auth::user()->matches;
        $displayAll = false;
        $truncate = false;
        return view('personal.matches', compact('matches', 'displayAll', 'truncate'));
    }
}
