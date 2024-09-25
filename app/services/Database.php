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
        $stmt = $db->query('SELECT scientific_name_fish FROM specie_fish');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Metodos para retornar as SF cadastradas
    public function getSuperfamily()
    {
        $db = $this->getConnection();
        $stmt = $db->query('SELECT superfamily_name FROM superfamily_wicker');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Metodo para retornar as Ordens cadastradas
    public function getOrder()
    {
        $db = $this->getConnection();
        $stmt = $db->query('SELECT order_name FROM order_wicker');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Metodo para retornar as Classes cadastradas
    public function getClass()
    {
        $db = $this->getConnection();
        $stmt = $db->query('SELECT class_name FROM class_wicker');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Métodos para retornar todos dos dados do peixe X
    public function getSearch($data)
    {
        $db = $this->getConnection();

        // Verifica se $data é um array, caso contrário transforma em um array
        if (!is_array($data)) {
            $data = [$data];
        }

        // Cria uma lista de placeholders para a query
        $placeholders = implode(',', array_fill(0, count($data), '?'));

        // Monta a query com IN
        $stmt = $db->prepare("SELECT * FROM analysis_info WHERE scientific_name_fish IN ($placeholders)");

        // Executa a query com os valores do array
        $stmt->execute($data);

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
