<?php

namespace App\Http\Controllers;

use App\Interest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

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
        $interests = $user->orderedInterests();

        //interests to which the user is not subscribed
        $availableInterests = $user->orderedNotSubscribedInterests();
        //non-api
//        return view('personal.interests', compact('interests', 'availableInterests', 'user'));
        //api
        return Response::json(array('interests' => $interests,'availableInterests' => $availableInterests));
    }

    public function unsubscribe($interest){
        Auth::user()->interests()->detach($interest);
        //non-api
//        return redirect()->back();
        //api
        return Response::json(array('fail' => false, 'message' => 'You successfully unsubscribed to this interest.'));
    }

    public function subscribe($interest){
        try{
            Auth::user()->interests()->attach($interest);
        } catch(\Illuminate\Database\QueryException $e){
            //non-api
//            return redirect()->back()->withErrors(array('error' => 'You are already subscribed to this interest.'));
            //api
            return Response::json(array('fail' => true, 'error' => 'You are already subscribed to this interest.'));
        }
        //non-api
//        return redirect()->back();
        //api
        return Response::json(array('fail' => false, 'message' => 'You successfully subscribed to this interest.'));
    }

    public function getLikes(){
        $likes = Auth::user()->likes;
        $displayAll = false;
        $truncate = false;
        //non-api
//        return view('personal.likes', compact('likes', 'displayAll', 'truncate'));
        //api
        return Response::json(array('likes' => $likes,'displayAll' => $displayAll, 'truncate' => $truncate));
    }

    public function getMatches(){
        $matches = Auth::user()->matches;
        $displayAll = false;
        $truncate = false;
        //non-api
//        return view('personal.matches', compact('matches', 'displayAll', 'truncate'));
        //api
        return Response::json(array('matches' => $matches,'displayAll' => $displayAll, 'truncate' => $truncate));
    }
}
