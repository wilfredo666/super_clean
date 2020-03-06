
  <?php
  $id_entrega = $_POST['ID_entrega'];
  require('../conector/conexion.php');

  $sql_ent = pg_query("SELECT * FROM entrega WHERE id_entrega='$id_entrega'");
  $row_ent = pg_fetch_array($sql_ent); 

  $codigo_ot = trim($row_ent['codigo_ot']);

  $sql_upd = pg_query("UPDATE orden_trabajo SET estado='ACOMODADO' WHERE codigo_ot='$codigo_ot'");
  
  $query = pg_query("DELETE FROM entrega WHERE id_entrega = '$id_entrega'");

  
  ?>
   <div class='alert alert-info' role='alert'>
   <strong>CORRECTO!! </strong> Se elimino el dato correctamente
   </div><?php
  
  ?>
  
