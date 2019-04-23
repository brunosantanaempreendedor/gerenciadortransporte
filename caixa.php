<?php 
  require_once("classes/classes.php");

  if(isset($_POST['pesquisar_caixa']))
    {
      $inicio     = $_POST['inicio'];
      $fim        = $_POST['fim'];

      $entries    = $entradas->findMensalidadesPeriodo($inicio,$fim);
      $several    = $entradas->findDiversosPeriodo($inicio,$fim);
      $pay        = $saidas->findPeriodo($inicio,$fim);

    } else {
      $mesAtual   = date("m");

      $entries    = $entradas->findMensalidades($mesAtual);
      $several    = $entradas->findDiversos($mesAtual);
      $pay        = $saidas->findAtual($mesAtual);
    
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
    <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

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
            <div class="page-title no-print">
              <div class="title_left">
                <h3>Caixa</h3>
              </div>

              <div class="title_right">

                <div class="col-md-2 col-sm-2 col-xs-12 form-group pull-right">
                  <label for="data"></label>
                  <button class="btn btn-warning"  onclick="window.print();">IMPRIMIR</button>
                </div>
                <div class="col-md-7 col-sm-7 col-xs-12 form-group pull-right">

                <form method="post" class="form-inline">
                  <div class="row">
                    <div class="form-group">
                      <div class="col-md-12">
                        <div class="col-md-5">
                      
                        <label for="data">Início</label>
                        <div class='input-group date' id='myDatepicker1'>
                            <input type='text' name="inicio" id="inicio" class="form-control" />
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                          
                        </div>
                        <div class="col-md-5">
                      
                        <label for="data">Fim</label>
                        <div class='input-group date' id='myDatepicker2'>
                            <input type='text' name="fim" id="fim" class="form-control" />
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                          
                        </div>
                        <div class="col-md-2">
                          <label for="enviar"></label>
                          <button type="submit" class="btn btn-success"><i class="fa fa-search"></i></button>
                        </div>
                      <input type="hidden" class="form-control" name="pesquisar_caixa" id="pesquisar_caixa" value="true">
                      </div>  
                    </div>
                    </div>
                </form>

                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <h3>Entrada de Mensalidades</h3>
                   
                      <div class="col-md-1 col-md-offset-11">
                      </div>
              
                   <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <td>Data</td>
                          <td>Descrição</td>
                          <td>Valor</td>
                        </tr>
                      </thead>

                      <tbody>
                          <?php 
                            $i = 0;
                            foreach ($entries as $key => $value){
                              $codigo = $value->associado;
                              $data   = $value->data;
                              $assoc  = $associados->findCOD($codigo);
                          ?> 
                            <tr>
                              <td><?php echo date('d/m/Y', strtotime($value->data));?></td>
                              <td><?php echo $assoc->nome;?>
                              </td>
                              <td>
                                <?php
                                  extract($entradas->somarMensalidade($codigo,$data));
                                  echo number_format($totalpago, 2, ',', '.');
                                  $i += $totalpago;
                                ?>
                              </td>
                            </tr>
                          <?php }  ?> 
                          <tr>
                             <td colspan="2" align="right"><b>Total:</b></td>
                             <td><?php echo number_format($i, 2, ',', '.'); ?></td>
                           </tr> 
                      </tbody>

                    </table>
                  </div>
                </div>
              </div>

              <!-- ============== ENTRADA DE DIVERSOS ======= -->

              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <h3>Entrada de Diversos</h3>
                   
                      <div class="col-md-1 col-md-offset-11">
                      </div>
              
                   <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <td>Data</td>
                          <td>Descrição</td>
                          <td>Valor</td>
                        </tr>
                      </thead>

                      <tbody>
                          <?php 
                            $d = 0;
                            foreach ($several as $key => $value){
                          ?> 
                            <tr>
                              <td><?php echo date('d/m/Y', strtotime($value->data));?></td>
                              <td> <?php echo $value->tipo; ?> </td>
                              <td>
                                <?php
                                echo number_format($value->valor, 2, ',', '.'); 
                                $d +=$value->valor; 
                                ?>
                              </td>
                            </tr>
                          <?php }  ?>
                          <tr>
                            <td colspan="2" align="right"><b>Total</b></td>
                            <td><?php echo number_format($d, 2, ',', '.');  ?></td>
                          </tr>  
                      </tbody>

                    </table>
                  </div>
                </div>
              </div>

              <!-- ============== SAÍDAS ======= -->

              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <h3>Saídas</h3>
                   
                      <div class="col-md-1 col-md-offset-11">
                      </div>
              
                   <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <td>Data</td>
                          <td>Descrição</td>
                          <td>Valor</td>
                        </tr>
                      </thead>

                      <tbody>
                          <?php 
                            $s = 0;
                            foreach ($pay as $key => $value){
                          ?> 
                            <tr>
                              <td><?php echo date('d/m/Y', strtotime($value->data));?></td>
                              <td> <?php echo $value->tipo; ?> </td>
                              <td>
                                <?php
                                  echo number_format($value->valor, 2, ',', '.');
                                  $s += $value->valor;
                                ?>
                                </td>
                            </tr>
                          <?php }  ?> 
                          <tr>
                            <td colspan="2" align="right"><b>Total</b></td>
                            <td><?php echo number_format($s, 2, ',', '.');  ?></td>
                          </tr>   
                      </tbody>

                    </table>
                  </div>
                </div>
              </div>


              <!-- ============== SALDO ======= -->

              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <h3>Saldo</h3>
                   
                      <div class="col-md-1 col-md-offset-11">
                      </div>
              
                   <div class="x_content">
                    <h1>
                      <?php 
                      $saldo = $i + $d - $s;
                      echo number_format($saldo, 2, ',', '.'); 
                      ?>
                    </h1>
                
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
    <!-- bootstrap-daterangepicker -->
    <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
    
    <!-- Initialize datetimepicker -->
<script>
  
    $('#myDatepicker1').datetimepicker({
        format: 'YYYY-MM-DD'
    });
  
    $('#myDatepicker2').datetimepicker({
        format: 'YYYY-MM-DD'
    });


</script>
  </body>
</html>
