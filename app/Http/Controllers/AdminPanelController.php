<?php

namespace App\Http\Controllers;

use App\Models\AdminAccessToken;
use App\Models\Category;
use App\Models\TableName;
use App\Models\User;
use App\Services\AdminAccessTokenService;
use App\Services\TableRowsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Inertia\Inertia;

class AdminPanelController extends Controller
{
    /**
     * Handles the initial request, gets the session ID, and redirects to the unique URL.
     */
    public function handleAdminPanel(AdminAccessTokenService $service)
    {
        $admin_access_token = Auth::user()->adminAccessToken()->first();
        if ($admin_access_token) {
            return redirect()->route('admin.show', ['c_url' => $admin_access_token->access_token]);
        }

        return redirect()->route('admin.show', ['c_url' => $service->createAdminAccessToken()->access_token]);
    }


    public function showAdminPanel()
    {
        $categorized_table_names = Category::with('tableNames')->get();
        $uncategorized_table_names = TableName::whereNull('category_id')->get();

        return Inertia::render('AdminPanel', [
            'CategorizedTableNames' => $categorized_table_names,
            'UncategorizedTableNames' => $uncategorized_table_names,
        ]);
    }

    public function showTable(string $c_url, string $table_name, TableRowsService $service)
    {
        $columns = Schema::getColumnListing($table_name);

        return Inertia::render('DbTableColumn', [
            'columns' => $columns,
            'columnRows' => $service->getReorderedRows($table_name),
        ]);
    }

    public function showRow(string $table_name, string $row_id)
    {
        $row = DB::table($table_name)->find($row_id);
        $columns = Schema::getColumnListing($table_name);
        return Inertia::render('DbRow', [
            'row' => $row,
            'columns' => $columns,
        ]);
    }

    public function update(Request $request,string $table_name, string $row_id)
    {
        $fieldRules = [
            'max:255'
        ];

        $rules = [];

        foreach ($request->all() as $key => $value) {
            $rules[$key] = $fieldRules;
        }

        $attributes = $request->validate($rules);

        $row = DB::table($table_name)->where('id', $row_id)->update($attributes);

        return Inertia::render('DbROw', [
            'row' => $row,
        ]);

    }
}
