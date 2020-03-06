
 <?php
 require('../conector/conexion.php');

 $ID_prenda = $_POST['ID_prenda'];

 $query = pg_query("SELECT * FROM prenda WHERE id_prenda='$ID_prenda'");
 while($row = pg_fetch_array($query))
  {
      ?> 
      <div class='row'>


       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> portada : </label> </br>  
       <?php $img = $row['portada'];?>
         <div style='width:100%;' align='center'>
          <img src='../multimedia/imagenes/<?php echo $img; ?>'  style='height:150px; width:150px;'>
          </div> 
        </div>

       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> prenda : </label> </br>  
       <?php echo $prenda=$row['prenda']; ?> 

       </div>

       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> precio : </label> </br>  
       <?php echo $precio=$row['precio']; echo " Bs."; ?> 

           </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> tipo : </label> </br>  
       <?php $id_tipo_prenda = trim($row['tipo_prenda']); 
          $sql_tipo = pg_query("SELECT * FROM tipo_prenda WHERE id_tipo_prenda='$id_tipo_prenda'");
         $row_tipo = pg_fetch_array($sql_tipo);

         echo $row_tipo['tipo_prenda'];

       ?> 

           </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> moneda : </label> </br>  
       <?php $id_moneda=trim($row['moneda']); 
         
         $sql_mon = pg_query("SELECT * FROM moneda WHERE id_moneda='$id_moneda'");
         $row_mon = pg_fetch_array($sql_mon);

         echo $row_mon['moneda'];

       ?> 
       </div>
    <?php
  }

 ?>
 <!-- final div row -->
 </div>
 <script type='text/javascript' src='../control/control_editar_prenda.js'></script>
 
