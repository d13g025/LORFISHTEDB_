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

// Verifica se o formulário foi enviado
if (isset($_POST['search-radio'])) {
    $filter = $_POST['search-radio']; // Qualquer valor de class, order, ou superfamily
    $name_fish = $_POST['scientific_name_fish'];

    if ($filter[0] === 'class') {
        $class = $_POST['class_name'];
        $results = Database::getInstance()->createTable($name_fish, 'class', $class);
    } elseif ($filter[0] === 'order') {
        $order = $_POST['order_name'];
        $results = Database::getInstance()->createTable($name_fish, 'order', $order);
    } elseif ($filter[0] === 'superfamily') {
        $superfamily = $_POST['superfamily_name'];
        $results = Database::getInstance()->createTable($name_fish, 'superfamily', $superfamily);
    } else {
        echo "Nenhum filtro foi selecionado.";
    }
}


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
            <ul class="nav-list grid">
                <li class="nav-list-item" id="header-logo-title">
                    <a class="color-c05" href="./home.html" id="logotipo-header">LORFISH</a>
                </li>
                <li class="nav-list-item">
                    <a class="" href="./home.html"><span class="nav-link font-m-ru color-w01">Home</span></a>
                </li>
                <li class="nav-list-item">
                    <a class="active-page font-m-ru color-c05" href="./search.html"><span class="nav-link font-m-ru color-w01">Search</span></a>
                </li>
                <li class="nav-list-item">
                    <a class="font-m-ru color-w01" href="./statistics.html"><span class="nav-link font-m-ru color-w01">Statistics</span></a>
                </li>
                <li class="nav-list-item">
                    <a class="font-m-ru color-w01" href="./team.html"><span class="nav-link font-m-ru color-w01">Team</span></a>
                </li>
            </ul>
        </nav>
        <div class="page-main-title font-m-r color-c05">
            <h1 class="">Search</h1>
        </div>
    </header>

    <main class="search-main">
        <form action="/search" method="POST" class="search-form">
            <div class="search-main-container grid">
                <div>
                    <input type="checkbox" name="fish" id="fish">
                    <label class="font2-l-su color-c05" for="fish">Fish</label>
                    <select class="font2-l-r color-c05" name="scientific_name_fish">
                        <?php
                        foreach ($searchAll as $s) {
                            echo "<option value='{$s['scientific_name_fish']}'>{$s['scientific_name_fish']}</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="search-radionbuttons-container grid">

                    <div>
                        <input type="radio" name="search-radio[]" value="class" id="class">
                        <label class="font2-l-su color-c05" for="class">Class</label>
                        <select class="font2-l-r color-c05" name="class_name">
                            <?php
                            foreach ($class as $c) {
                                echo "<option value='{$c['class_name']}'>{$c['class_name']}</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div>
                        <input type="radio" name="search-radio[]" value="order" id="order">
                        <label class="font2-l-su color-c05" for="order">Order</label>
                        <select class="font2-l-r color-c05" name="order_name">
                            <?php
                            foreach ($order as $o) {
                                echo "<option value='{$o['order_name']}'>{$o['order_name']}</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div>
                        <input type="radio" name="search-radio[]" value="superfamily" id="superfamily">
                        <label class="font2-l-su color-c05" for="superfamily">Superfamily</label>
                        <select class="font2-l-r color-c05" name="superfamily_name">
                            <?php
                            foreach ($superfamily as $sf) {
                                echo "<option value='{$sf['superfamily_name']}'>{$sf['superfamily_name']}</option>";
                            }
                            ?>
                        </select>
                    </div>

                </div>
            </div>
            <button class="button">SEARCH</button>
        </form>
    </main>

    <section>
        <table>
            <tr class="table-header grid color-w01 font2-b-bu">
                <th>SPECIE</th>
                <th>CLASS</th>
                <th>ORDER</th>
                <th>SUPERFAMILY</th>
                <th>CHROMOSOME</th>
                <th>STRAND</th>
                <th>START</th>
                <th>END</th>
            </tr>

            <?php
            if (isset($results)) {
                foreach ($results as $result) {
                    echo "<tr class='table-row grid color-c05 font2-l-r'>";
                    echo "<td>{$result['scientific_name_fish']}</td>";
                    echo "<td>{$result['class_name']}</td>";
                    echo "<td>{$result['order_name']}</td>";
                    echo "<td>{$result['superfamily_name']}</td>";
                    echo "<td>{$result['chromossome_name']}</td>";
                    echo "<td>{$result['strand']}</td>";
                    echo "<td>{$result['start_sequence']}</td>";
                    echo "<td>{$result['end_sequence']}</td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>
    </section>


    <div>
        <?php

        //print_r($results);

        ?>
    </div>
</body>

</html>