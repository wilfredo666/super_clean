
    <div class='row' style='background:; margin: 0px; padding: 0px;'>
    <!-- Formulario de Busqueda-->
   
    <div class='col-lg-8 col-xs-12' style='margin: 0px; padding: 0px;' >
         <table class='table table-condensed' style='margin: 0px; padding: 0px;'>
          <tr>
            <td> 
              <input type='text' class='form-control' id='txt_buscar' placeholder='Buscar precio_kilo' onkeyup ='cargar_datos_buscar(1);'>
            </td>
            <td>
              <button class='btn btn-default' onclick='cargar_datos_buscar(1);'> Buscar </button>
            </td>
          </tr>
         </table>
          <div id='resp_busqueda_precio_kilo' ></div>
      </div>
      <div class='col-lg-4 col-xs-12' style='padding-top:1%;'>
       
       <button type='button' class='btn btn-default btn-md' data-toggle='modal' data-target='#myModal_Registrar' onclick='btn_mostrar_registro();'> Nuevo </button>

      </div>
     
    <div class='col-lg-12 col-xs-12' style='background:white; padding:0px; margin:0px; color:#6E6E6E;'>
        
      <h3 style='margin-bottom:0px;'> Registros de precio_kilo </h3>
      <p style='margin:0px; margin-bottom:3px;'> Listado de todos los datos registrados hasta la ultima fecha : </p>
              
      <div id='panel_listado_precio_kilo'> </div>
              
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
       <h4 class='modal-title'> Registrar precio_kilo </h4>
     </div>
     
     <div class='modal-body'>

      <div id='panel_registro_precio_kilo'>
      </div>

      </div>
      <div class='modal-footer'>
      
      <button type='button' class='btn btn-default btn-md' onclick='btn_registro_precio_kilo();'> registrar </button>

      <button type='button' class='btn btn-danger btn-md' data-dismiss='modal'> cancelar  </button>
             
      </div>
     </div>

  </div>
</div>

<script src='../control/control_precio_kilo.js'> </script>
