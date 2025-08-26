<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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
    public function handleAdminPanel()
    {
        // 1. Get the current session's unique ID.
        $c_url = random_bytes(20);

        // 2A. Encode the bytes into a hexadecimal string
        // 2B. Redirect to the unique URL using the session ID.
        return redirect()->route('admin.show', ['c_url' => bin2hex($c_url)]);
    }


    public function showAdminPanel(string $c_url)
    {
//        if (auth()->user()->hasPermissionTo('edit blogs')) {
//            dd(123);
//        } else {
//            abort(403, 'Hello, Unauthorized action!');
//        }
//        TODO: complete this part, very important
        // 3. IMPORTANT: Check if the session ID from the URL matches the user's current session.
        // This prevents one user from seeing another user's chat by changing the URL.
//        if (Session::getId() !== $c_url) {
//            // Redirect them to their own unique page or a generic error page.
//            return redirect()->route('admin.handle');
//        }

        $tables = Schema::getTableListing();
        $tableNames = array_map(fn($table) => Str::after($table, '.'), $tables);

        // Return the view with the conversation data
        return Inertia::render('AdminPanel', [
            'tableNames' => $tableNames,
        ]);

    }

    public function showTable(string $c_url, string $table_name)
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
}
