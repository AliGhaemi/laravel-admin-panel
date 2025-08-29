<?php

namespace App\Observers;

use App\Models\DatabaseLog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class GlobalDatabaseCrudObserver
{
    public function created(Model $model): void
    {
        if ($model instanceof DatabaseLog) {
            return;
        }

        if (Auth::check()) {
            DatabaseLog::create([
                'user_id' => auth()->id(),
                'crud_type' => 'create',
                'logged_model_class_name' => get_class($model),
                'logged_row_id' => $model->id,
            ]);
        }
    }

    public function updated(Model $model): void
    {
        if ($model instanceof DatabaseLog) {
            return;
        }
        if (Auth::check()) {
            DatabaseLog::create([
                'user_id' => auth()->id(),
                'crud_type' => 'update',
                'logged_model_class_name' => get_class($model),
                'logged_row_id' => $model->id,
            ]);
        }
    }

    public function deleted(Model $model): void
    {
        if ($model instanceof DatabaseLog) {
            return;
        }
        if (Auth::check()) {
            DatabaseLog::create([
                'user_id' => auth()->id(),
                'crud_type' => 'delete',
                'logged_model_class_name' => get_class($model),
                'logged_row_id' => $model->id,
            ]);
        }
    }
}
