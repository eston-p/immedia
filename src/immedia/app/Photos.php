<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{

    /**
     * @var array
     */
    protected $fillable = [
        'photo_id',
        'owner',
        'title',
        'farm',
        'secret',
        'server',
        'search_place',
        'search_term',
    ];
}
