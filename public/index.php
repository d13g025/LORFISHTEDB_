    <?php

    use app\routes\Router;

    require '../app/controllers/HomeController.php';
    require '../app/controllers/SearchController.php';
    require '../app/controllers/StatisticsController.php';
    require '../app/controllers/TeamController.php';
    require '../app/services/Database.php';
    require '../app/helpers/Uri.php';
    require '../app/helpers/Request.php';
    require '../vendor/autoload.php';
    require '../routes/Router.php';

    Router::execute();

    ?>

    <html>

    <head>
        <link rel="stylesheet" href="css/style.css">

    </html>