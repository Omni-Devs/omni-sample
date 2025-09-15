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
                CStr(p.PRODUCT_CODE) AS PRODUCT_CODE,
                p.PRODUCT_NAME AS PRODUCT_NAME,
                p.PRODUCT_PRICE AS PRODUCT_PRICE,
                c.Category_Name AS CATEGORY,
                s.SUBCATEGORY_NAME AS SUBCATEGORY,
                'PRODUCT' AS TYPE
            FROM ([PRODUCTS] AS p
            INNER JOIN [CATEGORY] AS c ON p.CAT_ID = c.CAT_ID)
            LEFT JOIN [SUBCATEGORY] AS s ON p.SUBCAT_ID = s.SUBCAT_ID

            UNION

            SELECT
                CStr(comp.COMP_ID) AS PRODUCT_CODE,
                comp.COMPONENT_NAME AS PRODUCT_NAME,
                comp.COMPONENT_PRICE AS PRODUCT_PRICE,
                c2.Category_Name AS CATEGORY,
                s2.SUBCATEGORY_NAME AS SUBCATEGORY,
                'COMPONENT' AS TYPE
            FROM ([COMPONENT] AS comp
            INNER JOIN [CATEGORY] AS c2 ON comp.CAT_ID = c2.CAT_ID)
            LEFT JOIN [SUBCATEGORY] AS s2 ON comp.SUBCAT_ID = s2.SUBCAT_ID
            WHERE comp.FOR_SALE = 1
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

    /**
     * Create a new category and return its ID (or null on failure).
     */
    public static function createCategoryRecord($name, $description = '')
    {
        $db = new AccessDatabase();

        $sql = "INSERT INTO CATEGORY (Category_Name, Description) VALUES (?, ?)";
        $db->execute($sql, [$name, $description]);

        // Try to fetch the inserted ID. Use TOP 1 ordered by CAT_ID descending.
        $res = $db->queryWithParams("SELECT TOP 1 CAT_ID FROM CATEGORY WHERE Category_Name = ? ORDER BY CAT_ID DESC", [$name]);
        return $res && count($res) ? $res[0]['CAT_ID'] : null;
    }

    /**
     * Create a new subcategory under a parent category and return its ID (or null on failure).
     */
    public static function createSubcategoryRecord($catId, $name, $description = '')
    {
        $db = new AccessDatabase();

        $sql = "INSERT INTO SUBCATEGORY (CAT_ID, Subcategory_Name, Description) VALUES (?, ?, ?)";
        $db->execute($sql, [$catId, $name, $description]);

        $res = $db->queryWithParams("SELECT TOP 1 SUBCAT_ID FROM SUBCATEGORY WHERE Subcategory_Name = ? AND CAT_ID = ? ORDER BY SUBCAT_ID DESC", [$name, $catId]);
        return $res && count($res) ? $res[0]['SUBCAT_ID'] : null;
    }
}