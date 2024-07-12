<?php

namespace app\services;

use PDO;
use PDOException;

class Database
{
    private static $instance = null;
    private $connection;

    private function __construct()
    {
        try {
            $this->connection = new PDO("pgsql:host=localhost;port=5430;dbname=LORFISHDB", "postgres", "123569");
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erro ao conectar com o banco de dados: " . $e->getMessage());
        }
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function getSearchAll()
    {
        $db = $this->getConnection();
        $stmt = $db->query('SELECT DISTINCT scientific_name FROM analysis_info');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getSearch($data)
    {
        $db = $this->getConnection();
        $stmt = $db->prepare('SELECT * FROM analysis_info WHERE scientific_name ILIKE :data');
        $stmt->bindParam(':data', $data, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countSearchSF($data)
    {
        $db = $this->getConnection();
        $stmt = $db->prepare('SELECT superfamily_name, count(*) FROM analysis_info WHERE scientific_name ILIKE :data GROUP BY superfamily_name');
        $stmt->bindParam(':data', $data, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function countSearchOrder($data)
    {
        $db = $this->getConnection();
        $stmt = $db->prepare('SELECT order_name, count(*) FROM analysis_info WHERE scientific_name ILIKE :data GROUP BY superfamily_name');
        $stmt->bindParam(':data', $data, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}   
