<?php

namespace App\Observers;

use App\Models\DatabaseLog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class GlobalDatabaseCrudObserver
{
    protected function ModifyDatabaseLog(Model $model, string $crud_type)
    {
        DatabaseLog::create([
            'user_id' => auth()->id(),
            'crud_type' => $crud_type,
            'loggable_id' => $model->getKey(),
            'loggable_type' => $model::class,
            'details' => json_encode($model->getDirty()),
        ]);
    }

    public function created(Model $model): void
    {
        if ($model instanceof DatabaseLog) {
            return;
        }

        if (Auth::check()) {
            $this->ModifyDatabaseLog($model, 'created');
        }
    }

    public function updated(Model $model): void
    {
        if ($model instanceof DatabaseLog) {
            return;
        }
        if (Auth::check()) {
            $this->ModifyDatabaseLog($model, 'updated');
        }
    }

    public function deleted(Model $model): void
    {
        if ($model instanceof DatabaseLog) {
            return;
        }
        if (Auth::check()) {
            $this->ModifyDatabaseLog($model, 'deleted');
        }
    }
}
