<?php

namespace Database\Seeders;

use App\Models\DatabaseLog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DatabaseLog::factory()->count(10)->create();
    }
}
