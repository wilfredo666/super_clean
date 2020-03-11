
<div class='row' style='background:; margin: 0px; padding: 0px;'>
    <!-- Formulario de Busqueda-->

    <div class='col-lg-12 col-xs-12' style='background:white; padding:0px; margin:0px; color:#6E6E6E;'>

        <div id='panel_listado_entrega'> 
            <div class="row">
                <div class="col-lg-4 col-md-4 col-xs-12" style="overflow-y: scroll; max-height: 500px;">

                    <table class='table table-condensed'>
                        <tr>
                            <td>
                                <input type='text' class='form-control' id='txt_buscar' placeholder='Buscar Cliente' onkeyup='btn_buscar_cliente_reg_aut();'>
                            </td>
                        </tr>
                    </table>

                    <div style="padding: 1%;">
                        <h4> Lista de Ordenes de Trabajo </h4>
                        <div id='resp_busqueda_cliente'>
                            <div class="table-responsive">
                                <?php
                                require "../conector/conexion.php";

                                $sql_ot = pg_query("SELECT DISTINCT codigo_ot FROM orden_trabajo WHERE estado ='ACOMODADO'");
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
                                        <tr> <td align="center"> <button class="btn btn-info" onclick="btn_entregar_ot('<?php echo $codigo_ot; ?>');"> Entregar </button> </td> </tr>

                                    </tbody>
                                </table>
                                <?php

                                }
                                ?>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-lg-8 col-md-8 col-xs-12" style="background:; margin: 0px; padding: 0px;">

                    <div style="padding: 0%; margin: 0px;">

                        <div id="panel_detalle_ot_entrega" style="padding: 0px; margin: 0px;">

                        </div>
                    </div> 

                </div>
                <div class="col-lg-2 col-md-2 col-xs-12"> 

                </div>
            </div>

        </div>

    </div>
    <!-- Final de row -->
</div>

<!-- Modal de registro -->

<div id='myModal_Registrar' class='modal fade' role='dialog'>
    <div class='modal-dialog modal-lg'>

        <!-- Modal content-->
        <div class='modal-content'>
            <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal'>&times;</button>
                <h4 class='modal-title'> Registrar entrega </h4>
            </div>

            <div class='modal-body'>

                <div id='panel_registro_entrega'>
                </div>

            </div>
            <div class='modal-footer'>

                <button type='button' class='btn btn-default btn-md' onclick='btn_registro_entrega();'> registrar </button>

                <button type='button' class='btn btn-danger btn-md' data-dismiss='modal'> cancelar  </button>

            </div>
        </div>

    </div>
</div>

<!-- MODAL DE NOTIFICACION DE ENTREGA DEL PEDIDO -->

<div id='myModal_Notificar_Cliente' class='modal fade' role='dialog'>
    <div class='modal-dialog modal-lg'>

        <!-- Modal content-->
        <div class='modal-content'>
            <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal'>&times;</button>
                <h4 class='modal-title'> Notificar Entrega al Cliente </h4>
            </div>

            <div class='modal-body'>

                <div id='panel_notifiaciones_entrega'>


                </div>

            </div>
            <div class='modal-footer'>


                <button type='button' class='btn btn-info btn-md' data-dismiss='modal'> Aceptar  </button>

            </div>
        </div>

    </div>
</div>

<script src='../control/control_entrega.js'> </script>
