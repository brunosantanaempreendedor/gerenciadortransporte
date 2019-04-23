
        <div class="top_nav">
          <div class="nav_menu no-print">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">

                    <?php $pic = $logRow['foto']; if ($pic =='') { ?>
                    <img src="images/user.png" alt="Sem Foto">
                    <?php } else { ?>
                    <img src="usuarios/<?php echo $pic; ?>">
                    <?php } ?>

                    <?php echo $logRow['user_name']; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href=""> Perfil</a></li>
                    <li><a href="logout.php?logout=true"><i class="fa fa-sign-out pull-right"></i> Sair</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                  </a>
            
                </li>
              </ul>
            </nav>
          </div>
        </div>