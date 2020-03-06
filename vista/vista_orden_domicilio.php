
   
   <div class='row' style='margin:0px; padding:0px;'> 
  
    <h2 align='center'>orden_domicilio</h2>
    <label> Todos los campos con (*) son obligatorios </label> </br>
    
               <div class='col-lg-6 col-xs-6'> 
               
               <label>id_ot</label></br>
               <input type='number' id='id_ot' class='form-control' placeholder='(*)Escriba su id_ot' onkeyup="validador_campo('id_ot','resp_id_ot',2)" maxlength='10' min='0'  onkeypress='return valida_numeros(event);'>

               <div id='resp_id_ot' ></div>
               </div> 
               
              <div class='col-lg-6 col-xs-6'> 
              
              <label>codigo_ot</label></br>
              <input type='text' id='codigo_ot' class='form-control' placeholder='(*)Escriba su codigo_ot' onkeyup="validador_campo('codigo_ot','resp_codigo_ot',4)" maxlength='200' onkeypress='return valida_ambos(event);'>

               <div id='resp_codigo_ot'></div>
               </div> 
               
               <div class='col-lg-6 col-xs-6'> 
               
               <label>id_chofer</label></br>
               <input type='number' id='id_chofer' class='form-control' placeholder='(*)Escriba su id_chofer' onkeyup="validador_campo('id_chofer','resp_id_chofer',2)" maxlength='10' min='0'  onkeypress='return valida_numeros(event);'>

               <div id='resp_id_chofer' ></div>
               </div> 
               
               <div class='col-lg-6 col-xs-6'> 
               
               <label>precio_envio</label></br>
               <input type='number' id='precio_envio' class='form-control' placeholder='(*)Escriba su precio_envio' onkeyup="validador_campo('precio_envio','resp_precio_envio',2)" maxlength='10' min='0'  onkeypress='return valida_numeros(event);'>

               <div id='resp_precio_envio' ></div>
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

   <div id='resultado_registro_orden_domicilio'></div> 
   
   </div>
   <script type='text/javascript' src='../control/control_orden_domicilio.js'></script>
