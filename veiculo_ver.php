<?php 
  require_once("classes/classes.php");

  if(isset($_GET['id']))
  {
    $id = $_GET['id'];
    $listAssc = $veiculos->getID($id); 
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
                <h3>Veículo</h3>
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
                            <button type="button" class="btn btn-success" data-toggle="modal" data-placement="top" title="Voltar" onClick="window.location='veiculos.php';"> <i class="fa fa-arrow-left"></i> VOLTAR
                            </button>

                             <button class="btn btn-warning"  onclick="window.print();">IMPRIMIR</button>
                        </span>
                  </div>
                  <div class="x_content">
                    <div class="col-md-9 col-sm-9 col-xs-12">

                    <!-- =========== DADOS PESSOAIS ====== -->
                      
                      <div class="profile_title">
                        <div class="col-md-6">
                          <ul>
                            <li><i class="fa fa-angle-double-right"></i>
                              <b>Associado:</b>
                              <?php
                              $AssId    = $listAssc->nr_associado;
                              $partner  = $associados->findID($AssId);
                              if (!$partner->nome == 0) {
                                echo $partner->nome;
                              } else {
                                echo $partner->razao_social;
                              } 
                              ?>
                            </li>

                            <li><i class="fa fa-angle-double-right"></i> <b>Prefixo:</b> <?php echo $listAssc->prefixo; ?></li>

                            <li><i class="fa fa-angle-double-right"></i> <b>Placa:</b> <?php echo $listAssc->placa; ?></li>

                            <li><i class="fa fa-angle-double-right"></i> <b>Marca:</b> <?php echo $listAssc->marca; ?></li>

                            <li><i class="fa fa-angle-double-right"></i> <b>Modelo:</b> <?php echo $listAssc->modelo; ?></li>

                            <li><i class="fa fa-angle-double-right"></i> <b>Renavam:</b> <?php echo $listAssc->renavam; ?></li>

                            <li><i class="fa fa-angle-double-right"></i> <b>Chassi:</b> <?php echo $listAssc->chassi; ?></li>

                            <li><i class="fa fa-angle-double-right"></i> <b>Cap:</b> <?php echo $listAssc->cap; ?></li>
                            
                          </ul>
                          
                        </div>
                        <div class="col-md-6">
                          <ul>

                            <li><i class="fa fa-angle-double-right"></i> <b>Cor:</b> <?php echo $listAssc->cor; ?></li>


                            <li><i class="fa fa-angle-double-right"></i> <b>Ano Fab:</b> <?php echo $listAssc->ano_fab; ?></li>

                            <li><i class="fa fa-angle-double-right"></i> <b>Ano Mod:</b> <?php echo $listAssc->ano_mod; ?></li>

                            <li><i class="fa fa-angle-double-right"></i> <b>CRM:</b> <?php echo date('d/m/Y', strtotime($listAssc->crm)); ?></li>

                            <li><i class="fa fa-angle-double-right"></i> <b>Alvará:</b> <?php echo date('d/m/Y', strtotime($listAssc->alvara)); ?></li>

                            <li><i class="fa fa-angle-double-right"></i> <b>Autorização:</b> <?php echo date('d/m/Y', strtotime($listAssc->autorizacao)); ?></li>

                            <li><i class="fa fa-angle-double-right"></i> <b>Tacógrafo:</b> <?php echo date('d/m/Y', strtotime($listAssc->tacografo)); ?></li>

                            <li><i class="fa fa-angle-double-right"></i> <b>Inmetro:</b> <?php echo $listAssc->inmetro; ?></li>

                            <li><i class="fa fa-angle-double-right"></i> <b>Proprietario:</b>
                              <?php
                              $proId    = $listAssc->proprietario;
                              $partner  = $associados->findProprietario($proId);
                              if (!$partner->nome == 0) {
                                echo $partner->nome;
                              } else {
                                echo $partner->razao_social;
                              } 
                              ?>
                            </li>

                            
                          </ul>
                          
                        </div>
                      </div>

                    <!-- =========== DOCUMENTOS ====== -->
              

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
