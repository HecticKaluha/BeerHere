<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInterestRequest;
use App\Http\Requests\EditInterestRequest;
use App\Interest;
use Illuminate\Http\Request;

class InterestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $interests = Interest::orderBy('name')->get();
        return view('interests.index', compact('interests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('interests.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateInterestRequest $request)
    {
        $request->persist();
        return redirect('/interests');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Interest  $interest
     * @return \Illuminate\Http\Response
     */
    public function show(Interest $interest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Interest  $interest
     * @return \Illuminate\Http\Response
     */
    public function edit(Interest $interest)
    {
        return view('interests.edit', compact('interest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Interest  $interest
     * @return \Illuminate\Http\Response
     */
    public function update(EditInterestRequest $request, Interest $interest)
    {
        $request->patch($interest);
        return redirect('/interests');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Interest  $interest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Interest $interest)
    {
        Interest::destroy($interest->id);
        return redirect('/interests');
    }
}
