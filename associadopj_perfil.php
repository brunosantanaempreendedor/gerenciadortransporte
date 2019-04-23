<?php 
  require_once("classes/classes.php");

  if(isset($_GET['id']))
  {
    $id = $_GET['id'];
    $listAssc = $associados->getID($id); 
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
    <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
    <link href="build/css/estilo.css" rel="stylesheet">

    <!-- CSS para impressão -->
    <link rel="stylesheet" type="text/css" href="build/css/print.css" media="print" />
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
                <h3>Perfil do Associado PJ</h3>
              </div>

              <div class="title_right">
             
              </div>
            </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="col-md-3 col-md-offset-9 no-print">
                        <span>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-placement="top" title="Voltar" onClick="window.location='associados.php';"> <i class="fa fa-arrow-left"></i> VOLTAR
                            </button>

                             <button class="btn btn-warning"  onclick="window.print();">IMPRIMIR</button>
                        </span>
                  </div>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <h3><?php echo $listAssc->razao_social; ?></h3>

                      <ul class="list-unstyled user_data">

                        <li>
                          <i class="fa fa-envelope-o user-profile-icon"></i> <?php echo $listAssc->email; ?>
                        </li>

                        <li class="m-top-xs">
                          <i class="fa fa-phone-square user-profile-icon"></i>
                          <?php echo $listAssc->telefone; ?>
                        </li>

                        <li class="m-top-xs">
                          <i class="fa fa-mobile user-profile-icon"></i>
                          <?php echo $listAssc->celular1; ?>
                          
                        </li>
                          <?php if ($listAssc->celular2) { ?>
                        <li class="m-top-xs">
                          <i class="fa fa-mobile user-profile-icon" aria-hidden="true"></i>
                          <?php echo $listAssc->celular2; ?>
                        </li>
                        <?php } else {} ?>

                      </ul>
                      <br />

                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">

                    <!-- =========== DADOS PESSOAIS ====== -->
                      
                      <div class="profile_title">
                        <div class="col-md-6">
                          <ul>
                            <li><i class="fa fa-angle-double-right"></i> <b>Nr. Associado:</b> <?php echo $listAssc->nr_associado; ?></li>
                            <li><i class="fa fa-angle-double-right"></i> <b>Rua:</b> <?php echo $listAssc->rua; ?></li>

                            <li><i class="fa fa-angle-double-right"></i> <b>Bairro:</b> <?php echo $listAssc->bairro; ?></li>

                            <li><i class="fa fa-angle-double-right"></i> <b>CEP:</b> <?php echo $listAssc->cep; ?></li>
                            
                          </ul>
                          
                        </div>
                        <div class="col-md-6">
                          <ul>


                            <li><i class="fa fa-angle-double-right"></i> <b>Nº:</b> <?php echo $listAssc->numero; ?></li>

                            <li><i class="fa fa-angle-double-right"></i> <b>Cidade:</b> <?php echo $listAssc->cidade; ?></li>

                            <li><i class="fa fa-angle-double-right"></i> <b>UF:</b> <?php echo $listAssc->uf; ?></li>

                            
                          </ul>
                          
                        </div>
                      </div>

                    <!-- =========== DOCUMENTOS ====== -->
                      
                      <div class="profile_title">
                        <div class="col-md-6">
                          <ul>
                            <li><i class="fa fa-angle-double-right"></i> <b>CNPJ:</b> <?php echo $listAssc->cnpj; ?></li>
                            <li><i class="fa fa-angle-double-right"></i> <b>IE:</b> <?php echo $listAssc->ie; ?></li>
                            
                          </ul>
                          
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
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="vendors/starrr/dist/starrr.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
  </body>
</html>
