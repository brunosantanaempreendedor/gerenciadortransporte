<?php 
  session_start();
  require_once("classes/session.php");
  require_once("classes/usuarios.php");
  require_once("classes/associados.php");
  require_once("classes/motoristas.php");
  require_once("classes/empresas.php");
  require_once("classes/vistorias.php");
  require_once("classes/veiculos.php");
  require_once("classes/cabeca.php");
  require_once("classes/alvarap.php");

  $quem             = new usuarios();
  $listQuem         = $quem->find();

  $associados       = new associados();
  $listAssociados   = $associados->findAll();

  $motoristas       = new motoristas();
  $empresas         = new empresas();
  $vistorias        = new vistorias();
  $veiculos         = new veiculos();
  $cabeca           = new cabeca();
  $alvarap          = new alvarap();





  // ===============================   CONFIGURAÇÕES BÁSICAS DO SITE   =========================== //

$sgc = "ACEAGG";

 ?>