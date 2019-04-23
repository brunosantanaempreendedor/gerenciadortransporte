<?php 
session_start();
require_once("classes/usuarios.php");
require_once("includes/configuracoes.php");

$login = new usuarios();

// Verifica se está logado
if($login->is_loggedin()!="") {
    $login->redirect('index.php');
}

// Recebe as informações do formulário de Login
if(isset($_POST['btn-login']))
{
    //$uname = strip_tags($_POST['txt_uname_email']);
    $usuario  = strip_tags($_POST['user_usuario']);
    $upass    = strip_tags($_POST['password']);
        
    if($login->doLogin($usuario,$upass)) {
        $login->redirect('index.php');
    } else {
        $error = "Informações incorretas";
    }   
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
    <meta name="author" content="Gérson Dorneles - Programador - gdorneles@gmail.com"/>
    <link rel="shortcut icon" href="images/favicon.ico">
    <meta name="description" content="Sistema de Gerencimento Medeiros & Associados"/>
    <meta name="keywords" content="Tekon"/>

    <title><?PHP echo "$sgc"; ?></title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
    <link href="build/css/estilo.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="form login_form">
          <section class="login_content">
            <div class="logo_login">
             <img class="img-responsive" src="images/logop.png" alt="">
            </div>
            <form role="form" method="post" id="login-form">
      
                            <div id="error">
                            <?php
                                if(isset($error))
                                {
                                    ?>
                                    <div class="alert alert-danger">
                                       <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
                                    </div>
                                    <?php
                                }
                            ?>
                            </div>
             
              <div>
                <input type="text" class="form-control" name="user_usuario" placeholder="Usuário" required  autofocus />
              </div>
              <div>
                <input type="password" class="form-control" name="password" placeholder="Senha" />
              </div>
              <div>
                 <button type="submit" name="btn-login" class="btn btn-lg btn-success btn-block">
                   <i class="glyphicon glyphicon-log-in"></i> &nbsp; ENTRAR
                 </button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">

                <div class="clearfix"></div>
                <br />

                <div>
                  <p><a href="http://www.tekon.com.br" target="_blank"> <img src="images/tekon_pb.png" alt=""></a> © 2018 Todos os Direitos Reservados.</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="form registration_form">
          <section class="login_content">
            <div class="logo_login">
             <img class="img-responsive" src="images/logop.png" alt="">
            </div>
            <form>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Enviar</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Já tem cadastro?
                  <a href="#signin" class="to_register"> Entrar </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <p><a href="http://www.tekon.com.br" target="_blank"> <img src="images/tekon_pb.png" alt=""></a> © 2018 Todos os Direitos Reservados.</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
