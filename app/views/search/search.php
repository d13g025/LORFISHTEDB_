<?php

use app\services\Database;
use app\routes\Router;

Router::execute();

// Recupera os dados para o select
$searchAll = Database::getInstance()->getSearchAll();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo Router::getPageTitle(); ?> </title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/style.css">
</head>

<body>

    <div>
        <form action="/search" method="POST">
            <div style="margin-top: 50px;">
                <input type="radio" name="search_type" value="scientific_name" id="" checked>Peixe
                <select name="scientific_name[]" size="4" style="width:200px" multiple="multiple">
                    <?php foreach ($searchAll as $search) : ?>
                        <option value="<?php echo $search['scientific_name_fish']; ?>"><?php echo $search['scientific_name_fish']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div style="margin-top: 50px;">
                <input type="radio" name="search_type" value="family_name">Familia_Peixe
                <select name="family_name[]" size="4" style="width:200px" multiple="multiple">
                    <?php foreach ($searchAll as $search) : ?>
                        <option value="<?php echo $search['family_name']; ?>"><?php echo $search['family_name']; ?></option>
                    <?php endforeach; ?>

            </div>

            <input type="submit" value="Enviar">
        </form>

    </div>





    <div>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $searchType = $_POST['search_type'];

            if ($searchType == 'scientific_name') {
                // Obtém os valores do select para scientific_name
                $scientific_names = isset($_POST['scientific_name']) ? $_POST['scientific_name'] : [];
                echo "Scientific Names: " . implode(', ', $scientific_names);
            } elseif ($searchType == 'family_name') {
                // Obtém os valores do select para family_name
                $family_names = isset($_POST['family_name']) ? $_POST['family_name'] : [];
                echo "Family Names: " . implode(', ', $family_names);
            } else {
                echo "Search Type: " . $searchType;
            }
        }


        ?>
    </div>
</body>

</html>