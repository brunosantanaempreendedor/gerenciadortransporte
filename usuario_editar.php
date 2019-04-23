<?php 
  require_once("classes/classes.php");

  if(isset($_GET['id']))
  {
    $id = $_GET['id'];
    extract($quem->getID($id)); 
  }

  if(isset($_POST['editar_usuario']))
  {
    $u_id     = $_POST['user_id'];
    $nome     = $_POST['user_name'];
    $usuario  = $_POST['user_usuario'];
    $cargo    = $_POST['user_cargo'];
    $email    = $_POST['user_email'];
    $nivel    = $_POST['user_nivel'];
    
    if($quem->editar($u_id,$nome,$usuario,$cargo,$email,$nivel))
    {
      header("Location: usuarios.php");
    }
    else
    {
      header("Location: usuario_editar.php?erro");
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
                <h3>Editar Usuário</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Procurar por...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nome <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" required="required" class="form-control col-md-7 col-xs-12" name='user_name' id="user_name" value="<?php echo $user_name; ?>" >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Usuário <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name"  name='user_usuario' id="user_usuario" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $user_usuario; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Cargo</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  name='user_cargo' id="user_cargo" class="form-control col-md-7 col-xs-12" type="text" value='<?php echo $user_cargo; ?>'>
                        </div>
                      </div>


                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">E-mail <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  name='user_email' id="user_email" class="form-control col-md-7 col-xs-12" type="text" required="required" value='<?php echo $user_email; ?>'>
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nível</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php $nivel = $user_nivel; if ($nivel == 1) {$level = "Administrador";} else if ($nivel == 2) {$level = "Usuário";} ?>
                            <select name='user_nivel' class="form-control">
                            <option value='<?php echo $user_nivel; ?>'><?php echo $level; ?></option>
                            <option value='2'> Usuário </option>
                            <option value='1'> Administrador </option>
                            </select>
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success">ATUALIZAR</button>
                              <input type=hidden name='user_id' value='<?php echo $user_id; ?>'>
                              <input type=hidden name='editar_usuario' value='true'>
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
