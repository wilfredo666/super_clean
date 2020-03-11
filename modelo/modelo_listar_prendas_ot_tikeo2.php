<table class="table table-bordered table-condensed table-hover table-striped">
    <!--color y prenda en el caso no este en tikeo-->
    <?php
    $codigo_ot = trim($_POST['codigo_ot']);
    $cod_barr = trim($_POST['cod_barr']);
    require '../conector/conexion.php';
    $sql_query="select * from tikeo ";
    ?>
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
            <button class="btn btn-primary btn-md" onclick="btn_mostrar_prendas_orden_trabajo('<?php echo $codigo_ot; ?>');"> + </button>
        </td>
    </tr>
</table>

