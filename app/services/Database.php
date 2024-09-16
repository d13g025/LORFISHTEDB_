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

    //instancia da classe Database
    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    // Método para obter a conexão com o banco de dados
    public function getConnection()
    {
        return $this->connection;
    }

    // Método para listar todos os peixes
    public function getSearchAll()
    {
        $db = $this->getConnection();
        $stmt = $db->query('SELECT * FROM fish_data_view');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Métodos para retornar todos dos dados do peixe X
    public function getSearch($data)
    {
        $db = $this->getConnection();
        $stmt = $db->prepare('SELECT * FROM analysis_info WHERE scientific_name_fish ILIKE :data');
        $stmt->bindParam(':data', $data, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Métodos para contar os dados de SF peixe X
    public function countSearchSF($data)
    {
        $db = $this->getConnection();
        $stmt = $db->prepare('SELECT superfamily_name, count(*) FROM analysis_info WHERE scientific_name_fish ILIKE :data GROUP BY superfamily_name');
        $stmt->bindParam(':data', $data, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Métodos para contar os dados de Order peixe X
    public function countSearchOrder($data)
    {
        $db = $this->getConnection();
        $stmt = $db->prepare('SELECT order_name, count(*) FROM analysis_info WHERE scientific_name_fish ILIKE :data GROUP BY order_name');
        $stmt->bindParam(':data', $data, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
