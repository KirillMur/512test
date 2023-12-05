<?php
declare(strict_types=1);

namespace models;

use helpers\DB;

class Transactions
{
    public static function getData(int $id): array
    {
        return DB::select('SELECT * FROM docker_db.transactions WHERE id = :id', [':id' => $id]);
    }
}
