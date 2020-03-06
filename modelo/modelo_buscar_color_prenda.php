
<?php
require('../conector/conexion.php');

$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';

if($action == 'ajax'){
    include 'paginacion_busqueda.php'; //incluir el archivo de paginación
    //las variables de paginación

    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;

    echo 'Resultado para : <label> ';
    echo $txt_buscar = (isset($_REQUEST['txt_buscar']) && !empty($_REQUEST['txt_buscar']))?$_REQUEST['txt_buscar']:1;
    echo '</label>  / ';

    $per_page = 10; //la cantidad de registros que desea mostrar
    $adjacents  = 4; //brecha entre páginas después de varios adyacentes
    $offset = ($page - 1) * $per_page;

    // Cuenta el número total de filas de la tabla 

    $count_query   = pg_query("SELECT count(*) AS numrows FROM color WHERE nombre_color ILIKE '%$txt_buscar%' ");
    if ($row= pg_fetch_array($count_query)){ $numrows = $row['numrows'];}
    $total_pages = ceil($numrows/$per_page);
    $reload = '../vista/vista_listar_color_prenda.php';

    //consulta principal para recuperar los datos
    $query = pg_query("SELECT * FROM color WHERE nombre_color LIKE '%$txt_buscar%' ORDER BY id_color DESC OFFSET $offset LIMIT $per_page");

    if ($numrows>0){
?>
<a href='javascript:void(0);' onclick='btn_color_prenda();'> Volver </a>
   <table class='table table-bordered'>
    <thead>
        <tr>
            <th>Nombre de color</th>
            <th>Muestra</th>
            <th class='col-lg-1' aling='center'></th>
        </tr>
    </thead>
    <tbody>
        <?php
        while($row = pg_fetch_array($query)){
            $ID_color_prenda= $row['id_color'];
        ?>
        <tr> 
            <td><?php echo $row['nombre_color'];?></td>
            <td><div style="background-color:<?php echo $row['cod_color'];?>; width:100px; height:50px;"></div></td>
            <td align='center'>
                <button type='button' class='btn btn-default btn-xs' onclick="btn_opciones('<?php echo $ID_color_prenda;?>');"data-toggle='modal' data-target='#myModal_opciones'> ... </button></td>
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

              <button type='button' class='btn btn-default btn-md' data-toggle='modal' data-target='#myModal_Edicion' onclick='btn_editar_color_prenda();'> Editar </button>
              </br> </br>
              <button type='button' class='btn btn-danger btn-md' data-toggle='modal' data-target='#myModal_Eliminar' onclick='btn_eliminar_color_prenda();'> Eliminar </button> 

              </div>
              <div class='modal-footer'>
               <center>
               <button type='button' class='btn btn-default btn-md' data-dismiss='modal' onclick='actualizar_y_salir();'> Actualizar y Salir </button>
               </center>
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
                <h4 class='modal-title'> Editar color </h4>
              </div>
              <div class='modal-body'>

                 <div id='panel_edicion_color_prenda'></div>

              </div>
              <div class='modal-footer'>
              <div id='respuesta_guardar_cambios_color_prenda'></div>
                <button type='button' class='btn btn-default' onclick='btn_guardar_cambios_color_prenda();' > Guardar </button>
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
                <h4 class='modal-title'> Eliminar color </h4>
              </div>
              <div class='modal-body'>
              <input type='hidden' id='ID_eliminar_color_prenda'>
                
                 <div id='panel_eliminar_color_prenda'>
                    <div class='alert alert-danger' role='alert'>
                   <strong> SEGURO !! </strong> Desea eliminar este dato ?
                    </div>
                 </div>

              </div>
              <div class='modal-footer'>
              <div id='respuesta_eliminar_total_color_prenda'></div>
                <button type='button' class='btn btn-default' onclick='btn_borrar_color_prenda();'> Eliminar </button>
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

<script src='../control/control_editar_color_prenda.js' > </script> 