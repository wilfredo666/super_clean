<div class='row' style='margin:0px; padding:0px;'>
  <div class='col-lg-6 col-md-6 col-xs-12'>
   
    <div class='row' style='margin:0px; padding:0px;'> 
  
               <h2 align='center'> tikeo de cliente </h2>
               <center> <label> Todos los campos con (*) son obligatorios </label> </center> </br>

              <div class='col-lg-12 col-md-12 col-xs-12'> 
              
              <label> cliente </label></br>
              <input type='text' id='txt_buscar_cliente' class='form-control' placeholder='(*) Escriba su cliente' onkeyup="btn_select_cliente_tikeo();" maxlength='200' onkeypress='return valida_ambos(event);'>
               <label id="label_select_cliente" style="color:green;"></label>
               <input type="hidden" id="cliente">
               <input type="hidden" id="id_cliente">

               <div id='resp_cliente'>  </div>

               </div>

               <div class='col-lg-12 col-md-12 col-xs-12'> 
               
               <label> prenda </label></br>
               <input type='text' id='txt_prenda' class='form-control' placeholder='(*)Escriba su id_prenda' onkeyup="btn_select_cliente_ropa();" maxlength='100' min='0'  onkeypress='return valida_ambos(event);' >
              
               <label id="label_select_prenda" style="color:green;"></label>
               <input type="hidden" id="id_prenda">
               <div id='resp_prenda' ></div>

               </div> 
               
              <div class='col-lg-12 col-md-12 col-xs-12'> 
              
              <label> codigo barras </label></br>

              <input type='text' id='codigo_barras' class='form-control' placeholder='(*)Escriba su codigo_barras' onkeyup="validador_campo('codigo_barras','resp_codigo_barras',4)" maxlength='8' onkeypress='return valida_ambos(event);'>

               <div id='resp_codigo_barras'></div>
               </div> 
 
               <div class='col-lg-6 col-xs-6'> 
               
               <label>fecha</label></br>
               <input type='text' id='fecha' class='form-control' placeholder='(*)Escriba su fecha' onkeyup="validador_campo('fecha','resp_fecha',2)" min='0' style='background:transparent; border:none;' disabled='true'>

               <div id='resp_fecha' ></div>
               </div> 
               
               <div class='col-lg-6 col-xs-6'> 
               
               <label>hora</label></br>
               <input type='text' id='hora' class='form-control' placeholder='(*)Escriba su hora' onkeyup="validador_campo('hora','resp_hora',2)" maxlength='20' min='0' style='background:transparent; border:none;' disabled='true'>

               <div id='resp_hora' ></div>
               </div> 
               </br><hr>
              
              <div class='col-lg-12 col-md-12 col-xs-12'> 
                
                <center>
                  <button type='button' class='btn btn-default btn-md' onclick='btn_registro_tikeo_cliente();'> registrar </button>
                  <button type='button' class='btn btn-danger btn-md' data-dismiss='modal'> cancelar  
                  </button>
                 </center> 

               </div>
               
               <div class='col-lg-12 col-md-12 col-xs-12'> 
                 <div id='resultado_registro_tikeo_cliente'></div>
               </div>
   
   </div>

<!-- FINAL DEL ROW DEL MENU DE REGISTRO --->
</div>

<div class='col-lg-6 col-md-6 col-xs-12'>

<h4 style="margin-bottom: 0px;"> LISTA DE PRENDAS TIKEADAS DE LOS CLIENTES </h4>
<p style="margin: 0px; font-size: 10px;"> Lista de todas las prendas tikeadas y asignadas a cada cliente </p>

<div id="panel_listado_prendas_cliente">
  

</div>


</div>
<!-- FINAL DEL ROW --->
</div>

<script type='text/javascript' src='../control/control_tikeo_cliente.js'></script>
