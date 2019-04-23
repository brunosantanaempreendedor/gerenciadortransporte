<?php 
  require_once("classes/classes.php");

    if(isset($_GET['id']))
  {
    $id = $_GET['id'];
    $edit = $associados->getID($id); 
  }

  if(isset($_POST['editar_empresa']))
    {
      $a_id               = $_POST['a_id'];
      $nr_associado       = $_POST['nr_associado'];
      $razao_social       = $_POST['razao_social'];
      $rua                = $_POST['rua'];
      $numero             = $_POST['numero'];
      $complemento        = $_POST['complemento'];
      $bairro             = $_POST['bairro'];
      $cep                = $_POST['cep'];
      $cidade             = $_POST['cidade'];
      $uf                 = $_POST['uf'];
      $email              = $_POST['email'];
      $telefone           = $_POST['telefone'];
      $celular1           = $_POST['celular1'];
      $celular2           = $_POST['celular2'];
      $cnpj               = $_POST['cnpj'];
      $ie                 = $_POST['ie'];
      $status             = $_POST['status'];
      
        if($associados->editarpj($a_id,$nr_associado,$razao_social,$rua,$numero,$complemento,$bairro,$cep,$cidade,$uf,$email,$telefone,$celular1,$celular2,$cnpj,$ie,$status))
        {
          header("Location: associados.php");
        }
        else
        {
          header("Location: associadopj_editar.php?erro");
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
                <h3>Editar Associado PJ</h3>
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
                  <div class="col-md-2 col-md-offset-10 no-print">
                        <span>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-placement="top" title="Voltar" onClick="window.location='associados.php';"> <i class="fa fa-arrow-left"></i> VOLTAR
                            </button>
                        </span>
                  </div>
                  <div class="x_content">
                    <br />




                    <form id="" data-parsley-validate class="form-horizontal form-label-left" method="post">

                      <div class="col-md-2 col-sm-2 col-xs-12">
                        <div class="form-group">
                          <label class="control-label" for="razao_social">Nr. Associado
                          </label>
                          <input type="text" class="form-control col-md-7 col-xs-12" name='nr_associado' id="nr_associado" value="<?php echo $edit->nr_associado; ?>" >
                        </div>
                      </div>

                      <div class="col-md-10 col-sm-10 col-xs-12">
                        <div class="form-group">
                          <label class="control-label" for="razao_social">Razão Social
                          </label>
                          <input type="text" class="form-control col-md-7 col-xs-12" name='razao_social' id="razao_social" value="<?php echo $edit->razao_social; ?>" >
                        </div>
                      </div>
                        
                      
                      <div class="col-md-5 col-sm-5 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="rua">Rua 
                            </label>
                            <input type="text" class="form-control col-md-7 col-xs-12" name='rua' id="rua" value="<?php echo $edit->rua; ?>" >
                        </div>
                      </div>
                        
                      
                      <div class="col-md-1 col-sm-1 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="numero">Nº 
                            </label>
                            <input type="number" class="form-control col-md-7 col-xs-12" name='numero' id="numero" value="<?php echo $edit->numero; ?>" >
                        </div>
                      </div>
                        
                      
                      <div class="col-md-2 col-sm-2 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="complemento">Complemento 
                            </label>
                            <input type="text" class="form-control col-md-7 col-xs-12" name='complemento' id="complemento" value="<?php echo $edit->complemento; ?>" >
                        </div>
                      </div>
                        
                      
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="bairro">Bairro
                            </label>
                            <input type="text" class="form-control col-md-7 col-xs-12" name='bairro' id="bairro" value="<?php echo $edit->bairro; ?>" >
                        </div>
                      </div>
                        
                      
                      <div class="col-md-5 col-sm-5 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="cidade">Cidade
                            </label>
                            <input type="text" class="form-control col-md-7 col-xs-12" name='cidade' id="cidade" value="<?php echo $edit->cidade; ?>" >
                        </div>
                      </div>
                        
                      
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="uf">UF
                            </label>
                            <select name="uf" class="form-control col-md-7 col-xs-12" id="uf">
                              <option value="<?php echo $edit->uf; ?>"><?php echo $edit->uf; ?></option>
                              <option value=""></option>
                              <option value="AC">Acre</option>
                              <option value="AL">Alagoas</option>
                              <option value="AP">Amapá</option>
                              <option value="AM">Amazonas</option>
                              <option value="BA">Bahia</option>
                              <option value="CE">Ceará</option>
                              <option value="DF">Distrito Federal</option>
                              <option value="ES">Espírito Santo</option>
                              <option value="GO">Goiás</option>
                              <option value="MA">Maranhão</option>
                              <option value="MT">Mato Grosso</option>
                              <option value="MS">Mato Grosso do Sul</option>
                              <option value="MG">Minas Gerais</option>
                              <option value="PA">Pará</option>
                              <option value="PB">Paraíba</option>
                              <option value="PR">Paraná</option>
                              <option value="PE">Pernambuco</option>
                              <option value="PI">Piauí</option>
                              <option value="RJ">Rio de Janeiro</option>
                              <option value="RN">Rio Grande do Norte</option>
                              <option value="RS">Rio Grande do Sul</option>
                              <option value="RO">Rondônia</option>
                              <option value="RR">Roraima</option>
                              <option value="SC">Santa Catarina</option>
                              <option value="SP">São Paulo</option>
                              <option value="SE">Sergipe</option>
                              <option value="TO">Tocantins</option>
                            </select>
                        </div>
                      </div>
                        
                      
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="CEP">CEP 
                            </label>
                            <input type="text" class="form-control col-md-7 col-xs-12" name='cep' id="cep" data-inputmask="'mask' : '99.999-999'"  value="<?php echo $edit->cep; ?>" >
                        </div>
                      </div>
                        
                      
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="email">E-mail 
                            </label>
                            <input type="text" class="form-control col-md-7 col-xs-12" name='email' id="email" value="<?php echo $edit->email; ?>" >
                        </div>
                      </div>
                        
                      
                      <div class="col-md-2 col-sm-2 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="telefone">Telefone Fixo 
                            </label>
                            <input type="text" class="form-control col-md-7 col-xs-12" name='telefone' id="telefone" value="<?php echo $edit->telefone; ?>" >
                        </div>
                      </div>
                        
                      
                      <div class="col-md-2 col-sm-2 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="celular">Celular 01 
                            </label>
                            <input type="text" class="form-control col-md-7 col-xs-12" name='celular1' id="celular1"  value="<?php echo $edit->celular1; ?>" >
                        </div>
                      </div>
                        
                      
                      <div class="col-md-2 col-sm-2 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="celular">Celular 02 
                            </label>
                            <input type="text" class="form-control col-md-7 col-xs-12" name='celular2' id="celular2" value="<?php echo $edit->celular2; ?>" >
                        </div>
                      </div>
                        
                      
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="cnpj">CNPJ
                            </label>
                            <input type="text" class="form-control col-md-7 col-xs-12" name='cnpj' id="cnpj" value="<?php echo $edit->cnpj; ?>" >
                        </div>
                      </div>
                        
                      
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="ie">IE
                            </label>
                            <input type="text" class="form-control col-md-7 col-xs-12" name='ie' id="ie" value="<?php echo $edit->ie; ?>" >
                        </div>
                      </div>
                        
                      
                      <div class="col-md-2 col-sm-2 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="status">Situação
                            </label>
                            <select name="status" id="status" class="form-control col-md-7 col-xs-12">
                              <option value="<?php echo $edit->status; ?>"><?php if($edit->status == 1) {$sta = "Ativo";} elseif ($edit->status == 0) {$sta = "Inativo";} echo $sta;?></option>
                              <option value=""></option>
                              <option value="1">Ativo</option>
                              <option value="0">Inativo</option>
                            </select>
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-2 col-sm-2 col-xs-12 col-md-offset-10">
                          <button type="submit" class="btn btn-success">SALVAR</button>
                          <input type=hidden name='editar_empresa' value='true'>
                          <input type=hidden name='a_id' value='<?php echo $edit->id; ?>'>
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
