
<?php
require('../conector/conexion.php');

$ID_color_prenda = $_POST['ID_color_prenda'];

$query = pg_query("SELECT * FROM color WHERE id_color='$ID_color_prenda'");
while($row = pg_fetch_array($query))
{
?> 
<div class='row'>

    <input type='hidden' id='ID_color_prenda_edicion' value='<?php echo $ID_color_prenda; ?>'>

    <div class='col-lg-6 col-sm-6 col-xs-12'>

        <label> Editar color : </label>  
        <?php echo $color_prenda= trim($row['nombre_color']); 
 $cod_color= trim($row['cod_color']);
        ?> 

        <input type='text' class='form-control' id='nombre_color' value='<?php echo $color_prenda;?>' placeholder='(*)Escriba el nombre de color' onkeyup="validador_campo('nombre_color','resp_color_prenda',4)" maxlength='100' onkeypress='return valida_letras(event);'>
        <div id='resp_color_prenda'></div>
        <label>Seleccione el color</label>
        <input type='color' id='cod_color' value="<?php echo $cod_color;?>">
    </div> 
    </br><hr>
</div>
<?php
}

?>
<!-- final div row -->
</div>
<script type='text/javascript' src='../control/control_editar_color_prenda.js'></script>