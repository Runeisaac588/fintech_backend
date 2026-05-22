<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Order
{
    protected static string $table = 'orders';

    public static function query()
    {
        return DB::table(self::$table)
            ->whereNull('deleted_at');
    }
}