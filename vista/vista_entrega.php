
   
   <div class='row' style='margin:0px; padding:0px;'> 
  
    <h2 align='center'>entrega</h2>
    <label> Todos los campos con (*) son obligatorios </label> </br>
    
               <div class='col-lg-6 col-xs-6'> 
               
               <label>codigo_ot</label></br>
               <input type='number' id='codigo_ot' class='form-control' placeholder='(*)Escriba su codigo_ot' onkeyup="validador_campo('codigo_ot','resp_codigo_ot',2)" maxlength='10' min='0'  onkeypress='return valida_numeros(event);'>

               <div id='resp_codigo_ot' ></div>
               </div> 
               
              <div class='col-lg-6 col-xs-6'> 
              
              <label>estado</label></br>
              <input type='text' id='estado' class='form-control' placeholder='(*)Escriba su estado' onkeyup="validador_campo('estado','resp_estado',4)" maxlength='200' onkeypress='return valida_ambos(event);'>

               <div id='resp_estado'></div>
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

   <div id='resultado_registro_entrega'></div> 
   
   </div>
   <script type='text/javascript' src='../control/control_entrega.js'></script>
