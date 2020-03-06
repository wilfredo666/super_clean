
   
   <div class='row' style='margin:0px; padding:0px;'> 
 
    <label> Todos los campos con (*) son obligatorios </label> </br>
    
              <div class='col-lg-6 col-xs-6'> 
              
              <label>chofer</label></br>
              <input type='text' id='nombre_completo' class='form-control' placeholder='(*)Escriba su nombre_completo' onkeyup="validador_campo('nombre_completo','resp_nombre_completo',4)" maxlength='200' onkeypress='return valida_ambos(event);'>

               <div id='resp_nombre_completo'></div>
               </div> 
               
              <div class='col-lg-6 col-xs-6'> 
              
              <label>direccion</label></br>
              <input type='text' id='direccion' class='form-control' placeholder='(*)Escriba su direccion' onkeyup="validador_campo('direccion','resp_direccion',4)" maxlength='200' onkeypress='return valida_ambos(event);'>

               <div id='resp_direccion'></div>
               </div> 
               
               <div class='col-lg-6 col-xs-6'> 
               
               <label>celular</label></br>
               <input type='text' id='celular' class='form-control' placeholder='(*)Escriba su celular' onkeyup="validador_campo('celular','resp_celular',2)" maxlength='8' min='0'  onkeypress='return valida_numeros(event);'>

               <div id='resp_celular' ></div>
               </div> 
               
               <div class='col-lg-6 col-xs-6'> 
               
               <label>telefono</label></br>
               <input type='text' id='telefono' class='form-control' placeholder='(*)Escriba su telefono' onkeyup="validador_campo('telefono','resp_telefono',2)" maxlength='7' min='0'  onkeypress='return valida_numeros(event);'>

               <div id='resp_telefono' ></div>
               </div> 
               </br><hr>

   <div id='resultado_registro_chofer'></div> 
   
   </div>
   <script type='text/javascript' src='../control/control_chofer.js'></script>
