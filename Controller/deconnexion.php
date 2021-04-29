<!DOCTYPE html>
<html>
<head>
	<title>deconnexion</title>
</head>
<body>
<?php 
	session_start();
	session_destroy();
	header("Location:../index.php");
?>
</body>
</html>