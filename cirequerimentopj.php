<?php 
  require_once("classes/classes.php");

  if(isset($_POST['pesquisar_motorista']))
    {
      $idVeiculo  = $_POST['motorista'];
      $veiculo    = $veiculos->findVeiculo($idVeiculo);
      $id         = $veiculo->proprietario;
      $motor      = $associados->getID($id);
      $nome       = strtoupper($motor->nome);
      $assinatura = strtoupper($motor->nome);
      $razao      = strtoupper($motor->razao_social);
      $razao1     = strtoupper($motor->razao_social);
      $cnpj       = $motor->cnpj;
      $cpf        = $motor->cpf;
      $rg         = $motor->rg;
      $cnh        = $motor->cnh;
      $rua        = $motor->rua;
      $numero     = $motor->numero;
      $complemento= $motor->complemento;
      $bairro     = $motor->bairro;
      $cep        = $motor->cep;
      $telefone   = $motor->telefone;
      $mAm        = $veiculo->marca;
      $mAm        .= "/".$veiculo->modelo;
      $prefixo    = $veiculo->prefixo;
      $prefeitura = $veiculo->prefeitura;
      $chassi     = $veiculo->chassi;
      $placa      = $veiculo->placa;

    } else {

      $nome       = "________________________________________________________________";
      $razao      = "_____________________________________________________________________";
      $cnpj       = "___________________________";
      $cpf        = "___________________________";
      $cnh        = "__________________________________";
      $validade   = "___/___/____";
      $rua        = "___________________________
                              ________________________________________________________";
      $numero     = "____________";
      $complemento= "_________________";
      $bairro     = "_______________
                              _________________________________________";
      $cep        = "_________________";
      $telefone   = "(___)________________";
      $mAm        = "______________________________________________________";
      $chassi     = "_____________________________";
      $placa      = "___________";
      $prefixo    = "__________";
      $prefeitura = "__________________________________________";
      $assinatura = "";
      $razao1     = "";
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
    <meta name="description" content="Sistema de Gerencimento ACEAGG"/>
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
            <div class="page-title">
              <div class="title_left">
                <h3></h3>
              </div>

              <div class="title_right">


                
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">


                   
                  <div class="col-md-3 no-print pull-right">
                    <span>
                      <button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="VOLTAR" onClick="window.location='index.php';"><i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i> VOLTAR</button>

                      <button class="btn btn-warning"  onclick="window.print();">IMPRIMIR</button>
                    </span>
                  </div>


              <div class="col-md-9 col-sm-9 col-xs-12 form-group pull-right  no-print">
                <form method="post" class="form-inline">
                  <div class="row">
                    <div class="form-group">
                      <div class="col-md-12">
                        <div class="col-md-10">
                        <div class='input-group' id='motorista'>
                            <select name="motorista" id="motorista" class="form-control">
                              <option value="">Escolha o Veículo</option>
                              <option value=""></option>
                              <?php foreach ($veiculos->findAll() as $key => $value) { 

                                  if ($value->proprietario == '') {} {

                                  $AssId = $value->proprietario;
                                  $emp   = $associados->findID($AssId);

                                  if (!$emp->razao_social == '0') {
                              ?>
                              <option value="<?php echo $value->id; ?>">
                                <?php
                                  echo $value->placa." - ".$value->modelo; 
                                ?>
                              </option>
                              <?php } else {} }} ?>

                            </select>
                        </div>
                          
                        </div>

                        <div class="col-md-2">
                          <button type="submit" class="btn btn-success"><i class="fa fa-search"></i></button>
                        </div>

                        <input type="hidden" class="form-control" name="pesquisar_motorista" id="pesquisar_motorista" value="true">

                      </div>  
                    </div>
                    </div>
                </form>

                </div>
              
                   <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                    </p>
                    <table class="termo">
                        <tr>
                          <th>
                            <img src="img/logoSP.jpg" alt="Governo de São Paulo" class="img-responsive">
                          </th>
                          <th>
                           
                          </th>
                          <th>
                            <img src="img/logoDetranSPp.jpg" alt="Detran São Paulo" class="img-responsive">
                          </th>
                        </tr>
                        <tr>
                          <th>
                            
                          </th>
                          <th>
                            <h3>REQUERIMENTO PARA CONDUÇÃO DE VEÍCULO DE TRANSPORTE ESCOLAR</h3>
                          </th>
                          <th>
                            
                          </th>
                        </tr>


                      <tbody>
                          <tr>
                            <td colspan="3">

                              <br>
                              <br>



                              Eu <?php echo $razao; ?> ,
                               Decreto 55.588/2010,
                              portador do CNPJ <?php echo $cnpj; ?>, CNH <?php echo $cnh; ?> ,
                              categoria D, com validade até <?php echo $validade; ?> , residente no(a) <?php echo $rua; ?> , nº <?php echo $numero; ?> , <?php if ($complemento == "") {} else { echo "complemento ".$complemento.",";} ?> bairro <?php echo $bairro; ?> , CEP: <?php echo $cep; ?> , telefone <?php echo $telefone; ?> ,
                              proprietário do veículo de passageiros da marca/modelo <?php echo $mAm; ?> , chassi <?php echo $chassi; ?> ,
                              placa <?php echo $placa; ?> ,
                              categoria aluguel, devidamente autorizado pela Prefeitura de <?php echo $prefeitura; ?> , utilizando o prefixo nº <?php echo $prefixo; ?> , venho, por meio deste, solicitar a autorização para condução de veículo especial de transporte escolar neste município, nos termos do que dispõe o capítulo XIII do CTB e Portaria Detran 503/2009.
                              <br><br>
                              Para tanto, seguem anexos os documentos exigidos pela legislação vigente, e os comprovantes de pagamento das taxas devidas.
                            
                              <br><br>

                              <div class="rodape_requerimento">

                     
                              <br><br>
                              Guarulhos, _______ de ___________________ de 20_____.
                              <br><br>
                              <br><br>
                              <br><br>
                              _____________________________________________________<br>
                              <?php echo $assinatura; echo $razao1; ?>
                              <br><br>
                              <br><br>

                              
                             </div>
                             

                              

                             
                            </td>
                          </tr>
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
        format: 'DD/MM/YYYY'
    });


</script>
  </body>
</html>
