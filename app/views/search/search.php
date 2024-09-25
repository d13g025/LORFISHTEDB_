<?php

use app\services\Database;
use app\routes\Router;

Router::execute();

// Recupera os nomes dos peixes
$searchAll = Database::getInstance()->getSearchAll();

// Recupera os nomes das superfamily
$superfamily = Database::getInstance()->getSuperfamily();

// Recupera os nomes das ordens
$order = Database::getInstance()->getOrder();

// Recupera os nomes das classes
$class = Database::getInstance()->getClass();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./CSS/style.css">
</head>
<body id="search-page">   
    <header>
    <nav aria-label="navigation-menu">
            <ul class="nav-list flexbox">
                <li class="nav-list-item" id="header-logo-title">
                    <a class="color-c05" href="/home" id="logotipo-header">LORFISH</a>
                </li>
                <li class="nav-list-item">
                    <a class="font-m-ru color-w01" href="/home"><span class="nav-link font-m-ru color-w01">Home</span></a>
                </li>
                <li class="nav-list-item">
                    <a class="active-page font-m-ru color-c05" href="/search"><span class="nav-link font-m-ru color-w01">Search</span></a>
                </li>
                <li class="nav-list-item">
                    <a class="font-m-ru color-w01" href="/results"><span class="nav-link font-m-ru color-w01">Results</span></a>
                </li>
                <li class="nav-list-item">
                    <a class="font-m-ru color-w01" href="/statistics"><span class="nav-link font-m-ru color-w01">Statistics</span></a>
                </li>
                <li class="nav-list-item">
                    <a class="font-m-ru color-w01" href="/team"><span class="nav-link font-m-ru color-w01">Team</span></a>
                </li>
            </ul>
        </nav>
        <div class="page-main-title font-m-r color-c05">
            <h1 class="">Search</h1>
        </div>
    </header>

    <main class="search-main">
        <form action="">
            <div class="search-main-container grid">
                <div>
                    <input type="checkbox" name="fish" id="fish">
                    <label class="font2-l-su color-c05" for="fish">Fish</label>
                    <select class="font2-l-r color-c05">
                        <?php
                        foreach ($searchAll as $s) {
                            echo "<option value='{$s['scientific_name_fish']}'>{$s['scientific_name_fish']}</option>";
                        }
                        ?>
                    </select>
                </div>
    
                <div>
                    <input type="radio" name="search-radio" id="class">
                    <label class="font2-l-su color-c05" for="class">Class</label>
                    <select class="font2-l-r color-c05">
                        <?php
                        foreach ($class as $c) {
                            echo "<option value='{$c['class_name']}'>{$c['class_name']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <input type="radio" name="search-radio" id=order>
                    <label class="font2-l-su color-c05" for="order">Order</label>
                    <select class="font2-l-r color-c05">
                        <?php
                        foreach ($order as $o) {
                            echo "<option value='{$o['order_name']}'>{$o['order_name']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <input type="radio" name="search-radio" id="superfamily">
                    <label class="font2-l-su color-c05" for="superfamily">Superfamily</label>
                    <select class="font2-l-r color-c05">
                        <?php
                        foreach ($superfamily as $sf) {
                            echo "<option value='{$sf['superfamily_name']}'>{$sf['superfamily_name']}</option>";
                        }
                        ?>
                    </select>
                </div> 
            </div>
            
            
            <button class="button">SEARCH</button>
        </form>
    </main>
    
</body>
</html>