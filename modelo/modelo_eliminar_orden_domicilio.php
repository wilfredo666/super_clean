
  <?php
  $ID_orden_domicilio = $_POST['ID_orden_domicilio'];require('../conector/conexion.php');  
  
  $query = pg_query("DELETE FROM orden_domicilio WHERE id_orden_domicilio =$ID_orden_domicilio");
  ?>
   <div class='alert alert-info' role='alert'>
   <strong>CORRECTO!! </strong> Se elimino el dato correctamente
   </div><?php
  
  ?>
  
