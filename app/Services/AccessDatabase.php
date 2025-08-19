<?php

namespace App\Services;

use PDO;

class AccessDatabase
{
    protected $pdo;

    public function __construct()
    {
        $dbFile = base_path('database/OMNI_POS.accdb');  // adjust path
        if (!file_exists($dbFile)) {
            throw new \Exception("Access DB file not found: $dbFile");
        }

        $this->pdo = new PDO("odbc:Driver={Microsoft Access Driver (*.mdb, *.accdb)};Dbq=$dbFile;Uid=;Pwd=;");
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function query($sql)
    {
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}
