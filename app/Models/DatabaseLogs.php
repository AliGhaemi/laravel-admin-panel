<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DatabaseLogs extends Model
{
    protected $guarded = [];

    protected $primaryKey = 'id';
    public $incrementing = true;
}
