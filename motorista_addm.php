<?php 
  require_once("classes/classes.php");

        if(isset($_GET['asid']))
  {
    $id     = $_GET['asid'];
    $edit   = $associados->getID($id); 
  }


  if(isset($_POST['adicionar_motorista']))
    {
      $nr_associado       = $_POST['nr_associado'];
      $nome               = $_POST['nome'];
      $rua                = $_POST['rua'];
      $numero             = $_POST['numero'];
      $bairro             = $_POST['bairro'];
      $cep                = $_POST['cep'];
      $cidade             = $_POST['cidade'];
      $uf                 = $_POST['uf'];
      $email              = $_POST['email'];
      $telefone           = $_POST['telefone'];
      $celular1           = $_POST['celular1'];
      $celular2           = $_POST['celular2'];
      $mae                = $_POST['mae'];
      $pai                = $_POST['pai'];
      $cpf                = $_POST['cpf'];
      $estado_civil       = $_POST['estado_civil'];
      $rg                 = $_POST['rg'];
      $orgao_exp          = $_POST['orgao_exp'];
      $nascimento         = $_POST["nascimento"];
      $naturalidade       = $_POST['natural'];
      $natural_uf         = $_POST['natural_uf'];
      $cnh                = $_POST['cnh'];
      $validade           = $_POST["validade"];
      $senha_detran       = $_POST['senha_detran'];
      $curso              = $_POST['curso'];
      $particular         = $_POST['particular'];
      $gratuito           = $_POST['gratuito'];
      $crm                = $_POST["crm"];
      
        if($motoristas->cadastro($nr_associado,$nome,$rua,$numero,$bairro,$cep,$cidade,$uf,$email,$telefone,$celular1,$celular2,$mae,$pai,$cpf,$estado_civil,$rg,$orgao_exp,$nascimento,$naturalidade,$natural_uf,$cnh,$validade,$senha_detran,$curso,$particular,$gratuito,$crm))
        {
          header("Location: motoristas.php");
        }
        else
        {
          header("Location: motorista_addm.php?erro");
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
                <h3>Novo Motorista</h3>
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

                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                          <label class="control-label" for="nr_associado">Associado/Empresa
                          </label>
                          <input type="text" class="form-control col-md-7 col-xs-12" name='associado' id="associado" value="<?php if (!$edit->nome == 0) {echo $edit->nome;} else {}
                            if (!$edit->razao_social == 0) {echo $edit->razao_social;} else {} ?>" >
                          <input type="hidden" name='nr_associado' id="nr_associado" value="<?php echo $edit->id; ?>" >
                        </div>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                          <label class="control-label" for="Nome">Motorista / Preposto
                          </label>
                          <input type="text" class="form-control col-md-7 col-xs-12" name='nome' id="nome" value="<?php 
                            //echo $edit->nome;
                            //echo $edit->razao_social;

                            if (!$edit->nome == 0) {echo $edit->nome;} else {}
                            if (!$edit->razao_social == 0) {echo $edit->razao_social;} else {}     
                          ?>
                          " >
                        </div>
                      </div>


                      
                      <div class="col-md-2 col-sm-2 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="nascimento">Data de Nascimento
                            </label>
                            <div class='input-group date' id='myDatepicker3'>
                                <input type='text' class="form-control col-md-7 col-xs-12" name='nascimento' id="nascimento" value="<?php echo $edit->nascimento; ?>" >
                                <span class="input-group-addon">
                                   <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                      </div>
                        
                      
                      <div class="col-md-6 col-sm-6 col-xs-12">
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
                            <input type="text" class="form-control col-md-7 col-xs-12" name='numero' id="numero" value="<?php echo $edit->numero; ?>" >
                        </div>
                      </div>
                        
                      
                      <div class="col-md-5 col-sm-5 col-xs-12">
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
                            <label class="control-label" for="uf">Cidade
                            </label>
                            <input type="text" class="form-control col-md-7 col-xs-12" name='uf' id="uf" value="<?php echo $edit->uf; ?>" >
                        </div>
                      </div>
                        
                      
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="CEP">CEP 
                            </label>
                            <input type="text" class="form-control col-md-7 col-xs-12" name='cep' id="cep" value="<?php echo $edit->cep; ?>" >
                        </div>
                      </div>
                        
                      
                      <div class="col-md-4 col-sm-4 col-xs-12">
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
                            <input type="text" class="form-control col-md-7 col-xs-12" name='celular1' id="celular1" value="<?php echo $edit->celular1; ?>" >
                        </div>
                      </div>
                        
                      
                      <div class="col-md-2 col-sm-2 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="celular">Celular 02 
                            </label>
                            <input type="text" class="form-control col-md-7 col-xs-12" name='celular2' id="celular2" value="<?php echo $edit->celular2; ?>" >
                        </div>
                      </div>
                        
                      
                      <div class="col-md-2 col-sm-2 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="estado_civil">Estado Civil
                            </label>
                            <input type="text" class="form-control col-md-7 col-xs-12" name='estado_civil' id="estado_civil" value="<?php echo $edit->estado_civil; ?>" >
                        </div>
                      </div>
                                                
                      
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="mae">Mãe
                            </label>
                            <input type="text" class="form-control col-md-7 col-xs-12" name='mae' id="mae" value="<?php echo $edit->mae; ?>" >
                        </div>
                      </div>
                        
                      
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="pai">Pai
                            </label>
                            <input type="text" class="form-control col-md-7 col-xs-12" name='pai' id="pai" value="<?php echo $edit->pai; ?>" >
                        </div>
                      </div>
                        
                      
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="cpf">Cpf
                            </label>
                            <input type="text" class="form-control col-md-7 col-xs-12" name='cpf' id="cpf" value="<?php echo $edit->cpf; ?>" >
                        </div>
                      </div>                        
                      
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="rg">RG 
                            </label>
                            <input type="text" class="form-control col-md-7 col-xs-12" name='rg' id="rg" value="<?php echo $edit->rg; ?>" >
                        </div>
                      </div>
                        
                      
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="orgao_exp">Orgão Expedidor
                            </label>
                            <input type="text" class="form-control col-md-7 col-xs-12" name='orgao_exp' id="orgao_exp" value="<?php echo $edit->orgao_exp; ?>" >
                        </div>
                      </div>
                        
                      
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="natural">Naturalidade
                            </label>
                            <input type="text" class="form-control col-md-7 col-xs-12" name='natural' id="natural" value="<?php echo $edit->naturalidade; ?>" >
                        </div>
                      </div>
                        
                      
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="natural_uf">UF
                            </label>
                            <input type="text" class="form-control col-md-7 col-xs-12" name='natural_uf' id="natural_uf" value="<?php echo $edit->natural_uf; ?>" >
                        </div>
                      </div>

                      
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="cnh">CNH
                            </label>
                            <input type="text" class="form-control col-md-7 col-xs-12" name='cnh' id="cnh" value="<?php echo $edit->cnh; ?>" >
                        </div>
                      </div>
                      

                      
                      <div class="col-md-2 col-sm-2 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="validade">Validade
                            </label>
                            <div class='input-group date' id='myDatepicker1'>
                                <input type='text' class="form-control col-md-7 col-xs-12" name='validade' id="validade" value="<?php echo $edit->validade; ?>" >
                                <span class="input-group-addon">
                                   <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                      </div>
                        
                      
                      <div class="col-md-2 col-sm-2 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="senha_detran">Senha Detran
                            </label>
                            <input type="text" class="form-control col-md-7 col-xs-12" name='senha_detran' id="senha_detran" value="<?php echo $edit->senha_detran; ?>" >
                        </div>
                      </div>
                        
                      
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="curso">curso
                            </label>
                            <input type="text" class="form-control col-md-7 col-xs-12" name='curso' id="curso" value="<?php echo $edit->curso; ?>" >

                        </div>
                      </div>
                        
                      
                      <div class="col-md-2 col-sm-2 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="particular">particular
                            </label>
                            <input type="text" class="form-control col-md-7 col-xs-12" name='particular' id="particular" value="<?php echo $edit->particular; ?>" >

                        </div>
                      </div>
                        
                      
                      <div class="col-md-2 col-sm-2 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="gratuito">Gratuito
                            </label>
                            <input type="text" class="form-control col-md-7 col-xs-12" name='gratuito' id="gratuito" value="<?php echo $edit->gratuito; ?>" >

                        </div>
                      </div>
                      
                      <div class="col-md-2 col-sm-2 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="crm">CRM
                            </label>
                            <div class='input-group date' id='myDatepicker2'>
                                <input type='text' class="form-control col-md-7 col-xs-12" name='crm' id="crm" value="<?php echo $edit->crm; ?>" >
                                <span class="input-group-addon">
                                   <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                      </div>

                       

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-3 col-sm-3 col-xs-12 col-md-offset-9">
                          <button class="btn btn-primary" type="reset">CANCELAR</button>
                          <button type="submit" class="btn btn-success">CADASTRAR</button>
                          <input type=hidden name='adicionar_motorista' value='true'>
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
    <script src="vendors/moment/min/moment-with-locales.js"></script>     
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
        format: 'YYYY-MM-DD',
        locale: 'pt-br'
    });

    $('#myDatepicker1').datetimepicker({
        format: 'YYYY-MM-DD',
        locale: 'pt-br'
    });

    $('#myDatepicker2').datetimepicker({
        format: 'YYYY-MM-DD',
        locale: 'pt-br'
    });

    $('#myDatepicker3').datetimepicker({
        format: 'YYYY-MM-DD',
        locale: 'pt-br'
    });

    $('#myDatepicker4').datetimepicker({
        format: 'YYYY-MM-DD',
        locale: 'pt-br'
    });
</script>
  </body>
</html>
