<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php 
	session_start();
	$_SESSION['position']=$_GET['click'];
	header('Location:prendre_conge.php');
?>
</body>
</html>