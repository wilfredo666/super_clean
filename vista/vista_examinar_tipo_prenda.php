
 <?php
 require('../conector/conexion.php');

 $ID_tipo_prenda = $_POST['ID_tipo_prenda'];

 $query = pg_query("SELECT * FROM tipo_prenda WHERE id_tipo_prenda='$ID_tipo_prenda'");
 while($row = pg_fetch_array($query))
  {
      ?> 
      <div class='row'>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> tipo_prenda : </label> </br>  
       <?php echo $tipo_prenda=$row['tipo_prenda']; ?> 

           </div>
    <?php
  }

 ?>
 <!-- final div row -->
 </div>
 <script type='text/javascript' src='../control/control_editar_tipo_prenda.js'></script>
 
