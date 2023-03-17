<?php

namespace App\Classes;
use App\Classes\Api\Inc\baseTables;
use DB;

class txtFileCountClass
{
    public static function txtFileCount() {
        return count(array_diff(preg_grep('~\.(txt)$~', scandir(storage_path('/output'))), array('.', '..')));
    }

    public static function canBeDeletedTables() {
        $baseTable = new baseTables();
        return count(DB::select('SHOW TABLES')) - count($baseTable->getArray());
    }
}


