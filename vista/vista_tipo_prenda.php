
   
   <div class='row' style='margin:0px; padding:0px;'> 
  
    <h2 align='center'>tipo_prenda</h2>
    <label> Todos los campos con (*) son obligatorios </label> </br>
    
              <div class='col-lg-6 col-xs-6'> 
              
              <label>tipo_prenda</label></br>
              <input type='text' id='tipo_prenda' class='form-control' placeholder='(*)Escriba su tipo_prenda' onkeyup="validador_campo('tipo_prenda','resp_tipo_prenda',4)" maxlength='200' onkeypress='return valida_ambos(event);'>

               <div id='resp_tipo_prenda'></div>
               </div> 
               </br><hr>

   <div id='resultado_registro_tipo_prenda'></div> 
   
   </div>
   <script type='text/javascript' src='../control/control_tipo_prenda.js'></script>
