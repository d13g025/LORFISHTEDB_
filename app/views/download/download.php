<?php

use app\services\Database;
require '../app/services/Database.php';

$list = Database::getInstance()->getSearchAll();

var_dump($list);



?>

<div>
    <table  class="table table-striped">
        <thead>
            <tr>
                <th >scientific_name</th>
            </tr>
        </thead>
        <tbody >
            <?php foreach ($list as $row) : ?>
                <tr>
                    <td>
                    <?php echo htmlspecialchars($row['scientific_name']); ?>
                    </td>
                    <td><button type="submit">GFF</button></td>
                    <td><button type="submit">FASTA</button></td> 
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>