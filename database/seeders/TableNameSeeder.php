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
        $tableNamesList = collect([]);

//        foreach ($tableNames as $tableName) {
//            $tableNamesList->put("name", $tableName);
//        }

        $result = collect($tableNames)->map(function ($tableName) {
            return [
                'name' => $tableName,
            ];
        });

        dump($result);

        DB::table('table_names')->insert($result->all());
    }
}
