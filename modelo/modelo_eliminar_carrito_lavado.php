
  <?php
  $ID_carrito_lavado = $_POST['ID_carrito_lavado'];require('../conector/conexion.php');  
  
  $query = pg_query("DELETE FROM carrito_lavado WHERE id_carrito_lavado =$ID_carrito_lavado");
  ?>
   <div class='alert alert-info' role='alert'>
   <strong>CORRECTO!! </strong> Se elimino el dato correctamente
   </div><?php
  
  ?>
  
