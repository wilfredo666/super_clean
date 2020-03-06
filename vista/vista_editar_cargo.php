
 <?php
 require('../conector/conexion.php');

 $ID_cargo = $_POST['ID_cargo'];

 $query = pg_query("SELECT * FROM cargo WHERE id_cargo='$ID_cargo'");
 while($row = pg_fetch_array($query))
  {
      ?> 
      <div class='row'>

      <input type='hidden' id='ID_cargo_edicion' value='<?php echo $ID_cargo; ?>'>
      
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> cargo : </label>  
       <?php echo $cargo= trim($row['cargo']); ?> 
         
        <input type='text' class='form-control' id='cargo' value='<?php echo $cargo;?>' placeholder='(*)Escriba su cargo' onkeyup="validador_campo('cargo','resp_cargo',4)" maxlength='100' onkeypress='return valida_letras(event);'>

        <div id='resp_cargo'> </div>
        </div>
        
      </div>
    <?php
  }

 ?>
 <!-- final div row -->
 </div>
 <script type='text/javascript' src='../control/control_editar_cargo.js'></script>
 
