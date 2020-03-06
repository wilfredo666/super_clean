
   
   <div class='row' style='margin:0px; padding:0px;'> 
  
    <h2 align='center'>cargo</h2>
    <label> Todos los campos con (*) son obligatorios </label> </br>
    
              <div class='col-lg-6 col-xs-6'> 
              
              <label>cargo</label></br>
              <input type='text' id='cargo' class='form-control' placeholder='(*)Escriba su cargo' onkeyup="validador_campo('cargo','resp_cargo',4)" maxlength='200' onkeypress='return valida_ambos(event);'>

               <div id='resp_cargo'></div>
               </div> 
               </br><hr>

   <div id='resultado_registro_cargo'></div> 
   
   </div>
   <script type='text/javascript' src='../control/control_cargo.js'></script>
