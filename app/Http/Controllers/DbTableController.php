<?php

namespace App\Http\Controllers;

use App\Models\DbExpression;
use App\Models\DbTable;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DbTableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'DbTableName' => ['required'],
        ]);

        Schema::create($attributes['DbTableName'], function (Blueprint $table) {
            $attributes = \request()->validate([
                'DbColumns' => ['required'],
            ]);


            $table->id();
//            DB::statement(
//                "CREATE TABLE ".$attributes['db_table_name'].
//                " ".$attributes['db_column_name']." VARCHAR(".$attributes['db_expression_length'].")"
//            );

            while (!empty($attributes['DbColumns'])) {
                // Get the first item
                $column = array_shift($attributes['DbColumns']); // removes the first element and returns it

                // Process the item
                $length = $column['length'];
                $table->addColumn($column['type'], $column['name'],
//                later pass an array as params, check addColumn and string methods for more info.
                    ["length" => $length]);

            }
            $table->timestamps();
        });

    }

    /**
     * Display the specified resource.
     */
    public function show(DbTable $dbTable)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DbTable $dbTable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DbTable $dbTable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DbTable $dbTable)
    {
        //
    }
}
