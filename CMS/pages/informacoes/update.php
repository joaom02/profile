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
        $texto = isset($_POST['texto']) ? $_POST['texto'] : '';

        // Update the record
        $stmt = $pdo->prepare('UPDATE informacoes SET id = ?, texto = ? WHERE id = ?');
        $stmt->execute([$id, $texto, $_GET['id']]);
        $msg = 'Updated Successfully!';
    }
    // Get the language from the languages table
    $stmt = $pdo->prepare('SELECT * FROM informacoes WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $informacao = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$informacao) {
        exit('Informação doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
}
?>

<?=template_header('Read')?>

<div class="content update">
	<h2>Update Informação #<?=$informacao['id']?></h2>
    <form action="update.php?id=<?=$informacao['id']?>" method="post">
        <label for="id">ID</label>        
        <input type="text" name="id" placeholder="1" value="<?=$informacao['id']?>" id="id">
        <label for="texto">Texto</label>
        <input type="text" name="texto" placeholder="Texto" value="<?=$informacao['texto']?>" id="texto">
        <input type="submit" value="Update">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>