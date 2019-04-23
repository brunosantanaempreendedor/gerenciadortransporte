<?php 
  require_once("classes/classes.php");

      if(isset($_GET['id']))
  {
    $id   = $_GET['id'];
    $edit = $associados->getID($id); 
  }

  //Apagar observações
  if(isset($_GET['del_id']))
{
  $id   = $_GET['del_id'];
  $asc  = $_GET['asc'];
  $observacoes->delID($id);
  header("Location: obs_ver.php?id=$asc"); 
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
                <h3>Observações</h3>
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
                   
                      <div class="col-md-3 col-md-offset-9">
                        <span>
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-placement="top" title="Voltar" onClick="window.location='associados.php';"> <i class="fa fa-arrow-left"></i> VOLTAR
                            </button>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-placement="top" data-target="#Obs" title="Nova Observação" data-whatever="<?php echo $edit->codigo; ?>">
                            NOVA <i class="fa fa-plus-circle"></i>
                            </button>
                        </span>
                      </div>

                      Associado: <?php echo $edit->nome; ?>
                  <div class="x_content">

                  <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Data</th>
                          <th>Observação</th>
                          <th>Apagar</th>
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



<!-- MODAL COMPROVANTE -->
<div class="modal fade" id="Obs" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Cadastrar Observação</h4>
      </div>
      <div class="modal-body">
      <fieldset>
        <form  class="observacao">
                  <div class="row">
                    <div class="form-group">
                      <div class="col-md-12">
                      <textarea name="texto" class="form-control" id="texto" rows="5">
                      </textarea>
                      <input type="hidden" class="form-control" name="associado" id="associado">
                      <input type="hidden" class="form-control" name="obs_add" id="obs_add" value="true">
                      </div>  
                    </div>
                    </div>
        </form>
        </fieldset>
      </div>

       <div class="modal-footer">
          <button type="button" class="btn btn-success" id="cadObs">
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
    
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>

    <script type="text/javascript" language="javascript">
     $(document).ready(function() {                                      
            conferir();                                
       }); 
    function conferir()
      {
          var associado  = "<?php echo $edit->codigo; ?>";
            $.ajax({  
              url:"conferir.php",  
              method:"POST",
              data: {
                     "observacao": 1,
                     "associado": associado
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


      $('#Obs').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var associado = button.data('whatever') // Extract info from data-* attributes
        var modal = $(this)
        //modal.find('.modal-title').text('New message to ' + recipient)
        modal.find('.modal-body #associado').val(associado)
      })
      
  // Cadastro de Observações

  $("button#cadObs").click(function(){
        $.ajax({
            type: "POST",
            url: "process.php",
            data: $('form.observacao').serialize(),
            success: function(msg){
                $("#Obs").modal('hide');
                  alerta(msg);
                  conferir();
            },
            error: function(msg){
                $("#Obs").modal('hide');
                  alertaErro(msg);
                  conferir();
            }
        });
  });

    </script>

  </body>
</html>
