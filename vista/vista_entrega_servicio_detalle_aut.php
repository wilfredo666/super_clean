<?php 
$codigo_ot = $_POST['codigo_ot'];
require "../conector/conexion.php";
?>
    <h4> Orden de Entrega : <?php echo $codigo_ot; ?></h4>
    <table class="table table-bordered table-condensed" style="margin:0px;">
        <tr>
            <th> prenda </th>
            <th> tipo </th>
            <th> cant </th>
            <th> peso </th>
            <th> med </th>
            <th> lugar </th>
            <th> CB </th>
        </tr>

        <?php

        $sql_ot = pg_query("SELECT * FROM orden_trabajo WHERE codigo_ot = '$codigo_ot'");

        while ($row_ot = pg_fetch_array($sql_ot)) {
            $id_ot = trim($row_ot['id_orden_trabajo']);
            $id_prenda = trim($row_ot['id_prenda']);
            $sql_prend = pg_query("SELECT * FROM prenda WHERE id_prenda = '$id_prenda'");
            $row_prend = pg_fetch_array($sql_prend);

            $prenda = trim($row_prend['prenda']);
            $id_tipo_lavado = trim($row_ot['id_tipo_lavado']);

            $sql_tip = pg_query("SELECT * FROM tipo_prenda WHERE id_tipo_prenda = '$id_tipo_lavado'");
            $row_tip = pg_fetch_array($sql_tip);

            $tipo_prenda = trim($row_tip['tipo_prenda']);
            $cantidad_prenda = trim($row_ot['cantidad_prenda']);
            $cantidad_peso = trim($row_ot['cantidad_peso']);
            $medida_prenda = trim($row_ot['medida_prenda']);

            $total_servicio = trim($row_ot['total_servicio']);
            $pago_servicio = trim($row_ot['pago_servicio']);
            $saldo_servicio = trim($row_ot['saldo_servicio']);
            $moneda = trim($row_ot['moneda']);
            $descuento = trim($row_ot['descuento']);
            $tipo_cliente = trim($row_ot['tipo_cliente']);
            $estado = trim($row_ot['estado']);

            $fecha = trim($row_ot['fecha']);
            $hora = trim($row_ot['hora']);

            $sql_tik = pg_query("SELECT * FROM tikeo WHERE id_ot='$id_ot'");
            $row_tik = pg_fetch_array($sql_tik);

            $codigo_barras = $row_tik['codigo_barras'];

            $sql_acom = pg_query("SELECT * FROM acomodado WHERE id_ot ='$id_ot' AND codigo_ot = '$codigo_ot'");
            $cont_acomodado = 0;
            $lugar_acomodado = "";

            while($row_acom = pg_fetch_array($sql_acom))
            {
                $cont_acomodado++;
                $lugar_acomodado = $row_acom['lugar']; 
            }
            if ($cont_acomodado==0) {
        ?>
        <style type="text/css">
            .titulo_acomodo_ot{
                background: #FA5858;
                color:white;
            }
        </style>
        <tr class="titulo_acomodo_ot">
            <?php
            }
            else{
            ?>  <tr>  <?php
            }
        ?>
        <td> <?php echo $prenda; ?></td>
        <td> <?php echo $tipo_prenda; ?></td>
        <td> <?php echo $cantidad_prenda; ?></td>
        <td> <?php echo $cantidad_peso; ?></td>
        <td> <?php echo $medida_prenda; ?></td>
        <td> <?php

            echo "<label style='color:green'>"; 
            echo $lugar_acomodado; 
            echo "</label>";

            ?></td>
        <td> <?php echo $codigo_barras; ?></td>

        </tr>
        <?php
        }

        ?>

    </table>
    <input type="hidden" id="codigo_ot" value="<?php echo $codigo_ot; ?>">
    <table class="table table-condensed" style="margin:0px;">
        <tr>
            <th> Cliente </th>
            <th> Descuento </th>
            <th> Fecha </th>
            <th> Hora </th>

        </tr>
        <tr>
            <td> <?php echo $tipo_cliente; ?> </td>
            <td align="center"> <?php echo $descuento; echo "%"; ?> </td>
            <td> <?php echo $fecha; ?> </td>
            <td> <?php echo $hora; ?> </td>
        </tr>
    </table>

    <?php

    $sql_ot_dom = pg_query("SELECT * FROM orden_domicilio otd , chofer cho WHERE otd.id_chofer=cho.id_chofer AND otd.codigo_ot ='$codigo_ot'");
    $contador_otd = 0;
    $costo_envio = 0;
    $chofer = "";
    while($row_ot_dom = pg_fetch_array($sql_ot_dom))
    { 
        $contador_otd++;
        $costo_envio = $row_ot_dom['precio_envio'];
        $chofer = $row_ot_dom['nombre_completo'];
    }

    if ($contador_otd>0) {
    ?>

    <table class="table table-condensed" style="margin:0px;" >
        <tr> <th colspan="4"> ORDEN A DOMICILIO </th></tr>
        <tr>
            <td> Chofer : </td>
            <td> <?php echo $chofer; ?></td>
            <td> Costo </td>
            <td style="color:black; font-weight: bold;"> <?php echo $costo_envio; ?> Bs. </td>
        </tr>

    </table>
    <?php } 

    else{}
    ?>
    <table class="table table-condensed" style="margin:0px;">
        <tr>
            <th> Total </th>
            <th> Pago </th>
            <th> Saldo </th>
        </tr>

        <tr>
            <td align="center"> 
                <?php 
                $total_servicio = $total_servicio+$costo_envio;
                echo $total_servicio; echo " BS"; ?> 
                <input type="text" id="total_servicio" class="form-control" value="<?php echo $total_servicio - $pago_servicio;?>">
            </td>
            <td align="center"> <?php echo $pago_servicio; echo " BS"; ?> 
                <input type="text" id="pago_servicio" class="form-control" value="<?php echo 
    $saldo_servicio = $total_servicio - $pago_servicio;?>" onkeyup="btn_calcular_pago_ot_entrega();" >
            </td>
            <td align="center"> <?php 
                $saldo_servicio = $total_servicio - $pago_servicio;
                echo $saldo_servicio; echo " BS"; ?> 
                <input type="text" class="form-control" value="0" id="saldo_servicio" disabled>
            </td>
        </tr>

    </table>
    <script>
        btn_realizar_entrega_pedido();
    </script>

    <div id="panel_resultado_entrega_orden_servicio">

    </div>
