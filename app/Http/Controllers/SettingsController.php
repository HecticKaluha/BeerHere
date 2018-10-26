<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loggedInUser = Auth::user();
        return view('settings.profilesettings', compact('loggedInUser'));
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

    public function editProfile(Request $request){
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'gender' => 'required|string|min:1',
            'birthdate' => 'required|date|before:'.Carbon::now()->subYears(18)->startOfDay(),
            'place' => 'required|string|min:2',
            'about' => 'nullable|string|min:1',
        ]);

        $user = User::find(Auth::user()->id);
        if($request->hasfile('image'))
        {
            $extension = $request->file('image')->getClientOriginalExtension();
            $dir = 'uploads/avatars/';
            $filename = uniqid() . '_' . time() . '.' . $extension;
            $request->file('image')->move($dir, $filename);
            $user->avatar_url = 'uploads/avatars/' . $filename;
        }

        $user->name = $request['name'];
        $user->gender = $request['gender'];
        $user->birthdate = $request['birthdate'];
        $user->place = $request['place'];
        $user->about = $request['about'];
        $user->update();

        $loggedInUser = $user;
        return view('home', compact('loggedInUser'));
    }
}
