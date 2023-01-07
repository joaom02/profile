<?php
require "../../utils/functions.php";
require "../../db/connection.php";

$pdo = pdo_connect_mysql();
$msg = '';
// Check if the language id exists, for example update.php?id=1 will get the language with the id of 1
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $contato = isset($_POST['contato']) ? $_POST['contato'] : '';

        // Update the record
        $stmt = $pdo->prepare('UPDATE contato SET id = ?, contato = ? WHERE id = ?');
        $stmt->execute([$id, $contato, $_GET['id']]);
        $msg = 'Updated Successfully!';
    }
    // Get the language from the languages table
    $stmt = $pdo->prepare('SELECT * FROM contato WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $contato = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contato) {
        exit('Contato doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
}
?>

<?=template_header('Read')?>

<div class="content update">
	<h2>Update language #<?=$contato['id']?></h2>
    <form action="update.php?id=<?=$contato['id']?>" method="post">
        <label for="id">ID</label>        
        <input type="text" name="id" placeholder="1" value="<?=$contato['id']?>" id="id">
        <label for="contato">Contato</label>
        <input type="text" name="contato" placeholder="Contato" value="<?=$contato['contato']?>" id="contato">
        <input type="submit" value="Update">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>