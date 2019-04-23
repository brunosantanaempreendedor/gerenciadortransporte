<?php 
  require_once("classes/classes.php");

//Apagar usuários
  if(isset($_GET['del_id']))
{
  $id = $_GET['del_id'];
  $veiculos->delID($id);
  header("Location: veiculos.php?deleted"); 
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
                <h3>Veículos</h3>
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
                   
                      <div class="col-md-4 col-md-offset-8 no-print">
                        <span>
                             <button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Novo Veículo" onClick="window.location='veiculo_adicionar.php';">NOVO</button>

                             <button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Importar Excel" onClick="window.location='veiculo_importar.php';">IMPORTAR <i class="fa fa-file-excel-o"></i></button>

                             <button class="btn btn-warning"  onclick="window.print();">IMPRIMIR</button>
                        </span>
                      </div>
              
                   <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Associado</th>
                          <th>Placa</th>
                          <th>Marca</th>
                          <th>Modelo</th>
                          <th class="no-print">Ações</th>
                          <th class="no-print"><i class='fa fa-trash'></i></th>
                        </tr>
                      </thead>

                      <tbody>

                                    <?php 
                                      foreach ($veiculos->findAll() as $key => $value){
                                    ?> 
                                      <tr>
                                        <td>
                                          <?php
                                          $AssId    = $value->nr_associado;
                                          $partner  = $associados->findID($AssId);

                                if (!$partner->nome == 0) {echo $partner->nome;} else {}
                                if (!$partner->razao_social == 0) {echo $partner->razao_social;} else {}

                                          ?>
                                        </td>
                                        <td><?php echo $value->placa;?></td>
                                        <td><?php echo $value->marca; ?></td>
                                        <td><?php echo $value->modelo; ?></td>
                                        <td align='center' class="no-print">

                                            <button type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Ver Veículo" onClick="window.location='veiculo_ver.php?id=<?=$value->id;?>';"><i class='fa fa-search'></i></button>



                                            <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Editar Veículo" onClick="window.location='veiculo_editar.php?id=<?=$value->id;?>';"><i class='fa fa-pencil-square-o'></i></button>

                                        </td>
                                        <td align='center' class="no-print">

                                            <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="EXCLUIR Veículo" onClick="window.location='veiculos.php?del_id=<?=$value->id;?>';"><i class='fa fa-trash'></i></button>
                                        </td>
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
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
  </body>
</html>
