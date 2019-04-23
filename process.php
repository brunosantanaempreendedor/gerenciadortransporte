 <?php  
  date_default_timezone_set('America/Sao_Paulo');
  require_once("classes/associados.php");
  require_once("classes/observacoes.php");
  require_once("classes/entradas.php");
  require_once("classes/saidas.php");
  $associados       = new associados();
  $observacoes      = new observacoes();
  $entradas         = new entradas();
  $saidas           = new saidas();

// CADASTRAR OBSERVAÇÕES

if (isset($_POST['obs_add'])) {
  $c = strip_tags($_POST['obs_add']);
  if ($c == true) {

      $associado      = $_POST['associado'];
      $texto          = $_POST['texto'];
      $time           = time();
      $codigo         = substr(time().rand(10000,99999),-15);
      $horario        = date('Y-m-d H:i:s');

      if ($associado == '') {echo "<h3>Associado não informado!</h3>";} else {

          if ($observacoes->cadastro($codigo,$associado,$texto,$horario)) {
            echo "<h3>Observação cadastrada com sucesso!</h3>";
          } else {echo "<h3>Ocorreu um erro!</h3>";}


      }

  }
}

// CADASTRAR MENSALIDADES

if (isset($_POST['mensal_add'])) {
  $c = strip_tags($_POST['mensal_add']);
  if ($c == true) {

      $associado    = $_POST['associado'];
      $mes          = $_POST['mes'];
      $ano          = $_POST['ano'];
      $valor        = $_POST['valor'];
      $data         = $_POST['data'];
      $time         = time();
      $codigo       = substr(time().rand(10000,99999),-15);
      $mensalidade  = 1;

      if ($associado == '') {echo "<h3>Associado não informado!</h3>";} else {

          if ($entradas->cadastro($codigo,$associado,$mes,$ano,$valor,$mensalidade,$data)) {
            echo "<h3>Mensalidade cadastrada com sucesso!</h3>";
          } else {echo "<h3>Ocorreu um erro!</h3>";}


      }

  }
}

// CADASTRAR RECEBIMENTOS DIVERSOS

if (isset($_POST['diversos_add'])) {
  $c = strip_tags($_POST['diversos_add']);
  if ($c == true) {

      $associado    = 100090000800011;
      $tipo         = strtoupper($_POST['tipo']);
      $valor        = $_POST['valor'];
      $data         = $_POST['data'];
      $time         = time();
      $codigo       = substr(time().rand(10000,99999),-15);
      $diversos     = 1;

          if ($entradas->cadastroDiversos($codigo,$associado,$tipo,$valor,$diversos,$data)) {
            echo "<h3>Recebimento diverso cadastrado com sucesso!</h3>";
          } else {echo "<h3>Ocorreu um erro!</h3>";}


     

  }
}



// CADASTRAR PAGAMENTOS DIVERSOS

if (isset($_POST['pdiversos_add'])) {
  $c = strip_tags($_POST['pdiversos_add']);
  if ($c == true) {

      $tipo         = strtoupper($_POST['tipo']);
      $valor        = $_POST['valor'];
      $data         = $_POST['data'];
      $time         = time();
      $codigo       = substr(time().rand(10000,99999),-15);
      $diversos     = 1;

          if ($saidas->cadastro($codigo,$valor,$tipo,$data)) {
            echo "<h3>Pagamento diverso cadastrado com sucesso!</h3>";
          } else {echo "<h3>Ocorreu um erro!</h3>";}


     

  }
}