
 <?php
 require('../conector/conexion.php');

 $ID_cargo = $_POST['ID_cargo'];

 $query = pg_query("SELECT * FROM cargo WHERE id_cargo='$ID_cargo'");
 while($row = pg_fetch_array($query))
  {
      ?> 
      <div class='row'>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> cargo : </label> </br>  
       <?php echo $cargo=$row['cargo']; ?> 

           </div>
    <?php
  }

 ?>
 <!-- final div row -->
 </div>
 <script type='text/javascript' src='../control/control_editar_cargo.js'></script>
 
