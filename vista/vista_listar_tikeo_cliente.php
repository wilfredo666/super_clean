
    <div class='row' style='background:; margin: 0px; padding: 0px;'>
    <!-- Formulario de Busqueda-->
   
    <div class='col-lg-8 col-xs-12' style='margin: 0px; padding: 0px;' >
         <table class='table table-condensed' style='margin: 0px; padding: 0px;'>
          <tr>
            <td> 
              <input type='text' class='form-control' id='txt_buscar' placeholder='Buscar codigo cliente' onkeyup ='cargar_datos_buscar(1);'>
            </td>
            <td>
              <button class='btn btn-default' onclick='cargar_datos_buscar(1);'> Buscar </button>
            </td>
          </tr>
         </table>
          <div id='resp_busqueda_tikeo_cliente' ></div>
      </div>
      <div class='col-lg-4 col-xs-12' style='padding-top:1%;'>
       
       <button type='button' class='btn btn-default btn-md' data-toggle='modal' data-target='#myModal_Registrar' onclick='btn_mostrar_registro();'> Nuevo </button>

      </div>
     
    <div class='col-lg-12 col-xs-12' style='background:white; padding:0px; margin:0px; color:#6E6E6E;'>
        
      <h4 style='margin-bottom:0px;'> Registros de codigo de barras cliente </h4>
      <p style='margin:0px; margin-bottom:3px; font-size: 10px;'> Listado de todos los datos registrados hasta la ultima fecha : </p>
              
      <div id='panel_listado_tikeo_cliente'> </div>
              
    </div>
   <!-- Final de row -->
</div>

<!-- Modal de registro -->

<div id='myModal_Registrar' class='modal fade' role='dialog' style="padding: 0px; margin: 0px;">
  <div class='modal-dialog modal-lg' style="width: 98%; margin: 0px; margin-left: 2%; padding: 0px;">

    <!-- Modal content-->
    <div class='modal-content' style="margin: 0px;">
     <div class='modal-header'>
       <button type='button' class='close' data-dismiss='modal'>&times;</button>
       <h4 class='modal-title'> Registrar Codigos Cliente </h4>
     </div>
     
     <div class='modal-body'>

      <div id='panel_registro_tikeo_cliente'>
      </div>

      </div>
      <div class='modal-footer'>
      
     

      </div>
     </div>

  </div>
</div>

<script src='../control/control_tikeo_cliente.js'> </script>
