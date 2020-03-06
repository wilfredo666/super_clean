
   
   <div class='row' style='margin:0px; padding:0px;'> 
  
    
    <label> Todos los campos con (*) son obligatorios </label> </br>
    
              <div class='col-lg-6 col-xs-6'> 
              
              <label>sucursal</label></br>
              <input type='text' id='sucursal' class='form-control' placeholder='(*)Escriba su sucursal' onkeyup="validador_campo('sucursal','resp_sucursal',4)" maxlength='200' onkeypress='return valida_ambos(event);'>

               <div id='resp_sucursal'></div>
               </div> 
               
              <div class='col-lg-6 col-xs-6'> 
              
              <label>encargado</label></br>
              <input type='text' id='encargado' class='form-control' placeholder='(*)Escriba su encargado' onkeyup="validador_campo('encargado','resp_encargado',4)" maxlength='200' onkeypress='return valida_ambos(event);'>

               <div id='resp_encargado'></div>
               </div> 
               
               <div class='col-lg-6 col-xs-6'> 
               
               <label>telefono</label></br>
               <input type='number' id='telefono' class='form-control' placeholder='(*)Escriba su telefono' onkeyup="validador_campo('telefono','resp_telefono',2)" maxlength='10' min='0'  onkeypress='return valida_numeros(event);'>

               <div id='resp_telefono' ></div>
               </div> 
               
               <div class='col-lg-6 col-xs-6'> 
               
               <label>celular</label></br>
               <input type='number' id='celular' class='form-control' placeholder='(*)Escriba su celular' onkeyup="validador_campo('celular','resp_celular',2)" maxlength='10' min='0'  onkeypress='return valida_numeros(event);'>

               <div id='resp_celular' ></div>
               </div> 
               </br><hr>

   <div id='resultado_registro_sucursal'></div> 
   
   </div>
   <script type='text/javascript' src='../control/control_sucursal.js'></script>
