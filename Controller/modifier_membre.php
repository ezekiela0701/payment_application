<!DOCTYPE html>
<html>
<head>
	<title>modifier membre</title>
</head>
<body>

<?php 
	session_start();
	$_SESSION['position']=$_GET['click'];
	header('Location:modification_membre.php');
?>
</body>
</html>