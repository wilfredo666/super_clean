
 <?php
 require('../conector/conexion.php');

 $ID_moneda = $_POST['ID_moneda'];

 $query = pg_query("SELECT * FROM moneda WHERE id_moneda='$ID_moneda'");
 while($row = pg_fetch_array($query))
  {
      ?> 
      <div class='row'>

      <input type='hidden' id='ID_moneda_edicion' value='<?php echo $ID_moneda; ?>'>
      
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> moneda : </label>  
       <?php echo $moneda= trim($row['moneda']); ?> 
         
        <input type='text' class='form-control' id='moneda' value='<?php echo $moneda;?>' placeholder='(*)Escriba su moneda' onkeyup="validador_campo('moneda','resp_moneda',4)" maxlength='100' onkeypress='return valida_letras(event);'>

        <div id='resp_moneda'> </div>
        </div>
        
      </div>
    <?php
  }

 ?>
 <!-- final div row -->
 </div>
 <script type='text/javascript' src='../control/control_editar_moneda.js'></script>
 
