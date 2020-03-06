
  <?php
  $ID_area_acomodado = $_POST['ID_area_acomodado'];require('../conector/conexion.php');  
  
  $query = pg_query("DELETE FROM area_acomodado WHERE id_area_acomodado =$ID_area_acomodado");
  ?>
   <div class='alert alert-info' role='alert'>
   <strong>CORRECTO!! </strong> Se elimino el dato correctamente
   </div><?php
  
  ?>
  
