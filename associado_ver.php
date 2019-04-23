<?php 
  require_once("classes/classes.php");

  if(isset($_GET['id']))
  {
    $id = $_GET['id'];
    $listAssc = $associados->getID($id); 
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
                <h3>Associado Detalhes</h3>
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
                  




                    <form data-parsley-validate class="form-horizontal form-label-left">

                      <div class="col-md-2 col-sm-2 col-xs-12">
                        <div class="form-group">
                          <label class="control-label" for="Matricula">Matricula: 
                          </label>
                          <?php echo $listAssc->matricula; ?>
                        </div>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                          <label class="control-label" for="Nome">Nome: 
                          </label>
                          <?php echo $listAssc->nome; ?>
                        </div>
                      </div>
                        
                      
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="nascimento">Data de Nascimento:                             </label>
                            <?php echo date('d/m/Y', strtotime($listAssc->nascimento)); ?>
                        </div>
                      </div>
                        
                      
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="rua">Rua: 
                            </label>
                            <?php echo $listAssc->rua; ?>
                        </div>
                      </div>
                        
                      
                      <div class="col-md-1 col-sm-1 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="numero">Nº: 
                            </label>
                            <?php echo $listAssc->numero; ?>
                        </div>
                      </div>
                        
                      
                      <div class="col-md-5 col-sm-5 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="bairro">Bairro: 
                            </label>
                            <?php echo $listAssc->bairro; ?>
                        </div>
                      </div>
                        
                      
                      <div class="col-md-5 col-sm-5 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="cidade">Cidade: 
                            </label>
                           <?php echo $listAssc->cidade; ?>
                        </div>
                      </div>
                        
                      
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="CEP">CEP:
                            </label>
                            <?php echo $listAssc->cep; ?>
                        </div>
                      </div>
                        
                      
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="telefone">Telefone: 
                            </label>
                            <?php echo $listAssc->telefone; ?>
                        </div>
                      </div>
                        
                      
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="referencia">Referência: 
                            </label>
                            <?php echo $listAssc->referencia; ?>
                        </div>
                      </div>
                        
                      
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="moracom">Mora com: 
                            </label>
                            <?php echo $listAssc->moracom; ?>
                        </div>
                      </div>
                        
                      
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="naturalidade">Natural de: 
                            </label>
                            <?php echo $listAssc->naturalidade; ?>
                        </div>
                      </div>
                        
                      
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="genero">Gênero: 
                            </label>
                            <?php echo $listAssc->genero; ?>
                        </div>
                      </div>
                        
                      
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="identidade">ID: 
                            </label>
                            <?php echo $listAssc->identidade; ?>
                        </div>
                      </div>
                        
                      
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="cpf">CPF: 
                            </label>
                            <?php echo $listAssc->cpf; ?>
                        </div>
                      </div>
                        
                      
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="sus">Cartão do SUS: 
                            </label>
                            <?php echo $listAssc->sus; ?>
                        </div>
                      </div>
                        
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <hr>
                      </div>

                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                          <div class="checkbox">
                            <label>
                              <b>Cardíaco:</b>
                              <?php if ($listAssc->cardiaco == 1) {echo "Sim";} else {echo "Não";} ?>
                            </label>
                          </div>
                        </div>
                      </div>
                        
                      
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                          <div class="checkbox">
                            <label>
                             <b> Diabético:</b>
                             <?php if ($listAssc->diabetico == 1) {echo "Sim";} else {echo "Não";} ?>
                            </label>
                          </div>
                        </div>
                      </div>
                        
                      
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                          <div class="checkbox">
                            <label>
                             <b> Hipertenso:</b>
                             <?php if ($listAssc->hipertenso == 1) {echo "Sim";} else {echo "Não";} ?>
                            </label>
                          </div>
                        </div>
                      </div>
                        
                      
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                          <div class="checkbox">
                            <label>
                              <b>Aposentado?</b>
                              <?php if ($listAssc->aposentado == 1) {echo "Sim";} else {echo "Não";} ?>
                            </label>
                          </div>
                        </div>
                      </div>
                        
                      
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                          <div class="checkbox">
                            <label>
                              <b>Toma algum remédio especial?</b>
                                <?php if ($listAssc->remedio == 1) {echo "Sim";} else {echo "Não";} ?>
                            </label>
                          </div>
                        </div>
                      </div>
                        
                      
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="senha">Qual Remédio?
                            </label>
                            <?php echo $listAssc->qual_remedio; ?>
                        </div>
                      </div>
                        
                      
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="outra_doenca">Outro tipo de doença?
                            </label>
                            <?php echo $listAssc->outra_doenca; ?>
                        </div>
                      </div>
                        
                      
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="outra_doenca">Tipo Sanguíneo: 
                            </label>
                            <?php echo $listAssc->tipo_sangue; ?>
                        </div>
                      </div>
                        
                      
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="chamar_quem">Em caso de acidentes, avise à:
                            </label>
                            <?php echo $listAssc->chamar_quem; ?>
                        </div>
                      </div>
                        
                      
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="parentesco">Grau de Parentesco: 
                            </label>
                            <?php echo $listAssc->parentesco; ?>
                        </div>
                      </div>
                        
                      
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="telefone_pessoa">Telefone: 
                            </label>
                            <?php echo $listAssc->telefone_pessoa; ?>
                        </div>
                      </div>
                        
                      
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="plano_saude">Plano de Saúde: 
                            </label>
                            <?php echo $listAssc->plano_saude; ?>
                        </div>
                      </div>
                        
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <hr>
                      </div>


                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="como_soube">Como soube do comitê?
                            </label>
                            <?php echo $listAssc->como_soube; ?>
                        </div>
                      </div>
                        
                      
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="data_associa">Associado a partir de: 
                            </label>
                            <?php echo date('d/m/Y', strtotime($listAssc->data_associa)); ?>
                        </div>
                      </div>
                        
                      
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="contribuicao">Valor da Contribuição: 
                            </label>
                            <?php echo number_format($listAssc->contribuicao, 2, ',', '.'); ?>
                        </div>
                      </div>
                        
                      
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="data_aceite">Situação: 
                            </label>
                            <?php if ($listAssc->status == 1) {echo "Ativo";} else {echo "Inativo";}
                             ?>
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        
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
  </body>
</html>
