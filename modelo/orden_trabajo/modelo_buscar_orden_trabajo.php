 <a href='javascript:void(0);' onclick='btn_listar_ordenes_trabajo();'> Volver </a>
<?php
    require('../conector/conexion.php');
   
    $action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
    
    if($action == 'ajax'){
    include '../paginacion_busqueda.php'; //incluir el archivo de paginación
    //las variables de paginación

    $id_usuario=$_POST['id_usuario'];

    $sql_cargo = pg_query("SELECT * FROM usuario WHERE id_usuario='$id_usuario'");
    $row_cargo = pg_fetch_array($sql_cargo);
    $cargo = $row_cargo['cargo'];
    
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
    
    echo 'Resultado para : <label> ';
    echo $txt_buscar = (isset($_REQUEST['txt_buscar']) && !empty($_REQUEST['txt_buscar']))?$_REQUEST['txt_buscar']:1;
    echo '</label>  / ';

    $txt_buscar = trim($txt_buscar);

    $per_page = 15; //la cantidad de registros que desea mostrar
    $adjacents  = 4; //brecha entre páginas después de varios adyacentes
    $offset = ($page - 1) * $per_page;

    if(is_numeric($txt_buscar)) {

    // Cuenta el número total de filas de la tabla 
    $count_query   = pg_query("SELECT DISTINCT codigo_ot FROM orden_trabajo WHERE ci_nit ='$txt_buscar' OR cliente ILIKE '%$txt_buscar%' OR codigo_ot ='$txt_buscar'");
    
    $numrows = 0;
    while ($row= pg_fetch_array($count_query)) {
      $numrows = $numrows+1;
    }
 
    $total_pages = ceil($numrows/$per_page);
    $reload = '../vista/vista_listar_orden_trabajo.php';

    //consulta principal para recuperar los datos
    $query = pg_query("SELECT DISTINCT codigo_ot FROM orden_trabajo WHERE cliente ILIKE '%$txt_buscar%' OR codigo_ot ILIKE '%$txt_buscar%' OR ci_nit = '$txt_buscar' OFFSET $offset LIMIT $per_page");

        
    } 
    else {
       
    // Cuenta el número total de filas de la tabla 
    $count_query   = pg_query("SELECT DISTINCT codigo_ot FROM orden_trabajo WHERE cliente ILIKE '%$txt_buscar%' OR codigo_ot ='$txt_buscar'");
    
    $numrows = 0;
    while ($row= pg_fetch_array($count_query)) {
      $numrows = $numrows+1;
    }
 
    $total_pages = ceil($numrows/$per_page);
    $reload = '../vista/vista_listar_orden_trabajo.php';

    //consulta principal para recuperar los datos
    $query = pg_query("SELECT DISTINCT codigo_ot FROM orden_trabajo WHERE cliente ILIKE '%$txt_buscar%' OR codigo_ot ILIKE '%$txt_buscar%' OFFSET $offset LIMIT $per_page");
    
    }

    if ($numrows>0){
    ?>
    <div class="table-responsive">
    <table class='table table-bordered'>
        <thead>
        <tr>
               <th>Codigo OT </th>
               <th>cliente</th>
               <th>ci nit </th>
               <th>tipo </th>
               <th>estado </th>
               <th class='col-lg-1' aling='center'> </th> 
        </tr>
      </thead>
      <tbody>
      <?php
       while($row = pg_fetch_array($query)){
        $codigo_ot = $row['codigo_ot'];
        $sql_ot = pg_query("SELECT * FROM orden_trabajo WHERE codigo_ot = '$codigo_ot'");
        $row_ot = pg_fetch_array($sql_ot);

        $cliente = $row_ot['cliente'];
        $id_ot = $row_ot['id_orden_trabajo'];
        $ci_nit = $row_ot['ci_nit'];
        $tipo = $row_ot['tipo_cliente'];
        $estado = $row_ot['estado'];


        ?>
        <tr> 
         <td><?php echo $codigo_ot;?></td>
         <td><?php echo $cliente;?></td>
         <td><?php echo $ci_nit;?></td>
         <td><?php echo $tipo;?></td>
         <td><?php echo $estado;?></td>

    <td align='center'>

     <button type='button' class='btn btn-default btn-xs' onclick="btn_opciones('<?php echo $codigo_ot;?>');"data-toggle='modal' data-target='#myModal_opciones'> ... </button></td>
     </tr>
        <?php
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

              <button type='button' class='btn btn-default btn-md' data-toggle='modal' data-target='#myModal_Examinar' onclick='btn_ver_orden_trabajo();'> Examinar </button>
              </br> </br>
              <?php
                if ($cargo ==1) {
                ?>
                <button type='button' class='btn btn-default btn-md' data-toggle='modal' data-target='#myModal_Edicion' onclick='btn_editar_orden_trabajo();'> Edicion </button>
                </br> </br>
                <button type='button' class='btn btn-danger btn-md' data-toggle='modal' data-target='#myModal_Eliminar' onclick='btn_eliminar_orden_trabajo();'> Eliminar </button>                
                <?php
                }
              ?>
              </br> </br>
              <button type='button' class='btn btn-success btn-md' onclick='btn_imprimir_ot_listado();'> Imprimir </button>

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
                <h4 class='modal-title'> Examinar orden_trabajo </h4>
              </div>
              <div class='modal-body'>

                <div id='panel_examinar_orden_trabajo'>
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
                <h4 class='modal-title'> Editar orden_trabajo </h4>
              </div>
              <div class='modal-body'>

                 <div id='panel_edicion_orden_trabajo'></div>

              </div>
              <div class='modal-footer'>
              <div id='respuesta_guardar_cambios_orden_trabajo'></div>
                <button type='button' class='btn btn-default' onclick='btn_guardar_cambios_orden_trabajo();' > Guardar </button>
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
                <h4 class='modal-title'> Eliminar orden_trabajo </h4>
              </div>
              <div class='modal-body'>
              <input type='hidden' id='ID_eliminar_orden_trabajo'>
                
                 <div id='panel_eliminar_orden_trabajo'>
                    <div class='alert alert-danger' role='alert'>
                   <strong> SEGURO !! </strong> Desea eliminar este dato ?
                    </div>
                 </div>

              </div>
              <div class='modal-footer'>
              <div id='respuesta_eliminar_total_orden_trabajo'></div>
                <button type='button' class='btn btn-default' onclick='btn_borrar_orden_trabajo();'> Eliminar </button>
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

<script src='../control/control_editar_orden_trabajo.js' > </script> 
