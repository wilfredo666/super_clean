
 <?php
 require('../conector/conexion.php');

 $ID_orden_domicilio = $_POST['ID_orden_domicilio'];

 $query = pg_query("SELECT * FROM orden_domicilio WHERE id_orden_domicilio='$ID_orden_domicilio'");
 while($row = pg_fetch_array($query))
  {
      ?> 
      <div class='row'>

      <input type='hidden' id='ID_orden_domicilio_edicion' value='<?php echo $ID_orden_domicilio; ?>'>
      
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> chofer : </label>  
       <?php $id_chofer= trim($row['id_chofer']);
       $sql_chof = pg_query("SELECT * FROM chofer WHERE id_chofer='$id_chofer'");
       $row_chof = pg_fetch_array($sql_chof);

       echo $row_chof['nombre_completo']; 

       ?> 
       <select class="form-control" id="id_chofer">
         <option value=""> Seleccione </option>
         <?php
         $sql_chof = pg_query("SELECT * FROM chofer WHERE id_chofer='$id_chofer'");
         while($row_chof = pg_fetch_array($sql_chof))
         {
          $id_chofer = $row_chof['id_chofer'];
          $chofer = $row_chof['nombre_completo'];
          ?>
          <option value="<?php echo $id_chofer; ?>"><?php echo $chofer; ?></option>
          <?php
         }

         ?>
       </select>
        
         <div id='resp_id_chofer'> </div>
         </div>
       
       <div class='col-lg-6 col-sm-6 col-xs-12'>

        <label> precio envio : </label>  
        <?php echo $precio_envio= trim($row['precio_envio']); ?> 
         <input type='text' class='form-control' id='precio_envio' value='<?php echo $precio_envio;?>' placeholder='(*)Escriba su precio_envio' onkeyup="validador_campo('precio_envio','resp_precio_envio',4)" maxlength='10' min='0' onkeypress='return valida_numeros(event);'>

         <div id='resp_precio_envio'> </div>
       </div>

       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> codigo_ot : </label>  
       <?php echo $codigo_ot = trim($row['codigo_ot']); ?> 
         
        <input type='hidden' class='form-control' id='codigo_ot' value='<?php echo $codigo_ot;?>' placeholder='(*)Escriba su codigo_ot' onkeyup="validador_campo('codigo_ot','resp_codigo_ot',4)" maxlength='100' onkeypress='return valida_letras(event);'>

        <div id='resp_codigo_ot'> </div>
        </div>


       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> fecha : </label>  
       <?php echo $fecha= trim($row['fecha']); ?> 
        <input type="hidden" class="form-control" id="fecha" value="<?php echo $fecha;?>" placeholder="(*)Escriba su fecha" onkeyup="validador_campo('fecha','resp_fecha',4)"" maxlength="20"><div id="resp_fecha"></div>
        </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> hora : </label>  
       <?php echo $hora= trim($row['hora']); ?> 
        <input type="hidden" class="form-control" id="hora" value="<?php echo $hora;?>" placeholder="(*)Escriba su hora" onkeyup="validador_campo('hora','resp_hora',4)"" maxlength="20"><div id="resp_hora"></div>
        </div>
      </div>
    <?php
  }

 ?>
 <!-- final div row -->
 </div>
 <script type='text/javascript' src='../control/control_editar_orden_domicilio.js'></script>
 
