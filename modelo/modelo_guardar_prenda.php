
<?php 

require('../conector/conexion.php');

$prenda = trim($_POST['prenda']);

$portada = trim($_POST['portada']);

$precio = trim($_POST['precio']);

$tipo_prenda = trim($_POST['tipo_prenda']);

$moneda = trim($_POST['moneda']);

$ID_prenda = $_POST['ID_prenda'];

$ID_forma = $_POST['forma'];

$ID_color = $_POST['color'];

$cadena= '';
if($prenda!='')
{
    $query = pg_query("UPDATE prenda SET prenda = '$prenda' WHERE id_prenda = $ID_prenda");$cadena.=' Se edito prenda , ';
} 
if($portada!='')
{
    $query = pg_query("UPDATE prenda SET portada = '$portada' WHERE id_prenda = $ID_prenda");$cadena.=' Se edito portada , ';
} 
if($precio!='')
{
    $query = pg_query("UPDATE prenda SET precio = '$precio' WHERE id_prenda = $ID_prenda");$cadena.=' Se edito precio , ';
} 
if($tipo_prenda!='')
{
    $query = pg_query("UPDATE prenda SET tipo_prenda = '$tipo_prenda' WHERE id_prenda = $ID_prenda");$cadena.=' Se edito tipo_prenda , ';
} 
if($moneda!='')
{
    $query = pg_query("UPDATE prenda SET moneda = '$moneda' WHERE id_prenda = $ID_prenda");$cadena.=' Se edito moneda , ';
}
if($ID_forma!='')
{
    $query = pg_query("UPDATE prenda SET id_forma = '$ID_forma' WHERE id_prenda = $ID_prenda");$cadena.=' Se edito forma , ';
} 
if($ID_color!='')
{
    $query = pg_query("UPDATE prenda SET id_color = '$ID_color' WHERE id_prenda = $ID_prenda");$cadena.=' Se edito color , ';
} 
if($cadena!='')
{
?>
<div class='alert alert-success' role='alert'>
    <strong> CAMBIOS!! </strong> actualizados de <?php echo $cadena; ?>
</div><?php

}
else
{ 
?>
<div class='alert alert-danger' role='alert'>
    <strong>ALERTA! </strong> Debes ingresar datos validos.
</div><?php
}

?>
