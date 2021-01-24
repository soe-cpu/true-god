<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    protected $fillable = [
        'title', 'artist', 'album', 'desc', 'song','photo'
    ];
}
