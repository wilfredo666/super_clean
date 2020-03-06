
  <?php
  $ID_chofer = $_POST['ID_chofer'];require('../conector/conexion.php');  
  
  $query = pg_query("DELETE FROM chofer WHERE id_chofer =$ID_chofer");
  ?>
   <div class='alert alert-info' role='alert'>
   <strong>CORRECTO!! </strong> Se elimino el dato correctamente
   </div><?php
  
  ?>
  
