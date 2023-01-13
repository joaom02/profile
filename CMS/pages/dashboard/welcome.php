<?php 
    require "../../utils/functions.php";
    $id_role = $_SESSION["id_role"];
    $username = $_SESSION["username"];
    $page = "";
    if($id_role == 1){
        $role = "Admin";
        $page = '<div>
        <p><a href="../languages/read.php">Editar Linguagens</a></p>
        <p><a href="../skills/read.php">Editar Skills</a></p>
        <p><a href="../informacoes/read.php">Editar Informações</a></p>
        <p><a href="../contato/read.php">Editar Contatos</a></p>
        <p><a href="../form/read.php">Ler Mensagens</a></p>
        <p><a href="../../utils/conta.php">Calcular Salário</a></p>
    </div>';
    }elseif($id_role == 2){
        $role = "Manager";
        $page = "<a href='../form/read.php'>Começar a trabalhar</a>";
    }
?>
<!DOCTYPE html>
<html>
<body>
<?=template_header('Welcome')?>
<p><?php echo $page; ?></p>
<?=template_footer()?>
</body>
</html>