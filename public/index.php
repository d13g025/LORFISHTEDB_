<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="./css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="d-flex flex-column min-vh-100">


    <?php

    use app\routes\Router;

    
    require '../app/controllers/HomeController.php';
    require '../app/controllers/SearchController.php';
    require '../app/controllers/DownloadController.php';
    require '../app/controllers/TesteController.php';
    require '../app/helpers/Uri.php';
    require '../app/helpers/Request.php';
    require '../vendor/autoload.php';
    require '../routes/Router.php';
    require '../app/controllers/SpeciesController.php';

    require_once '../app/views/layouts/navbar.php';

    ?>

    <div class="container flex-grow-1">
        <?php Router::execute(); 

        ?>
    </div>
    
    
    <?php require_once '../app/views/layouts/footer.php'; ?>

</body>

</html>
