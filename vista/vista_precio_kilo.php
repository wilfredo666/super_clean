
   
   <div class='row' style='margin:0px; padding:0px;'> 
  
    <h2 align='center'>precio_kilo</h2>
    <label> Todos los campos con (*) son obligatorios </label> </br>
    
              <div class='col-lg-6 col-xs-6'> 
              
              <label>precio_kilo</label></br>
              <input type='text' id='precio_kilo' class='form-control' placeholder='(*)Escriba su precio_kilo' onkeyup="validador_campo('precio_kilo','resp_precio_kilo',4)" maxlength='200' onkeypress='return valida_ambos(event);'>

               <div id='resp_precio_kilo'></div>
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

   <div id='resultado_registro_precio_kilo'></div> 
   
   </div>
   <script type='text/javascript' src='../control/control_precio_kilo.js'></script>
