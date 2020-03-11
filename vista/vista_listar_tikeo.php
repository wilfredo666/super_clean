
<div class='row' style='background:; margin: 0px; padding: 0px;'>
    <!-- Formulario de Busqueda-->

    <div class='col-lg-12 col-xs-12' style='background:white; padding:0px; margin:0px; color:#6E6E6E;'>

        <h4 style='margin-bottom:0px;'> Registros de tikeo </h4>
        <p style='margin:0px; margin-bottom:3px; font-size: 10px;'> Listado de todos los datos registrados hasta la ultima fecha : </p>

        <div id='panel_listado_tikeo'> 

            <div class="row">
                <div class="col-lg-3 col-md-3 col-xs-12"> 
                    <div class="panel_container" id="panel_listado_clientes_tikeo" style="overflow-y: scroll; max-height: 400px;">
                        <h4 align="center"> CLIENTES </h4>
                    </div>
                </div>

                <div class="col-lg-5 col-md-5 col-xs-12">
                   <h4 align="center"> ORDENES DE TRABAJO</h4>
                    <div id="panel_listado_prendas_up"></div>  
                    <div class="panel_container" id="panel_listado_prendas_para_tikeo" style="overflow-y: scroll; max-height: 400px;">
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="panel_container" id="panel_listado_prendas_tikeadas" style="overflow-y: scroll; max-height: 400px;">
                    <h4 align="center"> ORDENES TIQUEADAS </h4>
                    </div>
                    <div align="center">
                        <div id="panel_resultado_registro_carrito_tikeo"> </div>
                        <button class="btn btn-primary btn-md" onclick="btn_registrar_prendas_tiket();"> REGISTRAR PRENDAS </button>
                    </div>

                </div>

                <!-- Final del listado -->  
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
                <h4 class='modal-title'> Registrar tikeo </h4>
            </div>

            <div class='modal-body'>

                <div id='panel_registro_tikeo'>
                </div>

            </div>
            <div class='modal-footer'>

                <button type='button' class='btn btn-default btn-md' onclick='btn_registro_tikeo();'> registrar </button>

                <button type='button' class='btn btn-danger btn-md' data-dismiss='modal'> cancelar  </button>

            </div>
        </div>

    </div>
</div>

<script src='../control/control_tikeo.js'> </script>
