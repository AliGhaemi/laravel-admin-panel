<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class DatabaseLog extends Model
{
    use HasFactory;
    protected $guarded = [];

    // The relationship to the model that was performed on by user_id
    public function loggable(): MorphTo
    {
        return $this->morphTo();
    }

    // The relationship to the user who performed crud action
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
