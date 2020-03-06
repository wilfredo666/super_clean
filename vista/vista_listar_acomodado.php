
    <div class='row' style='background:; margin: 0px; padding: 0px;'>
    <!-- Formulario de Busqueda-->
 
    <div class='col-lg-12 col-xs-12' style='background:white; padding:0px; margin:0px; color:#6E6E6E;'>
        
      <h4 style='margin-bottom:0px;'> Registros de acomodado </h4>
      <p style='margin:0px; margin-bottom:3px; font-size: 10px;'> Listado de todos los datos registrados hasta la ultima fecha : </p>
              
      <div id='panel_listado_acomodado'>

       <div class="row">
         
         <div class="col-lg-4 col-md-4 col-xs-12">
           <div class="panel_contenedor_acomodado">
             <h5 align="center"> PRENDAS LAVADAS </h5>
             <input type="text" id="codigo_barras_acodado" placeholder="* Escriba su codigo de barras" class="form-control" onkeyup="btn_registrar_prenda_acomodar();" maxlength="8">
           </div>
         </div>

         <div class="col-lg-4 col-md-4 col-xs-12">
           <div class="panel_contenedor_acomodado">
             <h5 align="center"> ACOMODAR </h5>
             <?php

             require "../conector/conexion.php";

             $sql_area = pg_query("SELECT * FROM area_acomodado ORDER BY area_acomodado ASC");
             while ($row_area = pg_fetch_array($sql_area)) {
                
                $id_acomodado = $row_area['id_area_acomodado'];
                $area_acomodado  = $row_area['area_acomodado'];
              ?>
              <button class="btn btn-primary btn-md" style="width: 100%; margin-bottom: 1%;" onclick="btn_seleccion_area_acomodado('<?php echo $id_acomodado; ?>','<?php echo $area_acomodado; ?>')"> <?php echo $area_acomodado; ?></button></br>
              <?php
             }           

             ?>
             <div id="panel_seleccion_area_acomodado">
             <input type="hidden" id="id_tipo_acomodado" class="form-control" placeholder="id_area">
             <input type="hidden" id="area_acomodado" class="form-control" >
             <div id="mensaje_seleccion_area_acomodado"></div>
             </div>


           </div>
         </div>

         <div class="col-lg-4 col-md-4 col-xs-12">
           <div class="panel_contenedor_acomodado">
             <h5 align="center"> LISTA DE PRENDAS ACOMODADAS </h5>
             <div id="panel_listado_prendas_acomodado" style="overflow-y: scroll; max-height: 400px;">
               
             </div>

             <div align="center" style="padding: 1%;">
               <div id="panel_respuesta_registro_acomado"></div>
               <br></br>
               <button class="btn btn-primary" onclick="btn_registrar_prenda_acomodar_carrito();"> GUARDAR PRENDAS </button>
               
             </div>

           </div>
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
       <h4 class='modal-title'> Registrar acomodado </h4>
     </div>
     
     <div class='modal-body'>

      <div id='panel_registro_acomodado'>
      </div>

      </div>
      <div class='modal-footer'>
      
      <button type='button' class='btn btn-default btn-md' onclick='btn_registro_acomodado();'> registrar </button>

      <button type='button' class='btn btn-danger btn-md' data-dismiss='modal'> cancelar  </button>
             
      </div>
     </div>

  </div>
</div>

<script src='../control/control_acomodado.js'> </script>
