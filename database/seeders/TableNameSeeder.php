<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class TableNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $tables = Schema::getTableListing();
        $tableNames = array_map(fn($table) => Str::after($table, '.'), $tables);

        $result = collect($tableNames)->map(function ($tableName) {
            return [
                'name' => $tableName,
            ];
        });

        DB::table('table_names')->insert($result->all());
    }
}
