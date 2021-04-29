<?php 
  include("../Models/connexionbase.php");
  session_start();
   if(!isset($_SESSION['username']))
    {
        header('Location:../index.php');
    } 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <title>Caisse d'epargne de madagascar</title>
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
        <a href="#" class="logo"><b>Caisse </b>d'épargne</a>

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


<?php 
  $valeur=$base->QUERY('SELECT * FROM membre where id="'.$_SESSION['position'].'" ');
  if($donne=$valeur->fetch())
  {
   
          
?>
<form action="prendre_conge.php" method="POST">
	

  <div class="row">
    <div class="col-md-12">
              <!-- Danger box -->
      <div class="box box-solid box-warning">
        <div class="box-header">
          <h3 class="box-title">Information sur le jour de congée</h3>
            
        </div>
      <div class="box-body">
        <div class="row">

          <div class="col-md-6">

            <div class="input-group">
              <span class="input-group-addon">Nom : </span> <input type="text" class="form-control" name="nom" value=" <?php echo $donne['nom'] ?> " disabled="true" required>
            </div>
            <br>
            <div class="input-group">
              <span class="input-group-addon">Prénom : </span> <input type="text" class="form-control" name="nom" value=" <?php echo $donne['prenom']; ?> " disabled="true" required>
            </div>
            <br>
            <div class="input-group">
              <span class="input-group-addon">Jour de congé disponnible : </span> <input type="text" class="form-control" name="nom" value=" <?php
              $i=1;
              
              echo $donne['jour_conge'] ?> " disabled="true" required>
              
            </div>
            <br>
            <div class="input-group">
              <span class="input-group-addon">Jour de congé déjà pris : </span> <input type="text" class="form-control" name="nom" value=" 
                <?php

                $pris=30-$donne['jour_conge'];
                
                echo $pris;

                ?> " disabled=true required>
            </div>
            <br>
            <div class="input-group">
              <span class="input-group-addon">Allocation congé : </span> <input type="text" class="form-control" name="nom" value=" <?php 

                $allocation=($donne['salaire']/24)*$donne['jour_conge'];
                echo $allocation ;

              ?> " disabled="true" required>
            </div>

          </div>
          <br>

          <div class="col-md-6">
            <?php 

              if($donne['jour_conge']>0)
              {
            ?>
              <div class="input-group">
                <span class="input-group-addon">Jour de congé à prendre : </span> <input type="text" class="form-control" name="jour_conge_prendre" required>
              </div>
              <br>
              <input type="submit" value="Valider" class="btn btn-success btn-block" name="">
            <?php    
              }
              else
              {
            ?>
              

          
              
             
                <div class="small-box bg-red">
                  <div class="inner">
                    
                    <p>
                      Vous avez atteint le nombre maximum de jour de congée
                    </p>
                  </div>
                  
                </div>
            



            <?php    
              }

             ?>
             


          </div>


        </div>
          
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div>
  </div>
		
		
		

</form>
<?php 
}

	
		if(isset($_POST['jour_conge_prendre'])&&($_POST['jour_conge_prendre'])<31)
		{
		  $jourconge=$donne['jour_conge']-$_POST['jour_conge_prendre'];	
			$mise_a_jour=$base->exec('UPDATE membre set jour_conge="'.$jourconge.'" WHERE id="'.$_SESSION['position'].'"');

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