<?php
require "../conector/conexion.php";
$codigo_tik = trim($_POST['codigo_tik']); 
$id_ot = trim($_POST['id_ot']);
$size = trim($_POST['size']);
$id_usuario = trim($_POST['id_usuario']);
$id_sucursal = trim($_POST['id_sucursal']);
$cod_ot = trim($_POST['cod_ot']);
$color = trim($_POST['color']);
$forma = trim($_POST['forma']);

//comprobar desde la base de datos su color y forma o traer del form
$color2=trim($_POST['color2']);
$forma2=trim($_POST['forma2']);

$sql_ot = pg_query("SELECT * FROM orden_trabajo WHERE id_orden_trabajo = '$id_ot'");
$row_ot = pg_fetch_array($sql_ot);

$id_cliente = trim($row_ot['id_cliente']);
$cliente = trim($row_ot['cliente']);
$codigo_ot = trim($row_ot['codigo_ot']);
$id_prenda = trim($row_ot['id_prenda']);

$cont = 0;
if($size=='8' && $codigo_tik!="")
{
    $sql_ver = pg_query("SELECT * FROM carrito_tikeo WHERE codigo_barras = '$codigo_tik' LIMIT 1");


    while ($row_ver = pg_fetch_array($sql_ver)) {
        $cont++;
    }

    if($cont==0)
    {
        if($color!="" && $forma!=""){
            $sql_car_tik = pg_query("INSERT INTO carrito_tikeo(id_cliente, cliente, id_usuario, id_sucursal, id_ot, codigo_ot, codigo_barras, estado_tikeo, id_prenda, id_color, id_forma)
		    VALUES ('$id_cliente', '$cliente', '$id_usuario', '$id_sucursal', '$id_ot', '$codigo_ot', '$codigo_tik', 'ACTIVO', '$id_prenda', '$color', '$forma')");
        }else{
            $sql_car_tik = pg_query("INSERT INTO carrito_tikeo(id_cliente, cliente, id_usuario, id_sucursal, id_ot, codigo_ot, codigo_barras, estado_tikeo, id_prenda, id_color, id_forma)
		    VALUES ('$id_cliente', '$cliente', '$id_usuario', '$id_sucursal', '$id_ot', '$codigo_ot', '$codigo_tik', 'ACTIVO', '$id_prenda', '$color2', '$forma2')");
        }
?>
<script type="text/javascript">
    setTimeout(function(){ 
        $("#codigo_barras_tik_<?php echo $id_ot; ?>").val(""); 
        btn_listar_carrito_prendas_tikeadas();
        btn_mostrar_prendas_orden_trabajo("<?php echo $codigo_ot; ?>");

    },0);
</script>
<?php 
    }

    else{ 

?>
<script type="text/javascript">
    setTimeout(function(){ 
        $("#codigo_barras_tik_<?php echo $id_ot; ?>").val(""); 
        btn_listar_carrito_prendas_tikeadas();
        btn_mostrar_prendas_orden_trabajo("<?php echo $codigo_ot; ?>");
    },0);
</script>
<?php 
         echo "igreso";
?>
<script type="text/javascript">
    setTimeout(function(){ 
        $("#codigo_barras_tik_<?php echo $id_ot; ?>").val(""); 
        btn_listar_carrito_prendas_tikeadas();
        btn_mostrar_prendas_orden_trabajo("<?php echo $codigo_ot; ?>");
    },0);
</script>
<?php 


        }
}
?>