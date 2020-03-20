   <div class="table-responsive">
    <table class="table table-bordered table-condensed table-hover table-striped">
        <!--color y prenda en el caso no este en tikeo-->
        <?php
        require '../conector/conexion.php';
        $codigo_ot = trim($_POST['codigo_ot']);
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

                <input type="text" class="form-control" placeholder="Codigo Barras" id="codigo_barras_tik_<?php echo $id_orden_trabajo; ?>" onkeyup="verificar_col_for(this.value, '<?php echo $codigo_ot;?>', '<?php echo $id_orden_trabajo;?>');"> 

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
