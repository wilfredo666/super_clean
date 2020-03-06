
<?php
require('../conector/conexion.php');
$ID_color_prenda = $_POST['ID_color_prenda']; 

$query = pg_query("DELETE FROM color WHERE id_color =$ID_color_prenda");
?>
<div class='alert alert-info' role='alert'>
    <strong>CORRECTO!! </strong> Se elimino el dato correctamente
</div><?php

?>

