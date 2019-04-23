<?php 
  require_once("classes/classes.php");

      if(isset($_GET['id']))
  {
    $id   = $_GET['id'];
    $edit = $vistorias->getID($id); 
  }

  if(isset($_POST['editar_vistoria']))
    {
      $a_id               = $_POST['a_id'];
      $nr_associado       = $_POST['nr_associado'];
      $alvara             = $_POST['alvara'];
      $autorizacao        = $_POST['autorizacao'];
      $tacografo          = $_POST['tacografo'];
      $inmetro            = $_POST['inmetro'];
      $particular         = $_POST['particular'];
      $gratuito           = $_POST['gratuito'];
      
        if($vistorias->editar($a_id,$nr_associado,$alvara,$autorizacao,$tacografo,$inmetro,$particular,$gratuito))
        {
          header("Location: vistorias.php");
        }
        else
        {
          header("Location: vistoria_editar.php?erro");
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
    
    <!-- bootstrap-datetimepicker -->
    <link href="vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <!-- Ion.RangeSlider -->
    <link href="vendors/normalize-css/normalize.css" rel="stylesheet">
    <link href="vendors/ion.rangeSlider/css/ion.rangeSlider.css" rel="stylesheet">
    <link href="vendors/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">
    <!-- Bootstrap Colorpicker -->
    <link href="vendors/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">

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
                <h3>Editar Vistoria</h3>
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
                  <div class="x_content">
                    <br />




                    <form id="" data-parsley-validate class="form-horizontal form-label-left" method="post">

                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                          <label class="control-label" for="nr_associado">Associado
                          </label>
                          <select name="nr_associado" id="nr_associado" class="form-control col-md-7 col-xs-12">
                            <option value="<?php echo $edit->nr_associado; ?>">
                              <?php $id = $edit->nr_associado; $nrAss = $associados->getID($id); echo $nrAss->nome;  ?>
                            </option>
                            <option value=""></option>
                            <?php foreach ($associados->findAll() as $key => $value) { ?>
                            <option value="<?php echo $value->id; ?>"><?php echo $value->nome; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>

                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="form-group">
                          <label class="control-label" for="alvara">Alvará
                          </label>
                            <div class='input-group date' id='myDatepicker1'>
                                <input type='text' class="form-control col-md-7 col-xs-12" name='alvara' id="alvara" value="<?php echo $edit->alvara; ?>" >
                                <span class="input-group-addon">
                                   <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                      </div>
                        
                      
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="autorizacao">Autorização 
                            </label>
                            <div class='input-group date' id='myDatepicker2'>
                                <input type='text' class="form-control col-md-7 col-xs-12" name='autorizacao' id="autorizacao" value="<?php echo $edit->autorizacao; ?>" >
                                <span class="input-group-addon">
                                   <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                      </div>
                        
                      
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="tacografo">Tacógrafo 
                            </label>
                            <input type="text" class="form-control col-md-7 col-xs-12" name='tacografo' id="tacografo" value="<?php echo $edit->tacografo; ?>" >
                        </div>
                      </div>
                        
                      
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="inmetro">Inmetro
                            </label>
                            <input type="text" class="form-control col-md-7 col-xs-12" name='inmetro' id="inmetro" value="<?php echo $edit->inmetro; ?>"> 
                        </div>
                      </div>
                        
                      
                      <div class="col-md-2 col-sm-2 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="gratuito">Particular
                            </label>
                            <select name="particular" id="particular" class="form-control col-md-7 col-xs-12">
                              <option value="<?php echo $edit->particular; ?>"><?php echo $edit->particular; ?></option>
                              <option value=""></option>
                              <option value="Sim">Sim</option>
                              <option value="Não">Não</option>
                            </select>
                        </div>
                      </div>
                        
                      
                      <div class="col-md-2 col-sm-2 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="gratuito">Gratuito
                            </label>
                            <select name="gratuito" id="gratuito" class="form-control col-md-7 col-xs-12">
                              <option value="<?php echo $edit->gratuito; ?>"><?php echo $edit->gratuito; ?></option>
                              <option value=""></option>
                              <option value="Sim">Sim</option>
                              <option value="Não">Não</option>
                            </select>
                        </div>
                      </div>
                        
                       

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-2 col-sm-2 col-xs-12 col-md-offset-10">
                          <button type="submit" class="btn btn-success">SALVAR</button>
                          <input type=hidden name='a_id' value='<?php echo $edit->id; ?>'>
                          <input type=hidden name='editar_vistoria' value='true'>
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

    <!-- bootstrap-datetimepicker -->    
    <script src="vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <!-- Ion.RangeSlider -->
    <script src="vendors/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>
    <!-- Bootstrap Colorpicker -->
    <script src="vendors/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
    <!-- jquery.inputmask -->
    <script src="vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <!-- jQuery Knob -->
    <script src="vendors/jquery-knob/dist/jquery.knob.min.js"></script>
    
    <!-- Initialize datetimepicker -->
<script>
    $('#myDatepicker0').datetimepicker({
        format: 'YYYY-MM-DD'
    });

    $('#myDatepicker1').datetimepicker({
        format: 'YYYY-MM-DD'
    });

    $('#myDatepicker2').datetimepicker({
        format: 'YYYY-MM-DD'
    });

    $('#myDatepicker3').datetimepicker({
        format: 'YYYY-MM-DD'
    });
</script>
  </body>
</html>
