
  <?php
  $ID_prenda = $_POST['ID_prenda'];require('../conector/conexion.php');  
  
  $query = pg_query("DELETE FROM prenda WHERE id_prenda =$ID_prenda");
  ?>
   <div class='alert alert-info' role='alert'>
   <strong>CORRECTO!! </strong> Se elimino el dato correctamente
   </div><?php
  
  ?>
  
