<?php 
  require_once("classes/classes.php");

    if(isset($_GET['id']))
  {
    $id = $_GET['id'];
    extract($emails->getID($id)); 
  }

  if(isset($_POST['editar_email']))
    {
      $e_id         = $_POST['e_id'];
      $codigo       = $_POST['codigo'];
      $email        = $_POST['email'];
      
        if($emails->editar($e_id,$codigo,$email))
        {
          header("Location: emails.php");
        }
        else
        {
          header("Location: email_editar.php?erro");
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
                <h3>Editar E-mail</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
             
                </div>
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
                          <label class="control-label" for="Empresa">Empresa <span class="required">*</span>
                          </label>
                          <select name="codigo" id="codigo" class="form-control col-md-7 col-xs-12">
                            <option value="<?php echo $codigo; ?>">
                              <?php $empresa = $clientes->findCOD($codigo); echo $empresa->nome; ?>
                            </option>
                            <option value=""></option>
                             <?php foreach ($clientes->findAll() as $key => $value){ ?>
                            <option value="<?php echo $value->codigo;?>"><?php echo $value->nome;?></option>
                             <?php }  ?> 
                          </select>
                        </div>
                      </div>
                        
                      
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="cnpj">E-mail <span class="required">*</span>
                            </label>
                            <input type="text" required="required" class="form-control col-md-7 col-xs-12" name='email' id="email" value="<?php echo $email; ?>" >
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-xs-12 col-md-offset-8">
                          <button type="submit" class="btn btn-success">ATUALIZAR</button>
                          <input type=hidden name='editar_email' value='true'>
                          <input type=hidden name='e_id' value='<?php echo $id; ?>'>
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
