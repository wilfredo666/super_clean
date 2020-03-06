
 <?php
 require('../conector/conexion.php');

 $ID_tikeo_cliente = $_POST['ID_tikeo_cliente'];

 $query = pg_query("SELECT * FROM tikeo_cliente WHERE id_tikeo_cliente='$ID_tikeo_cliente'");
 while($row = pg_fetch_array($query))
  {
      ?> 
      <div class='row'>

      <input type='hidden' id='ID_tikeo_cliente_edicion' value='<?php echo $ID_tikeo_cliente; ?>'>
      
       <div class='col-lg-6 col-sm-6 col-xs-12'>

         <label> prenda : </label>  
         <?php $id_prenda= trim($row['id_prenda']); ?> 
         <input type='hidden' id='id_prenda' value='<?php echo $id_prenda;?>'>
         <?php
         $sql_prend = pg_query("SELECT * FROM prenda WHERE id_prenda = '$id_prenda'");
         $row_prend = pg_fetch_array($sql_prend);
         echo $prenda = $row_prend['prenda']; echo "</br>";
         $portada = $row_prend['portada'];

         ?>
        <img src="../multimedia/imagenes/<?php echo $portada; ?>" style="width: 300px; height: 300px; margin: 0px;" >

       </div>

       <div class='col-lg-6 col-sm-6 col-xs-12'>
 
         <?php $id_cliente= trim($row['id_cliente']); ?> 
         <input type='hidden' class='form-control' id='id_cliente' value='<?php echo $id_cliente;?>' >
       </div>

       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> cliente : </label>  
       <?php echo $cliente= trim($row['cliente']); ?> 
         
        <input type='hidden' class='form-control' id='cliente' value='<?php echo $cliente;?>' placeholder='(*)Escriba su cliente' onkeyup="validador_campo('cliente','resp_cliente',4)" maxlength='100' onkeypress='return valida_letras(event);'>

        <div id='resp_cliente'> </div>
        </div>
        
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> codigo de barras : </label>  
       <?php echo $codigo_barras= trim($row['codigo_barras']); ?> 
         
        <input type='text' class='form-control' id='codigo_barras' value='<?php echo $codigo_barras;?>' placeholder='(*)Escriba su codigo de barras' onkeyup="validador_campo('codigo_barras','resp_codigo_barras',8)" maxlength='8' onkeypress='return valida_ambos(event);'>

        <div id='resp_codigo_barras'> </div>
        </div>
        
       <div class='col-lg-6 col-sm-6 col-xs-12'>
         <label> usuario : </label>  
         <?php $id_usuario= trim($row['id_usuario']); 
               $sql_usr = pg_query("SELECT * FROM usuario WHERE id_usuario = '$id_usuario'");
               $row_usr = pg_fetch_array($sql_usr);

               echo $row_usr['nombres']; echo " "; echo $row_usr['apellidos'];
         ?> 
         <input type='hidden' class='form-control' id='id_usuario' value='<?php echo $id_usuario;?>'>

       </div>

       <div class='col-lg-6 col-sm-6 col-xs-12'>

         <label> sucursal : </label>  
         <?php $id_sucursal= trim($row['id_sucursal']); 
               $sql_suc = pg_query("SELECT * FROM sucursal WHERE id_sucursal = '$id_sucursal'");
               $row_suc = pg_fetch_array($sql_suc);
               echo $row_suc['sucursal'];
         ?> 
         <input type='hidden' class='form-control' id='id_sucursal' value='<?php echo $id_sucursal;?>'>

        
       </div>
       
       <div class='col-lg-6 col-sm-6 col-xs-12'>
        <label> fecha : </label>  
        <?php echo $fecha= trim($row['fecha']); ?> 
        <input type="hidden" class="form-control" id="fecha" value="<?php echo $fecha;?>">
       </div>
       
       <div class='col-lg-6 col-sm-6 col-xs-12'>
        <label> hora : </label>  
        <?php echo $hora= trim($row['hora']); ?> 
        <input type="hidden" class="form-control" id="hora" value="<?php echo $hora;?>"> 
       </div>

    <?php
  }

 ?>
 <!-- final div row -->
 </div>
 <script type='text/javascript' src='../control/control_editar_tikeo_cliente.js'></script>
 
