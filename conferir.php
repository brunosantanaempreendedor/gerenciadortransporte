<?php
  require_once("classes/associados.php");
  require_once("classes/observacoes.php");
  require_once("classes/entradas.php");
  require_once("classes/saidas.php");
  $associados     = new associados();
  $observacoes    = new observacoes();
  $entradas       = new entradas();
  $saidas       = new saidas();
 

  // STATUS OBSERVAÇÃO

  if (isset($_POST["observacao"])) {
    $codigo     = $_POST["associado"];

    $assoc = $associados->findCOD($codigo);

    $obs = $observacoes->findCOD($codigo);
    if ($obs) {

      foreach ($obs as $key => $value) {

        ?>

        <tr>
          <td><?php echo date('d/m/Y', strtotime($value->horario));?></td>
          <td><?php echo $value->texto; ?></td>
          <td align='center'>
              <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="EXCLUIR Observação" onClick="window.location='obs_ver.php?del_id=<?=$value->id;?>&asc=<?=$assoc->id;?>';"><i class='fa fa-trash'></i></button>
          </td>
        </tr>

        <?php
    
    }

    } else { 
      echo "<tr><td colspan='3'>";
      echo "<hr>Não há observações cadastradas";
      echo "</td></tr>";
    }

    
                                          
  }

  // STATUS MENSALIDADE

  if (isset($_POST["mensalidade"])) {
    $codigo     = $_POST["associado"];

    $assoc = $associados->findCOD($codigo);

    $anual = $entradas->findCODAno($codigo);
    if ($anual) {

      foreach ($anual as $key => $value) {

        ?>

        <table id="datatable" class="table table-striped table-bordered">
          <tr>
            <td><h3><?php echo $value->ano; ?></h3></td>
            <td>
              <table id="datatable" class="table table-striped table-bordered">
                <tr>
                  <?php 
                  $year   = $value->ano;
                  $mensal = $entradas->findCODMes($codigo,$year);
                   foreach ($mensal as $key => $vm) {
                     $mes = $vm->mes;
                      switch($mes){
                          case "01":
                              echo "<td>Jan</td>";
                              break;
                          case "02":
                              echo "<td>Fev</td>";
                              break;
                          case "03":
                              echo "<td>Mar</td>";
                              break;
                          case "04":
                              echo "<td>Abr</td>";
                              break;
                          case "05":
                              echo "<td>Mai</td>";
                              break;
                          case "06":
                              echo "<td>Jun</td>";
                              break;
                          case "07":
                              echo "<td>Jul</td>";
                              break;
                          case "08":
                              echo "<td>Ago</td>";
                              break;
                          case "09":
                              echo "<td>Set</td>";
                              break;
                          case "10":
                              echo "<td>Out</td>";
                              break;
                          case "11":
                              echo "<td>Nov</td>";
                              break;
                          case "12":
                              echo "<td>Dez</td>";
                              break;
                      } } ?>
                </tr>
                <tr>
                  <?php 
                  foreach ($mensal as $key => $vm1) {
                    if ($vm1->mes) {
                   ?>
                  <td>
                    <a href="mensalidade_ver.php?tx=<?php echo $vm1->id; ?>">
                    <i class="fa fa-check btn btn-info"></i>
                    </a>
                  </td>
                  <?php } else {}}?>
                </tr>
              </table>
            </td>
          </tr>
        </table>

        <?php
    
    }

    } else { 
      echo "<hr>Não há mensalidades lançadas";
    }

    
                                          
  }

  // STATUS MENSALIDADE GERAL

  if (isset($_POST["mensalidadegeral"])) {

    $anual = $entradas->findAno($codigo);
    if ($anual) {

      foreach ($anual as $key => $value) {

        ?>

        <table id="datatable" class="table table-striped table-bordered">
          <tr>
            <td><h3><?php echo $value->ano; ?></h3></td>
            <td>
              <?php 
                  $year   = $value->ano;
                  foreach ($entradas->findAssociado($year) as $key => $vass) {
                     $codigo    = $vass->associado;
                     $associado = $associados->findCOD($codigo); 
                    
              ?>

              <table id="datatable" class="table table-striped table-bordered">
                <tr>
                  <td>
                    <h4><?php echo $associado->nome; ?></h4>
                  </td>
                </tr>
                <tr>
                  <td>
                    <table id="datatable" class="table table-striped table-bordered">
                <tr>
                  <?php 
                  $mensal = $entradas->findCODMes($codigo,$year);
                   foreach ($mensal as $key => $vm) {
                     $mes = $vm->mes;
                      switch($mes){
                          case "01":
                              echo "<td>Jan</td>";
                              break;
                          case "02":
                              echo "<td>Fev</td>";
                              break;
                          case "03":
                              echo "<td>Mar</td>";
                              break;
                          case "04":
                              echo "<td>Abr</td>";
                              break;
                          case "05":
                              echo "<td>Mai</td>";
                              break;
                          case "06":
                              echo "<td>Jun</td>";
                              break;
                          case "07":
                              echo "<td>Jul</td>";
                              break;
                          case "08":
                              echo "<td>Ago</td>";
                              break;
                          case "09":
                              echo "<td>Set</td>";
                              break;
                          case "10":
                              echo "<td>Out</td>";
                              break;
                          case "11":
                              echo "<td>Nov</td>";
                              break;
                          case "12":
                              echo "<td>Dez</td>";
                              break;
                      } } ?>
                </tr>
                <tr>
                  <?php 
                  foreach ($mensal as $key => $vm1) {
                    if ($vm1->mes) {
                   ?>
                  <td>
                    <a href="">
                    <i class="fa fa-check btn btn-info"></i>
                    </a>
                  </td>
                  <?php } else {}}?>
                </tr>
              </table>
                  </td>
                </tr>
              </table>
              <?php } ?>


            </td>
          </tr>
        </table>

        <?php
    
    }

    } else { 
      echo "<hr>Não há mensalidades lançadas";
    }

    
                                          
  }

  // STATUS RECEBIMENTOS DIVERSOS

  if (isset($_POST["rdiversos"])) {

    $diver = $entradas->findAllDiversos();
    if ($diver) {

      foreach ($diver as $key => $value) {

        ?>

        <tr>
          <td><?php echo date('d/m/Y', strtotime($value->data));?></td>
          <td><?php echo $value->tipo; ?></td>
          <td><?php echo number_format($value->valor, 2, ',', '.'); ?></td>
          <td align='center'>
              <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="EXCLUIR Diversos" onClick="window.location='rdiversos.php?del_id=<?=$value->id;?>&asc=<?=$assoc->id;?>';"><i class='fa fa-trash'></i></button>
          </td>
        </tr>

        <?php
    
    }

    } else { 
      echo "<tr><td colspan='4'>";
      echo "<hr>Não há Recebimentos Diversos lançados";
      echo "</td></tr>";
    }

    
                                          
  }



  // STATUS PAGAMENTOS DIVERSOS

  if (isset($_POST["pdiversos"])) {

    $diver = $saidas->findAll();
    if ($diver) {

      foreach ($diver as $key => $value) {

        ?>

        <tr>
          <td><?php echo date('d/m/Y', strtotime($value->data));?></td>
          <td><?php echo $value->tipo; ?></td>
          <td><?php echo number_format($value->valor, 2, ',', '.'); ?></td>
          <td align='center'>
              <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="EXCLUIR Diversos" onClick="window.location='pdiversos.php?del_id=<?=$value->id;?>';"><i class='fa fa-trash'></i></button>
          </td>
        </tr>

        <?php
    
    }

    } else { 
      echo "<tr><td colspan='4'>";
      echo "<hr>Não há Recebimentos Diversos lançados";
      echo "</td></tr>";
    }

    
                                          
  }




