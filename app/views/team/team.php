<?php

use app\routes\Router;

Router::execute();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo Router::getPageTitle(); ?> </title>
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
                    <a class="font-m-ru color-c05" href="./search">Search</a>
                </li>
                <li class="nav-list-item">
                    <a class="font-m-ru color-c05" href="./statistics">Statistics</a>
                </li>
                <li class="nav-list-item">
                    <a class="active-page font-m-ru color-c05" href="./team">Team</a>
                </li>
            </ul>
        </nav>
        <div class="page-main-title font-m-r">
            <h1>TEAM</h1>
        </div>
    </header>

    <article class="team-article grid">
        <div class="team-article-item grid">
            <div class="team-article-item-container-img">
                <img src="./IMG/Photos/Photo-3.png" alt="">
            </div>
            <div class="team-article-item-container-text">
                <h2 class="font-b-b color-c07">Dr. Olivia Bennett</h2>
                <span class="font-m-s color-c06">Researcher</span>
                <p>Dr. Olivia Bennett is a dynamic and empathetic educator who brings passion and dedication to her teaching. With a warm and nurturing demeanor, she creates a supportive learning environment where students feel valued and empowered to succeed.</p>
            </div>
        </div>

        <div class="team-article-item grid">
            <div class="team-article-item-container-img">
                <img src="./IMG/Photos/Photo-3.png" alt="">
            </div>
            <div class="team-article-item-container-text">
                <h2 class="font-b-b color-c07">Dr. Olivia Bennett</h2>
                <span class="font-m-s color-c06">Researcher</span>
                <p>Dr. Olivia Bennett is a dynamic and empathetic educator who brings passion and dedication to her teaching. With a warm and nurturing demeanor, she creates a supportive learning environment where students feel valued and empowered to succeed.</p>
            </div>
        </div>

        <div class="team-article-item grid">
            <div class="team-article-item-container-img">
                <img src="./IMG/Photos/Photo-3.png" alt="">
            </div>
            <div class="team-article-item-container-text">
                <h2 class="font-b-b color-c07">Dr. Olivia Bennett</h2>
                <span class="font-m-s color-c06">Researcher</span>
                <p>Dr. Olivia Bennett is a dynamic and empathetic educator who brings passion and dedication to her teaching. With a warm and nurturing demeanor, she creates a supportive learning environment where students feel valued and empowered to succeed.</p>
            </div>
        </div>

        <div class="team-article-item grid">
            <div class="team-article-item-container-img">
                <img src="./IMG/Photos/Photo-3.png" alt="">
            </div>
            <div class="team-article-item-container-text">
                <h2 class="font-b-b color-c07">Dr. Olivia Bennett</h2>
                <span class="font-m-s color-c06">Researcher</span>
                <p>Dr. Olivia Bennett is a dynamic and empathetic educator who brings passion and dedication to her teaching. With a warm and nurturing demeanor, she creates a supportive learning environment where students feel valued and empowered to succeed.</p>
            </div>
        </div>
    </article>

</body>

</html>