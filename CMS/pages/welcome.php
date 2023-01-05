<?php 
    session_start();
    $id_role = $_SESSION["id_role"];
    $username = $_SESSION["username"];
    $page = "";
    if($id_role == 1){
        $role = "Admin";
        $page = "<a href='./roles/admin.php'>Começar a trabalhar</a>";
    }elseif($id_role == 2){
        $role = "Manager";
        $page = "<a href='./roles/manager.php'>Começar a trabalhar</a>";
    }
?>
<!DOCTYPE html>
<html>
<body>
<h1> Hello <?php echo $username ?></h1>
<h3> Role: <?php echo $role ?></h1>
<p>Bem Vindo!!!</p>
<p><?php echo $page; ?></p>
<p><a href="../auth/logout.php">Logout</a></p>
</body>
</html>