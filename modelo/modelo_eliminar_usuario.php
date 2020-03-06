
  <?php
  $ID_usuario = $_POST['ID_usuario'];require('../conector/conexion.php');  
  
  $query = pg_query("DELETE FROM usuario WHERE id_usuario =$ID_usuario");
  ?>
   <div class='alert alert-info' role='alert'>
   <strong>CORRECTO!! </strong> Se elimino el dato correctamente
   </div><?php
  
  ?>
  
