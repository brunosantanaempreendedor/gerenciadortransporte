<?php 
  require_once("classes/classes.php");

  if(isset($_POST['pesquisar_motorista']))
    {
      $id         = $_POST['motorista'];

      $motor      = $motoristas->getID($id);

      $nome       = strtoupper($motor->nome);
      $rg         = $motor->rg;

    } else {

      $nome       = "«NOME_PRO»";
      $rg         = "«RG_PRO»";
      
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
                              <option value="">Escolha o Motorista</option>
                              <option value=""></option>
                              <?php foreach ($motoristas->findAll() as $key => $value) { ?>
                              <option value="<?php echo $value->id; ?>"><?php echo $value->nome; ?></option>
                              <?php } ?>

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
                    <table class="table table-bordered termo">
                      <thead>
                        <tr>
                          <th><img src="img/logoRequerimento.jpg" alt="Prefeitura de Guarulhos" class="img-responsive"></th>
                          <th><h3>REQUERIMENTO PARA ABERTURA DE PROCESSO ADMINISTRATIVO</h3></th>
                        </tr>
                      </thead>


                      <tbody>
                          <tr>
                            <td colspan="2">

                              <table width="100%">
                                <tr>
                                  <td width="70%">Excelentíssimo Senhor
                                    <br>
                                  PREFEITO DO MUNICÍPIO DE GUARULHOS</td>
                                  <td>
                                    <table>
                                      <tr>
                                        <td align="center">para uso exclusivo do Fácil</td>
                                      </tr>
                                      <tr>
                                        <td height="50px">PA________________ ANO_____________</td>
                                      </tr>
                                      <tr>
                                        <td height="50px">OA_________________________________<br><br>
                                            PARA_______________________________</td>
                                      </tr>
                                    </table>
                                    
                                  </td>
                                </tr>
                              </table>
                              <br>
                              <br>



                              (Requerente) _____________________________________________________________________________________ ,
                              abaixo assinado, residente/estabelecido na ______________________________________________________________ ,
                              nº _________ , complemento ________________________________ , bairro __________________________________ ,
                              cidade ______________________________ , estado ______ , CEP: _________________ , fone ___________________ ,
                              Inscrição Imobiliária ______________________________ , Inscrição Mobiliária ______________________________ ,
                              email
                              ___________________________________________________________________________________________ ,
                              venho, respeitosamente, solicitar o que segue: __________________________________________________________________________________________________________
                              __________________________________________________________________________________________________________
                              __________________________________________________________________________________________________________
                              __________________________________________________________________________________________________________
                              __________________________________________________________________________________________________________
                              __________________________________________________________________________________________________________
                              __________________________________________________________________________________________________________
                              __________________________________________________________________________________________________________
                              __________________________________________________________________________________________________________
                              <br><br>
                              <table width="100%">
                                <tr>
                                  <td align="center">
                                    <h4> AUTORIZO para todos os atos deste processo o/a(s) sr./srª.(s):</h4>
                                    Nome: _____________________________________________________________ RG: ______________________________<br><br>
                                    Nome: _____________________________________________________________ RG: ______________________________
                                  </td>
                                </tr>
                              </table>
                              <br><br>

                              <div class="rodape_requerimento">

                              <h4> DADOS DO REQUERENTE </h4>
                              <br><br>
                              CPF / CNPJ _______________________________________________ , RG __________________________________________
                              <br><br> <br><br>
                              N. Termos,<br>
                              P. Deferimento,
                              <br><br>
                              <br><br>
                              Guarulhos, _______ de ___________________ de ___________.
                              <br><br>
                              <br><br>
                              _____________________________________________________<br>
                              ASSINATURA DO REQUERENTE
                              <br><br>
                              <br><br>
                              _____________________________________________________<br>
                              (para pessoa jurídica nome
                              por extenso do assinante)

                              
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
