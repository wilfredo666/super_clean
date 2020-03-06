
 <?php
 require('../conector/conexion.php');

 $ID_forma_prenda = $_POST['ID_forma_prenda'];

 $query = pg_query("SELECT * FROM forma WHERE id_forma='$ID_forma_prenda'");
 while($row = pg_fetch_array($query))
  {
      ?> 
      <div class='row'>

      <input type='hidden' id='id_forma_prenda' value='<?php echo $ID_forma_prenda; ?>'>
      
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> Forma de prenda : </label>  
       <?php echo $forma_prenda= trim($row['forma']); ?> 
         
        <input type='text' class='form-control' id='forma_prenda' value='<?php echo $forma_prenda;?>' placeholder='(*)Escriba la forma de la prenda' onkeyup="validador_campo('forma_prenda','resp_forma_prenda',5)" maxlength='100' onkeypress='return valida_letras(event);'>

        <div id='resp_forma_prenda'> </div>
        </div>
        
      </div>
    <?php
  }

 ?>
 <!-- final div row -->
 </div>
 <script type='text/javascript' src='../control/control_editar_forma_prenda.js'></script>
