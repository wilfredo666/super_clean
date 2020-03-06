
  <?php
  require('../conector/conexion.php'); 
  $tipo = trim($_POST['tipo']);
  
  if ($tipo == "SIMPLE") {
    $id_lavado = $_POST['id_lavado'];

    $sql_lav = pg_query("SELECT * FROM lavado WHERE id_lavado ='$id_lavado'");
    $row_lav = pg_fetch_array($sql_lav);
    $id_ot = $row_lav['id_ot'];
    $sql_upd = pg_query("UPDATE tikeo SET estado_tikeo ='ACTIVO' WHERE id_ot='$id_ot'"); 
    $query = pg_query("DELETE FROM lavado WHERE id_lavado = '$id_lavado'");
    
    ?>
    <div class='alert alert-info' role='alert'>
    <strong>CORRECTO!! </strong> Se elimino el dato correctamente
    </div><?php
  }

  if ($tipo == "TODOS") {

    $id_lavado = $_POST['id_lavado'];  

    $sql_lav = pg_query("SELECT DISTINCT codigo_ot FROM lavado WHERE codigo_lavado ='$id_lavado'");
    while($row_lav = pg_fetch_array($sql_lav))
    {
      $codigo_ot= $row_lav['codigo_ot']; 
      $sql_upd = pg_query("UPDATE tikeo SET estado_tikeo ='ACTIVO' WHERE codigo_ot='$codigo_ot'");
    }
    
    $query = pg_query("DELETE FROM lavado WHERE codigo_lavado = '$id_lavado'");
    
    ?>
    <div class='alert alert-info' role='alert'>
    <strong>CORRECTO!! </strong> Se elimino el dato correctamente
    </div><?php
    
  }

?>

  
 
  
