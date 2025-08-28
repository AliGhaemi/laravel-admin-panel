<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminAccessToken extends Model
{
    protected $fillable = [
        'user_id',
        'access_token'
    ];
    public $timestamps = false;
}
