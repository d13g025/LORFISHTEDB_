<?php

use app\routes\Router;
use app\services\Database;

// Obtenha todos os dados do banco de dados.
$searchAll = Database::getInstance()->getSearchAll();

// Executa o roteamento.
Router::execute();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo Router::getPageTitle(); ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/style.css">
</head>

<body>
    <header>
        <nav aria-label="navigation-menu">
            <ul class="nav-list flexbox">
                <li class="nav-list-item">
                    <a class="font-m-ru color-c05" href="./home">Home</a>
                </li>
                <li class="nav-list-item">
                    <a class="active-page font-m-ru color-c05" href="./search">Search</a>
                </li>
                <li class="nav-list-item">
                    <a class="font-m-ru color-c05" href="./statistics">Statistics</a>
                </li>
                <li class="nav-list-item">
                    <a class="font-m-ru color-c05" href="./team">Team</a>
                </li>
            </ul>
        </nav>
        <div class="page-main-title font-m-r">
            <h1>SEARCH</h1>
        </div>
    </header>

    <form action="" class="search-form">
        <search class="grid">
            <div class="grid">
                <img src="./IMG/Busca.svg">
                <input type="name" autofocus placeholder="Type your search here.">
            </div>
            <button class="font-m-bu button">Search</button>
        </search>
        <fieldset class="search-fieldset">
            <legend>Search Filters</legend>
            <ul class="grid">
                <li>
                    <input class="search-radio" id="class_radio" type="radio" value="class" name="filter">
                    <label class="search-radio-label" for="class_radio">Class</label>
                </li>
                <li>
                    <input class="search-radio" id="order_radio" type="radio" value="order" name="filter">
                    <label class="search-radio-label" for="order_radio">Order</label>
                </li>
                <li>
                    <input class="search-radio" id="family_radio" type="radio" value="family" name="filter">
                    <label class="search-radio-label" for="family_radio">Family</label>
                </li>
                <li>
                    <input class="search-radio" id="specie_radio" type="radio" value="specie" name="filter">
                    <label class="search-radio-label" for="specie_radio">Species</label>
                </li>
            </ul>
        </fieldset>
    </form>

    <main class="search-main grid">
        <?php if (!empty($searchAll)) : ?>
            <?php foreach ($searchAll as $fish) : ?>
                <div class="grid" aria-label="fish specie">
                    <h4 class="font-b-mic color-c08"><?php echo $fish['scientific_name_fish']; ?></h4>
                    <ul class="grid">
                        <li><a class="button font-m-m" href="#">FASTA</a></li>
                        <li><a class="button font-m-m" href="#">GFF</a></li>
                        <li><a class="button font-m-m" href="statistics">Statistics</a></li>
                    </ul>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>No fish species found.</p>
        <?php endif; ?>
    </main>
</body>

</html>