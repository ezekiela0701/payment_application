
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" /> -->
    <!-- Ionicons -->
    <!-- <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" /> -->
    <!-- DATA TABLES -->
    <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <!-- <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" /> -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
    	#action
    	{
    		min-width: 13vw;
    	}
    </style>
  </head>
        
                  <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
         

        
        <section class="contenit">
          <div class="row">
            <div class="col-xs-12">
              

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Liste des employé(e)s</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Poste</th>
                        <th>Salaire Moyenne Mensuel</th>
                        <th>Nombre de jour de congée</th>
                        <th id="action">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
						$i=0;
							$tirer=$base->QUERY('SELECT * from membre');
							while($donne=$tirer->fetch())
							{
								$tab[$i]=$donne['id'];
					?>
                      <tr>
                        <td><?php echo $donne['nom']; ?></td>
                        <td><?php echo $donne['prenom']; ?></td>
                        <td><?php echo $donne['poste']; ?></td>
                        <td><?php echo $donne['salaire']; ?></td>
                        <td>
                        	<?php 

                        		echo $donne['jour_conge'];

                        	 ?>
                        </td>
                        <td>
                        	<a href="prendree_conge.php?click=<?php echo $donne['id'] ?>" class="btn btn-warning"><span class="glyphicon glyphicon-transfer"></span></a>

							<a href="modifier_membre.php?click=<?php echo $donne['id'] ?>" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span></a>

							<a href="supprimer_membre.php?click=<?php echo $donne['id']; ?>" class="btn btn-danger" OnClick="return confirm('Voulez-vous vraiment supprimer ?')"><span class="glyphicon glyphicon-trash"></span></a>
							
                        </td>
                      </tr>

                    <?php

						}
					?>
                      
                    </tbody>
                  
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
     
    
   

    <!-- jQuery 2.1.3 -->
    <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- DATA TABES SCRIPT -->
    <script src="plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    <!-- SlimScroll -->
    <!-- <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script> -->
    <!-- FastClick -->
    <!-- <script src='plugins/fastclick/fastclick.min.js'></script> -->
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js" type="text/javascript"></script>
    <!-- page script -->
    <script type="text/javascript">
      $(function () {
        $("#example1").dataTable();
       
      });
    </script>

 
</html>
