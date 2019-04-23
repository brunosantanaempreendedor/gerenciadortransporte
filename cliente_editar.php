<?php 
  require_once("classes/classes.php");


  if(isset($_GET['id']))
  {
    $id = $_GET['id'];
    extract($clientes->getID($id)); 
  }

  if(isset($_POST['editar_cliente']))
    {
      $data_atual   = date('Y-m-d H:i');
      $time         = time();
      $codigo       = substr(time().rand(10000,99999),-15);
      $c_id         = $_POST['id'];
      $nome         = $_POST['nome'];
      $cnpj         = $_POST['cnpj'];
      $telefone     = $_POST['telefone'];
      $contato      = $_POST['contato'];
      
        if($clientes->editar($c_id,$nome,$cnpj,$telefone,$contato))
        {
          header("Location: clientes.php");
        }
        else
        {
          header("Location: cliente_adicionar.php?erro");
        }
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
                <h3>Editar Cliente</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <br />
                    <form id="" data-parsley-validate class="form-horizontal form-label-left" method="post">

                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                          <label class="control-label" for="Nome">Nome <span class="required">*</span>
                          </label>
                          <input type="text" required="required" class="form-control col-md-7 col-xs-12" name='nome' id="nome" value="<?php echo $nome; ?>" >
                        </div>
                      </div>
                        
                      
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="cnpj">CNPJ <span class="required">*</span>
                            </label>
                            <input type="text" required="required" class="form-control col-md-7 col-xs-12" name='cnpj' id="cnpj" value="<?php echo $cnpj; ?>" >
                        </div>
                      </div>
                        
                      
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="telefone">Telefone <span class="required">*</span>
                            </label>
                            <input type="text" required="required" class="form-control col-md-7 col-xs-12" name='telefone' id="telefone" value="<?php echo $telefone; ?>" >
                        </div>
                      </div>
                        
                      
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="contato">Contato <span class="required">*</span>
                            </label>
                            <input type="text" required="required" class="form-control col-md-7 col-xs-12" name='contato' id="contato" value="<?php echo $contato; ?>" >
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-2 col-sm-2 col-xs-12 col-md-offset-10">
                          <button type="submit" class="btn btn-success">ATUALIZAR</button>
                          <input type=hidden name='id' value='<?php echo $id; ?>'>
                          <input type=hidden name='editar_cliente' value='true'>
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
