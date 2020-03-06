
   
   <div class='row' style='margin:0px; padding:0px;'> 
  
    <h2 align='center'>moneda</h2>
    <label> Todos los campos con (*) son obligatorios </label> </br>
    
              <div class='col-lg-6 col-xs-6'> 
              
              <label>moneda</label></br>
              <input type='text' id='moneda' class='form-control' placeholder='(*)Escriba su moneda' onkeyup="validador_campo('moneda','resp_moneda',4)" maxlength='200' onkeypress='return valida_ambos(event);'>

               <div id='resp_moneda'></div>
               </div> 
               </br><hr>

   <div id='resultado_registro_moneda'></div> 
   
   </div>
   <script type='text/javascript' src='../control/control_moneda.js'></script>
