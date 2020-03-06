
 <?php
 require('../conector/conexion.php');

 $ID_chofer = $_POST['ID_chofer'];

 $query = pg_query("SELECT * FROM chofer WHERE id_chofer='$ID_chofer'");
 while($row = pg_fetch_array($query))
  {
      ?> 
      <div class='row'>

      <input type='hidden' id='ID_chofer_edicion' value='<?php echo $ID_chofer; ?>'>
      
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label>  chofer : </label>  
       <?php echo $nombre_completo= trim($row['nombre_completo']); ?> 
         
        <input type='text' class='form-control' id='nombre_completo' value='<?php echo $nombre_completo;?>' placeholder='(*)Escriba su nombre_completo' onkeyup="validador_campo('nombre_completo','resp_nombre_completo',4)" maxlength='100' onkeypress='return valida_letras(event);'>

        <div id='resp_nombre_completo'> </div>
        </div>
        
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> direccion : </label>  
       <?php echo $direccion= trim($row['direccion']); ?> 
         
        <input type='text' class='form-control' id='direccion' value='<?php echo $direccion;?>' placeholder='(*)Escriba su direccion' onkeyup="validador_campo('direccion','resp_direccion',4)" maxlength='100' onkeypress='return valida_letras(event);'>

        <div id='resp_direccion'> </div>
        </div>
        
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> celular : </label>  
       <?php echo $celular= trim($row['celular']); ?> 
         <input type='text' class='form-control' id='celular' value='<?php echo $celular;?>' placeholder='(*)Escriba su celular' onkeyup="validador_campo('celular','resp_celular',4)" maxlength='8' min='0' onkeypress='return valida_numeros(event);'>

         <div id='resp_celular'> </div>
         </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> telefono : </label>  
       <?php echo $telefono= trim($row['telefono']); ?> 
         <input type='text' class='form-control' id='telefono' value='<?php echo $telefono;?>' placeholder='(*)Escriba su telefono' onkeyup="validador_campo('telefono','resp_telefono',4)" maxlength='7' min='0' onkeypress='return valida_numeros(event);'>

         <div id='resp_telefono'> </div>
         </div>
      </div>
    <?php
  }

 ?>
 <!-- final div row -->
 </div>
 <script type='text/javascript' src='../control/control_editar_chofer.js'></script>
 
