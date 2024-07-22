<?php

use app\services\Database;
require '../app/services/Database.php';

$list = Database::getInstance()->getSearchAll();

var_dump($list);

?>

<div>
<form action="/result" method="post">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>scientific_name</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($list as $row) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['scientific_name']); ?></td>
                    <td>
                        <button type="submit" name="gff" value="<?php echo htmlspecialchars($row['scientific_name']); ?>">GFF</button>
                    </td>
                    <td>
                        <button type="submit" name="fasta" value="<?php echo htmlspecialchars($row['scientific_name']); ?>">FASTA</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</form>
</div>
