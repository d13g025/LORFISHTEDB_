<?php

use app\services\Pages;

require '../app/services/Database.php';
require '../app/services/Pages.php';
require '../vendor/autoload.php';


$pagesService = new Pages();

// Defina o número da página atual e o limite de registros por página
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 10;

// Obtenha o número total de páginas
$totalPages = $pagesService->getTotalPages($limit);

// Obtenha os registros da página atual
$records = $pagesService->getRecordsByPage($page, $limit);

?>

    <div class="container flex-grow-1">
        
        <h1>Dados da Tabela</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nome Científico do Peixe</th>
                    <th>ID do Genoma</th>
                    <th>Genoma do Peixe no NCBI</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($records as $row) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['scientific_name_fish']); ?></td>
                        <td><?php echo htmlspecialchars($row['id_genome']); ?></td>
                        <td><?php echo htmlspecialchars($row['genome_fish_ncbi']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Paginação -->
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                    <li class="page-item <?php if ($i == $page) echo 'active'; ?>">
                        <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>
    </div>

