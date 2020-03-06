  <?php
  require('../conector/conexion.php');  
  $ID_forma_prenda = $_POST['ID_forma_prenda'];
  $query = pg_query("DELETE FROM forma WHERE id_forma =$ID_forma_prenda");
  ?>
   <div class='alert alert-info' role='alert'>
   <strong>CORRECTO!! </strong> Se elimino el dato correctamente
   </div><?php
  
  ?>
  
