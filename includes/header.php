<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <a class="navbar-brand" href="index.php" target="_parent">
        <img class="img-responsive" src="img/marcatrans.png" alt=""></a>
    </div>
            <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
            
                <!-- /.dropdown -->
        <li class="dropdown">
            <a href="index.php" target="_parent" title="Ordem de Serviço">
                <i class="fa fa-pencil-square-o fa-fw"></i> <div class="wrd">Ordem de Serviço</div>
            </a>
           
        </li>
                <!-- /.dropdown -->
        <li class="dropdown">
            <a href="clientes.php" target="_parent" title="Clientes">
                <i class="fa fa-file-image-o fa-fw"></i> <div class="wrd">Clientes</div>
            </a>
           
        </li>
           
                <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i> <div class="wrd">Usuários</div>
            </a>
                <ul class="dropdown-menu dropdown-user">

                    <!-- Verifica se o usuário tem permissão para gerenciar USUÁRIOS -->
                        <?php $nivel_do_usuario = $logRow['user_nivel']; if ($nivel_do_usuario == 1) { ?>
                    <li><a href="usuarios.php" target="_parent"><i class="fa fa-user fa-fw"></i> Usuários</a>
                    </li>
                    <?php } else { ?>
                    <li><a href="usuario_editar.php?id=<?php echo $logRow['user_id']; ?>" target="_parent"><i class="fa fa-user fa-fw"></i> Usuários</a>
                    </li>
                    <?php } ?>
                    
                    <li class="divider"></li>
                    <li><a href="logout.php?logout=true" target="_parent"><i class="fa fa-sign-out fa-fw"></i> Sair</a>
                    </li>
                </ul>
                    <!-- /.dropdown-user -->
        </li>
                <!-- /.dropdown -->
    </ul>
            <!-- /.navbar-top-links -->
</nav>