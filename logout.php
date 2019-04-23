<?php
	require_once('classes/session.php');
	require_once('classes/usuarios.php');
	$user_logout = new usuarios();
	
	if($user_logout->is_loggedin()!="")
	{
		$user_logout->redirect('index.php');
	}
	if(isset($_GET['logout']) && $_GET['logout']=="true")
	{
		$user_logout->doLogout();
		$user_logout->redirect('login.php');
	}
