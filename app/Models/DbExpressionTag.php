<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DbExpressionTag extends Model
{
    protected $fillable = [
        'type',
        'length',
        'date'
    ];
}
