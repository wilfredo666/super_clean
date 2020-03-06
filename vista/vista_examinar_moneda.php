
 <?php
 require('../conector/conexion.php');

 $ID_moneda = $_POST['ID_moneda'];

 $query = pg_query("SELECT * FROM moneda WHERE id_moneda='$ID_moneda'");
 while($row = pg_fetch_array($query))
  {
      ?> 
      <div class='row'>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> moneda : </label> </br>  
       <?php echo $moneda=$row['moneda']; ?> 

           </div>
    <?php
  }

 ?>
 <!-- final div row -->
 </div>
 <script type='text/javascript' src='../control/control_editar_moneda.js'></script>
 
