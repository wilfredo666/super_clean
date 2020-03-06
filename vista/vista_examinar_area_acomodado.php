
 <?php
 require('../conector/conexion.php');

 $ID_area_acomodado = $_POST['ID_area_acomodado'];

 $query = pg_query("SELECT * FROM area_acomodado WHERE id_area_acomodado='$ID_area_acomodado'");
 while($row = pg_fetch_array($query))
  {
      ?> 
      <div class='row'>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> area_acomodado : </label> </br>  
       <?php echo $area_acomodado=$row['area_acomodado']; ?> 

           </div>
    <?php
  }

 ?>
 <!-- final div row -->
 </div>
 <script type='text/javascript' src='../control/control_editar_area_acomodado.js'></script>
 
