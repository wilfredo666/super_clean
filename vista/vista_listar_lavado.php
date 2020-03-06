
    <div class='row' style='background:; margin: 0px; padding: 0px;'>
    <!-- Formulario de Busqueda-->
   
    <div class='col-lg-8 col-xs-12' style='margin: 0px; padding: 0px;' >
         
      </div>
      <div class='col-lg-4 col-xs-12' style='padding-top:1%;'>
 
      </div>
     
      <div class='col-lg-12 col-xs-12' style='background:white; padding:0px; margin:0px; color:#6E6E6E;'>
        
       
              
      <div id='panel_listado_lavado'> 

        <div class="row">
          <div class="col-lg-3 col-md-3 col-xs-12">
            <div class="panel_contenedor_lavado" id="">
              <h4 align="center"> ASIGNAR PRENDA </h4>
              <input type="text" class="form-control" id="prenda_codigo_barras" placeholder="* Codigo de Barras de la Prenda" onkeyup="btn_agregar_ropa_tipo_lavado();" maxlength="8">
            </div>
          </div>

          <div class="col-lg-3 col-md-3 col-xs-12">
            <div class="panel_contenedor_lavado" id="" align="center">
              <h4 align="center"> TIPO DE LAVADO </h4>
              <button class="btn btn-primary btn-lg" onclick="btn_asignar_tipo_lavado(1,'SECO');"> SECO </button>
              <button class="btn btn-info btn-lg" onclick="btn_asignar_tipo_lavado(2,'VAPOR');"> VAPOR </button>

              <div id="panel_seleccion_prenda_lavado">
                   <input type="hidden" id="tipo_lavado_registro">
                   
                   <div id="panel_mensaje_tipo_lavado">
                    
                    <div style="padding: 2%;"> 
                      
                      <div class='alert alert-info' role='alert'>
                    
                      <strong> TIPO DE LAVADO </strong> Precione los botones para elegir el tipo de lavado!!!
                     </div>
                     
                     </div>

                   </div>

              </div>
            </div>
          </div>

          <div class="col-lg-6 col-md-6 col-xs-12">
            <div class="panel_contenedor_lavado" id="panel_listado_ropa_asignada_a_lavado" style="overflow-y: scroll; max-height: 400px;">
              <h4 align="center"> PRENDAS ASIGNADAS </h4>
            </div>
            <div align="center">
              <div id="panel_mensaje_registro_general_lavado"></div>
              <button class="btn btn-primary btn-lg" onclick="btn_registro_lavado_carrito();"> REGISTRO LAVADO </button>
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
       <h4 class='modal-title'> Registrar lavado </h4>
     </div>
     
     <div class='modal-body'>

      <div id='panel_registro_lavado'>
      </div>

      </div>
      <div class='modal-footer'>
      
      <button type='button' class='btn btn-default btn-md' onclick='btn_registro_lavado();'> registrar </button>

      <button type='button' class='btn btn-danger btn-md' data-dismiss='modal'> cancelar  </button>
             
      </div>
     </div>

  </div>
</div>

<script src='../control/control_lavado.js'> </script>
