
  <?php
  $ID_cliente = $_POST['ID_cliente'];require('../conector/conexion.php');  
  
  $query = pg_query("DELETE FROM cliente WHERE id_cliente =$ID_cliente");
  ?>
   <div class='alert alert-info' role='alert'>
   <strong>CORRECTO!! </strong> Se elimino el dato correctamente
   </div><?php
  
  ?>
  
