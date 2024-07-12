<?php

namespace app\services;

use app\services\Database;

class Pages
{
    // Método para obter o número total de registros
    public function getTotalRecords()
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->query('SELECT COUNT(*) as total FROM fish_data_view');
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result['total'];
    }

    // Método para obter registros da página atual
    public function getRecordsByPage($page, $limit = 10)
    {
        $db = Database::getInstance()->getConnection();
        $offset = ($page - 1) * $limit;

        $stmt = $db->prepare('SELECT * FROM fish_data_view LIMIT :limit OFFSET :offset');
        $stmt->bindParam(':limit', $limit, \PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, \PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    // Método para calcular o total de páginas
    public function getTotalPages($limit = 10)
    {
        $totalRecords = $this->getTotalRecords();
        return ceil($totalRecords / $limit);
    }
}

