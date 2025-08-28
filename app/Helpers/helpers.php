<?php

if (!function_exists('reorder_row')) {
    function reorder_row(array $row, array $positions): array
    {
        // Columns sorted by defined positions, others after sorted alphabetically or as-is,
        // TODO: Make sure to convert the json to an array, Check the DbTableColumn.tsx
        // TODO: I think i overcomplicated this by stating 2 loops
        $ordered = [];

        // First, put columns defined in $positions in correct order if they exist in $row
        foreach ($positions as $column => $pos) {
            if (array_key_exists($column, $row)) {
                $ordered[$column] = $row[$column];
            }
        }

        // Then append columns that were not defined in positions
        foreach ($row as $column => $value) {
            if (!isset($positions[$column])) {
                $ordered[$column] = $value;
            }
        }

        return $ordered;
    }
}
