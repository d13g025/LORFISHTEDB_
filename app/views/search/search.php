<?php

use app\services\Database;

require '../app/services/Database.php';

$search = Database::getInstance();
$results = $search->getSearchAll();

$resultSearch = [];

if (isset($_GET['select_name'])) {
    $resultSearch = $search->getSearch($_GET['select_name']);
}

$countSearchSF = $search->countSearchSF($_GET['select_name']);

?>

<h1>Search Results</h1>

<!-- Formulário de busca -->
<form action="/search" method="GET">
    <label for="select_name">Select a species:</label>
    <select name="select_name" id="select_name">
        <?php foreach ($results as $result) : ?>
            <option value="<?php echo htmlspecialchars($result['scientific_name']); ?>">
                <?php echo htmlspecialchars($result['scientific_name']); ?>
            </option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Search</button>
</form>

<!-- Resultados da busca -->
<?php if (!empty($resultSearch)) : ?>

    <ul>
    <?php foreach ($resultSearch as $result) : ?>
        <li>
            <?php foreach ($result as $key => $value) : ?>
                <strong><?php echo htmlspecialchars($key); ?>:</strong> <?php echo htmlspecialchars($value); ?><br>
            <?php endforeach; ?>
        </li>
    <?php endforeach; ?>
    </ul>
<?php else : ?>
    <p>No results found.</p>
<?php endif; ?>

<?php
if (!empty($countSearchSF)) {
    echo "<h2>Count by superfamily</h2>";
    echo "<ul>";
    foreach ($countSearchSF as $count) {
        echo "<li>";
        echo "<strong>" . htmlspecialchars($count['superfamily_name']) . "</strong>: " . htmlspecialchars($count['count']) . "<br>";
        echo "</li>";
    }
    echo "</ul>";
}