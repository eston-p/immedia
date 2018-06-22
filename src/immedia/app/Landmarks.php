<?php

namespace App;

use App\Events\CreatedLandMarkEven;
use Illuminate\Database\Eloquent\Model;

class Landmarks extends Model
{

    /**
     * @var array
     */
    protected $fillable = [
        'four_square_id',
        'name',
        'lat',
        'long',
        'city',
        'search_place',
        'search_term',
    ];

    /**
     * Events
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => CreatedLandMarkEven::class
    ];
}
