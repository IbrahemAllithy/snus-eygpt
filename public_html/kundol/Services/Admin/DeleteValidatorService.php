<?php

namespace App\Services\Admin;

use App\Traits\ApiResponser;
use DB;
use Illuminate\Support\Facades\Schema;
class DeleteValidatorService
{
    use ApiResponser;

    public function deleteValidate($column, $column_id)
    {
        // Get the database name from the configuration
        $databaseName = \Config::get('database.connections.mysql.database');

        // Fetch distinct table names from the information schema columns
        $tables = DB::table('INFORMATION_SCHEMA.COLUMNS')->distinct()->where('TABLE_SCHEMA', $databaseName)->pluck('TABLE_NAME');

        $isExistedInOtherTable = 0;

        // Iterate through the tables
        foreach ($tables as $table) {
            // Skip specific tables
            if (in_array($table, ['product_variation', 'variation_detail', 'product_combination_dtl', 'product_attribute', 'attribute_detail', 'unit_detail', 'gallary_detail', 'gallary_tags', 'product_gallary_details', 'blog_category_detail'])) {
                continue;
            }

            // Check if the column exists in the current table
            if (Schema::hasColumn($table, $column)) {
                // Check if any record exists with the given column value
                $query = DB::table($table)->where($column, $column_id);

                // Check if the table has a 'deleted_at' column
                if (Schema::hasColumn($table, 'deleted_at')) {
                    $query->whereNull('deleted_at');
                }

                // If the record exists, mark it as found
                if ($query->exists()) {
                    $isExistedInOtherTable = 1;
                    break;
                }
            }
        }

        return $isExistedInOtherTable;
    }
}
