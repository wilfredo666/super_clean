
  <?php
  $ID_tipo_prenda = $_POST['ID_tipo_prenda'];require('../conector/conexion.php');  
  
  $query = pg_query("DELETE FROM tipo_prenda WHERE id_tipo_prenda =$ID_tipo_prenda");
  ?>
   <div class='alert alert-info' role='alert'>
   <strong>CORRECTO!! </strong> Se elimino el dato correctamente
   </div><?php
  
  ?>
  
