<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TrailDetail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'difficulty',
        'elevation',
        'elevation_rating',
        'distance',
        'distance_rating',
        'estimated_time',
        'accomodation1',
        'accomodation1_cost',
        'accomodation2',
        'accomodation2_cost',
        'accomodation3',
        'accomodation3_cost',
    ];
}
