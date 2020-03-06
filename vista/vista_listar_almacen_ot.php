
  <div class='row' style='background:; margin: 0px; padding: 0px;'>

    <div class='col-lg-12 col-md-12 col-xs-12' style='margin: 0px; padding: 0px;' >
       <h4> SERVICIO DE MONITORE DE PRENDAS </h4> 
       <table class="table table-condensed table-bordered table-hover">
        <tr>
          <th> Concepto </th>
          <th> Codigo de Barras </th>
          <th> </th>
        </tr>
        <tr>
          <td> Ingrese el codigo de la prenda </td>
          <td>  <input type="text" id="codigo_barras" maxlength="8" placeholder="* codigo de barras" class="form-control" onkeypress='return valida_numeros(event);' ></td>
          <td align="center"> <button class="btn btn-info btn-md" onclick="btn_buscar_servicios_cb();"> Mostrar </button></td>
        </tr>
         
       </table>
       <div id="panel_respuesta_busqueda_almacen"></div>
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
       <h4 class='modal-title'> Registrar area_acomodado </h4>
     </div>
     
     <div class='modal-body'>

      <div id='panel_registro_area_acomodado'>
      </div>

      </div>
      <div class='modal-footer'>
      
      <button type='button' class='btn btn-default btn-md' > registrar </button>

      <button type='button' class='btn btn-danger btn-md' data-dismiss='modal'> cancelar  </button>
             
      </div>
     </div>

  </div>
</div>

<script type='text/javascript' src='../control/control_almacen_ot.js'></script>

