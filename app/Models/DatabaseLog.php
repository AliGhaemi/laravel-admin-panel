<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatabaseLog extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function table_identifier(Model $model)
    {
        return $this->belongsTo($model::class);
    }
}
