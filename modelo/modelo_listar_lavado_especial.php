
<?php
    require('../conector/conexion.php');
   
    $action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
    
    if($action == 'ajax'){
    include 'paginacion.php'; //incluir el archivo de paginación
    //las variables de paginación
    
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
    $per_page = 10; //la cantidad de registros que desea mostrar
    $adjacents  = 4; //brecha entre páginas después de varios adyacentes
    $offset = ($page - 1) * $per_page;
    $id_usuario = $_POST['id_usuario'];
    $sql_carg = pg_query("SELECT * FROM usuario WHERE id_usuario='$id_usuario'");
    $row_carg = pg_fetch_array($sql_carg);
    $cargo = trim($row_carg['cargo']);
    // Cuenta el número total de filas de la tabla 
    $numrows = 0;

    $sql_count = pg_query("SELECT DISTINCT codigo FROM lavado_especial");
    while($row_count = pg_fetch_array($sql_count))
    { $numrows++; }
    
    $total_pages = ceil($numrows/$per_page);
    $reload = '../vista/vista_listar_lavado_especial.php';

    //consulta principal para recuperar los datos
    $sql_le = pg_query("SELECT DISTINCT codigo,hora,fecha FROM lavado_especial ORDER BY fecha DESC OFFSET $offset LIMIT $per_page");
    
    if ($numrows>0){
      ?>
    <div class="table-responsive">
    <table class='table table-bordered'>
        <thead>
        <tr>
          <th>codigo</th>
          <th>cliente</th>    
          <th>total</th>
          <th>pago</th>
          <th>saldo</th>
          <th>fecha</th>
          <th>hora</th>   
          <th>estado</th>  
          <th class='col-lg-1'> </th> 
        </tr>
       </thead>

      <tbody>
      <?php
       while($row_le = pg_fetch_array($sql_le)){

        $codigo = trim($row_le['codigo']);
        $sql = pg_query("SELECT * FROM lavado_especial WHERE codigo='$codigo'");
        $row = pg_fetch_array($sql);
      ?>
        <tr> 
         <td style="color:black; font-weight: bold;"><?php echo $row['codigo'];?></td>
         <td><?php echo $row['cliente'];?></td>
         <td><?php echo $row['total'];?></td>
         <td><?php echo $row['pago'];?></td>
         <td><?php echo $row['saldo'];?></td>
         <td><?php echo $row['fecha'];?></td>
         <td><?php echo $row['hora'];?></td>
         <td><?php echo $row['estado'];?></td>

    <td align='center'>

     <button type='button' class='btn btn-default btn-xs' onclick="btn_opciones('<?php echo $codigo;?>');"data-toggle='modal' data-target='#myModal_opciones'> ... </button></td>
     </tr>
     <?php

     $sql_ver = pg_query("SELECT COUNT(*) AS count FROM cobro_lavado_especial WHERE codigo_lav = '$codigo'");
     $row_ver = pg_fetch_array($sql_ver);
     $cont = trim($row_ver['count']);

     if ($cont>0) {
    
     $sql_cob = pg_query("SELECT * FROM cobro_lavado_especial WHERE codigo_lav = '$codigo'");
     $row_cob = pg_fetch_array($sql_cob);

     ?>
        <tr style="background:#E6E6E6;"> 
         <td><?php echo $row['codigo'];?></td>
         <td><?php echo $row['cliente'];?></td>
         <td><?php echo $row_cob['total'];?></td>
         <td><?php echo $row_cob['pago'];?></td>
         <td><?php echo $row_cob['saldo'];?></td>
         <td><?php echo $row_cob['fecha'];?></td>
         <td><?php echo $row_cob['hora'];?></td>
         <td style="color:green;"> COBRADO </td>

    <td align='center'>

     </td>
     </tr>    
     <?php
        }
        /* FINAL DEL IF */
      }
      ?>
      </tbody>
     </table>
     </div>
     <!-- INICIO DE LOS MODALS -->
     
     <!-- Modal Opciones -->
        <div id='myModal_opciones' class='modal fade' role='dialog'>
          <div class='modal-dialog modal-xs'>

            <!-- Modal content-->
            <div class='modal-content'>
              <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal' 
                onclick='actualizar_y_salir();'>&times;</button>
                <h4 class='modal-title'> Opciones </h4>
              </div>
              <div class='modal-body' align='center'>
              <div id='cargando'></div>

              <input type='hidden' id='ID_contenido'>

              <button type='button' class='btn btn-info btn-md' data-toggle='modal' data-target='#myModal_Cobrar' onclick='btn_cobrar_lavado_especial();'> Cobrar </button>
             
              
              <button type='button' class='btn btn-default btn-md' data-toggle='modal' data-target='#myModal_Examinar' onclick='btn_ver_lavado_especial();'> Examinar </button>

              <?php if ($cargo==1)
                    {
                      ?>
                      <button type='button' class='btn btn-default btn-md' data-toggle='modal' data-target='#myModal_Edicion' onclick='btn_editar_lavado_especial();'> Edicion </button>
             
                      <button type='button' class='btn btn-danger btn-md' data-toggle='modal' data-target='#myModal_Eliminar' onclick='btn_eliminar_lavado_especial();'> Eliminar </button>

                      <?php

                    }
              ?>


              <button type='button' class='btn btn-success btn-md' onclick='btn_imprimir_nota_le();'> Nota </button>  

              </div>
              <div class='modal-footer'>
               <center>
               <button type='button' class='btn btn-default btn-md' data-dismiss='modal' onclick='actualizar_y_salir();'> Actualizar y Salir </button>
               </center>
              </div>
            </div>

          </div>
        </div>

        <!-- Modal Cobrar -->
        <div id='myModal_Cobrar' class='modal fade' role='dialog'>
          <div class='modal-dialog modal-lg'>

            <!-- Modal content-->
            <div class='modal-content'>
              <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal'>&times;</button>
                <h4 class='modal-title'> Cobrar lavado especial </h4>
              </div>
              <div class='modal-body'>

                <div id='panel_cobrar_lavado_especial'>
                </div>

              </div>
              <div class='modal-footer'>
              
              <button type='button' class='btn btn-default' onclick="btn_registrar_cobro_le();"> Guardar  </button>

              <button type='button' class='btn btn-danger' data-dismiss='modal'> Cancelar  </button>
             
              </div>
            </div>

          </div>
        </div>

        <!-- Modal Examinar -->
        <div id='myModal_Examinar' class='modal fade' role='dialog'>
          <div class='modal-dialog modal-lg'>

            <!-- Modal content-->
            <div class='modal-content'>
              <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal'>&times;</button>
                <h4 class='modal-title'> Examinar Lavado Especial </h4>
              </div>
              <div class='modal-body'>

                <div id='panel_examinar_lavado_especial'>
                </div>

              </div>
              <div class='modal-footer'>
               
              <center> <button type='button' class='btn btn-info' data-dismiss='modal'> Aceptar  </button> </center>
             
              </div>
            </div>

          </div>
        </div>

      <!-- Modal Edicion -->
        <div id='myModal_Edicion' class='modal fade' role='dialog'>
          <div class='modal-dialog modal-lg'>

            <!-- Modal content-->
            <div class='modal-content'>
              <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal'>&times;</button>
                <h4 class='modal-title'> Editar Lavado Especial </h4>
              </div>
              <div class='modal-body'>

                 <div id='panel_edicion_lavado_especial'></div>

              </div>
              <div class='modal-footer'>
              <div id='respuesta_guardar_cambios_lavado_especial'></div>
                <button type='button' class='btn btn-default' onclick='btn_guardar_cambios_lavado_especial();' > Guardar </button>
                <button type='button' class='btn btn-danger' data-dismiss='modal'> Cerrar </button>
              </div>
            </div>

          </div>
        </div>

        <!-- Modal Eliminar -->
        <div id='myModal_Eliminar' class='modal fade' role='dialog'>
          <div class='modal-dialog'>

            <!-- Modal content-->
            <div class='modal-content'>
              <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal'>&times;</button>
                <h4 class='modal-title'> Eliminar Lavado Especial </h4>
              </div>
              <div class='modal-body'>
              <input type='hidden' id='ID_eliminar_lavado_especial'>
                
                 <div id='panel_eliminar_lavado_especial'>
                    <div class='alert alert-danger' role='alert'>
                   <strong> SEGURO !! </strong> Desea eliminar este dato ?
                    </div>
                 </div>

              </div>
              <div class='modal-footer'>
              <div id='respuesta_eliminar_total_lavado_especial'></div>
                <button type='button' class='btn btn-default' onclick='btn_borrar_lavado_especial();'> Eliminar </button>
                <button type='button' class='btn btn-danger' data-dismiss='modal'> Cerrar </button>
              </div>
            </div>

          </div>
        </div>


       <!-- Modal Cobrar -->
        <div id='myModal_Agregar_edicion' class='modal fade' role='dialog'>
          <div class='modal-dialog'>

            <!-- Modal content-->
            <div class='modal-content'>
              <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal'>&times;</button>
                <h4 class='modal-title'> Agregar lavado especial </h4>
              </div>
              <div class='modal-body'>

                <div id='panel_agregar_edicion_lavado_especial'>
                </div>

              </div>
              <div class='modal-footer'>
              
              <button type='button' class='btn btn-primary' onclick="btn_agregar_edicion_le();"> Guardar  </button>

              <button type='button' class='btn btn-danger' data-dismiss='modal'> Cancelar  </button>
             
              </div>
            </div>

          </div>
        </div>
        
     <!-- FINALIZA EL MODALS -->

    <div class='table-pagination pull-right'>
      <?php echo paginate($reload, $page, $total_pages, $adjacents);?>
    </div>
    
      <?php
      
    } else {
      ?>
      <div class='alert alert-info alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4> Aviso!!! </h4> No se econtraron datos para mostrar
            </div>
      <?php
    }
  }
?>

<script src='../control/control_editar_lavado_especial.js' > </script> 
