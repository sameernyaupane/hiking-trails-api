<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;

class UserController extends Controller
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
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

    public function profile()
    {
        $id = auth()->user()->id;

        return User::with('details')->find($id)->details;
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'difficulty'       => 'required|string',
            'elevation_rating' => 'required|string',
            'distance_rating'  => 'required|string',
        ]);

        $id = auth()->user()->id;

        UserDetail::updateOrCreate(
            ['user_id' => $id],
            [
                'difficulty'       => $request->difficulty,
                'elevation_rating' => $request->elevation_rating,
                'distance_rating'  => $request->distance_rating,
            ]
        );

        return 'success';
    }
}
