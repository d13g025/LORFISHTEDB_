<?php

namespace app\controllers;

class StatisticsController
{
    public function statistics()
    {
        try {
            require_once __DIR__ . '/../views/statistics/statistics.php';
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}
