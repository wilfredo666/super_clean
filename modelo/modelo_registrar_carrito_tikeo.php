
<?php

$id_usuario= trim($_POST['id_usuario']); 
$id_sucursal= trim($_POST['id_sucursal']);

require('../conector/conexion.php');

$sql_car_tik = pg_query("SELECT * FROM carrito_tikeo WHERE id_usuario='$id_usuario' AND id_sucursal='$id_sucursal'");
while ($row_tik = pg_fetch_array($sql_car_tik)) {

    $id_cliente= trim($row_tik['id_cliente']); 
    $cliente= trim($row_tik['cliente']);  
    $id_ot= trim($row_tik['id_ot']); 
    $codigo_ot= trim($row_tik['codigo_ot']); 
    $codigo_barras= trim($row_tik['codigo_barras']); 
    $estado_tikeo= trim($row_tik['estado_tikeo']); 
    $id_prenda= trim($row_tik['id_prenda']);
    $color= trim($row_tik['id_color']);
    $forma= trim($row_tik['id_forma']);
    $codigo_tik = "T".date("YmdHis");
    $fecha = date("Y-m-d");
    $hora = date('H:i:s');


    /* REALIZAMOS LA INSERCION DE LOS DATOS */

    $sql= pg_query("INSERT INTO tikeo (id_cliente ,cliente ,id_usuario ,id_sucursal ,id_ot ,codigo_ot ,codigo_barras ,estado_tikeo ,id_prenda, codigo_tik, fecha, hora, id_color, id_forma) VALUES ( '$id_cliente' , '$cliente' , '$id_usuario' , '$id_sucursal' , '$id_ot' , '$codigo_ot' , '$codigo_barras' , '$estado_tikeo' , '$id_prenda', '$codigo_tik', '$fecha', '$hora','$color','$forma')");

    $sql_actualizar = pg_query("UPDATE orden_trabajo SET  estado='TIKEADO' WHERE id_orden_trabajo ='$id_ot'");
    $sql_delete_tik = pg_query("DELETE FROM carrito_tikeo WHERE id_usuario='$id_usuario' AND id_sucursal='$id_sucursal'");
?>
<div class='alert alert-info' role='alert'>
    <strong> REGISTRO CORRECTO DE TIKEO!! </strong> Se registraron los datos correctamente
</div>
<?php
}

?>

