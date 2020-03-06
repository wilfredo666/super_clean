
 <?php
 require('../conector/conexion.php');

 $ID_carrito_lavado = $_POST['ID_carrito_lavado'];

 $query = pg_query("SELECT * FROM carrito_lavado WHERE id_carrito_lavado='$ID_carrito_lavado'");
 while($row = pg_fetch_array($query))
  {
      ?> 
      <div class='row'>

      <input type='hidden' id='ID_carrito_lavado_edicion' value='<?php echo $ID_carrito_lavado; ?>'>
      
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> id_usuario : </label>  
       <?php echo $id_usuario= trim($row['id_usuario']); ?> 
         <input type='number' class='form-control' id='id_usuario' value='<?php echo $id_usuario;?>' placeholder='(*)Escriba su id_usuario' onkeyup="validador_campo('id_usuario','resp_id_usuario',4)" maxlength='10' min='0' onkeypress='return valida_numeros(event);'>

         <div id='resp_id_usuario'> </div>
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

       <label> id_sucursal : </label>  
       <?php echo $id_sucursal= trim($row['id_sucursal']); ?> 
         <input type='number' class='form-control' id='id_sucursal' value='<?php echo $id_sucursal;?>' placeholder='(*)Escriba su id_sucursal' onkeyup="validador_campo('id_sucursal','resp_id_sucursal',4)" maxlength='10' min='0' onkeypress='return valida_numeros(event);'>

         <div id='resp_id_sucursal'> </div>
         </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> id_ot : </label>  
       <?php echo $id_ot= trim($row['id_ot']); ?> 
         <input type='number' class='form-control' id='id_ot' value='<?php echo $id_ot;?>' placeholder='(*)Escriba su id_ot' onkeyup="validador_campo('id_ot','resp_id_ot',4)" maxlength='10' min='0' onkeypress='return valida_numeros(event);'>

         <div id='resp_id_ot'> </div>
         </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> codigo_ot : </label>  
       <?php echo $codigo_ot= trim($row['codigo_ot']); ?> 
         
        <input type='text' class='form-control' id='codigo_ot' value='<?php echo $codigo_ot;?>' placeholder='(*)Escriba su codigo_ot' onkeyup="validador_campo('codigo_ot','resp_codigo_ot',4)" maxlength='100' onkeypress='return valida_letras(event);'>

        <div id='resp_codigo_ot'> </div>
        </div>
        
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> tipo_lavado : </label>  
       <?php echo $tipo_lavado= trim($row['tipo_lavado']); ?> 
         
        <input type='text' class='form-control' id='tipo_lavado' value='<?php echo $tipo_lavado;?>' placeholder='(*)Escriba su tipo_lavado' onkeyup="validador_campo('tipo_lavado','resp_tipo_lavado',4)" maxlength='100' onkeypress='return valida_letras(event);'>

        <div id='resp_tipo_lavado'> </div>
        </div>
        
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> estado_lavado : </label>  
       <?php echo $estado_lavado= trim($row['estado_lavado']); ?> 
         
        <input type='text' class='form-control' id='estado_lavado' value='<?php echo $estado_lavado;?>' placeholder='(*)Escriba su estado_lavado' onkeyup="validador_campo('estado_lavado','resp_estado_lavado',4)" maxlength='100' onkeypress='return valida_letras(event);'>

        <div id='resp_estado_lavado'> </div>
        </div>
        
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> codigo_tikeo : </label>  
       <?php echo $codigo_tikeo= trim($row['codigo_tikeo']); ?> 
         
        <input type='text' class='form-control' id='codigo_tikeo' value='<?php echo $codigo_tikeo;?>' placeholder='(*)Escriba su codigo_tikeo' onkeyup="validador_campo('codigo_tikeo','resp_codigo_tikeo',4)" maxlength='100' onkeypress='return valida_letras(event);'>

        <div id='resp_codigo_tikeo'> </div>
        </div>
        
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> id_prenda : </label>  
       <?php echo $id_prenda= trim($row['id_prenda']); ?> 
         <input type='number' class='form-control' id='id_prenda' value='<?php echo $id_prenda;?>' placeholder='(*)Escriba su id_prenda' onkeyup="validador_campo('id_prenda','resp_id_prenda',4)" maxlength='10' min='0' onkeypress='return valida_numeros(event);'>

         <div id='resp_id_prenda'> </div>
         </div>
      </div>
    <?php
  }

 ?>
 <!-- final div row -->
 </div>
 <script type='text/javascript' src='../control/control_editar_carrito_lavado.js'></script>
 
