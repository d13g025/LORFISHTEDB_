<?php

use app\services\Database;
use app\routes\Router;

Router::execute();

// Recupera os dados para o select
$searchAll = Database::getInstance()->getSearchAll();

// Função para obter dados do gráfico
function getChartData($name)
{
    $search = Database::getInstance()->countSearchSF($name);
    return $search;
}

$chartData = [];
$selectedFish = '';

if (isset($_GET['fish']) && !empty($_GET['fish'])) {
    $selectedFish = $_GET['fish'];
    $chartData = getChartData($selectedFish);
}
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
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var chartData = <?php echo json_encode($chartData); ?>;
            var dataArray = [
                ['Superfamily', 'Count']
            ];

            chartData.forEach(function(row) {
                dataArray.push([row.superfamily_name, parseInt(row.count)]);
            });

            var data = google.visualization.arrayToDataTable(dataArray);

            var options = {
                title: 'Count of Scientific Names by Superfamily',
                hAxis: {
                    title: 'Superfamily'
                },
                vAxis: {
                    title: 'Count'
                },
                legend: 'none'
            };

            var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }

        function updateChart() {
            var select = document.getElementById('fish_select');
            var selectedValue = select.value;

            if (selectedValue) {
                window.location.search = 'fish=' + encodeURIComponent(selectedValue);
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            var select = document.getElementById('fish_select');
            select.addEventListener('change', updateChart);

            // Trigger chart drawing if there's an initial selection
            if (select.value) {
                drawChart();
            }
        });
    </script>
</head>

<body>
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
                    <a class="font-m-ru color-w01" href="/search"><span class="nav-link font-m-ru color-w01">Search</span></a>
                </li>
                <li class="nav-list-item">
                    <a class="font-m-ru color-w01" href="/results"><span class="nav-link font-m-ru color-w01">Results</span></a>
                </li>
                <li class="nav-list-item">
                    <a class="active-page font-m-ru color-c05" href="/statistics"><span class="nav-link font-m-ru color-w01">Statistics</span></a>
                </li>
                <li class="nav-list-item">
                    <a class="font-m-ru color-w01" href="/team"><span class="nav-link font-m-ru color-w01">Team</span></a>
                </li>
            </ul>
        </nav>
        <div class="page-main-title font-m-r">
            <h1>Project Lorfish</h1>
        </div>
    </header>

    <main>
        <form class="search-form">
            <label for="fish_select">Select a Fish Species:</label>
            <select id="fish_select" name="fish">
                <option value="">Select...</option>
                <?php foreach ($searchAll as $row): ?>
                    <option value="<?php echo htmlspecialchars($row['scientific_name_fish']); ?>" <?php echo $row['scientific_name_fish'] === $selectedFish ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($row['scientific_name_fish']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <input type="submit">
        </form>
        <div id="chart_div" style="width: 900px; height: 500px;"></div>
    </main>

</body>

</html>