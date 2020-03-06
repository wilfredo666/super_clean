   <?php
    require "../conector/conexion.php";
    $id_usuario = $_POST['id_usuario'];
    $id_sucursal = $_POST['id_sucursal'];
    $total_cierre_caja=0;

   ?>
   <div class='row' style='margin:0px; padding:0px;'> 

               <label> Todos los campos con (*) son obligatorios </label> </br>
    
               <div class='col-lg-12 col-xs-12'> 

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
               
                $fecha = date("Y-m-d");
                /* VARIABLES DE SUMA */
                $total_pagos_servicios = 0;
                $total_saldos_entregas = 0;

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
                 $total_cierre_caja = $total_cierre_caja+$pagado;
                 ?>
                  <tr>
                     <td> <?php echo $codigo_ot; ?></td>
                     <td> <?php echo $cliente; ?></td>
                     <td> <?php echo $total; ?></td>
                     <td> <?php echo $pagado; ?></td>
                     <td> <?php echo $saldo; ?></td>
                     <td style="color: #2E2E2E; font-weight: bold;"> <?php echo $estado; ?></td>
                     <td> <?php echo $fecha_ot ; ?></td>

                  </tr>
                 <?php

                 }

               ?>
                <tr>
                  <th colspan="7"> SALDOS ENTREGAS DE SERVICIO </th>
                </tr>
               <?php

                /* LISTADO DE OT ENTREGADOS */

                $sql_ent = pg_query("SELECT * FROM entrega WHERE fecha = '$fecha'");
                while ($row_ent = pg_fetch_array($sql_ent))
                {
                    $codigo_ot = trim($row_ent['codigo_ot']);
                    $total = $row_ent['total'];
                    $pago = $row_ent['pago'];
                    $saldo = $row_ent['saldo'];
                    $estado = $row_ent['estado'];
                    $fecha_ent = $row_ent['fecha'];

                    $sql_ott = pg_query("SELECT * FROM orden_trabajo WHERE codigo_ot = '$codigo_ot'");
                    $row_ott = pg_fetch_array($sql_ott);
                    $cliente = $row_ott['cliente'];
                    $total_cierre_caja = $total_cierre_caja + $pago;

                 ?>
                  <tr>
                     <td> <?php echo $codigo_ot ; ?></td>
                     <td> <?php echo $cliente; ?></td>
                     <td> <?php echo $total; ?></td>
                     <td> <?php echo $pago; ?></td>
                     <td> <?php echo $saldo; ?></td>
                     <td style="color:green; font-weight: bold;"> <?php echo $estado; ?></td>
                     <td> <?php echo $fecha_ent; ?></td>

                  </tr>
                 <?php

                }


                /* LISTADO DE SERVICIOS ESPECIALES */

                $sql_cob = pg_query("SELECT * FROM cobro_lavado_especial WHERE fecha = '$fecha'");
                while ($row_cob = pg_fetch_array($sql_cob))
                {
                    $codigo = trim($row_cob['codigo_lav']);
                    $total = $row_cob['total'];
                    $pago = $row_cob['pago'];
                    $saldo = $row_cob['saldo'];
                    
                    $fecha_ent = $row_cob['fecha'];

                    $sql_le = pg_query("SELECT * FROM lavado_especial WHERE codigo = '$codigo'");
                    $row_le = pg_fetch_array($sql_le);
                    $cliente = $row_le['cliente'];
                    $estado = $row_le['estado'];

                    $total_cierre_caja = $total_cierre_caja + $total;

                 ?>
                  <tr>
                     <td> <?php echo $codigo; ?></td>
                     <td> <?php echo $cliente; ?></td>
                     <td> <?php echo $total; ?></td>
                     <td> <?php echo $total; ?></td>
                     <td> <?php echo $saldo; ?></td>
                     <td style="color:green; font-weight: bold;"> <?php echo $estado; ?></td>
                     <td> <?php echo $fecha_ent; ?></td>

                  </tr>
                 <?php

                }

               ?>
 
               </table>
               </div> 
               
               <div class='col-lg-6 col-xs-6'> 
               
               <label>total generado</label></br>
               <input type='text' id='total_generado' class='form-control' placeholder='(*)Escriba su total_generado' value="<?php echo $total_cierre_caja; ?>" maxlength="10" onkeypress='return valida_numeros(event);' >

               <div id='resp_total_generado' ></div>
               </div> 
               
               <div class='col-lg-6 col-xs-6'> 

               <input type='hidden' id='fecha'>
               <input type='hidden' id='id_usuario' value="<?php echo $id_usuario; ?>">
               <input type='hidden' id='id_sucursal' value="<?php echo $id_sucursal; ?>">
               <input type='hidden' id='hora'>

               
               </div> 
               
               <div class='col-lg-12 col-xs-12'> 
                 <div id='resultado_registro_cierre_caja'></div> 
               </div> 

   
   
   </div>
   <script type='text/javascript' src='../control/control_cierre_caja.js'></script>
