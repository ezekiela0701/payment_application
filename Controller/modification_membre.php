<?php 
  include("../Models/connexionbase.php");
  session_start();
   if(!isset($_SESSION['username']))
    {
        header('Location:i../ndex.php');
    } 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <title>Gestion congé</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- <link href="../bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />     -->
    <!-- FontAwesome 4.3.0 -->
    <link href="../https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
     <link href="../plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
     
    <link href="../http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
    <!-- Theme style -->
    <link href="../dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="../dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="../plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="../plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="../plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="../plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body>

	 <body class="skin-red">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo"><b>Gestion </b>congé</a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
         


        </nav>




      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">

         
           
            <li class="treeview">
              <a href="principale.php?page=ajout">
                <span class="glyphicon glyphicon-list"></span>
                  Ajout Employé(e)
                
              </a>
              
            </li>

            <li >
              <a href="principale.php?page=liste">

                
                 <span class="glyphicon glyphicon-list"></span>
                Liste des employées
                
              </a>
              
            </li>


            <li class="">
              <a href="deconnexion.php">
              <span class="glyphicon glyphicon-log-out"></span>Deconnexion
              </a>

            </li>
           
          
         
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
         
          <?php
            if(isset($_GET['page']))
            {
              if($_GET['page']=="ajout")
              {
                include("ajout.php");
              }
              if($_GET['page']=="liste")
              {
                include("liste.php");
              }
            }
            
          ?>






          <section class="content-header">
    <h1>
    	Modification employé
    </h1>
    <br>
          
</section>
<?php 
	$valeur=$base->QUERY('SELECT * FROM membre where id="'.$_SESSION['position'].'" ');
	if($donne=$valeur->fetch())
	{
					
?>
<form action="modification_membre.php" method="POST">
	<div class="row">
		<div class="col-md-6">
			<div class="input-group">
				<span class="input-group-addon">Nom : </span> <input type="text" class="form-control" name="nom" value=" <?php echo $donne['nom'] ?> " required>
			</div>
			<br>
			<div class="input-group">
				<span class="input-group-addon">Prénom : </span> <input type="text" class="form-control" name="prenom" value=" <?php echo $donne['prenom'] ?> " required>
			</div>
			

		</div>

		
		<div class="col-md-6">
			<div class="input-group">
				<span class="input-group-addon">Poste occupé</span> <input type="text" class="form-control" name="poste_occupe" value=" <?php echo $donne['poste'] ?> " required>
			</div>
			<br>
			<div class="input-group">
				<span class="input-group-addon">Salaire mensuel (net)</span> <input type="text" class="form-control" name="salaire" value=" <?php echo$donne['salaire']?> " required>
			</div>
			
		</div>
    <div class="col-md-6">
        <br>
        <input type="submit" value="Modifier" class="btn btn-primary btn-block" name="">
    </div>
    <div class="col-md-6">
        <br>
        <input type="reset" value="Annuler" class="btn btn-danger btn-block" name="">
    </div>
		
		
	</div>

		
		
		

</form>
<?php 
}
	// include('connexionbase.php');
	
		if(isset($_POST['nom'])&&isset($_POST['prenom'])&&isset($_POST['poste_occupe'])&&isset($_POST['salaire']))
		{
			
			$mise_a_jour=$base->exec('UPDATE membre set nom="'.$_POST['nom'].'",prenom="'.$_POST['prenom'].'",poste="'.$_POST['poste_occupe'].'",salaire="'.$_POST['salaire'].'" WHERE id="'.$_SESSION['position'].'"');

				header("Location:principale.php?page=liste");
			
		}
	
	
	


 ?>








         
        </section>
           
   

             
   
    </div><!-- ./wrapper -->
	



   <!-- jQuery 2.1.3 -->
    <script src="../plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- jQuery UI 1.11.2 -->
    <script src="../http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    
    <!-- Morris.js charts -->
    <script src="../http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="../plugins/morris/morris.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="../plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="../plugins/knob/jquery.knob.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="../plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="../plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="../plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='../plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js" type="text/javascript"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../dist/js/pages/dashboard.js" type="text/javascript"></script>

    <script src="../plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js" type="text/javascript"></script>

</body>
</html>