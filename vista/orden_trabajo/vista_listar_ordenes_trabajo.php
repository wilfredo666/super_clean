
    <div class='row' style='background:; margin: 0px; padding: 0px;'>
    <!-- Formulario de Busqueda-->
   
    <div class='col-lg-8 col-xs-12' style='margin: 0px; padding: 0px;' >
         <table class='table table-condensed' style='margin: 0px; padding: 0px;'>
          <tr>
            <td> 
              <input type='text' class='form-control' id='txt_buscar' placeholder='Buscar Ordenes de Trabajo' onkeyup='cargar_datos_buscar(1);'>
            </td>
            <td>
              <button class='btn btn-default' onclick='cargar_datos_buscar(1);'> Buscar </button>
            </td>
          </tr>
         </table>
          <div id='resp_busqueda_orden_trabajo'></div>
      </div>


    <div class='col-lg-12 col-xs-12' style='background:white; padding:0px; margin:0px; color:#6E6E6E;'>
        
      <h4 style='margin-bottom:0px;'> Registros de Ordenenes de Trabajo </h4>
      <p style='margin:0px; margin-bottom:3px; font-size: 10px;'> Listado de todas las ordenes de trabajo </p>

      <input type="hidden" id="id_cliente">      
      <div id='panel_listado_orden_trabajo'> 
          
   
      </div>
              
    </div>
   <!-- Final de row -->
</div>

 

<script src='../control/control_ordenes_trabajo.js'> </script>

 