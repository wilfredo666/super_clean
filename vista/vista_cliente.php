
   
   <div class='row' style='margin:0px; padding:0px;'> 

    <label> Todos los campos con (*) son obligatorios </label> </br>
    
              <div class='col-lg-6 col-xs-6'> 
              
              <label>nombres</label></br>
              <input type='text' id='nombres' class='form-control' placeholder='(*)Escriba su nombres' onkeyup="validador_campo('nombres','resp_nombres',4)" maxlength='200' onkeypress='return valida_ambos(event);'>

               <div id='resp_nombres'></div>
               </div> 
               
              <div class='col-lg-6 col-xs-6'> 
              
              <label>apellidos</label></br>
              <input type='text' id='apellidos' class='form-control' placeholder='(*)Escriba su apellidos' onkeyup="validador_campo('apellidos','resp_apellidos',4)" maxlength='200' onkeypress='return valida_ambos(event);'>

               <div id='resp_apellidos'></div>
               </div> 
               
              <div class='col-lg-6 col-xs-6'> 
              
              <label>ci nit</label></br>
              <input type='text' id='ci_nit' class='form-control' placeholder='(*)Escriba su ci_nit' onkeyup="validador_campo('ci_nit','resp_ci_nit',4)" maxlength='10' onkeypress='return valida_ambos(event);'>

               <div id='resp_ci_nit'></div>
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
               
               <div class='col-lg-6 col-xs-6'> 
               
               <label>email</label></br>
               <input type='text' id='email' class='form-control' placeholder='(*)Escriba su email' onkeyup="validador_correo('email','resp_email',2)" maxlength='200' min='0' onkeypress='return valida_ambos(event);'>

               <div id='resp_email' ></div>
               </div> 
               
               <div class='col-lg-6 col-xs-6'> 
               
               <label>descuento % </label></br>
               <input type='text' id='descuento' class='form-control' placeholder='(*)Escriba su descuento' onkeyup="validador_campo('descuento','resp_descuento',1)" maxlength='3' min='0' onkeypress='return valida_numeros(event);'>

               <div id='resp_descuento' ></div>
               </div> 
             
               <div class='col-lg-6 col-xs-6'> 
               
               <label> Tipo </label></br>
               <select class="form-control" id="tipo">
                 <option> Seleccione </option>
                 <option> Normal </option>
                 <option> Vip </option>
               </select>
                
               </div> 
               
              

              <div class='col-lg-6 col-xs-6'> 
              
              <label>sexo</label></br>
             
              <select class="form-control" id='sexo'>
                <option> Seleccione </option>
                <option> MASCULINO </option>
                <option> FEMENINO </option>
              </select>

               <div id='resp_sexo'></div>
               </div> 
               </br><hr>

   <div id='resultado_registro_cliente'></div> 
   
   </div>
   <script type='text/javascript' src='../control/control_cliente.js'></script>
