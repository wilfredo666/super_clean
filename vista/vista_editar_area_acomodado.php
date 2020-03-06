
 <?php
 require('../conector/conexion.php');

 $ID_area_acomodado = $_POST['ID_area_acomodado'];

 $query = pg_query("SELECT * FROM area_acomodado WHERE id_area_acomodado='$ID_area_acomodado'");
 while($row = pg_fetch_array($query))
  {
      ?> 
      <div class='row'>

      <input type='hidden' id='ID_area_acomodado_edicion' value='<?php echo $ID_area_acomodado; ?>'>
      
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> area_acomodado : </label>  
       <?php echo $area_acomodado= trim($row['area_acomodado']); ?> 
         
        <input type='text' class='form-control' id='area_acomodado' value='<?php echo $area_acomodado;?>' placeholder='(*)Escriba su area_acomodado' onkeyup="validador_campo('area_acomodado','resp_area_acomodado',4)" maxlength='100' onkeypress='return valida_letras(event);'>

        <div id='resp_area_acomodado'> </div>
        </div>
        
      </div>
    <?php
  }

 ?>
 <!-- final div row -->
 </div>
 <script type='text/javascript' src='../control/control_editar_area_acomodado.js'></script>
 
