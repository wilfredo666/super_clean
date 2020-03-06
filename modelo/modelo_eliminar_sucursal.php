
  <?php
  $ID_sucursal = $_POST['ID_sucursal'];require('../conector/conexion.php');  
  
  $query = pg_query("DELETE FROM sucursal WHERE id_sucursal =$ID_sucursal");
  ?>
   <div class='alert alert-info' role='alert'>
   <strong>CORRECTO!! </strong> Se elimino el dato correctamente
   </div><?php
  
  ?>
  
