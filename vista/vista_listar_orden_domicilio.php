
    <div class='row' style='background:; margin: 0px; padding: 0px;'>
    <!-- Formulario de Busqueda-->
 
    <div class='col-lg-12 col-xs-12' style='background:white; padding:0px; margin:0px; color:#6E6E6E;'>
        
      <h4 style='margin-bottom:0px;'> Registros de orden a domicilio </h4>
      <p style='margin:0px; margin-bottom:3px; font-size: 10px;'> Listado de todos los datos registrados hasta la ultima fecha : </p>
              
      <div id='panel_listado_orden_domicilio'> 

        <div class="row">
          <div class="col-lg-4 col-md-4 col-xs-12">
            <div style="padding: 2%;"> 
                  <h4 style="margin: 0px; background: #0B3861; padding: 1%; color:white; ">   ORDENES DE TRABAJO  </h4>
                  <table class="table table-condensed">
                  <?php

                  require "../conector/conexion.php";

                  $sql_ot = pg_query("SELECT DISTINCT codigo_ot FROM orden_trabajo WHERE estado='ACTIVO'");

                  while ($row_ot = pg_fetch_array($sql_ot)) {
                    $codigo_ot = $row_ot['codigo_ot'];

                    /* Mostramos el listado de ordenes de trabajo */

                    $sql_ot_env = pg_query("SELECT * FROM orden_trabajo WHERE codigo_ot='$codigo_ot'");
                    $row_ot_env = pg_fetch_array($sql_ot_env);

                    $cliente = $row_ot_env['cliente'];
                    ?>
                    <tr>
                      <td> <label><?php echo $codigo_ot; ?> </label></br>
                           <?php echo $cliente; ?></td>
                           <td> <button class="btn btn-primary btn-md" onclick="btn_registrar_ot_envio('<?php echo $codigo_ot; ?>');"> + </button></td>
                    </tr>
                    <?php


                  }


                  ?>
                  </table>
            </div>
          </div>
          <!-- FORMULARIO DE ASIGNACION DE CHOFER A LA ORDEN DE TRABAJO -->

          <div class="col-lg-6 col-md-6 col-xs-12">
             <div style="padding: 2%;"> 
                 <div id="panel_formulario_registro_ot_chofer">
                   
                 </div>
             </div>

          </div>

          <!-- FORMULARIO DE ASIGNACION DE CHOFER A LA ORDEN DE TRABAJO -->

          <div class="col-lg-2 col-md-2 col-xs-12">

          </div>


        </div>

      </div>
              
    </div>
   <!-- Final de row -->
</div>

<!-- Modal de registro -->

<div id='myModal_Registrar' class='modal fade' role='dialog'>
  <div class='modal-dialog modal-lg'>

    <!-- Modal content-->
    <div class='modal-content'>
     <div class='modal-header'>
       <button type='button' class='close' data-dismiss='modal'>&times;</button>
       <h4 class='modal-title'> Registrar orden_domicilio </h4>
     </div>
     
     <div class='modal-body'>

      <div id='panel_registro_orden_domicilio'>
      </div>

      </div>
      <div class='modal-footer'>
      
      <button type='button' class='btn btn-default btn-md' onclick='btn_registro_orden_domicilio();'> registrar </button>

      <button type='button' class='btn btn-danger btn-md' data-dismiss='modal'> cancelar  </button>
             
      </div>
     </div>

  </div>
</div>

<script src='../control/control_orden_domicilio.js'> </script>
