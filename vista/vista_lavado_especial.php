
   
   <div class='row' style='margin:0px; padding:0px;'> 
  
    <h2 align='center'>lavado_especial</h2>
    <label> Todos los campos con (*) son obligatorios </label> </br>
    
              <div class='col-lg-6 col-xs-6'> 
              
              <label>cliente</label></br>
              <input type='text' id='cliente' class='form-control' placeholder='(*)Escriba su cliente' onkeyup="validador_campo('cliente','resp_cliente',4)" maxlength='200' onkeypress='return valida_ambos(event);'>

               <div id='resp_cliente'></div>
               </div> 
               
               <div class='col-lg-6 col-xs-6'> 
               
               <label>id_cliente</label></br>
               <input type='number' id='id_cliente' class='form-control' placeholder='(*)Escriba su id_cliente' onkeyup="validador_campo('id_cliente','resp_id_cliente',2)" maxlength='10' min='0'  onkeypress='return valida_numeros(event);'>

               <div id='resp_id_cliente' ></div>
               </div> 
               
              <div class='col-lg-6 col-xs-6'> 
              
              <label>prenda</label></br>
              <input type='text' id='prenda' class='form-control' placeholder='(*)Escriba su prenda' onkeyup="validador_campo('prenda','resp_prenda',4)" maxlength='200' onkeypress='return valida_ambos(event);'>

               <div id='resp_prenda'></div>
               </div> 
               
               <div class='col-lg-6 col-xs-6'> 
               
               <label>id_prenda</label></br>
               <input type='number' id='id_prenda' class='form-control' placeholder='(*)Escriba su id_prenda' onkeyup="validador_campo('id_prenda','resp_id_prenda',2)" maxlength='10' min='0'  onkeypress='return valida_numeros(event);'>

               <div id='resp_id_prenda' ></div>
               </div> 
               
               <div class='col-lg-6 col-xs-6'> 
               
               <label>medida</label></br>
               <input type='number' id='medida' class='form-control' placeholder='(*)Escriba su medida' onkeyup="validador_campo('medida','resp_medida',2)" maxlength='10' min='0'  onkeypress='return valida_numeros(event);'>

               <div id='resp_medida' ></div>
               </div> 
               
               <div class='col-lg-6 col-xs-6'> 
               
               <label>total</label></br>
               <input type='number' id='total' class='form-control' placeholder='(*)Escriba su total' onkeyup="validador_campo('total','resp_total',2)" maxlength='10' min='0'  onkeypress='return valida_numeros(event);'>

               <div id='resp_total' ></div>
               </div> 
               
               <div class='col-lg-6 col-xs-6'> 
               
               <label>pago</label></br>
               <input type='number' id='pago' class='form-control' placeholder='(*)Escriba su pago' onkeyup="validador_campo('pago','resp_pago',2)" maxlength='10' min='0'  onkeypress='return valida_numeros(event);'>

               <div id='resp_pago' ></div>
               </div> 
               
               <div class='col-lg-6 col-xs-6'> 
               
               <label>saldo</label></br>
               <input type='number' id='saldo' class='form-control' placeholder='(*)Escriba su saldo' onkeyup="validador_campo('saldo','resp_saldo',2)" maxlength='10' min='0'  onkeypress='return valida_numeros(event);'>

               <div id='resp_saldo' ></div>
               </div> 
               
               <div class='col-lg-6 col-xs-6'> 
               
               <label>id_usuario</label></br>
               <input type='number' id='id_usuario' class='form-control' placeholder='(*)Escriba su id_usuario' onkeyup="validador_campo('id_usuario','resp_id_usuario',2)" maxlength='10' min='0'  onkeypress='return valida_numeros(event);'>

               <div id='resp_id_usuario' ></div>
               </div> 
               
               <div class='col-lg-6 col-xs-6'> 
               
               <label>fecha</label></br>
               <input type='date' id='fecha' class='form-control' placeholder='(*)Escriba su fecha' onkeyup="validador_campo('fecha','resp_fecha',2)" maxlength='20' min='0'>

               <div id='resp_fecha' ></div>
               </div> 
               
               <div class='col-lg-6 col-xs-6'> 
               
               <label>hora</label></br>
               <input type='time' id='hora' class='form-control' placeholder='(*)Escriba su hora' onkeyup="validador_campo('hora','resp_hora',2)" maxlength='20' min='0'>

               <div id='resp_hora' ></div>
               </div> 
               
              <div class='col-lg-6 col-xs-6'> 
              
              <label>codigo</label></br>
              <input type='text' id='codigo' class='form-control' placeholder='(*)Escriba su codigo' onkeyup="validador_campo('codigo','resp_codigo',4)" maxlength='200' onkeypress='return valida_ambos(event);'>

               <div id='resp_codigo'></div>
               </div> 
               </br><hr>

   <div id='resultado_registro_lavado_especial'></div> 
   
   </div>
   <script type='text/javascript' src='../control/control_lavado_especial.js'></script>
