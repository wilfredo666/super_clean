<?php 

require('../conector/conexion.php');

$nombre_color = trim($_POST['nombre_color']);
$cod_color = trim($_POST['cod_color']);
$ID_color_prenda = $_POST['ID_color_prenda'];

$cadena= '';
if($nombre_color!='')
{
    $query = pg_query("UPDATE color SET nombre_color = '$nombre_color', cod_color = '$cod_color' WHERE id_color = $ID_color_prenda");
    $cadena=' Se edito el color '.$nombre_color;
}  
if($cadena!='')
{
?>
<div class='alert alert-success' role='alert'>
    <strong> CAMBIOS!! </strong> actualizados de <?php echo $nombre_color; ?>
</div><?php

}
else
{ 
?>
<div class='alert alert-danger' role='alert'>
    <strong>ALERTA!! </strong> Debes ingresar datos validos.
</div><?php
}

?>
