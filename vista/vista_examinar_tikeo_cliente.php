
 <?php
 require('../conector/conexion.php');

 $ID_tikeo_cliente = $_POST['ID_tikeo_cliente'];
 $query = pg_query("SELECT * FROM tikeo_cliente WHERE id_tikeo_cliente='$ID_tikeo_cliente'");
 $row = pg_fetch_array($query);
 
 ?> 
      <div class='row'>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> prenda : </label> </br>  
       <?php 

         $id_prenda=$row['id_prenda']; 
         $sql_prend = pg_query("SELECT * FROM prenda WHERE id_prenda = '$id_prenda'");
         $row_prend = pg_fetch_array($sql_prend);
         $prenda = $row_prend['prenda'];
         $portada = $row_prend['portada'];

         ?>
        <img src="../multimedia/imagenes/<?php echo $portada; ?>" style="width: 300px; height: 300px; margin: 0px;" >

       </div>

       <div class='col-lg-6 col-sm-6 col-xs-12'>
         <label> cliente : </label> </br>  
         <?php echo $cliente=$row['cliente']; ?> 
       </div>

       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> codigo de barras : </label> </br>  
       <?php echo $codigo_barras=$row['codigo_barras']; ?> 

           </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> usuario : </label> </br>  
       <?php $id_usuario=$row['id_usuario']; 

       $sql_usr = pg_query("SELECT * FROM usuario WHERE id_usuario = '$id_usuario'");
       $row_usr = pg_fetch_array($sql_usr);

       echo $row_usr['nombres']; echo " "; echo $row_usr['apellidos'];

       ?> 

       </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> sucursal : </label> </br>  
       <?php $id_sucursal=$row['id_sucursal']; 
       $sql_suc = pg_query("SELECT * FROM sucursal WHERE id_sucursal = '$id_sucursal'");
       $row_suc = pg_fetch_array($sql_suc);

       echo $row_suc['sucursal'];

       ?> 

           </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> fecha : </label> </br>  
       <?php $fecha=$row['fecha'];

            date_default_timezone_set('America/Los_Angeles');  
            echo date('d/m/Y', strtotime($fecha)) ?> 
            
            </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> hora : </label> </br>  
       <?php echo $hora=$row['hora']; ?> 

       </div>

 <!-- final div row -->
 </div>
 <script type='text/javascript' src='../control/control_editar_tikeo_cliente.js'></script>
 
