<?php 
  require_once("classes/classes.php");


 if(isset($_POST['adicionar_arquivo']))
  {

    $cliente = $_POST['codigo_cliente'];
    $ul = $_POST['ul'];

// A list of permitted file extensions
$allowed = array('png', 'jpg', 'gif','zip', 'pdf');

$pasta = '../area_do_cliente/arquivos/';

if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){

    // O nome original do arquivo no computador do usuário
    $arqName = $_FILES['upl']['name'];
  
    // O tipo mime do arquivo. Um exemplo pode ser "image/gif"
    $arqType = $_FILES['upl']['type'];
      
    // O nome temporário do arquivo, como foi guardado no servidor
    $arqTemp = $_FILES['upl']['tmp_name'];

    $icode = substr(time().rand(10000,99999),-15);
    //$img        = $icode.'IMG.JPG';
    //$mini       = $icode.'TMB.JPG';
    $targetPath = $pasta;
    //$targetPathmini = $targetPath . '/miniaturas/';
    $targetFile =  str_replace('//','/',$targetPath) . $arqName;
    //$targetFilemini =  str_replace('//','/',$targetPath) . $mini;



  $extension = pathinfo($arqName, PATHINFO_EXTENSION);

  if(!in_array(strtolower($extension), $allowed)){
    echo '{"status":"error"}';
    exit;
  }

  $upload = move_uploaded_file($arqTemp, $targetFile);

  if($upload == true){

    $banners->cadastro($titulo,$status,$target,$ul,$img);

    echo "<script language='JavaScript'> window.location='banners.php'; </script>";
    exit;
  }
}

echo '{"status":"error"}';
exit;

  }

  if(isset($_GET['erro']))
  {
    ?>
      <div class="container">
    <div class="alert alert-warning">
      <strong>ERRO!</strong> Os dados não foram salvos!
    </div>
    </div>
      <?php
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
    <meta name="description" content="Sistema de Gerencimento Medeiros & Associados"/>
    <meta name="keywords" content="Tekon"/>

    <title><?PHP echo "$sgc"; ?></title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">

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
                <h3>Enviar Arquivo para Cliente</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <br />
                    <form id="" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">

                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                          <label class="control-label" for="Nome">Nome: </label>
                          <?php echo $nome; ?>
                        </div>
                      </div>
                        
                      
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <input class="form-control" type="file"  name="upl" id="upl" />
                        </div>
                      </div>
                      

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-2 col-sm-2 col-xs-12 col-md-offset-10">
                          <button type="submit" class="btn btn-success">ENVIAR</button>
                          <input type=hidden name='codigo_cliente' value='<?php echo $codigo; ?>'>
                          <input type=hidden name='adicionar_arquivo' value='true'>
                        </div>
                      </div>

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
    
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
  </body>
</html>
