<?php

namespace App\Http\Controllers;

use App\Models\Trail;
use App\Models\StarRating;
use Illuminate\Http\Request;

class TrailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trails = Trail::with('details')->get();

        foreach($trails as $trail) {
            $rating = StarRating::where([
                'trail_id' => $trail->id,
                'user_id'  => auth()->user()->id,
            ])->pluck('rating');

            $trail->starRating = $rating;
        }

        return $trails;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string',
            'thumbnail'   => 'string',
            'description' => 'required|string',
        ]);

        return Trail::create([
            'title'       => $request->title,
            'thumbnail'   => $request->thumbnail,
            'description' => $request->description,
        ]);
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
        $request->validate([
            'title'       => 'required|string',
            'thumbnail'   => 'string',
            'description' => 'required|string',
        ]);

        return Trail::where('id', $id)->update([
            'title'       => $request->title,
            'thumbnail'   => $request->thumbnail,
            'description' => $request->description,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Trail::destroy($id);
    }

    public function rateTrail(Request $request, $id)
    {
        $starRating = StarRating::where(['trail_id' => $id, 'user_id' => auth()->user()->id])->first();

        if($starRating) {
            $starRating->rating = $request->rating;
            $starRating->save();
        } else {
            StarRating::create([
                'trail_id' => $id,
                'user_id'  => auth()->user()->id,
                'rating'   => $request->rating,
            ]);
        }

        return response()->json('Trail rated.');
    }
}
