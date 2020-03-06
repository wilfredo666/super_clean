
  <?php
  $ID_cierre_caja = $_POST['ID_cierre_caja'];require('../conector/conexion.php');  
  
  $query = pg_query("DELETE FROM cierre_caja WHERE id_cierre_caja =$ID_cierre_caja");
  ?>
   <div class='alert alert-info' role='alert'>
   <strong>CORRECTO!! </strong> Se elimino el dato correctamente
   </div><?php
  
  ?>
  
