
  <?php
  $id_cobro_lavado_especial = $_POST['ID_cobro_lavado_especial'];

  require('../conector/conexion.php');
  $sql_c = pg_query("SELECT * FROM cobro_lavado_especial WHERE id_cobro_lavado_especial='$id_cobro_lavado_especial'");
  $row_c = pg_fetch_array($sql_c);

  $codigo = trim($row_c['codigo_lav']);

  $sql_upd = pg_query("UPDATE lavado_especial SET pago='0', estado ='PENDIENTE' WHERE codigo ='$codigo'");
  
  $query = pg_query("DELETE FROM cobro_lavado_especial WHERE id_cobro_lavado_especial =$id_cobro_lavado_especial");
  ?>
   <div class='alert alert-info' role='alert'>
   <strong>CORRECTO!! </strong> Se elimino el dato correctamente
   </div><?php
  
  ?>
  
