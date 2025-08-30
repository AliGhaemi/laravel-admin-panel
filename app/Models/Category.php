<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function tableNames()
    {
        return $this->hasMany(TableName::class);
    }
}
