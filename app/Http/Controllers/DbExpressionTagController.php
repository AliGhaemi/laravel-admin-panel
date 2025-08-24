<?php

namespace App\Http\Controllers;

use App\Models\DbExpressionTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class DbExpressionTagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clmns = Schema::getColumns('users');
        dd($clmns);
        return view('home', [
            'expression_tags' => DbExpressionTag::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DbExpressionTag $dbExpressionTag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DbExpressionTag $dbExpressionTag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DbExpressionTag $dbExpressionTag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DbExpressionTag $dbExpressionTag)
    {
        //
    }
}
