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

    public static function create($data)
    {
        $db = new AccessDatabase();

        $sql = "INSERT INTO Product (PROD_ID, PRODNAME, CATNAME, UPRICE) VALUES (?, ?, ?, ?)";
        $stmt = $db->getConnection()->prepare($sql);

        return $stmt->execute([
            $data['prod_id'],
            $data['prod_name'],
            $data['category'],
            $data['uprice'],
        ]);
    }
}