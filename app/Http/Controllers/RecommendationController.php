<?php

namespace App\Http\Controllers;

use App\Models\Trail;
use App\Services\RecommendationService;

class RecommendationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RecommendationService $recommendationService)
    {
        $userDetails = auth()->user()->details;

        if(!$userDetails) {
            return [];
        }

        $trails = Trail::with('details')->get();

        $data = [];

        foreach($trails as $trail) {
            $data['id ' . $trail->id] = [
                $trail->details->difficulty, 
                $trail->details->elevation_rating, 
                $trail->details->distance_rating
            ];
        }
        
        $user = [$userDetails->difficulty, $userDetails->elevation_rating, $userDetails->distance_rating];
        
        $recommendations = $recommendationService->getRecommendation($user, $data);

        //return $recommendations;

        $grouped = $trails->groupBy('id');

        $finalArray = [];

        foreach($recommendations as $key => $recommendation) {
            array_push($finalArray, $grouped[substr($key, 3)][0]);
        }

        return $finalArray;
    }
}
