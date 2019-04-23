<?php

	session_start();
	
	require_once 'includes/class.user.php';
	  $session = new USER();

	  $user_id = $_SESSION['user_session'];
	  $stmt = $session->runQuery("SELECT * FROM usuarios WHERE user_id=:user_id");
	  $stmt->execute(array(":user_id"=>$user_id));
	  $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
	
	// if user session is not active(not loggedin) this page will help 'home.php and profile.php' to redirect to login page
	// put this file within secured pages that users (users can't access without login)
	
	if(!$session->is_loggedin())
	{
		// session no set redirects to login page
		$session->redirect('login.php');
	}