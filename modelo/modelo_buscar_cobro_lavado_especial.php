
<?php
    require('../conector/conexion.php');
   
    $action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
    
    if($action == 'ajax'){
    include 'paginacion_busqueda.php'; //incluir el archivo de paginación
    //las variables de paginación
    
    $id_usuario = $_POST['id_usuario'];
    $sql_carg = pg_query("SELECT * FROM usuario WHERE id_usuario='$id_usuario'");
    $row_carg = pg_fetch_array($sql_carg);
    $cargo = trim($row_carg['cargo']);


    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
    
    echo 'Resultado para : <label> ';

    echo $txt_buscar = (isset($_REQUEST['txt_buscar']) && !empty($_REQUEST['txt_buscar']))?$_REQUEST['txt_buscar']:1;
    echo '</label>  / ';

    echo "<a href='javascript:void(0);' onclick='btn_cobro_lavados_especiales();'> Volver </a>";

    $per_page = 10; //la cantidad de registros que desea mostrar
    $adjacents  = 4; //brecha entre páginas después de varios adyacentes
    $offset = ($page - 1) * $per_page;
    
    // Cuenta el número total de filas de la tabla 
    
    $count_query   = pg_query("SELECT count(*) AS numrows FROM cobro_lavado_especial WHERE codigo_lav ILIKE '%$txt_buscar%'");
    if ($row= pg_fetch_array($count_query)){ $numrows = $row['numrows'];}
    $total_pages = ceil($numrows/$per_page);
    $reload = '../vista/vista_listar_cobro_lavado_especial.php';

    //consulta principal para recuperar los datos
    $query = pg_query("SELECT * FROM cobro_lavado_especial WHERE codigo_lav LIKE '%$txt_buscar%' ORDER BY id_cobro_lavado_especial DESC OFFSET $offset LIMIT $per_page");
    
    if ($numrows>0){
      ?>

    <table class='table table-bordered'>
        <thead>
        <tr>
               <th>codigo</th>
               <th>cliente</th>
               <th>total</th>
               <th>pago</th>
               <th>cambio</th>
               <th>saldo</th>
               <th>fecha</th>
               <th>hora</th>
               
               <th class='col-lg-1' aling='center'> </th> </tr>
      </thead>
      <tbody>
      <?php
       while($row = pg_fetch_array($query))
       {
        $ID_cobro_lavado_especial = $row['id_cobro_lavado_especial'];
        $codigo = trim($row['codigo_lav']);
        $total = $row['total'];
        $pago = $row['pago'];
        $cambio = $total - $pago;
        $saldo = $row['saldo'];
        $fecha = $row['fecha'];
        $hora = $row['hora'];

        $sql_lav = pg_query("SELECT * FROM lavado_especial WHERE codigo = '$codigo'");
        $row_lav = pg_fetch_array($sql_lav);
        $cliente = $row_lav['cliente'];

        ?>
        <tr> 
         <td><?php echo $codigo; ?></td>
         <td><?php echo $cliente; ?></td>
         <td><?php echo $total; ?></td>
         <td><?php echo $pago; ?></td>
         <td><?php echo $cambio; ?></td>
         <td><?php echo $saldo; ?></td>
         <td><?php echo $fecha; ?></td>
         <td><?php echo $hora; ?></td>

    <td align='center'>

     <button type='button' class='btn btn-default btn-xs' onclick="btn_opciones('<?php echo $ID_cobro_lavado_especial;?>');"data-toggle='modal' data-target='#myModal_opciones'> ... </button></td>
     </tr>
        <?php
      }
      ?>
      </tbody>
     </table>
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

              <button type='button' class='btn btn-default btn-md' data-toggle='modal' data-target='#myModal_Examinar' onclick='btn_ver_cobro_lavado_especial();'> Examinar </button>
          
              <!--<button type='button' class='btn btn-default btn-md' data-toggle='modal' data-target='#myModal_Edicion' onclick='btn_editar_cobro_lavado_especial();'> Edicion </button>
              </br> </br> -->
              
              <?php
              if ($cargo==1) {
                ?>
                <button type='button' class='btn btn-danger btn-md' data-toggle='modal' data-target='#myModal_Eliminar' onclick='btn_eliminar_cobro_lavado_especial();'> Eliminar </button> 

                <?php
              }?>

              </div>
              <div class='modal-footer'>
               <center>
               <button type='button' class='btn btn-default btn-md' data-dismiss='modal' onclick='actualizar_y_salir();'> Actualizar y Salir </button>
               </center>
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
                <h4 class='modal-title'> Examinar cobro lavado especial </h4>
              </div>
              <div class='modal-body'>

                <div id='panel_examinar_cobro_lavado_especial'>
                </div>

              </div>
              <div class='modal-footer'>
               
              <button type='button' class='btn btn-default' data-dismiss='modal'> Aceptar  </button>
             
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
                <h4 class='modal-title'> Editar cobro lavado especial </h4>
              </div>
              <div class='modal-body'>

                 <div id='panel_edicion_cobro_lavado_especial'></div>

              </div>
              <div class='modal-footer'>
              <div id='respuesta_guardar_cambios_cobro_lavado_especial'></div>
                <button type='button' class='btn btn-default' onclick='btn_guardar_cambios_cobro_lavado_especial();' > Guardar </button>
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
                <h4 class='modal-title'> Eliminar cobro lavado especial </h4>
              </div>
              <div class='modal-body'>
              <input type='hidden' id='ID_eliminar_cobro_lavado_especial'>
                
                 <div id='panel_eliminar_cobro_lavado_especial'>
                    <div class='alert alert-danger' role='alert'>
                   <strong> SEGURO !! </strong> Desea eliminar este dato ?
                    </div>
                 </div>

              </div>
              <div class='modal-footer'>
              <div id='respuesta_eliminar_total_cobro_lavado_especial'></div>
                <button type='button' class='btn btn-default' onclick='btn_borrar_cobro_lavado_especial();'> Eliminar </button>
                <button type='button' class='btn btn-danger' data-dismiss='modal'> Cerrar </button>
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

<script src='../control/control_editar_cobro_lavado_especial.js' > </script> 
