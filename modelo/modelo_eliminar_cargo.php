
  <?php
  $ID_cargo = $_POST['ID_cargo'];require('../conector/conexion.php');  
  
  $query = pg_query("DELETE FROM cargo WHERE id_cargo =$ID_cargo");
  ?>
   <div class='alert alert-info' role='alert'>
   <strong>CORRECTO!! </strong> Se elimino el dato correctamente
   </div><?php
  
  ?>
  
