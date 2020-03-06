
 <?php
 require('../conector/conexion.php');

 $ID_sucursal = $_POST['ID_sucursal'];

 $query = pg_query("SELECT * FROM sucursal WHERE id_sucursal='$ID_sucursal'");
 while($row = pg_fetch_array($query))
  {
      ?> 
      <div class='row'>

      <input type='hidden' id='ID_sucursal_edicion' value='<?php echo $ID_sucursal; ?>'>
      
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> sucursal : </label>  
       <?php echo $sucursal= trim($row['sucursal']); ?> 
         
        <input type='text' class='form-control' id='sucursal' value='<?php echo $sucursal;?>' placeholder='(*)Escriba su sucursal' onkeyup="validador_campo('sucursal','resp_sucursal',4)" maxlength='100' onkeypress='return valida_letras(event);'>

        <div id='resp_sucursal'> </div>
        </div>
        
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> encargado : </label>  
       <?php echo $encargado= trim($row['encargado']); ?> 
         
        <input type='text' class='form-control' id='encargado' value='<?php echo $encargado;?>' placeholder='(*)Escriba su encargado' onkeyup="validador_campo('encargado','resp_encargado',4)" maxlength='100' onkeypress='return valida_letras(event);'>

        <div id='resp_encargado'> </div>
        </div>
        
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> telefono : </label>  
       <?php echo $telefono= trim($row['telefono']); ?> 
         <input type='number' class='form-control' id='telefono' value='<?php echo $telefono;?>' placeholder='(*)Escriba su telefono' onkeyup="validador_campo('telefono','resp_telefono',4)" maxlength='10' min='0' onkeypress='return valida_numeros(event);'>

         <div id='resp_telefono'> </div>
         </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> celular : </label>  
       <?php echo $celular= trim($row['celular']); ?> 
         <input type='number' class='form-control' id='celular' value='<?php echo $celular;?>' placeholder='(*)Escriba su celular' onkeyup="validador_campo('celular','resp_celular',4)" maxlength='10' min='0' onkeypress='return valida_numeros(event);'>

         <div id='resp_celular'> </div>
         </div>
      </div>
    <?php
  }

 ?>
 <!-- final div row -->
 </div>
 <script type='text/javascript' src='../control/control_editar_sucursal.js'></script>
 
