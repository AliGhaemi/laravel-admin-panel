<?php

namespace Database\Seeders;

use App\Models\DatabaseLog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseLogSeeder extends Seeder
{
    protected $modelsList = [
        \App\Models\User::class,
        \App\Models\AdminAccessToken::class,
        \App\Models\Post::class,
    ];

    public function run(): void
    {
        foreach ($this->modelsList as $model) {
            $randomModel = $model::inRandomOrder()->first();
            DatabaseLog::factory()->forModel($randomModel)->count(5)->create();
        }
    }
}
