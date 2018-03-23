<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feed_back extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'message'
    ];
}
