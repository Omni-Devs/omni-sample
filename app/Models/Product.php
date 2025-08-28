<?php

namespace App\Models;

use App\Services\AccessDatabase;

class Product
{
    public static function all()
    {
        $db = new AccessDatabase();
        $sql = "
            SELECT 
                p.PRODUCT_CODE, 
                p.PRODUCT_NAME, 
                p.PRODUCT_PRICE, 
                c.Category_Name AS CATEGORY,
                s.SUBCATEGORY_NAME AS SUBCATEGORY
            FROM ([PRODUCTS] AS p
            INNER JOIN [CATEGORY] AS c 
                ON p.CAT_ID = c.CAT_ID)
            LEFT JOIN [SUBCATEGORY] AS s 
                ON p.SUBCAT_ID = s.SUBCAT_ID
        ";
        
        // dd($sql);
        return $db->query($sql);
    }

    public static function create($data)
    {
        $db = new AccessDatabase();

        // Insert into PRODUCTS with CATID
        $sql = "INSERT INTO PRODUCTS (PRODUCT_CODE, PRODUCT_NAME, CAT_ID, SUBCAT_ID, PRODUCT_PRICE) VALUES (?, ?, ?, ?, ?)";

        return $db->execute($sql, [
            $data['product_code'], 
            $data['product_name'],
            $data['category_id'],
            $data['sub_category_id'],
            $data['product_price'],
        ]);
    }

    public static function find($id)
    {
        $db = new AccessDatabase();

        $sql = "
            SELECT 
                p.PRODUCT_CODE,
                p.PRODUCT_NAME, 
                p.PRODUCT_PRICE, 
                p.CAT_ID,
                p.SUBCAT_ID,
                c.Category_Name AS CATEGORY,
                s.SUBCATEGORY_NAME AS SUBCATEGORY
            FROM (PRODUCTS AS p
            INNER JOIN CATEGORY AS c ON p.CAT_ID = c.CAT_ID)
            LEFT JOIN SUBCATEGORY AS s ON p.SUBCAT_ID = s.SUBCAT_ID
            WHERE p.PRODUCT_CODE = ?
        ";

        $result = $db->queryWithParams($sql, [$id]);
        return $result ? $result[0] : null;
    }

    public static function updateProduct($id, $data)
    {
        $db = new AccessDatabase();

        $sql = "UPDATE Products
            SET PRODUCT_CODE = ?, PRODUCT_NAME = ?, CAT_ID = ?, SUBCAT_ID = ?, PRODUCT_PRICE = ? 
            WHERE PRODUCT_CODE = ?
        ";

        return $db->execute($sql, [
            $data['product_code'],
            $data['product_name'],
            $data['category_id'], // should be CAT_ID, not CATNAME
            $data['sub_category_id'],
            $data['product_price'],
            $id
        ]);
    }

    public static function deleteProduct($id)
    {
        $db = new \App\Services\AccessDatabase();
        $sql = "DELETE FROM Products WHERE PRODUCT_CODE = ?";
        return $db->execute($sql, [$id]);
    }
}