
 <?php
 require('../conector/conexion.php');

 $ID_tipo_prenda = $_POST['ID_tipo_prenda'];

 $query = pg_query("SELECT * FROM tipo_prenda WHERE id_tipo_prenda='$ID_tipo_prenda'");
 while($row = pg_fetch_array($query))
  {
      ?> 
      <div class='row'>

      <input type='hidden' id='ID_tipo_prenda_edicion' value='<?php echo $ID_tipo_prenda; ?>'>
      
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> tipo_prenda : </label>  
       <?php echo $tipo_prenda= trim($row['tipo_prenda']); ?> 
         
        <input type='text' class='form-control' id='tipo_prenda' value='<?php echo $tipo_prenda;?>' placeholder='(*)Escriba su tipo_prenda' onkeyup="validador_campo('tipo_prenda','resp_tipo_prenda',4)" maxlength='100' onkeypress='return valida_letras(event);'>

        <div id='resp_tipo_prenda'> </div>
        </div>
        
      </div>
    <?php
  }

 ?>
 <!-- final div row -->
 </div>
 <script type='text/javascript' src='../control/control_editar_tipo_prenda.js'></script>
 
