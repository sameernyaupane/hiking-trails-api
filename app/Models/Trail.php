<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Trail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'thumbnail',
        'user_id'
    ];

    public function details()
    {
        return $this->hasOne(TrailDetail::class);
    }

    public function starRating()
    {
        return $this->hasMany(StarRating::class);
    }
}
