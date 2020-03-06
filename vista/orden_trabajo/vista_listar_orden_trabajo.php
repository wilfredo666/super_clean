
    <div class='row' style='background:; margin: 0px; padding: 0px;'>
    <!-- Formulario de Busqueda-->
   
    <div class='col-lg-8 col-xs-12' style='margin: 0px; padding: 0px;' >
         <table class='table table-condensed' style='margin: 0px; padding: 0px;'>
          <tr>
            <td> 
              <input type='text' class='form-control' id='txt_buscar' placeholder='Buscar Clientes' onkeyup='btn_buscar_clientes_ot();'>
            </td>
            <td>
              <button class='btn btn-default' onclick='btn_buscar_clientes_ot();'> Buscar </button>
            </td>
          </tr>
         </table>
          <div id='resp_busqueda_orden_trabajo'></div>
      </div>

      <div class='col-lg-1 col-md-1 col-xs-1' style='padding: 0% 0% 0% 0%; padding-top:1%; '>
        <button type='button' class='btn btn-default btn-md' data-toggle='modal' data-target='#myModal_Registrar_Cliente' onclick='btn_mostrar_registro_cliente();'> Cliente </button>
      </div>

      <div class='col-lg-1 col-md-1 col-xs-1' style='padding: 0% 0% 0% 0%; padding-top:1%;'>
       <button type='button' class='btn btn-default btn-md' onclick='btn_mostrar_registro_simple();'> Simple </button>
      </div>

      <div class='col-lg-1 col-md-1 col-xs-1' style='padding: 0% 0% 0% 0%; padding-top:1%;'>
       <button type='button' class='btn btn-default btn-md' onclick='btn_mostrar_registro_kilo();'> OT Kilo </button>
      </div>

      <div class='col-lg-1 col-md-1 col-xs-1' style='padding: 0% 0% 0% 0%; padding-top:1%;'>
       <button type='button' class='btn btn-default btn-md' onclick='btn_mostrar_registro_metro();'> OT Metro </button>
      </div>

    <div class='col-lg-12 col-xs-12' style='background:white; padding:0px; margin:0px; color:#6E6E6E;'>
        
      <h5 style='margin:0px;'> Registro de Ordenen de Trabajo </h5>
      <p style='margin:0px; margin-bottom:3px; font-size: 10px;'> seleccione un cliente para realizar una orden </p>

      <input type="hidden" id="id_cliente">      
      <div id='panel_listado_orden_trabajo'> 
            <div class="row" style="margin:0px; padding: 0px;">
              
               <div class="col-lg-3 col-md-3 col-xs-12" style="margin:0px; padding: 2px;">
                  <div class="panel_operaciones_ot" id="panel_cliente_select_ot">
                    <h4> SECCION DEL CLIENTE </h4>
                     
                  </div>
               </div>

               <div class="col-lg-5 col-md-5 col-xs-12" style="margin:0px; padding: 2px;">
                  <div class="panel_operaciones_ot" id="panel_listado_prendas_carrito_general" style="max-height: 350px; overflow-y: scroll;">
                    <h4> PRENDAS DE SERVICIO </h4>

                  </div>
               </div>

               <div class="col-lg-4 col-md-4 col-xs-12" style="margin:0px; padding: 2px;">
                  <div class="panel_operaciones_ot" id="panel_total_costos_ot" >
                    <h4> COSTO DEL SERVICIO </h4>
                  </div>
               </div>

            </div>
      </div>
              
    </div>
   <!-- Final de row -->
</div>

<!-- Modal de registro -->

<div id='myModal_Registrar_Simple' class='modal fade' role='dialog'>
  <div class='modal-dialog modal-lg' style="width: 90%;">

    <!-- Modal content-->
    <div class='modal-content'>
     <div class='modal-header'>
       <button type='button' class='close' data-dismiss='modal'>&times;</button>
       <h4 class='modal-title'> Registrar Simple </h4>
     </div>
     
     <div class='modal-body'>

      <div id='panel_registro_orden_trabajo_simple'>
      </div>

      </div>
      <div class='modal-footer'>
       
       <center>
       <button type='button' class='btn btn-primary btn-md' data-dismiss='modal'> aceptar  </button>
       </center>
             
      </div>
     </div>

  </div>
