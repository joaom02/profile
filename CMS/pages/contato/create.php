<?php
require "../../utils/functions.php";
require "../../db/connection.php";

$pdo = pdo_connect_mysql();
$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
    // Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables
    $contato = isset($_POST['contato']) ? $_POST['contato'] : '';
    // Insert new record into the languages table
    $stmt = $pdo->prepare('INSERT INTO contato VALUES (?, ?)');
    $stmt->execute([$id, $contato]);
    // Output message
    $msg = 'Created Successfully!';
}
?>

<?=template_header('Create')?>

<div class="content update">
	<h2>Create contato</h2>
    <form action="create.php" method="post">
        <label for="contato">Name</label>
        <input type="text" name="contato" placeholder="Contato" id="contato">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>