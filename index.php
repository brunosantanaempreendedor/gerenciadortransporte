<?php 
  require_once("classes/classes.php");
  $ativos   = $associados->findAtivos();
  $inativos = $associados->findInativos();
  $year     = date("Y");
  $month    = date("m");


  $trintaDias    = date('Y-m-d H:i:s', strtotime('+30 day'));
  $agora         = date('Y-m-d H:i:s');

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
    <!-- FullCalendar -->
    <link href="vendors/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
    <link href="vendors/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" media="print">

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
                
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
               
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    
               
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-4">

                    <div id='calendar'></div>
                      
                    </div>
                    <div class="col-md-4">
                      <h3>Alerta de alvará</h3>

                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Data</th>
                          <th>Associado</th>
                        </tr>
                      </thead>

                      <tbody>

                        <?php foreach ($veiculos->findAllAlvara() as $key => $value){
                          if ($value->alvara == '') {} else { 
                        ?> 
                          <tr>
                            <td><?php echo date('d/m/Y', strtotime($value->alvara)); ?></td>
                            <td>
                              <?php
                                $AssId    = $value->nr_associado;
                                $partner  = $associados->findID($AssId);
                                if (!$partner->nome == 0) {
                                echo $partner->nome;                                  
                                } else {}
                                if (!$partner->razao_social == 0) {
                                echo $partner->razao_social;          
                                } else { }
                              ?>
                            </td>
                           
                          </tr>
                        <?php } } ?>  
                      </tbody>

                    </table>

                    </div>


                    <div class="col-md-4">
                      <h3>Alerta de autorização</h3>



                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Data</th>
                          <th>Associado</th>
                        </tr>
                      </thead>

                      <tbody>

                        <?php foreach ($veiculos->findAllAutorizacao() as $key => $value){
                          if ($value->autorizacao == '') {} else { 
                        ?> 
                          <tr>
                            <td><?php echo date('d/m/Y', strtotime($value->autorizacao)); ?></td>
                            <td>
                              <?php
                                $AssId    = $value->nr_associado;
                                $partner  = $associados->findID($AssId);
                                if (!$partner->nome == 0) {
                                echo $partner->nome;                                  
                                } else {}
                                if (!$partner->razao_social == 0) {
                                echo $partner->razao_social;          
                                } else { }
                              ?>
                            </td>
                           
                          </tr>
                        <?php } } ?>  
                      </tbody>

                    </table>
                    </div>


                    <div class="col-md-4">
                      <h3>Alerta de CNH</h3>



                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Validade</th>
                          <th>Associado</th>
                        </tr>
                      </thead>

                      <tbody>

                        <?php foreach ($motoristas->findValidade30($trintaDias,$agora) as $key => $value){
                        ?> 
                          <tr>
                            <td><?php echo date("d/m/Y", strtotime($value->validade)); ?></td>
                            <td>
                              <?php
                                $AssId    = $value->nr_associado;
                                $partner  = $associados->findID($AssId);
                                if (!$partner->nome == 0) {
                                echo $partner->nome;                                  
                                } else {}
                                if (!$partner->razao_social == 0) {
                                echo $partner->razao_social;          
                                } else { }
                              ?>
                            </td>                           
                          </tr>
                        <?php  } ?>  
                      </tbody>

                    </table>
                    </div>


                    <div class="col-md-4">
                      <h3>Alerta de Tacógrafo</h3>



                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Tacógrafo</th>
                          <th>Associado</th>
                        </tr>
                      </thead>

                      <tbody>

                        <?php foreach ($veiculos->findValidade30($trintaDias,$agora) as $key => $value){
                        ?> 
                          <tr>
                            <td><?php echo date("d/m/Y", strtotime($value->tacografo)); ?></td>
                            <td>
                              <?php
                                $AssId    = $value->nr_associado;
                                $partner  = $associados->findID($AssId);
                                if (!$partner->nome == 0) {
                                echo $partner->nome;                                  
                                } else {}
                                if (!$partner->razao_social == 0) {
                                echo $partner->razao_social;          
                                } else { }
                              ?>
                            </td>
                           
                          </tr>
                        <?php  } ?>  
                      </tbody>

                    </table>
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
    <!-- FullCalendar -->
    <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src="vendors/fullcalendar/dist/lang-all.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>


  </body>
</html>
