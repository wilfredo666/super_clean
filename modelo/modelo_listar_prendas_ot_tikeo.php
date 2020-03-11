<table class="table table-bordered table-condensed table-hover table-striped">
    <!--color y prenda en el caso no este en tikeo-->
    <?php
    $codigo_ot = trim($_POST['codigo_ot']);
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
            <button class="btn btn-primary btn-md" onclick="btn_asignar_codigo_barras_tikeo('<?php echo $id_orden_trabajo; ?>','<?php echo $codigo_ot; ?>');"> + </button>
        </td>
    </tr>
</table>
   

   <div class="table-responsive">
    <table class="table table-bordered table-condensed table-hover table-striped">
        <!--color y prenda en el caso no este en tikeo-->
        <?php
        require '../conector/conexion.php';
        ?>
        <tr>
            <th> Prenda </th>
            <th> Cant </th>
            <th> Tipo </th>
            <th> Cod. barras </th>
        </tr>
        <?php
        require "../conector/conexion.php";

        $sql_ot = pg_query("SELECT * FROM orden_trabajo WHERE codigo_ot = '$codigo_ot' ORDER BY id_orden_trabajo DESC");

        while ($row_ot = pg_fetch_array($sql_ot)) {

            $id_prenda = $row_ot['id_prenda'];
            $cantidad_prenda = $row_ot['cantidad_prenda'];
            $id_tipo_lavado = $row_ot['id_tipo_lavado'];
            $id_orden_trabajo = $row_ot['id_orden_trabajo'];

            $cont = 0;
            $sql_ver = pg_query("SELECT * FROM carrito_tikeo WHERE id_ot = '$id_orden_trabajo' ORDER BY id_carrito_tikeo DESC");
            while ($row_ver = pg_fetch_array($sql_ver)) {
                $cont++;
            }

            if ($cont==0) {

        ?>
        <tr>
            <td style="text-align: center ;"> 
                <?php

                $sql_prend = pg_query("SELECT * FROM prenda WHERE id_prenda='$id_prenda'");
                $row_prend = pg_fetch_array($sql_prend);

                echo $prenda = $row_prend['prenda']; echo "</br>";
                $portada = $row_prend['portada'];
                ?>
                <img src="../multimedia/imagenes/<?php echo $portada; ?>" style="width: 50px; height: 50px;">	
            </td>
            <td> <?php echo $cantidad_prenda; ?></td>
            <td> <?php

                $sql_tipo = pg_query("SELECT * FROM tipo_prenda WHERE id_tipo_prenda='$id_tipo_lavado'");
                $row_tipo = pg_fetch_array($sql_tipo);

                echo $tipo_prenda = $row_tipo['tipo_prenda'];

                ?></td>
            <td> 

                <input type="text" class="form-control" placeholder="Codigo Barras" id="codigo_barras_tik_<?php echo $id_orden_trabajo; ?>" onkeyup=""> 

                <div id="panel_resp_tik_<?php echo $id_orden_trabajo; ?>"></div>

            </td>

        </tr>
        <?php

            }
            else{

            }


        }

        ?>
    </table>
</div>

<?php

$sql_ot = pg_query("SELECT * FROM orden_trabajo WHERE codigo_ot = '$codigo_ot' ORDER BY id_orden_trabajo ASC");
while($row_ot = pg_fetch_array($sql_ot))
{
    $id_orden_trabajo = $row_ot['id_orden_trabajo']; 
    $cont = 0;
    $sql_ver = pg_query("SELECT * FROM carrito_tikeo WHERE id_ot = '$id_orden_trabajo'");
    while ($row_ver = pg_fetch_array($sql_ver)) { $cont++; }

    if ($cont==0) {
        $input_focus = $row_ot['id_orden_trabajo'];
?>
<script type="text/javascript">
    setTimeout(function(){ 
        $("#codigo_barras_tik_<?php echo $input_focus; ?>").focus();
    },50);
</script>
<?php
    }
    else { }
}

?>
