<?php
 require '../conector/conexion.php';
 include 'base_datos.php';

 $sql = pg_query("SELECT table_name FROM information_schema.tables WHERE table_schema='public' AND table_type='BASE TABLE'");
 while ($row = pg_fetch_array($sql)) {
   echo $row['table_name'];
   echo "</br>";
 }

?>