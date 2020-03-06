
<?php
    require('../conector/conexion.php');
   
    $action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
    
    if($action == 'ajax'){
    include 'paginacion.php';  
    
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
    $per_page = 10; //la cantidad de registros que desea mostrar
    $adjacents  = 4; //brecha entre páginas después de varios adyacentes
    $offset = ($page - 1) * $per_page;
    
    $id_usuario=$_POST['id_usuario'];

    $sql_cargo = pg_query("SELECT * FROM usuario WHERE id_usuario='$id_usuario'");
    $row_cargo = pg_fetch_array($sql_cargo);
    $cargo = $row_cargo['cargo'];

    // Cuenta el número total de filas de la tabla 
    
    $count_query   = pg_query("SELECT count(*) AS numrows FROM acomodado");
    if ($row= pg_fetch_array($count_query)){ $numrows = $row['numrows'];}
    $total_pages = ceil($numrows/$per_page);
    $reload = '../vista/vista_listar_acomodado.php';

    //consulta principal para recuperar los datos
    $query = pg_query("SELECT * FROM acomodado ORDER BY id_acomodado DESC OFFSET $offset LIMIT $per_page");
    
    if ($numrows>0){
      ?>
    <div class="table-responsive">
    <table class='table table-bordered' style="font-size: 12px;">
        <thead>
        <tr>
               <th> # </th>
               <th> prenda </th>
               <th> cod bar</th>
               <th> cliente </th>
               <th> ot </th>
               <th> Cod Bar </th>
               <th> lugar </th>
               <th> estado </th>
               <th> fecha </th>
               
      <th class='col-lg-1' aling='center'> </th> </tr>
      </thead>
      <tbody>
      <?php
       $i = 0;
       while($row = pg_fetch_array($query)){
        $ID_acomodado= $row['id_acomodado'];
        $i++;
        ?>
        <tr>
         <td> <?php echo $i; ?></td>
         <td><?php
                 $id_prenda = $row['id_prenda'];
                 $sql_p = pg_query("SELECT * FROM prenda WHERE id_prenda = '$id_prenda'");
                 $row_p = pg_fetch_array($sql_p);

                 echo $prenda = $row_p['prenda'];
                 $img = $row_p['portada'];
         ?></td>
         <td> <img src="../multimedia/imagenes/<?php echo $img; ?>" style="width: 50px; height: 50px;" ></td>
         <td><?php echo $row['cliente'];?></td>
         <td><?php echo $row['codigo_ot'];?></td>
         <td><?php echo $row['codigo_tikeo'];?></td>
         <td style="color: green; font-weight: bold; text-transform: uppercase;"><?php echo $row['lugar'];?></td>
         <td><?php echo $row['estado_acomodado'];?></td>
         <td><?php echo $row['fecha']; echo "</br>"; echo $row['hora']; ?></td>

    <td align='center'>

     <button type='button' class='btn btn-default btn-xs' onclick="btn_opciones('<?php echo $ID_acomodado;?>');"data-toggle='modal' data-target='#myModal_opciones'> ... </button></td>
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

              <button type='button' class='btn btn-default btn-md' data-toggle='modal' data-target='#myModal_Examinar' onclick='btn_ver_acomodado();'> Examinar </button>
              </br> </br>

              <?php
                if ($cargo ==1) {
                ?>
                  <button type='button' class='btn btn-default btn-md' data-toggle='modal' data-target='#myModal_Edicion' onclick='btn_editar_acomodado();'> Edicion </button>
                  </br> </br>
                  <button type='button' class='btn btn-danger btn-md' data-toggle='modal' data-target='#myModal_Eliminar' onclick='btn_eliminar_acomodado();'> Eliminar </button>          
                <?php
                }
              ?>

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
                <h4 class='modal-title'> Examinar acomodado </h4>
              </div>
              <div class='modal-body'>

                <div id='panel_examinar_acomodado'>
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
                <h4 class='modal-title'> Editar acomodado </h4>
              </div>
              <div class='modal-body'>

                 <div id='panel_edicion_acomodado'></div>

              </div>
              <div class='modal-footer'>
              <div id='respuesta_guardar_cambios_acomodado'></div>
                <button type='button' class='btn btn-default' onclick='btn_guardar_cambios_acomodado();' > Guardar </button>
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
                <h4 class='modal-title'> Eliminar acomodado </h4>
              </div>
              <div class='modal-body'>
              <input type='hidden' id='ID_eliminar_acomodado'>
                
                 <div id='panel_eliminar_acomodado'>
                    <div class='alert alert-danger' role='alert'>
                   <strong> SEGURO !! </strong> Desea eliminar este dato ?
                    </div>
                 </div>

              </div>
              <div class='modal-footer'>
              <div id='respuesta_eliminar_total_acomodado'></div>
                <button type='button' class='btn btn-default' onclick='btn_borrar_acomodado();'> Eliminar </button>
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

<script src='../control/control_editar_acomodado.js' > </script> 
