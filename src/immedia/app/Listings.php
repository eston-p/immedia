<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listings extends Model
{
    protected $fillable = [
        'name',
        'search',
    ];
}
