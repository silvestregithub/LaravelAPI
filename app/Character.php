<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $table = 'characters';

    protected $fillable = [
        'name',
        'status',
        'species',
        'type',
        'gender',
        'origin',
        'location',
        'image',
        'episode',
        'url',
        'created',
    ];
    public $timestamps = false;
}
