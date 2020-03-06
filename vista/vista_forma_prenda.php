   <div class='row' style='margin:0px; padding:0px;'> 
  
    <h2 align='center'>Forma de prenda</h2>
    <label> Todos los campos con (*) son obligatorios </label> </br>
    
              <div class='col-lg-6 col-xs-6'> 
              
              <label>Forma de prenda</label></br>
              <input type='text' id='forma_prenda' class='form-control' placeholder='(*)Escriba la forma de prenda' onkeyup="validador_campo('forma_prenda','resp_forma_prenda',5)" maxlength='200'>

               <div id='resp_forma_prenda'></div>
               </div> 
               </br><hr>

   <div id='resultado_registro_forma_prenda'></div> 
   
   </div>
   <script type='text/javascript' src='../control/control_forma_prenda.js'></script>
