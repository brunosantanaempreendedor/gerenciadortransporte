<?php

	session_start();
	
	require_once 'classes/usuarios.php';

		
	
	  $session = new usuarios();

	  	if(isset($_SESSION['user_session']))
		  {
		    $id_usuario = $_SESSION['user_session'];
			$sql = "SELECT * FROM usuarios WHERE user_id=:user_id";
			$stmt = db::prepare($sql);
			$stmt->execute(array(":user_id"=>$id_usuario));
			$logRow=$stmt->fetch(PDO::FETCH_ASSOC);
			return $logRow;

		  }

	
	if($logRow =="")
	{
		$session->redirect('login.php');
	}