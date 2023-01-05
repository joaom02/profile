<?php
require "../../db/connection.php";

// Connect to MySQL database
$pdo = pdo_connect_mysql();

// Prepare the SQL statement and get records from our languages table, LIMIT will determine the page
$stmt = $pdo->prepare('SELECT * FROM languages ORDER BY id');
$stmt->execute();
// Fetch the records so we can display them in our template.
$languages = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="content read">
	<table>
        <thead>
            <tr>
                <td>#</td>
                <td>Name</td>
                <td>Level</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($languages as $language): ?>
            <tr>
                <td><?=$language['id']?></td>
                <td><?=$language['name']?></td>
                <td><?=$language['level']?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>