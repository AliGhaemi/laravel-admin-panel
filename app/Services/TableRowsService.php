<?php

namespace App\Services;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class TableRowsService
{
    public function getReorderedRows(string $table_name) : LengthAwarePaginator
    {
        $rows = DB::table($table_name)->paginate(10);

        $positions = [
            'id' => 0,
        ];

        // Transform each row
        $transformedRows = $rows->getCollection()->map(function ($item) use ($positions) {
            // Convert item (object) to array
            $rows = (array)$item;
            // Reorder keys
            return reorder_row($rows, $positions);
        });

        // Replace the paginator's collection with transformed collection
        $rows = $rows->setCollection($transformedRows);

        return $rows;
    }
}
