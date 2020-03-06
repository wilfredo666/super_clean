<?php 
require "../conector/conexion.php";
$id_usuario = $_POST['id_usuario']; 
$id_sucursal = $_POST['id_sucursal'];

$sql_ot = pg_query("SELECT * FROM carrito_orden_trabajo WHERE id_usuario='$id_usuario' AND id_sucursal='$id_sucursal' ORDER BY id_carrito_orden_trabajo DESC LIMIT 1");
$row_ot = pg_fetch_array($sql_ot);

$id_cliente = trim($row_ot['id_cliente']);

if ($id_cliente=="") {
  echo "";
}

else{
   echo $id_cliente;
}

?>