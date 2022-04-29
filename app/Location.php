<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'location';

    protected $fillable = [
        'name',
        'type',
        'dimension',
        'residents',
        'url',
        'created',
    ];
    public $timestamps = false;

}
