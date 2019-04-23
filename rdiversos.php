<?php 
  require_once("classes/classes.php");

  //Apagar Diversos
  if(isset($_GET['del_id']))
{
  $id   = $_GET['del_id'];
  $asc  = $_GET['asc'];
  $entradas->delID($id);
  header("Location: rdiversos.php"); 
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
    <!-- PNotify -->
    <link href="vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
    <link href="build/css/estilo.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    
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
                <h3>Recebimentos Diversos</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
             
                </div>
              </div>
            </div>
              
            <div class="clearfix">
              
            </div>

            
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                   
                      <div class="col-md-1 col-md-offset-11">
                        <span>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-placement="top" data-target="#Diversos" title="Lançar Diversos">
                            NOVO <i class="fa fa-plus-circle"></i>
                            </button>
                        </span>
                      </div>
                  <div class="x_content">

                  <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Data</th>
                          <th>Tipo</th>
                          <th>Valor</th>
                          <th>Excluir</th>
                        </tr>
                      </thead>

                      <tbody id="show_status">

                      </tbody>

                    </table>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->




<div id="thanks"><p></p></div>



<!-- MODAL COMPROVANTE -->
<div class="modal fade" id="Diversos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Cadastrar Recebimentos Diversos</h4>
      </div>
      <div class="modal-body">
      <fieldset>
        <form  class="diversos">
                  <div class="row">
                    <div class="form-group">
                      <div class="col-md-12">
                        <div class="col-md-3">
                      
                        <label for="data">Data do recebimento</label>
                        <div class='input-group date' id='myDatepicker2'>
                            <input type='text' name="data" id="data" class="form-control" />
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                          
                        </div>
                        <div class="col-md-6">
                        <label for="mes">Descrição</label>
                            <input type='text' name="tipo" id="tipo" class="form-control" />
                        </div>
                        <div class="col-md-3">
                        <label for="valor">Valor</label>
                        <input type="number" class="form-control" name="valor" id="valor">
                        </div>
                      <input type="hidden" class="form-control" name="diversos_add" id="diversos_add" value="true">
                      </div>  
                    </div>
                    </div>
        </form>
        </fieldset>
      </div>

       <div class="modal-footer">
          <button type="button" class="btn btn-success" id="cadDiversos">
              SALVAR <i class="fa fa-floppy-o" aria-hidden="true"></i>
          </button>
      </div>
      
    </div>
  </div>
</div>

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
    <!-- PNotify -->
    <script src="vendors/pnotify/dist/pnotify.js"></script>
    <script src="vendors/pnotify/dist/pnotify.buttons.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>

    <script type="text/javascript" language="javascript">
     $(document).ready(function() {                                      
            conferir();                                
       }); 
    function conferir()
      {
            $.ajax({  
              url:"conferir.php",  
              method:"POST",
              data: {
                     "rdiversos": 1
                    },   
              success:function(data){  
              $("#show_status").html(data);
              timeout();  
              }  
            });    
     }

      function alerta(msg) {
          new PNotify({
              title: 'Olá!',
              text: msg,
              type: 'info',
              styling: 'bootstrap3',
              addclass: 'dark'
          });
      }

      function alertaErro(msg) {
          new PNotify({
              title: 'Erro!',
              text: msg,
              type: 'info',
              styling: 'bootstrap3',
              addclass: 'error'
          });
      }



      
  // Cadastro de Recebimentos Diversos

  $("button#cadDiversos").click(function(){
        $("#cadDiversos").prop('disabled', true);
        $("#cadDiversos").html('Processando...');
        $.ajax({
            type: "POST",
            url: "process.php",
            data: $('form.diversos').serialize(),
            success: function(msg){
                $("#cadDiversos").prop('disabled', false);
                $("#cadDiversos").html('SALVAR');
                $("#tipo").val('');
                $("#valor").val('');
                $("#data").val('');
                $("#Diversos").modal('hide');
                  alerta(msg);
                  conferir();
            },
            error: function(msg){
                $("#Diversos").modal('hide');
                  alertaErro(msg);
                  conferir();
            }
        });
  });

    </script>
    
    <!-- Initialize datetimepicker -->
<script>
  
    $('#myMes').datetimepicker({
        format: 'MM'
    });
  
    $('#myAno').datetimepicker({
        format: 'YYYY'
    });
  
    $('#myDatepicker2').datetimepicker({
        format: 'YYYY-MM-DD'
    });


</script>

  </body>
</html>
