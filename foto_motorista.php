<?php 
  require_once("classes/classes.php");

  if(isset($_GET['a']))
  {
    $id = $_GET['a'];
    $listAssc = $motoristas->getID($id); 
  }

 ?>
 <!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Tekon Tecnologia Integrada"/>
    <link rel="shortcut icon" href="images/favicon.ico">
    <meta name="description" content="Sistema Administrativo CSIJ"/>
    <meta name="keywords" content="Tekon"/>

    <title><?PHP echo "$sgc"; ?></title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Dropzone.js -->
    <link href="vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
    <link href="build/css/estilo.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">

        <!-- =================== MENU ESQUERDO ==================== -->

        <?php include('menu_left.php');?>

        <!-- =================== FIM MENU ESQUERDO ==================== -->

        <!-- top navigation -->
        <?php include('menu_topo.php'); ?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Alterar Foto do Motorista</h3>
              </div>

            </div>
            <div class="clearfix"></div>

            <div class="row">
              
              <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                    <div class="clearfix"></div>
                  
                  <div class="x_content">
                    <h3><?php echo $listAssc->nome; ?></h3>
                    <div class="row">
                    <div class="col-md-10">
                    <h4>Arraste a foto para a caixa abaixo ou clique para selecionar.</h4>
                    </div>
                    <div class="col-md-2">
                          <span>
                               <a href="motorista_perfil.php?id=<?php echo $listAssc->id; ?>" class="btn btn-success"><i class="fa fa-angle-double-left"></i> VOLTAR</a>
                          </span>
                    </div>
                    </div>

                    <form class="dropzone" method="post" action="upload_motorista.php" enctype="multipart/form-data">
                    <input type=hidden name='codigo' value='<?php echo $listAssc->id; ?>'>

                    </form>
                  </div>
                </div>
              </div>


            </div>
            
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
       <?php include('rodape.php'); ?>
        <!-- /footer content -->
      </div>
    </div>


    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- Dropzone.js -->
    <script src="vendors/dropzone/dist/min/dropzone.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
  </body>
</html>
