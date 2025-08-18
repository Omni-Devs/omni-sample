<?php

namespace App\Models;

use App\Services\AccessDatabase;

class Product
{
    public static function all()
    {
        $db = new AccessDatabase();
        return $db->query("SELECT PROD_ID, PRODNAME, CATNAME, UPRICE FROM Product");
    }
}