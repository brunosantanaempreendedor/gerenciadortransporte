<?php 
  require_once("classes/classes.php");

  if(isset($_POST['alterar_senha']))
    {
      $codigo         = $_POST['codigo'];
      $senha          = $_POST['senha'];
      
        if($quem->resetar($senha,$codigo))
        {
          echo "<script language='JavaScript'> alert('Senha alterada com sucesso!'); </script>";
        } else { 
          echo "<script language='JavaScript'> alert('Ocorreu um erro ao tentar alterar a Senha!'); </script>"; 
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include('includes/metas.php');?>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
    <link href="estilo/estilo.css" rel="stylesheet">

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
              

            
            </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Alterar Senha</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

                        <div class="row alterar_senha">
                         
                             <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 col-md-offset-2 ">
                              
                                <form class="form-horizontal" action=" " method="post"  id="reg_form">

                                   
                                              <div class="form-group has-feedback">
                                                    <label for="senha"  class="control-label">
                                                            Senha
                                                        </label>
                                                        <div class="inputGroupContainer">
                                                        <div class="input-group"> <span class="input-group-addon"><i class="fa fa-unlock"></i></span>
                                                    <input class="form-control" id="userPw" type="password"
                                                               name="senha" data-minLength="5"
                                                               data-error="some error"
                                                               required/>
                                                        <span class="glyphicon form-control-feedback"></span>
                                                        <span class="help-block with-errors"></span>
                                                        </div>
                                                     </div>
                                                </div>
                                          
                                           
                                            
                                           
                                              <div class="form-group has-feedback">
                                                  <label for="confirmaSenha"  class="control-label">
                                                         Confirmar Senha
                                                      </label>
                                                       <div class="inputGroupContainer">
                                                      <div class="input-group"> <span class="input-group-addon"><i class="fa fa-unlock"></i></span>
                                                  <input class="form-control {$borderColor}" id="userPw2" type="password"
                                                             name="confirmaSenha" data-match="#confirmaSenha" data-minLength="5"
                                                             data-match-error="some error 2"
                                                             required/>
                                                      <span class="glyphicon form-control-feedback"></span>
                                                      <span class="help-block with-errors"></span>
                                                   </div>
                                                   </div>
                                              </div>
                                           

                                        <div class="col-md-2 col-md-offset-10">
                                          <div class="form-group">
                                            <button type="submit" class="btn btn-success" >ENVIAR <i class="fa fa-paper-plane-o"></i></button>
                                            <input type="hidden" name='alterar_senha' value='true'>
                                            <input type="hidden" name='codigo' value='<?php echo $logRow['user_codigo']; ?>'>
                                          </div>
                                        </div>
                                  </form>
                             
                                          
                              </div>


                        </div>
                     

                    </div>
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
    <!-- bootstrap-daterangepicker -->
    <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
    <script src='js/bootstrapvalidator.min.js'></script>
    
    <script src="js/validate2.js"></script>
   
  </body>
</html>
