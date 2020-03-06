
 <?php
 require('../conector/conexion.php');

 $ID_entrega = $_POST['ID_entrega'];

 $query = pg_query("SELECT * FROM entrega WHERE id_entrega='$ID_entrega'");
 while($row = pg_fetch_array($query))
  {
      ?> 
      <div class='row'>

      <input type='hidden' id='ID_entrega_edicion' value='<?php echo $ID_entrega; ?>'>
      
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> codigo ot : </label>  
       <?php echo $codigo_ot = trim($row['codigo_ot']); ?> 
         <input type='hidden' class='form-control' id='codigo_ot' value='<?php echo $codigo_ot;?>' placeholder='(*)Escriba su codigo_ot' onkeyup="validador_campo('codigo_ot','resp_codigo_ot',4)" maxlength='10' min='0' onkeypress='return valida_numeros(event);'>

         <div id='resp_codigo_ot'> </div>
         </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> estado : </label>  
       <?php echo $estado = trim($row['estado']); ?> 
         
        <input type='hidden' class='form-control' id='estado' value='<?php echo $estado;?>' placeholder='(*)Escriba su estado' onkeyup="validador_campo('estado','resp_estado',4)" maxlength='100' onkeypress='return valida_letras(event);'>

        <div id='resp_estado'> </div>
       </div>


       <div class='col-lg-4 col-sm-4 col-xs-12'>

        <label> total : </label>  
        <?php echo $total = trim($row['total']); echo " Bs. "; ?> 
         
        <input type='hidden' class='form-control' id='total' value='<?php echo $total;?>' placeholder='(*)Escriba su total' onkeyup="validador_campo('total','resp_total',1)" maxlength='10' onkeypress='return valida_numeros(event);'>

        <div id='resp_total'> </div>
       </div>

       <div class='col-lg-4 col-sm-4 col-xs-12'>

        <label> pago : </label>  
        <?php echo $pago = trim($row['pago']); ?> 
         
        <input type='text' class='form-control' id='pago' value='<?php echo $pago;?>' placeholder='(*)Escriba su pago' maxlength='10' onkeypress='return valida_numeros(event);' onkeyup="btn_calcular_pago_ot_entrega();" >

        <div id='resp_pago'> </div>
       </div>

       <div class='col-lg-4 col-sm-4 col-xs-12'>

        <label> saldo : </label>  
        <?php echo $saldo = trim($row['saldo']); ?> 
         
        <input type='text' class='form-control' id='saldo' value='<?php echo $saldo;?>' placeholder='(*)Escriba su saldo' onkeyup="validador_campo('saldo','resp_saldo',1)" maxlength='10' onkeypress='return valida_numeros(event);' disabled="true">

        <div id='resp_saldo'> </div>
       </div>
        
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> fecha : </label>  
       <?php echo $fecha= trim($row['fecha']); ?> 
        <input type="hidden" class="form-control" id="fecha" value="<?php echo $fecha;?>" placeholder="(*)Escriba su fecha" onkeyup="validador_campo('fecha','resp_fecha',4)" maxlength="20"><div id="resp_fecha"></div>
        </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> hora : </label>  
       <?php echo $hora= trim($row['hora']); ?> 
        <input type="hidden" class="form-control" id="hora" value="<?php echo $hora;?>" placeholder="(*)Escriba su hora" onkeyup="validador_campo('hora','resp_hora',4)" maxlength="20"><div id="resp_hora"></div>
        </div>
      </div>
    <?php
  }

 ?>
 <!-- final div row -->
 </div>

 <script type="text/javascript">
   
 function btn_calcular_pago_ot_entrega()
 {

  var total_servicio = $("#total").val();
  var pago_servicio = $("#pago").val();
  //var saldo_servicio = $("#saldo_servicio").val();

  if (total_servicio==""){ total_servicio = 0; }
  else{ total_servicio = parseInt(total_servicio); }

  if (pago_servicio==""){ pago_servicio = 0; }
  else{ pago_servicio = parseInt(pago_servicio); }

  /*
  if (saldo_servicio==""){ saldo_servicio = 0; }
  else{ saldo_servicio = parseFloat(saldo_servicio); }
  */

  var operacion_saldo = parseInt(total_servicio - pago_servicio);
  $("#saldo").val(operacion_saldo);
 }

 </script>
 <script type='text/javascript' src='../control/control_editar_entrega.js'></script>
 
