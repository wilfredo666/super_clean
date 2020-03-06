
 <?php
 require('../conector/conexion.php');

 $ID_cobro_lavado_especial = $_POST['ID_cobro_lavado_especial'];

 $query = pg_query("SELECT * FROM cobro_lavado_especial WHERE id_cobro_lavado_especial='$ID_cobro_lavado_especial'");
 while($row = pg_fetch_array($query))
  {
      ?> 
      <div class='row'>

      <input type='hidden' id='ID_cobro_lavado_especial_edicion' value='<?php echo $ID_cobro_lavado_especial; ?>'>
      
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> codigo_lav : </label>  
       <?php echo $codigo_lav= trim($row['codigo_lav']); ?> 
         
        <input type='text' class='form-control' id='codigo_lav' value='<?php echo $codigo_lav;?>' placeholder='(*)Escriba su codigo_lav' onkeyup="validador_campo('codigo_lav','resp_codigo_lav',4)" maxlength='100' onkeypress='return valida_letras(event);'>

        <div id='resp_codigo_lav'> </div>
        </div>
        
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> total : </label>  
       <?php echo $total= trim($row['total']); ?> 
         <input type='number' class='form-control' id='total' value='<?php echo $total;?>' placeholder='(*)Escriba su total' onkeyup="validador_campo('total','resp_total',4)" maxlength='10' min='0' onkeypress='return valida_numeros(event);'>

         <div id='resp_total'> </div>
         </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> pago : </label>  
       <?php echo $pago= trim($row['pago']); ?> 
         <input type='number' class='form-control' id='pago' value='<?php echo $pago;?>' placeholder='(*)Escriba su pago' onkeyup="validador_campo('pago','resp_pago',4)" maxlength='10' min='0' onkeypress='return valida_numeros(event);'>

         <div id='resp_pago'> </div>
         </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> saldo : </label>  
       <?php echo $saldo= trim($row['saldo']); ?> 
         <input type='number' class='form-control' id='saldo' value='<?php echo $saldo;?>' placeholder='(*)Escriba su saldo' onkeyup="validador_campo('saldo','resp_saldo',4)" maxlength='10' min='0' onkeypress='return valida_numeros(event);'>

         <div id='resp_saldo'> </div>
         </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> id_usuario : </label>  
       <?php echo $id_usuario= trim($row['id_usuario']); ?> 
         <input type='number' class='form-control' id='id_usuario' value='<?php echo $id_usuario;?>' placeholder='(*)Escriba su id_usuario' onkeyup="validador_campo('id_usuario','resp_id_usuario',4)" maxlength='10' min='0' onkeypress='return valida_numeros(event);'>

         <div id='resp_id_usuario'> </div>
         </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> fecha : </label>  
       <?php echo $fecha= trim($row['fecha']); ?> 
        <input type="date" class="form-control" id="fecha" value="<?php echo $fecha;?>" placeholder="(*)Escriba su fecha" onkeyup="validador_campo('fecha','resp_fecha',4)"" maxlength="20"><div id="resp_fecha"></div>
        </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> hora : </label>  
       <?php echo $hora= trim($row['hora']); ?> 
        <input type="time" class="form-control" id="hora" value="<?php echo $hora;?>" placeholder="(*)Escriba su hora" onkeyup="validador_campo('hora','resp_hora',4)"" maxlength="20"><div id="resp_hora"></div>
        </div>
      </div>
    <?php
  }

 ?>
 <!-- final div row -->
 </div>
 <script type='text/javascript' src='../control/control_editar_cobro_lavado_especial.js'></script>
 
