
  <?php
  $id_carrito_orden_trabajo = $_POST['id_ot'];
  require('../conector/conexion.php');  
  
  $query = pg_query("DELETE FROM carrito_orden_trabajo WHERE id_carrito_orden_trabajo =$id_carrito_orden_trabajo");
  ?>
   <div class='alert alert-danger' role='alert'>
   <strong>CORRECTO!! </strong> Se elimino el dato correctamente
   </div><?php
  
  ?>
  
