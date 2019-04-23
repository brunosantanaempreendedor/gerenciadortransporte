<?php 
  require_once("classes/classes.php");

if(isset($_POST['pesquisar_autorizacao']))
    {
      $dinicio    = str_replace("/", "-", $_POST["inicio"]);
      $inicio     = date('Y-m-d', strtotime($dinicio));
      $dfim       = str_replace("/", "-", $_POST["fim"]);
      $fim        = date('Y-m-d', strtotime($dfim));

      $entries    = $veiculos->findAutorizacao($inicio,$fim);

    } else {
      $mesAtual   = date("m");

      $entries    = $veiculos->findAllAutorizacao();
    
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
    <meta name="description" content="Sistema de Gerencimento CSIJ"/>
    <meta name="keywords" content="Tekon"/>

    <title><?PHP echo "$sgc"; ?></title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">



        <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="../vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <!-- Ion.RangeSlider -->
    <link href="../vendors/normalize-css/normalize.css" rel="stylesheet">
    <link href="../vendors/ion.rangeSlider/css/ion.rangeSlider.css" rel="stylesheet">
    <link href="../vendors/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">
    <!-- Bootstrap Colorpicker -->
    <link href="../vendors/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">

    <link href="../vendors/cropper/dist/cropper.min.css" rel="stylesheet">



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
                <h3>Controle de Autorização Especial</h3>
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
                  <div class="col-md-2 no-print">
                    <h4>Pesquisa por data:</h4>
                  </div>
                  <div class="col-md-7 no-print">
                     <form class="form-horizontal form-label-left" method="post">

                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="form-group">
                            <input type="text" class="form-control col-md-7 col-xs-12" name='inicio' id="inicio" data-inputmask="'mask': '99/99/9999'">
                        </div>
                      </div>

                      <div class="col-md-1 col-sm-1 col-xs-12">
                        <div class="form-group">
                           até
                        </div>
                      </div>

                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="form-group">
                            <input type="text" class="form-control col-md-7 col-xs-12" name='fim' id="fim" data-inputmask="'mask': '99/99/9999'">
                        </div>
                      </div>

                      <div class="form-group col-md-5">
                      <button type="submit" class="btn btn-default">Pesquisar</button>
                      <input type="hidden" class="form-control" name="pesquisar_autorizacao" id="pesquisar_caixa" value="true">
                      </div>
                    </form>
                  </div>
                   
                  <div class="col-md-3 no-print">
                    <span>
                      <button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="VOLTAR" onClick="window.location='index.php';"><i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i> VOLTAR</button>

                      <button class="btn btn-warning"  onclick="window.print();">IMPRIMIR</button>
                    </span>
                  </div>
              
                   <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Nr. Associado</th>
                          <th>Situação</th>
                          <th>Nome do Associado</th>
                          <th>Data Autorização</th>
                          <th>Placa</th>
                        </tr>
                      </thead>

                      <tbody>

                        <?php foreach ($entries as $key => $value){ ?> 
                          <tr>
                            <td>
                              <?php
                                $AssId    = $value->nr_associado;
                                $partner  = $associados->findID($AssId);
                                echo $partner->nr_associado;
                              ?>
                            </td>
                            <td>
                              <?php
                                if ($partner->status == 1) { echo "Ativo";} else { echo "Inativo";}
                              ?>
                            </td>
                            <td>
                              <?php
                              if (!$partner->nome == 0) {
                                echo $partner->nome;
                              } else {
                                echo $partner->razao_social;
                              }
                                
                                
                              ?>
                            </td>
                            <td><?php echo date("d/m/Y", strtotime($value->autorizacao)); ?></td>
                            <td><?php echo $value->placa; ?></td>
                          </tr>
                        <?php }  ?>  
                      </tbody>

                    </table>
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
    <!-- jQuery Smart Wizard -->
    <script src="vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
    <!-- Datatables -->
    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <!-- jquery.inputmask -->
    <script src="vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
  
  </body>
</html>
