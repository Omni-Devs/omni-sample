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

    public static function find($id)
    {
        $db = new AccessDatabase();
        $sql = "SELECT PROD_ID, PRODNAME, CATNAME, UPRICE FROM Product WHERE PROD_ID = ?";
        $result = $db->queryWithParams($sql, [$id]);
        return $result ? $result[0] : null;
    }

    public static function updateProduct($id, $data)
    {
        $db = new AccessDatabase();
        $sql = "UPDATE Product SET PRODNAME = ?, CATNAME = ?, UPRICE = ? WHERE PROD_ID = ?";
        return $db->execute($sql, [
            $data['prod_name'],
            $data['category'],
            $data['uprice'],
            $id
        ]);
    }

    public static function deleteProduct($id)
    {
        $db = new \App\Services\AccessDatabase();
        $sql = "DELETE FROM Product WHERE PROD_ID = ?";
        return $db->execute($sql, [$id]);
    }


}