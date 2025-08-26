<?php

if (!function_exists('reorder_row')) {
    function reorder_row(array $row, array $positions): array
    {
        // Columns sorted by defined positions, others after sorted alphabetically or as-is
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
if (!function_exists('generate_unique_code')) {
    /**
     * Generate a unique alphanumeric code.
     *
     * @param int $length
     * @return string
     */
    function generate_unique_code($length = 8)
    {
        return strtoupper(bin2hex(random_bytes($length / 2)));
    }
}
