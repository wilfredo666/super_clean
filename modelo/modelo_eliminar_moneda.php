
  <?php
  $ID_moneda = $_POST['ID_moneda'];require('../conector/conexion.php');  
  
  $query = pg_query("DELETE FROM moneda WHERE id_moneda =$ID_moneda");
  ?>
   <div class='alert alert-info' role='alert'>
   <strong>CORRECTO!! </strong> Se elimino el dato correctamente
   </div><?php
  
  ?>
  
