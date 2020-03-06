
 <?php
 require('../conector/conexion.php');

 $ID_precio_kilo = $_POST['ID_precio_kilo'];

 $query = pg_query("SELECT * FROM precio_kilo WHERE id_precio_kilo='$ID_precio_kilo'");
 while($row = pg_fetch_array($query))
  {
      ?> 
      <div class='row'>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> precio_kilo : </label> </br>  
       <?php echo $precio_kilo=$row['precio_kilo']; ?> 

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
    <?php
  }

 ?>
 <!-- final div row -->
 </div>
 <script type='text/javascript' src='../control/control_editar_precio_kilo.js'></script>
 
