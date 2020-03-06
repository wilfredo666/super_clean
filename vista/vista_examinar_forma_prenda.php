
 <?php
 require('../conector/conexion.php');

 $ID_forma_prenda = $_POST['ID_forma_prenda'];

 $query = pg_query("SELECT * FROM forma WHERE id_forma='$ID_forma_prenda'");
 while($row = pg_fetch_array($query))
  {
      ?> 
      <div class='row'>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> Forma de prenda : </label> </br>  
       <?php echo $forma_prenda=$row['forma']; ?> 

           </div>
    <?php
  }

 ?>
 <!-- final div row -->
 </div>
 <script type='text/javascript' src='../control/control_editar_forma_prenda.js'></script>
 
