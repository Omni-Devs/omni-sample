<?php

namespace App\Models;

use App\Services\AccessDatabase;

class Component
{
    public static function all()
    {
        $db = new AccessDatabase();
        $sql = "SELECT 
                comp.COMP_ID,
                comp.COMPONENT_NAME, 
                comp.COMPONENT_COST, 
                comp.COMPONENT_PRICE,
                comp.COMPONENT_UNIT,
                comp.ONHAND,
                cat.Category_Name AS CATEGORY,
                s.SUBCATEGORY_NAME AS SUBCATEGORY
            FROM ([COMPONENT] AS comp
            INNER JOIN [CATEGORY] AS cat ON comp.CAT_ID = cat.CAT_ID)
            LEFT JOIN [SUBCATEGORY] AS s ON comp.SUBCAT_ID = s.SUBCAT_ID
        ";
        
        return $db->query($sql);
    }

    public static function create($data)
    {
        $db = new AccessDatabase();

        $sql = "INSERT INTO Component (COMPONENT_NAME, CAT_ID, SUBCAT_ID, COMPONENT_COST, COMPONENT_PRICE, COMPONENT_UNIT, ONHAND, FOR_SALE) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        return $db->execute($sql, [
            $data['component_name'],
            $data['category_id'],
            $data['sub_category_id'],
            $data['component_cost'],
            $data['component_price'],
            $data['component_unit'],
            $data['onhand'],
            isset($data['for_sale']) ? (int)$data['for_sale'] : 0,
        ]);
    }

    public static function find($id)
    {
        $db = new AccessDatabase();

        $sql = "SELECT
                comp.COMP_ID,
                comp.COMPONENT_NAME, 
                comp.COMPONENT_COST, 
                comp.COMPONENT_PRICE,
                comp.COMPONENT_UNIT,
                comp.ONHAND,
                comp.CAT_ID,
                comp.SUBCAT_ID,
                cat.Category_Name AS CATEGORY,
                s.SUBCATEGORY_NAME AS SUBCATEGORY
                FROM ([Component] AS comp
                INNER JOIN [CATEGORY] AS cat ON comp.CAT_ID = cat.CAT_ID)
                LEFT JOIN [SUBCATEGORY] AS s ON comp.SUBCAT_ID = s.SUBCAT_ID
                WHERE comp.COMP_ID = ?";

        $result = $db->queryWithParams($sql, [$id]);
        return $result ? $result[0] : null;
    }

    public static function updateComponent($id, $data)
    {
        $db = new AccessDatabase();

        $sql = "UPDATE Component 
            SET COMPONENT_NAME = ?, CAT_ID = ?, SUBCAT_ID = ?, COMPONENT_COST = ?, COMPONENT_PRICE = ?, COMPONENT_UNIT = ?, ONHAND = ?, FOR_SALE = ?
            WHERE COMP_ID = ?";

        return $db->execute($sql, [
            $data['component_name'],
            $data['category_id'],
            $data['sub_category_id'],
            $data['component_cost'],
            $data['component_price'],
            $data['component_unit'],
            $data['onhand'],
            isset($data['for_sale']) ? (int)$data['for_sale'] : 0,
            $id
        ]);
    }

    public static function deleteComponent($id)
    {
        $db = new AccessDatabase();

        $sql = "DELETE FROM Component WHERE COMP_ID = ?";
        return $db->execute($sql, [$id]);
    }
}
