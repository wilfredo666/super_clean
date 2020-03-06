
  <?php
  $ID_precio_kilo = $_POST['ID_precio_kilo'];require('../conector/conexion.php');  
  
  $query = pg_query("DELETE FROM precio_kilo WHERE id_precio_kilo =$ID_precio_kilo");
  ?>
   <div class='alert alert-info' role='alert'>
   <strong>CORRECTO!! </strong> Se elimino el dato correctamente
   </div><?php
  
  ?>
  
