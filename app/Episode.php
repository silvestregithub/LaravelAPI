<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    protected $table = 'episode';

    protected $fillable = [
        'name',
        'air_date',
        'episode',
        'characters',
        'url',
        'created',
    ];
    public $timestamps = false;
}
