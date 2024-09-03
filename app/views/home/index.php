<?php

use app\routes\Router;

Router::execute();

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
    <header>
        <nav aria-label="navigation-menu">
            <ul class="nav-list flexbox">
                <li class="nav-list-item">
                    <a class="active-page font-m-ru color-c05" href="/home">Home</a>
                </li>
                <li class="nav-list-item">
                    <a class="font-m-ru color-c05" href="/search">Search</a>
                </li>
                <li class="nav-list-item">
                    <a class="font-m-ru color-c05" href="/statistics">Statistics</a>
                </li>
                <li class="nav-list-item">
                    <a class="font-m-ru color-c05" href="/team">Team</a>
                </li>
            </ul>
        </nav>
        <div class="page-main-title font-m-r">
            <h1>Project Lorfish</h1>
        </div>
    </header>
    <section class="home-section grid" aria-label="Section: Transposable Elements">
        <div>
            <h2 class="font-b-s color-c08">Transposable Elements</h2>
            <p class="font-m-m color-b01">Transposable elements are genomic sequences capable of mobilization and replication, being abundant and ancient components of genomes (CARARETO et al, 2015). The presence of transposable elements in fish genomes contributes to defining the structure of their genomes, contributing to the adaptation process in different environments, through genomic rearrangements and interfering in the control of gene activity (KOGA et al, 2016; PEREIRA et al, 2015; CANAPA et al, 2015; CARDUCCI et al, 2019). These elements can contribute to the understanding of the organization and maintenance of the genomic structure and also serve as auxiliary tools in the studies of the genetic evolution of organisms (SHAO, F. et al, 2019).</p>
        </div>
        <div>
            <img src="./IMG/diagrama.png" alt="Diagram">
        </div>
        <div>
            <h2 class="font-b-s color-c08">Classification of TE's</h2>
            <p class="font-m-m color-b01">For the classification of TEs, we selected genome and transcriptome sequences from fish species available in public databases (Ensembl, NCBI, and CNGB) and applied three strategies, all demonstrated in the Flowchart: annotation in transcript data via the TERL tool (CRUZ, M. H. et al, 2020, v.1); annotation via genomes of fish representing the entire population analyzed via RepeatModeler2 (HUBLEY, R. et al, 2019, v.2.0.4) and EDTA (OU, S. et al, 2019, v. 1.9.6); and via public data from the literature. Then, using cdhit, we removed the redundancy of these elements, these data served to construct a non-redundant library of TEs obtained in fish genomes, followed by large-scale analysis via the RepeatMasker program (SMIT, A., et al, 2022, v. 4.1.4). Finally, as a result, a database of transposable elements occurring in genomes of fish species will be presented.</p>
        </div>
    </section>
</body>

</html>