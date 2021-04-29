<section class="content-header">
    <h1>
    	Ajout de nouveau employé
    </h1>
    <br>
          
</section>

<form action="ajout.php" method="POST">
	<div class="row">
		<div class="col-md-6">
			<div class="input-group">
				<span class="input-group-addon">Nom : </span> <input type="text" class="form-control" name="nom" required>
			</div>
			<br>
			<div class="input-group">
				<span class="input-group-addon">Prénom : </span> <input type="text" class="form-control" name="prenom" required>
			</div>
						

		</div>

		
		<div class="col-md-6">
			<div class="input-group">
				<span class="input-group-addon">Poste occupé</span> <input type="text" class="form-control" name="poste_occupe" required>
			</div>
			<br>
			<div class="input-group">
				<span class="input-group-addon">Salaire mensuel (net)</span> <input type="number" class="form-control" name="salaire" required>
			</div>
			
		</div>
		<div class="col-md-6">
			<br>
			<input type="submit" value="Ajouter" class="btn btn-info btn-block" name="">	
		</div>
		<div class="col-md-6">
			<br>
			<input type="reset" value="Annuler" class="btn btn-danger btn-block" name="">	
		</div>
		
		
		
	</div>

		
		
		

</form>
<?php 
	include('../Models/connexionbase.php');
	
		if(isset($_POST['nom'])&&isset($_POST['prenom'])&&isset($_POST['poste_occupe'])&&isset($_POST['salaire']))
		{
			$jour_conge=30;
			
			$ajout=$base->PREPARE('INSERT INTO membre(nom,prenom,poste,salaire,jour_conge) VALUES(?,?,?,?,?) ');
			$ajout->execute(array(
				strtoupper($_POST['nom']),
				$_POST['prenom'],
				$_POST['poste_occupe'],
				$_POST['salaire'],
				$jour_conge
				

			));
			header('Location:principale.php?page=liste');
			
		}
	
	
	


 ?>
	