</div>


<div id='myModal_Registrar_Kilo' class='modal fade' role='dialog'>
  <div class='modal-dialog modal-lg' style="width: 90%;">

    <!-- Modal content-->
    <div class='modal-content'>
     <div class='modal-header'>
       <button type='button' class='close' data-dismiss='modal'>&times;</button>
       <h4 class='modal-title'> Registrar Kilo </h4>
     </div>
     
     <div class='modal-body'>

      <div id='panel_registro_orden_trabajo_kilo'>
      </div>

      </div>
      <div class='modal-footer'>

       <center>
       <button type='button' class='btn btn-primary btn-md' data-dismiss='modal'> aceptar  </button>
       </center>
             
      </div>
     </div>

  </div>
</div>


<div id='myModal_Registrar_Metro' class='modal fade' role='dialog'>
  <div class='modal-dialog modal-lg' style="width: 90%;">

    <!-- Modal content-->
    <div class='modal-content'>
     <div class='modal-header'>
       <button type='button' class='close' data-dismiss='modal'>&times;</button>
       <h4 class='modal-title'> Registrar X Metro </h4>
     </div>
     
     <div class='modal-body'>

      <div id='panel_registro_orden_trabajo_metro'>
      </div>

      </div>
      <div class='modal-footer'>
      
       <center>
        <button type='button' class='btn btn-primary btn-md' data-dismiss='modal'> aceptar  </button>
       </center>
             
      </div>
     </div>

  </div>
</div>

 
<!-- Modal de Registro de Cliente -->

<div id='myModal_Registrar_Cliente' class='modal fade' role='dialog'>
  <div class='modal-dialog modal-lg'>

    <!-- Modal content-->
    <div class='modal-content'>
     <div class='modal-header'>
       <button type='button' class='close' data-dismiss='modal'>&times;</button>
       <h4 class='modal-title'> Registrar Nuevo Cliente </h4>
     </div>
     
     <div class='modal-body'>

      <div id='panel_registro_nuevo_cliente'>
      </div>

      </div>
      <div class='modal-footer'>
      
      <button type='button' class='btn btn-primary btn-md' onclick='btn_registro_cliente_orden_trabajo();'> registrar </button>

      <button type='button' class='btn btn-danger btn-md' data-dismiss='modal'> cancelar  </button>
             
      </div>
     </div>

  </div>
</div>

<!-- Modal de Registro de Cliente -->

<div id='myModal_Eliminar_Prenda' class='modal fade' role='dialog'>
  <div class='modal-dialog modal-xs'>

    <!-- Modal content-->
    <div class='modal-content'>
     <div class='modal-header'>
       <button type='button' class='close' data-dismiss='modal'>&times;</button>
       <h4 class='modal-title'> Eliminar Prenda </h4>
     </div>
     
     <div class='modal-body'>
      <input type='hidden' id='id_eliminar_prenda_ot'>
                
       <div id='panel_registro_eliminar_prenda'>
         
         <div id='panel_eliminar_acomodado'>
            <div class='alert alert-danger' role='alert'>
             <strong> SEGURO !! </strong> Desea eliminar esta Prenda ?
            </div>
         </div>
                 
      </div>

      </div>
      <div class='modal-footer'>
      
      <button type='button' class='btn btn-primary btn-md' onclick='btn_borrar_prenda_registro_general();'> borrar </button>

      <button type='button' class='btn btn-danger btn-md' data-dismiss='modal'> cancelar  </button>
             
      </div>
     </div>

  </div>
</div>

<script src='../control/control_orden_trabajo.js'> </script>


<style type="text/css">
  
  #panel_operaciones_ot
  {
    border: 1px solid #BDBDBD;
    padding: 1%;
    margin: 0px;
  }
</style>