 
 <?php
 require('../conector/conexion.php');

 $ID_cierre_caja = $_POST['ID_cierre_caja'];

 $query = pg_query("SELECT * FROM cierre_caja WHERE id_cierre_caja='$ID_cierre_caja'");
 $row_cierre = pg_fetch_array($query);
 
    $fecha = $row_cierre['fecha_cierre']; 
    $id_usuario = $row_cierre['id_usuario'];
    $total_generado = $row_cierre['total_generado'];
    $hora = $row_cierre['hora']; 

      ?> 
      <div class='row'>
       <input type="hidden" id="ID_cierre_caja_edicion" value="<?php echo $ID_cierre_caja; ?>">
       <div class='col-lg-12 col-md-12 col-xs-12'>
         
             <table class="table table-bordered table-condensed">
               <tr>
                  <th> Codigo </th>
                  <th> Cliente </th>
                  <th> Total </th>
                  <th> Pago </th>
                  <th> Saldo </th>
                  <th> Estado </th>
                  <th> Fecha </th>
               </tr>

               <?php 

                $sql = pg_query("SELECT DISTINCT codigo_ot FROM orden_trabajo WHERE fecha = '$fecha'");

                while ($row = pg_fetch_array($sql) ) {
                  
                 $codigo_ot = $row['codigo_ot'];
                 
                 $sql_ot = pg_query("SELECT * FROM orden_trabajo WHERE codigo_ot='$codigo_ot'");
                 $row_ot = pg_fetch_array($sql_ot);

                 $total = $row_ot['total_servicio'];
                 $cliente = $row_ot['cliente'];
                 $pagado = $row_ot['pago_servicio'];
                 $saldo = $row_ot['saldo_servicio'];
                 $estado = $row_ot['estado']; 
                 $fecha_ot = $row_ot['fecha']; 
                 
                 ?>
                  <tr>
                     <td> <?php echo $codigo_ot ; ?></td>
                     <td> <?php echo $cliente ; ?></td>
                     <td> <?php echo $total ; ?></td>
                     <td> <?php echo $pagado ; ?></td>
                     <td> <?php echo $saldo ; ?></td>
                     <td> <?php echo $estado ; ?></td>
                     <td> <?php echo $fecha_ot; ?></td>

                  </tr>
                 <?php

                 }

               ?>
                <tr>
                  <th colspan="7"> ORDENES DE TRABAJO FINALIZADOS </th>
                </tr>
               <?php

                /* LISTADO DE OT ENTREGADOS */

                $sql_ent = pg_query("SELECT * FROM entrega WHERE fecha ='$fecha'");
                while ($row_ent = pg_fetch_array($sql_ent))
                {
                    $codigo_ot = trim($row_ent['codigo_ot']);
                    $estado = $row_ent['estado'];
                    $fecha_ent = $row_ent['fecha'];

                    $sql_ott = pg_query("SELECT * FROM orden_trabajo WHERE codigo_ot = '$codigo_ot'");
                    $row_ott = pg_fetch_array($sql_ott);
                    $cliente = $row_ott['cliente'];
                    $total = $row_ent['total'];
                    $pagado = trim($row_ent['pago']);
                    $saldo = $row_ent['saldo'];
 
                 ?>
                  <tr>
                     <td> <?php echo $codigo_ot ; ?></td>
                     <td> <?php echo $cliente ; ?></td>
                     <td> <?php echo $total ; ?></td>
                     <td> <?php echo $pagado ; ?></td>
                  

                     <td> <?php echo $saldo ; ?></td>
                     <td style="color:green;"> <?php echo $estado ; ?></td>
                     <td> <?php echo $fecha_ent ; ?></td>

                  </tr>
                 <?php

                } ?>
              </table>

              <table class="table table-bordered table-condensed">
                <tr>
                  <th> Total Cierre </th>
                  <td colspan="3" style="font-weight: bold; font-size: 20px; color: green; padding: 0px; padding-left: 1%;"> 
                    <input type="text" id="total_generado" value="<?php echo $total_generado; ?>" class="form-control" maxlength="10" onkeypress='return valida_numeros(event);' >
                  </td>

                </tr>
                 
                <tr>
                  <th>  usuario </th>
                  <td> <?php 
                   $slq_usr = pg_query("SELECT * FROM usuario WHERE id_usuario = '$id_usuario'");
                   $row_usr = pg_fetch_array($slq_usr);
                   echo $row_usr['nombres']." ".$row_usr['apellidos'];
                  ?></td>
                  <th>  fecha </th>
                  <td> <?php echo $fecha; echo " "; echo $hora; ?></td>
                </tr>
              </table>

       </div>
 
 
 <!-- final div row -->
 </div>
 <script type='text/javascript' src='../control/control_editar_cierre_caja.js'></script>
 
