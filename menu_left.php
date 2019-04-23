
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <div class="logo_topo">
              <a href="index.html" class="site_title"><img src="images/logop.png" alt="ACEAGG" class="img-responsive"></a>
              </div>

            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <?php $pic = $logRow['foto']; if ($pic =='') { ?>
                <img src="images/user.png" alt="Sem Foto" class="img-circle profile_img">
                <?php } else { ?>
                <img src="usuarios/<?php echo $pic; ?>" class="img-circle profile_img">
                <?php } ?>
              </div>
              <div class="profile_info">
                <span>Bem Vindo,</span>
                <h2><?php echo $logRow['user_name']; ?></h2>

                <a href="usuario_editar.php?id=<?php echo $logRow['user_id'];?>" class="btn btn-success"><i class="fa fa-edit m-right-xs"></i> EDITAR</a>

              </div>
              <div class="clearfix">
                
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-home"></i> Home</a>
                  </li>
                  <li><a href="associados.php"><i class="fa fa-users"></i> Associados</a>
                  </li>
                  <li><a href="aniversariantes.php"><i class="fa fa-users"></i> Aniversariantes</a>
                  </li>
                  <li><a href="motoristas.php"><i class="fa fa-id-card-o"></i> Motoristas</a>
                  </li>
                  <li><a href="veiculos.php"><i class="fa fa-car"></i> Veículos</a>
                  </li>

                  <li><a><i class="fa fa-file-text-o"></i> Prefeitura <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="alvarap.php">Alvará</a></li>
                      <li><a href="http://servicos.guarulhos.sp.gov.br/01_servicos/central_atend/form_protocolo/jan_abre_proc.htm" target="_blank">Requerimento Pref.</a></li>
                      <li><a href="termop.php">Termo de Procuração PF</a></li>
                      <li><a href="termopj.php">Termo de Procuração PJ</a></li>
                      <li><a href="reavaliarp.php">Documentos</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-file-text-o"></i> Ciretran <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="alvarac.php">Autorização Especial</a></li>
                      <li><a href="cirequerimento.php">Requerimento Ciretran PF</a></li>
                      <li><a href="cirequerimentopj.php">Requerimento Ciretran PJ</a></li>
                      <li><a href="cirdocumentos.php">Documentos</a></li>
                      <li><a href="laudoCECAP089.pdf" target="_blank">Laudo</a></li>
                      <li><a href="ciprocuracaopf.php">Procuração PF</a></li>
                      <li><a href="ciprocuracaopj.php">Procuração PJ</a></li>
                    </ul>
                  </li>

                  <li><a href="cabecalho.php"><i class="fa fa-file-image-o"></i> Cabecalho</a>
                  </li>
                  <?php if ($logRow['user_nivel'] == 1) { ?>
                  <li><a href="usuarios.php"><i class="fa fa-user"></i> Usuários</a>
                  </li>
                  <?php } else {} ?>

                  <li><a href="alterar_senha.php"><i class="fa fa-key"></i> Alterar Senha</a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Configurações">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Tela Cheia">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Sair"  href="logout.php?logout=true">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>
