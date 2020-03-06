
  <?php
  $ID_acomodado = $_POST['ID_acomodado']; 
  require('../conector/conexion.php');

  $sql_ac = pg_query("SELECT * FROM acomodado WHERE id_acomodado = '$ID_acomodado'");
  $row_ac = pg_fetch_array($sql_ac);
  $id_ot = $row_ac['id_ot'];

  $sql_upd = pg_query("UPDATE lavado SET estado_lavado='ACTIVO' WHERE id_ot = '$id_ot'");  
  
  $query = pg_query("DELETE FROM acomodado WHERE id_acomodado = $ID_acomodado");
  ?>
   <div class='alert alert-info' role='alert'>
   <strong>CORRECTO!! </strong> Se elimino el dato correctamente
   </div><?php
  
  ?>
  
