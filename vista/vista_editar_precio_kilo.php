
 <?php
 require('../conector/conexion.php');

 $ID_precio_kilo = $_POST['ID_precio_kilo'];

 $query = pg_query("SELECT * FROM precio_kilo WHERE id_precio_kilo='$ID_precio_kilo'");
 while($row = pg_fetch_array($query))
  {
      ?> 
      <div class='row'>

      <input type='hidden' id='ID_precio_kilo_edicion' value='<?php echo $ID_precio_kilo; ?>'>
      
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> precio_kilo : </label>  
       <?php echo $precio_kilo= trim($row['precio_kilo']); ?> 
         
        <input type='text' class='form-control' id='precio_kilo' value='<?php echo $precio_kilo;?>' placeholder='(*)Escriba su precio_kilo' onkeyup="validador_campo('precio_kilo','resp_precio_kilo',4)" maxlength='100' onkeypress='return valida_letras(event);'>

        <div id='resp_precio_kilo'> </div>
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
 <script type='text/javascript' src='../control/control_editar_precio_kilo.js'></script>
 
