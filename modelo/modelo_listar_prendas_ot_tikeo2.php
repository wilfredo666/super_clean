<?php
require '../conector/conexion.php';
$codigo_ot = trim($_POST['orden_trabajo']);
$cod_barr = trim($_POST['cod_barr']);
$id_orden_trabajo=trim($_POST['id_orden_trabajo']);
$sql = pg_query("SELECT * FROM tikeo where codigo_barras='$cod_barr'");
$row=pg_fetch_array($sql);
if($row>0){
    ?>
    <table class="table table-bordered table-condensed table-hover table-striped">
    <!--color y prenda en el caso no este en tikeo-->

    <tr>
        <td colspan="2">Color de prenda <br> 
        <?php 
                require '../conector/conexion.php';
                $sql_seleccion = pg_query("SELECT nombre_color, tikeo.id_color FROM tikeo
                join color on color.id_color=tikeo.id_color
                where codigo_barras='$cod_barr'");
                $row_seleccion = pg_fetch_array($sql_seleccion);
                    ?>
                    <label for=""><?php echo $row_seleccion[0];?></label>
                    <input type="hidden" id="color2" value="<?php echo $row_seleccion[1];?>">
        </td>
        <td colspan="2">Forma de prenda <br>
         <?php 
                require '../conector/conexion.php';
                $sql_seleccion = pg_query("SELECT forma, tikeo.id_forma FROM tikeo
                join forma on forma.id_forma=tikeo.id_forma
                where codigo_barras='$cod_barr'");
                $row_seleccion = pg_fetch_array($sql_seleccion);
                    ?>
                    <label for=""><?php echo $row_seleccion[0];?></label>
                    <input type="hidden" id="forma2" value="<?php echo $row_seleccion[1];?>">
        </td>
        <td></td>
    </tr>
    <tr>
        <td colspan="2">
            <select  id='color' class='form-control'>
                <option value=''> Seleccione </option>
                <?php 
                require '../conector/conexion.php';
                $sql_seleccion = pg_query("SELECT * FROM color");
                while ($row_seleccion = pg_fetch_array($sql_seleccion)) 
                {
                    $ID_color = $row_seleccion['id_color'];
                    $nombre_color = $row_seleccion['nombre_color'];
                    $cod_color=$row_seleccion['cod_color'];
                ?>
                <option value ='<?php echo $ID_color;?>' style="background-color:<?php echo $cod_color;?>;"><?php echo $nombre_color; ?>
                </option> 
                <?php 
                } ?> 
            </select>
        </td>
        <td colspan="2">
            <select  id='forma' class='form-control'>
                <option value=''> Seleccione </option> <?php 
                require '../conector/conexion.php';
                $sql_seleccion = pg_query("SELECT * FROM forma");
                while ($row_seleccion = pg_fetch_array($sql_seleccion)) 
                {
                    $ID_forma = $row_seleccion['id_forma'];
                    $forma = $row_seleccion['forma'];?>
                <option value ='<?php echo $ID_forma;?>'><?php echo $forma; ?></option> 
                <?php 
                } ?> 
            </select>
        </td>
        <td>
            <button class="btn btn-primary btn-md" onclick="btn_asignar_codigo_barras_tikeo('<?php echo $id_orden_trabajo; ?>','<?php echo $codigo_ot; ?>');"> + </button>
        </td>
    </tr>
</table>
    <?php
    }else{
?>
<table class="table table-bordered table-condensed table-hover table-striped">
    <!--color y prenda en el caso no este en tikeo-->

    <tr>
        <td colspan="2">Color de prenda</td>
        <td colspan="2">Forma de prenda</td>
        <td></td>
    </tr>
    <tr>
        <td colspan="2">
            <select  id='color' class='form-control'>
                <option value=''> Seleccione </option> <?php 
                require '../conector/conexion.php';
                $sql_seleccion = pg_query("SELECT * FROM color");
                while ($row_seleccion = pg_fetch_array($sql_seleccion)) 
                {
                    $ID_color = $row_seleccion['id_color'];
                    $nombre_color = $row_seleccion['nombre_color'];
                    $cod_color=$row_seleccion['cod_color'];
                ?>
                <option value ='<?php echo $ID_color;?>' style="background-color:<?php echo $cod_color;?>;"><?php echo $nombre_color; ?>
                </option> 
                <?php 
                } ?> 
            </select>
        </td>
        <td colspan="2">
            <select  id='forma' class='form-control'>
                <option value=''> Seleccione </option> <?php 
                require '../conector/conexion.php';
                $sql_seleccion = pg_query("SELECT * FROM forma");
                while ($row_seleccion = pg_fetch_array($sql_seleccion)) 
                {
                    $ID_forma = $row_seleccion['id_forma'];
                    $forma = $row_seleccion['forma'];?>
                <option value ='<?php echo $ID_forma;?>'><?php echo $forma; ?></option> 
                <?php 
                } ?> 
            </select>
        </td>
        <td>
            <button class="btn btn-primary btn-md" onclick="btn_asignar_codigo_barras_tikeo('<?php echo $id_orden_trabajo; ?>','<?php echo $codigo_ot; ?>');"> + </button>
        </td>
    </tr>
</table>
<?php
}
?>