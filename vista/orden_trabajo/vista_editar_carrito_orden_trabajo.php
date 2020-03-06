
 <?php
 require('../conector/conexion.php');

 $ID_carrito_orden_trabajo = $_POST['ID_carrito_orden_trabajo'];

 $query = pg_query("SELECT * FROM carrito_orden_trabajo WHERE id_carrito_orden_trabajo='$ID_carrito_orden_trabajo'");
 while($row = pg_fetch_array($query))
  {
      ?> 
      <div class='row'>

      <input type='hidden' id='ID_carrito_orden_trabajo_edicion' value='<?php echo $ID_carrito_orden_trabajo; ?>'>
      
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> id_usuario : </label>  
       <?php echo $id_usuario= trim($row['id_usuario']); ?> 
         <input type='number' class='form-control' id='id_usuario' value='<?php echo $id_usuario;?>' placeholder='(*)Escriba su id_usuario' onkeyup="validador_campo('id_usuario','resp_id_usuario',4)" maxlength='10' min='0' onkeypress='return valida_numeros(event);'>

         <div id='resp_id_usuario'> </div>
         </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> id_sucursal : </label>  
       <?php echo $id_sucursal= trim($row['id_sucursal']); ?> 
         <input type='number' class='form-control' id='id_sucursal' value='<?php echo $id_sucursal;?>' placeholder='(*)Escriba su id_sucursal' onkeyup="validador_campo('id_sucursal','resp_id_sucursal',4)" maxlength='10' min='0' onkeypress='return valida_numeros(event);'>

         <div id='resp_id_sucursal'> </div>
         </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> id_cliente : </label>  
       <?php echo $id_cliente= trim($row['id_cliente']); ?> 
         <input type='number' class='form-control' id='id_cliente' value='<?php echo $id_cliente;?>' placeholder='(*)Escriba su id_cliente' onkeyup="validador_campo('id_cliente','resp_id_cliente',4)" maxlength='10' min='0' onkeypress='return valida_numeros(event);'>

         <div id='resp_id_cliente'> </div>
         </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> cliente : </label>  
       <?php echo $cliente= trim($row['cliente']); ?> 
         
        <input type='text' class='form-control' id='cliente' value='<?php echo $cliente;?>' placeholder='(*)Escriba su cliente' onkeyup="validador_campo('cliente','resp_cliente',4)" maxlength='100' onkeypress='return valida_letras(event);'>

        <div id='resp_cliente'> </div>
        </div>
        
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> ci_nit : </label>  
       <?php echo $ci_nit= trim($row['ci_nit']); ?> 
         
        <input type='text' class='form-control' id='ci_nit' value='<?php echo $ci_nit;?>' placeholder='(*)Escriba su ci_nit' onkeyup="validador_campo('ci_nit','resp_ci_nit',4)" maxlength='100' onkeypress='return valida_letras(event);'>

        <div id='resp_ci_nit'> </div>
        </div>
        
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> id_prenda : </label>  
       <?php echo $id_prenda= trim($row['id_prenda']); ?> 
         <input type='number' class='form-control' id='id_prenda' value='<?php echo $id_prenda;?>' placeholder='(*)Escriba su id_prenda' onkeyup="validador_campo('id_prenda','resp_id_prenda',4)" maxlength='10' min='0' onkeypress='return valida_numeros(event);'>

         <div id='resp_id_prenda'> </div>
         </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> id_tipo_lavado : </label>  
       <?php echo $id_tipo_lavado= trim($row['id_tipo_lavado']); ?> 
         <input type='number' class='form-control' id='id_tipo_lavado' value='<?php echo $id_tipo_lavado;?>' placeholder='(*)Escriba su id_tipo_lavado' onkeyup="validador_campo('id_tipo_lavado','resp_id_tipo_lavado',4)" maxlength='10' min='0' onkeypress='return valida_numeros(event);'>

         <div id='resp_id_tipo_lavado'> </div>
         </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> cantidad_prenda : </label>  
       <?php echo $cantidad_prenda= trim($row['cantidad_prenda']); ?> 
         <input type='number' class='form-control' id='cantidad_prenda' value='<?php echo $cantidad_prenda;?>' placeholder='(*)Escriba su cantidad_prenda' onkeyup="validador_campo('cantidad_prenda','resp_cantidad_prenda',4)" maxlength='10' min='0' onkeypress='return valida_numeros(event);'>

         <div id='resp_cantidad_prenda'> </div>
         </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> cantidad_peso : </label>  
       <?php echo $cantidad_peso= trim($row['cantidad_peso']); ?> 
         <input type='number' class='form-control' id='cantidad_peso' value='<?php echo $cantidad_peso;?>' placeholder='(*)Escriba su cantidad_peso' onkeyup="validador_campo('cantidad_peso','resp_cantidad_peso',4)" maxlength='10' min='0' onkeypress='return valida_numeros(event);'>

         <div id='resp_cantidad_peso'> </div>
         </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> medida_prenda : </label>  
       <?php echo $medida_prenda= trim($row['medida_prenda']); ?> 
         
        <input type='text' class='form-control' id='medida_prenda' value='<?php echo $medida_prenda;?>' placeholder='(*)Escriba su medida_prenda' onkeyup="validador_campo('medida_prenda','resp_medida_prenda',4)" maxlength='100' onkeypress='return valida_letras(event);'>

        <div id='resp_medida_prenda'> </div>
        </div>
        
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> costo_prenda : </label>  
       <?php echo $costo_prenda= trim($row['costo_prenda']); ?> 
         <input type='number' class='form-control' id='costo_prenda' value='<?php echo $costo_prenda;?>' placeholder='(*)Escriba su costo_prenda' onkeyup="validador_campo('costo_prenda','resp_costo_prenda',4)" maxlength='10' min='0' onkeypress='return valida_numeros(event);'>

         <div id='resp_costo_prenda'> </div>
         </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> costo_kilo : </label>  
       <?php echo $costo_kilo= trim($row['costo_kilo']); ?> 
         <input type='number' class='form-control' id='costo_kilo' value='<?php echo $costo_kilo;?>' placeholder='(*)Escriba su costo_kilo' onkeyup="validador_campo('costo_kilo','resp_costo_kilo',4)" maxlength='10' min='0' onkeypress='return valida_numeros(event);'>

         <div id='resp_costo_kilo'> </div>
         </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> costo_metro : </label>  
       <?php echo $costo_metro= trim($row['costo_metro']); ?> 
         <input type='number' class='form-control' id='costo_metro' value='<?php echo $costo_metro;?>' placeholder='(*)Escriba su costo_metro' onkeyup="validador_campo('costo_metro','resp_costo_metro',4)" maxlength='10' min='0' onkeypress='return valida_numeros(event);'>

         <div id='resp_costo_metro'> </div>
         </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> total_servicio : </label>  
       <?php echo $total_servicio= trim($row['total_servicio']); ?> 
         <input type='number' class='form-control' id='total_servicio' value='<?php echo $total_servicio;?>' placeholder='(*)Escriba su total_servicio' onkeyup="validador_campo('total_servicio','resp_total_servicio',4)" maxlength='10' min='0' onkeypress='return valida_numeros(event);'>

         <div id='resp_total_servicio'> </div>
         </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> pago_servicio : </label>  
       <?php echo $pago_servicio= trim($row['pago_servicio']); ?> 
         <input type='number' class='form-control' id='pago_servicio' value='<?php echo $pago_servicio;?>' placeholder='(*)Escriba su pago_servicio' onkeyup="validador_campo('pago_servicio','resp_pago_servicio',4)" maxlength='10' min='0' onkeypress='return valida_numeros(event);'>

         <div id='resp_pago_servicio'> </div>
         </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> saldo_servicio : </label>  
       <?php echo $saldo_servicio= trim($row['saldo_servicio']); ?> 
         <input type='number' class='form-control' id='saldo_servicio' value='<?php echo $saldo_servicio;?>' placeholder='(*)Escriba su saldo_servicio' onkeyup="validador_campo('saldo_servicio','resp_saldo_servicio',4)" maxlength='10' min='0' onkeypress='return valida_numeros(event);'>

         <div id='resp_saldo_servicio'> </div>
         </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> moneda : </label>  
       <?php echo $moneda= trim($row['moneda']); ?> 
         
        <input type='text' class='form-control' id='moneda' value='<?php echo $moneda;?>' placeholder='(*)Escriba su moneda' onkeyup="validador_campo('moneda','resp_moneda',4)" maxlength='100' onkeypress='return valida_letras(event);'>

        <div id='resp_moneda'> </div>
        </div>
        
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> descuento : </label>  
       <?php echo $descuento= trim($row['descuento']); ?> 
         
        <input type='text' class='form-control' id='descuento' value='<?php echo $descuento;?>' placeholder='(*)Escriba su descuento' onkeyup="validador_campo('descuento','resp_descuento',4)" maxlength='100' onkeypress='return valida_letras(event);'>

        <div id='resp_descuento'> </div>
        </div>
        
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> tipo_cliente : </label>  
       <?php echo $tipo_cliente= trim($row['tipo_cliente']); ?> 
         
        <input type='text' class='form-control' id='tipo_cliente' value='<?php echo $tipo_cliente;?>' placeholder='(*)Escriba su tipo_cliente' onkeyup="validador_campo('tipo_cliente','resp_tipo_cliente',4)" maxlength='100' onkeypress='return valida_letras(event);'>

        <div id='resp_tipo_cliente'> </div>
        </div>
        
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> estado : </label>  
       <?php echo $estado= trim($row['estado']); ?> 
         
        <input type='text' class='form-control' id='estado' value='<?php echo $estado;?>' placeholder='(*)Escriba su estado' onkeyup="validador_campo('estado','resp_estado',4)" maxlength='100' onkeypress='return valida_letras(event);'>

        <div id='resp_estado'> </div>
        </div>
        
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> codigo_ot : </label>  
       <?php echo $codigo_ot= trim($row['codigo_ot']); ?> 
         
        <input type='text' class='form-control' id='codigo_ot' value='<?php echo $codigo_ot;?>' placeholder='(*)Escriba su codigo_ot' onkeyup="validador_campo('codigo_ot','resp_codigo_ot',4)" maxlength='100' onkeypress='return valida_letras(event);'>

        <div id='resp_codigo_ot'> </div>
        </div>
        
      </div>
    <?php
  }

 ?>
 <!-- final div row -->
 </div>
 <script type='text/javascript' src='../control/control_editar_carrito_orden_trabajo.js'></script>
 
