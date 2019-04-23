<?php 
  require_once("classes/classes.php");

    if(isset($_GET['id']))
  {
    $id = $_GET['id'];
    $edit = $associados->getID($id); 
  }

  if(isset($_POST['editar_associado']))
    {
      $a_id               = $_POST['a_id'];
      $nr_associado       = $_POST['nr_associado'];
      $nome               = $_POST['nome'];
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
      $mae                = $_POST['mae'];
      $pai                = $_POST['pai'];
      $cpf                = $_POST['cpf'];
      $estado_civil       = $_POST['estado_civil'];
      $rg                 = $_POST['rg'];
      $orgao_exp          = $_POST['orgao_exp'];
      //$dnascimento        = str_replace("/", "-", $_POST["nascimento"]);
      $nascimento         = $_POST['nascimento'];
      $naturalidade       = $_POST['natural'];
      $natural_uf         = $_POST['natural_uf'];
      $cnh                = $_POST['cnh'];
      $validade           = $_POST["validade"];
      $senha_detran       = $_POST['senha_detran'];
      $curso              = $_POST['curso'];
      $obs                = $_POST['obs'];
      $particular         = $_POST['particular'];
      $gratuito           = $_POST['gratuito'];
      //$dinclusao          = str_replace("/", "-", $_POST["data_inclusao"]);
      $data_inclusao      = $_POST["data_inclusao"];
      //$ddesligamento      = str_replace("/", "-", $_POST["data_desligamento"]);
      $data_desligamento  = $_POST["data_desligamento"];
      //$dcrm               = str_replace("/", "-", $_POST["crm"]);
      $crm                = $_POST["crm"];
      $status             = $_POST['status'];
      
        if($associados->editar($a_id,$nr_associado,$nome,$rua,$numero,$complemento,$bairro,$cep,$cidade,$uf,$email,$telefone,$celular1,$celular2,$mae,$pai,$cpf,$estado_civil,$rg,$orgao_exp,$nascimento,$naturalidade,$natural_uf,$cnh,$validade,$senha_detran,$curso,$obs,$particular,$gratuito,$data_inclusao,$data_desligamento,$crm,$status))
        {
          header("Location: associados.php");
        }
        else
        {
          header("Location: associado_editar.php?erro");
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
                <h3>Editar Associado</h3>
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

                      <div class="col-md-2 col-sm-2 col-xs-12">
                        <div class="form-group">
                          <label class="control-label" for="Nome">Nr. Associado
                          </label>
                          <input type="text" class="form-control col-md-7 col-xs-12" name='nr_associado' id="nr_associado" value="<?php echo $edit->nr_associado; ?>" >
                        </div>
                      </div>

                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <div class="form-group">
                          <label class="control-label" for="Nome">Nome
                          </label>
                          <input type="text" class="form-control col-md-7 col-xs-12" name='nome' id="nome" value="<?php echo $edit->nome; ?>" >
                        </div>
                      </div>
                        
                      
                      <div class="col-md-2 col-sm-2 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="data_desligamento">Data de Nascimento
                            </label>
                            <div class='input-group date' id='myDatepicker0'>
                                <input type='text' class="form-control col-md-7 col-xs-12" name='nascimento' id="nascimento" value="<?php echo $edit->nascimento; ?>">
                                <span class="input-group-addon">
                                   <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
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
                        
                      
                      <div class="col-md-2 col-sm-2 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="estado_civil">Estado Civil 
                            </label>
                            <select name="estado_civil" id="estado_civil" class="form-control">
                              <option value="<?php echo $edit->estado_civil; ?>"><?php echo $edit->estado_civil; ?></option>
                              <option value=""></option>
                              <option value="Solteiro">Solteiro</option>
                              <option value="Casado">Casado</option>
                              <option value="Divorciado">Divorciado</option>
                              <option value="Viúvo">Viúvo</option>
                              <option value="Outros">Outros</option>
                            </select>
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
                            <input type="text" class="form-control col-md-7 col-xs-12" name='cpf' id="cpf" data-inputmask="'mask' : '999.999.999-99'" value="<?php echo $edit->cpf; ?>">
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
                            <label class="control-label" for="uf">UF
                            </label>
                            <select name="natural_uf" class="form-control col-md-7 col-xs-12" id="natural_uf">
                              <option value="<?php echo $edit->natural_uf; ?>"><?php echo $edit->natural_uf; ?></option>
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
                        
                      
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="cnh">CNH
                            </label>
                            <input type="text" class="form-control col-md-7 col-xs-12" name='cnh' id="cnh"  value="<?php echo $edit->cnh; ?>">
                        </div>
                      </div>
                        
                      
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="validade">Validade
                            </label>
                            <div class='input-group date' id='myDatepicker3'>
                                <input type='text' class="form-control col-md-7 col-xs-12" name='validade' id="validade" value="<?php echo $edit->validade; ?>">
                                <span class="input-group-addon">
                                   <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                      </div>

                      
                      
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="senha_detran">Senha Detran
                            </label>
                            <input type="text" class="form-control col-md-7 col-xs-12" name='senha_detran' id="senha_detran" value="<?php echo $edit->senha_detran; ?>" >
                        </div>
                      </div>
                        
                      
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="curso">curso
                            </label>
                            <input type="text" class="form-control col-md-7 col-xs-12" name='curso' id="curso" value="<?php echo $edit->curso; ?>" >

                        </div>
                      </div>
                        
                      
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="obs">Observações
                            </label>
                            <textarea name="obs" id="obs" cols="30" class="form-control col-md-7 col-xs-12" rows="10"><?php echo $edit->obs; ?></textarea>
                            
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
                        
                      
                      <div class="col-md-2 col-sm-2 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="data_desligamento">Data de Inclusão
                            </label>
                            <div class='input-group date' id='myDatepicker1'>
                                <input type='text' class="form-control col-md-7 col-xs-12" name='data_inclusao' id="data_inclusao" value="<?php echo $edit->data_inclusao; ?>">
                                <span class="input-group-addon">
                                   <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                      </div>
                        
                      
                      <div class="col-md-2 col-sm-2 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="data_desligamento">Data de Desligamento
                            </label>
                            <div class='input-group date' id='myDatepicker2'>
                                <input type='text' class="form-control col-md-7 col-xs-12" name='data_desligamento' id="data_desligamento" value="<?php echo $edit->data_desligamento; ?>">
                                <span class="input-group-addon">
                                   <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                      </div>
                        
                      
                      <div class="col-md-2 col-sm-2 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="crm">CRM
                            </label>
                            <div class='input-group date' id='myDatepicker4'>
                                <input type='text' class="form-control col-md-7 col-xs-12" name='crm' id="crm" value="<?php echo $edit->crm; ?>">
                                <span class="input-group-addon">
                                   <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
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
                        <div class="col-md-1 col-sm-1 col-xs-12 col-md-offset-11">
                          <button type="submit" class="btn btn-success">SALVAR</button>
                          <input type=hidden name='editar_associado' value='true'>
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
