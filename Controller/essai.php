<form action="essai.php" method="POST"> 
	<input type="submit" value="envoyer" name="">
</form>
<?php 

	include('connexionbase.php');

		
	
		$ajout=$base->QUERY('INSERT INTO fotoana(daty) VALUES(Now()) ');


		$tirer=$base->QUERY('SELECT * from fotoana');
							while($donne=$tirer->fetch())
			{
				$var= date('Y',strtotime($donne['daty']))."br";
				// echo $var;		
			}
			$dt=new DateTime();
			echo $dt->format('Y');
 ?>