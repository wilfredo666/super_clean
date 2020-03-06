
   
   <div class='row' style='margin:0px; padding:0px;'> 
  
    <h2 align='center'>carrito_orden_trabajo</h2>
    <label> Todos los campos con (*) son obligatorios </label> </br>
    
               <div class='col-lg-6 col-xs-6'> 
               
               <label>id_usuario</label></br>
               <input type='number' id='id_usuario' class='form-control' placeholder='(*)Escriba su id_usuario' onkeyup="validador_campo('id_usuario','resp_id_usuario',2)" maxlength='10' min='0'  onkeypress='return valida_numeros(event);'>

               <div id='resp_id_usuario' ></div>
               </div> 
               
               <div class='col-lg-6 col-xs-6'> 
               
               <label>id_sucursal</label></br>
               <input type='number' id='id_sucursal' class='form-control' placeholder='(*)Escriba su id_sucursal' onkeyup="validador_campo('id_sucursal','resp_id_sucursal',2)" maxlength='10' min='0'  onkeypress='return valida_numeros(event);'>

               <div id='resp_id_sucursal' ></div>
               </div> 
               
               <div class='col-lg-6 col-xs-6'> 
               
               <label>id_cliente</label></br>
               <input type='number' id='id_cliente' class='form-control' placeholder='(*)Escriba su id_cliente' onkeyup="validador_campo('id_cliente','resp_id_cliente',2)" maxlength='10' min='0'  onkeypress='return valida_numeros(event);'>

               <div id='resp_id_cliente' ></div>
               </div> 
               
              <div class='col-lg-6 col-xs-6'> 
              
              <label>cliente</label></br>
              <input type='text' id='cliente' class='form-control' placeholder='(*)Escriba su cliente' onkeyup="validador_campo('cliente','resp_cliente',4)" maxlength='200' onkeypress='return valida_ambos(event);'>

               <div id='resp_cliente'></div>
               </div> 
               
              <div class='col-lg-6 col-xs-6'> 
              
              <label>ci_nit</label></br>
              <input type='text' id='ci_nit' class='form-control' placeholder='(*)Escriba su ci_nit' onkeyup="validador_campo('ci_nit','resp_ci_nit',4)" maxlength='200' onkeypress='return valida_ambos(event);'>

               <div id='resp_ci_nit'></div>
               </div> 
               
               <div class='col-lg-6 col-xs-6'> 
               
               <label>id_prenda</label></br>
               <input type='number' id='id_prenda' class='form-control' placeholder='(*)Escriba su id_prenda' onkeyup="validador_campo('id_prenda','resp_id_prenda',2)" maxlength='10' min='0'  onkeypress='return valida_numeros(event);'>

               <div id='resp_id_prenda' ></div>
               </div> 
               
               <div class='col-lg-6 col-xs-6'> 
               
               <label>id_tipo_lavado</label></br>
               <input type='number' id='id_tipo_lavado' class='form-control' placeholder='(*)Escriba su id_tipo_lavado' onkeyup="validador_campo('id_tipo_lavado','resp_id_tipo_lavado',2)" maxlength='10' min='0'  onkeypress='return valida_numeros(event);'>

               <div id='resp_id_tipo_lavado' ></div>
               </div> 
               
               <div class='col-lg-6 col-xs-6'> 
               
               <label>cantidad_prenda</label></br>
               <input type='number' id='cantidad_prenda' class='form-control' placeholder='(*)Escriba su cantidad_prenda' onkeyup="validador_campo('cantidad_prenda','resp_cantidad_prenda',2)" maxlength='10' min='0'  onkeypress='return valida_numeros(event);'>

               <div id='resp_cantidad_prenda' ></div>
               </div> 
               
               <div class='col-lg-6 col-xs-6'> 
               
               <label>cantidad_peso</label></br>
               <input type='number' id='cantidad_peso' class='form-control' placeholder='(*)Escriba su cantidad_peso' onkeyup="validador_campo('cantidad_peso','resp_cantidad_peso',2)" maxlength='10' min='0'  onkeypress='return valida_numeros(event);'>

               <div id='resp_cantidad_peso' ></div>
               </div> 
               
              <div class='col-lg-6 col-xs-6'> 
              
              <label>medida_prenda</label></br>
              <input type='text' id='medida_prenda' class='form-control' placeholder='(*)Escriba su medida_prenda' onkeyup="validador_campo('medida_prenda','resp_medida_prenda',4)" maxlength='200' onkeypress='return valida_ambos(event);'>

               <div id='resp_medida_prenda'></div>
               </div> 
               
               <div class='col-lg-6 col-xs-6'> 
               
               <label>costo_prenda</label></br>
               <input type='number' id='costo_prenda' class='form-control' placeholder='(*)Escriba su costo_prenda' onkeyup="validador_campo('costo_prenda','resp_costo_prenda',2)" maxlength='10' min='0'  onkeypress='return valida_numeros(event);'>

               <div id='resp_costo_prenda' ></div>
               </div> 
               
               <div class='col-lg-6 col-xs-6'> 
               
               <label>costo_kilo</label></br>
               <input type='number' id='costo_kilo' class='form-control' placeholder='(*)Escriba su costo_kilo' onkeyup="validador_campo('costo_kilo','resp_costo_kilo',2)" maxlength='10' min='0'  onkeypress='return valida_numeros(event);'>

               <div id='resp_costo_kilo' ></div>
               </div> 
               
               <div class='col-lg-6 col-xs-6'> 
               
               <label>costo_metro</label></br>
               <input type='number' id='costo_metro' class='form-control' placeholder='(*)Escriba su costo_metro' onkeyup="validador_campo('costo_metro','resp_costo_metro',2)" maxlength='10' min='0'  onkeypress='return valida_numeros(event);'>

               <div id='resp_costo_metro' ></div>
               </div> 
               
               <div class='col-lg-6 col-xs-6'> 
               
               <label>total_servicio</label></br>
               <input type='number' id='total_servicio' class='form-control' placeholder='(*)Escriba su total_servicio' onkeyup="validador_campo('total_servicio','resp_total_servicio',2)" maxlength='10' min='0'  onkeypress='return valida_numeros(event);'>

               <div id='resp_total_servicio' ></div>
               </div> 
               
               <div class='col-lg-6 col-xs-6'> 
               
               <label>pago_servicio</label></br>
               <input type='number' id='pago_servicio' class='form-control' placeholder='(*)Escriba su pago_servicio' onkeyup="validador_campo('pago_servicio','resp_pago_servicio',2)" maxlength='10' min='0'  onkeypress='return valida_numeros(event);'>

               <div id='resp_pago_servicio' ></div>
               </div> 
               
               <div class='col-lg-6 col-xs-6'> 
               
               <label>saldo_servicio</label></br>
               <input type='number' id='saldo_servicio' class='form-control' placeholder='(*)Escriba su saldo_servicio' onkeyup="validador_campo('saldo_servicio','resp_saldo_servicio',2)" maxlength='10' min='0'  onkeypress='return valida_numeros(event);'>

               <div id='resp_saldo_servicio' ></div>
               </div> 
               
              <div class='col-lg-6 col-xs-6'> 
              
              <label>moneda</label></br>
              <input type='text' id='moneda' class='form-control' placeholder='(*)Escriba su moneda' onkeyup="validador_campo('moneda','resp_moneda',4)" maxlength='200' onkeypress='return valida_ambos(event);'>

               <div id='resp_moneda'></div>
               </div> 
               
              <div class='col-lg-6 col-xs-6'> 
              
              <label>descuento</label></br>
              <input type='text' id='descuento' class='form-control' placeholder='(*)Escriba su descuento' onkeyup="validador_campo('descuento','resp_descuento',4)" maxlength='200' onkeypress='return valida_ambos(event);'>

               <div id='resp_descuento'></div>
               </div> 
               
              <div class='col-lg-6 col-xs-6'> 
              
              <label>tipo_cliente</label></br>
              <input type='text' id='tipo_cliente' class='form-control' placeholder='(*)Escriba su tipo_cliente' onkeyup="validador_campo('tipo_cliente','resp_tipo_cliente',4)" maxlength='200' onkeypress='return valida_ambos(event);'>

               <div id='resp_tipo_cliente'></div>
               </div> 
               
              <div class='col-lg-6 col-xs-6'> 
              
              <label>estado</label></br>
              <input type='text' id='estado' class='form-control' placeholder='(*)Escriba su estado' onkeyup="validador_campo('estado','resp_estado',4)" maxlength='200' onkeypress='return valida_ambos(event);'>

               <div id='resp_estado'></div>
               </div> 
               
              <div class='col-lg-6 col-xs-6'> 
              
              <label>codigo_ot</label></br>
              <input type='text' id='codigo_ot' class='form-control' placeholder='(*)Escriba su codigo_ot' onkeyup="validador_campo('codigo_ot','resp_codigo_ot',4)" maxlength='200' onkeypress='return valida_ambos(event);'>

               <div id='resp_codigo_ot'></div>
               </div> 
               </br><hr>

   <div id='resultado_registro_carrito_orden_trabajo'></div> 
   
   </div>
   <script type='text/javascript' src='../control/control_carrito_orden_trabajo.js'></script>
