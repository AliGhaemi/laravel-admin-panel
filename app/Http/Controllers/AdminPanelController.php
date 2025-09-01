<?php

namespace App\Http\Controllers;

use App\Models\AdminAccessToken;
use App\Models\Category;
use App\Models\TableName;
use App\Models\User;
use App\Services\AdminAccessTokenService;
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

    public function showTable(string $table_name)
    {
        $columns = Schema::getColumnListing($table_name);

        $columnRows = DB::table($table_name)->paginate(10);

        $positions = [
            'id' => 0,
            // columns not in this list can go after
            // for now for id to be the first index is enough, TODO: add timestamp to be the last index
        ];

        // Transform each row
        $transformedRows = $columnRows->getCollection()->map(function ($item) use ($positions) {
            // Convert item (object) to array
            $row = (array)$item;
            // Reorder keys
            return reorder_row($row, $positions);
        });

        // Replace the paginator's collection with transformed collection
        $columnRows = $columnRows->setCollection($transformedRows);

        return Inertia::render('DbTableColumn', [
            'columns' => $columns,
            'columnRows' => $columnRows,
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
