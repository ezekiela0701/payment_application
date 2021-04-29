<?php 
	try
	{
		$base=new PDO('mysql:host=localhost;dbname=cem;charset=utf8','root','');
	}
	catch(Exception $e)
	{
		die("Erreur".$e->getMessage());
	}
?>