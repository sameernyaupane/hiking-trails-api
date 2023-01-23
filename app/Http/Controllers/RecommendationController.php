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
        $trails = Trail::with('details')->get();

        $data = [];

        foreach($trails as $trail) {
            $data['id ' . $trail->id] = [
                $trail->details->difficulty, 
                $trail->details->elevation_rating, 
                $trail->details->distance_rating
            ];
        }
        
        $user = ['Normal', 'Medium', 'Long'];
        
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
