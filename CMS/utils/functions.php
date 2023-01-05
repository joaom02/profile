<?php

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../../auth/login.php");
    exit;
}

function template_header($title) {
	$username  = $_SESSION["username"];
	$id_role  = $_SESSION["id_role"];

if($id_role == 1){
	echo <<<EOT
	<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8">
			<title>My CMS</title>
			<link href="/sir-crud/style.css" rel="stylesheet" type="text/css">
		</head>
		<body>
		<nav class="navtop">
			<div>
				<h1>Hello $username</h1>
				<p><a href="../roles/admin.php">Return to Admin Page</a></p>
				<p><a href="../../auth/logout.php">Logout</a></p>
			</div>
		</nav>
	EOT;
}
elseif($id_role == 2){
	echo <<<EOT
	<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8">
			<title>My CMS</title>
			<link href="/sir-crud/style.css" rel="stylesheet" type="text/css">
		</head>
		<body>
		<nav class="navtop">
			<div>
				<h1>Hello $username</h1>
				<p><a href="../roles/manager.php">Return to Manager Page</a></p>
				<p><a href="../../auth/logout.php">Logout</a></p>
			</div>
		</nav>
	EOT;
	}
}
function template_footer() {
echo <<<EOT
    </body>
</html>
EOT;
}
?>