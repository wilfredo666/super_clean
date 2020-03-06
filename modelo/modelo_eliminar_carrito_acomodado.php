
  <?php
  $ID_carrito_acomodado = $_POST['ID_carrito_acomodado'];require('../conector/conexion.php');  
  
  $query = pg_query("DELETE FROM carrito_acomodado WHERE id_carrito_acomodado =$ID_carrito_acomodado");
  ?>
   <div class='alert alert-danger' role='alert'>
   <strong> CORRECTO!! </strong> Se elimino la prenda Acomodada
   </div><?php
  
  ?>
  
