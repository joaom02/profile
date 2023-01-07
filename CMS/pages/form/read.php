<?php
require "../../utils/functions.php";
require "../../db/connection.php";

// Connect to MySQL database
$pdo = pdo_connect_mysql();
// Get the page via GET request (URL param: page), if non exists default the page to 1
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
// Number of records to show on each page
$records_per_page = 20;

// Prepare the SQL statement and get records from our languages table, LIMIT will determine the page
$stmt = $pdo->prepare('SELECT * FROM form ORDER BY id LIMIT :current_page, :record_per_page');
$stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
// Fetch the records so we can display them in our template.
$forms = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get the total number of languages, this is so we can determine whether there should be a next and previous button
$num_forms = $pdo->query('SELECT COUNT(*) FROM languages')->fetchColumn();
?>

<?=template_header('Read')?>

<div class="content read">
	<h2>Messages</h2>
	<table>
        <thead>
            <tr>
                <td>#</td>
                <td>Email</td>
                <td>Subject</td>
                <td>Text</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($forms as $form): ?>
            <tr>
                <td><?=$form['id']?></td>
                <td><?=$form['email']?></td>
                <td><?=$form['subject']?></td>
                <td><?=$form['text']?></td>
                <td class="actions">
                    <a href="delete.php?id=<?=$form['id']?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
	<div class="pagination">
		<?php if ($page > 1): ?>
		<a href="read.php?page=<?=$page-1?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
		<?php endif; ?>
		<?php if ($page*$records_per_page < $num_forms): ?>
		<a href="read.php?page=<?=$page+1?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
		<?php endif; ?>
	</div>
</div>

<?=template_footer()?>