
   
   <div class='row' style='margin:0px; padding:0px;'> 
  
    <label> Todos los campos con (*) son obligatorios </label> </br>
    
              <div class='col-lg-6 col-xs-6'> 
              
              <label>area de acomodado</label></br>
              <input type='text' id='area_acomodado' class='form-control' placeholder='(*)Escriba su area_acomodado' onkeyup="validador_campo('area_acomodado','resp_area_acomodado',4)" maxlength='200' onkeypress='return valida_ambos(event);'>

               <div id='resp_area_acomodado'></div>
               </div> 
               </br><hr>

   <div id='resultado_registro_area_acomodado'></div> 
   
   </div>
   <script type='text/javascript' src='../control/control_area_acomodado.js'></script>
