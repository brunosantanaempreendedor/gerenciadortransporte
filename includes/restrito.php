<?php
@session_start();
if (isset($_SESSION['username']) && isset($_SESSION['password'])){
   $login_usuario = $_SESSION['username'];
}
else {
   header("Location:login.php");
   exit();
}
?>
