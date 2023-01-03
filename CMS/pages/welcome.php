<?php 
    session_start();
    $id_role = $_SESSION["id_role"];
    $username = $_SESSION["username"];
    if($id_role == 1){
        $role = "Admin";

    }elseif($id_role == 2){
        $role = "Manager";
    }
?>
    <!DOCTYPE html>
<html>
<body>
<h1> Hello <?php echo $username ?></h1>
<h3> Role: <?php echo $role ?></h1>
<p>My first paragraph.</p>
<a href="../auth/logout.php">Logout</a>
</body>
</html>