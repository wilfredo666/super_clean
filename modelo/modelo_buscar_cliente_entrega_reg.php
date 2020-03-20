<div class="table-responsive">
    <?php
    require "../conector/conexion.php";
    $txt_buscar = trim($_POST['txt_buscar']);
    $sql_ot = pg_query("SELECT DISTINCT codigo_ot FROM orden_trabajo WHERE cliente ILIKE '%$txt_buscar%' and estado ='ACOMODADO' LIMIT 10");
    ?>
    <label for="">Se busco: "<?php echo $txt_buscar;?>"</label><br>
    <a href="javascript:void(0);" onclick="btn_entrega();">Listar ordenes</a>
    <?php
    while($row_ot = pg_fetch_array($sql_ot))
    {
        $codigo_ot = $row_ot['codigo_ot'];
        $sql_ot_v =  pg_query("SELECT * FROM orden_trabajo WHERE codigo_ot='$codigo_ot' AND estado = 'ACOMODADO'");
        $row_ot_v = pg_fetch_array($sql_ot_v);

        $cliente = $row_ot_v['cliente'];
        $ci_nit = $row_ot_v['ci_nit'];
        $estado = $row_ot_v['estado'];
        $fecha = $row_ot_v['fecha'];

        /*consultas la cantidad de piesas de ot */
        $sql_ot_cont =  pg_query("SELECT COUNT(*) AS count FROM orden_trabajo WHERE codigo_ot='$codigo_ot'");
        $cont_p=0;
        $row_ot_cont = pg_fetch_array($sql_ot_cont);
        $cont_p = $row_ot_cont["count"]; 

        /* consultas la cantidad de piesas de acomodado*/

        $sql_ot_acomd =  pg_query("SELECT COUNT(*) AS count FROM acomodado WHERE codigo_ot ='$codigo_ot'"); 
        $cont_acomd=0;
        $row_ot_acomd = pg_fetch_array($sql_ot_acomd);
        $cont_acomd = $row_ot_acomd["count"];

        $resta = $cont_p - $cont_acomd;
        $estado_prenda = "";

        if($resta==0)
        {
            $estado = "<label style='color:green;'> COMPLETO </label>";
        }
        else
        {
            $estado = "<label style='color:red;'> FALTANTE </label>";
        }?>
    <table class="table table-bordered table-condensed">
        <thead>
            <tr> <th colspan="6"> <center> PEDIDO </center>  </th></tr>
        </thead>
        <tbody style="font-size: 12px;">
            <tr> <td> codigo : <?php echo $codigo_ot; ?></td> </tr>
            <tr> <td> <?php echo $cliente; ?></td> </tr>
            <tr> <td> estado : <?php echo $estado; ?></td> </tr>
            <tr> <td> <?php echo " Prendas Faltantes : "; echo $resta; ?></td> </tr>
            <tr> <td> fecha : <?php echo $fecha; ?></td></tr>
            <tr> <td align="center"> <button class="btn btn-info" onclick="btn_listar_detalle_entrega('<?php echo $codigo_ot; ?>');"> Entregar </button> </td> </tr>

        </tbody>
    </table>
    <?php

    }
    ?>
</div>