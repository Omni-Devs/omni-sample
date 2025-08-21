<?php

namespace App\Models;

use App\Services\AccessDatabase;

class Component
{
    public static function all()
    {
        $db = new AccessDatabase();
        return $db->query("
            SELECT c.COMPONENT, cat.category AS CATEGORY, c.UCOST, c.UNIT, c.ONHAND
            FROM Component c
            INNER JOIN Category cat ON c.CATID = cat.CATID
        ");
    }

    public static function create($data)
    {
        $db = new AccessDatabase();

        $sql = "INSERT INTO Component (COMPONENT, CATID, UCOST, UNIT, ONHAND) VALUES (?, ?, ?, ?, ?)";
        return $db->execute($sql, [
            $data['component'],
            $data['catid'],
            $data['ucost'],
            $data['unit'],
            $data['onhand'],
        ]);
    }

    public static function find($id)
    {
        $db = new AccessDatabase();

        $sql = "SELECT c.COMPONENT, c.CATID, cat.category AS CATEGORY, c.UCOST, c.UNIT, c.ONHAND
                FROM Component c
                INNER JOIN Category cat ON c.CATID = cat.CATID
                WHERE c.COMPONENT = ?";

        $result = $db->queryWithParams($sql, [$id]);
        return $result ? $result[0] : null;
    }

    public static function updateComponent($id, $data)
    {
        $db = new AccessDatabase();

        $sql = "UPDATE Component 
                SET COMPONENT = ?, CATID = ?, UCOST = ?, UNIT = ?, ONHAND = ?
                WHERE COMPONENT = ?";

        return $db->execute($sql, [
            $data['component'],
            $data['catid'],
            $data['ucost'],
            $data['unit'],
            $data['onhand'],
            $id
        ]);
    }

    public static function deleteComponent($id)
    {
        $db = new AccessDatabase();
        $sql = "DELETE FROM Component WHERE COMPONENT = ?";
        return $db->execute($sql, [$id]);
    }
}
