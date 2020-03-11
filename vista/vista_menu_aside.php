<ul class='link_nav'>

    <li class='link'>
        <a onclick="btn_mostrar_trabajo('panel_orden_trabajo');" > <i class='glyphicon glyphicon-tasks fa-lg' id="icono"></i> Orden de Trabajo </a>
        <div style="display: none; background: transparent;" id="panel_orden_trabajo" >

            <ul class='link_nav'>

                <li class='link_submenu'> <a onclick='btn_orden_trabajo();' class="item"> Orden Trabajo </a> </li>

                <li class='link_submenu'>
                    <a onclick='btn_listar_ordenes_trabajo();' class="item">  Lista Ord Trabajo </a>
                </li>

                <li class='link_submenu'> <a onclick='btn_lavados_especiales();' class="item"> OT Lavados especiales </a> </li>

                <li class='link_submenu'> <a onclick='btn_cobro_lavados_especiales();' class="item"> OT Cobros LE </a> </li>


                <li class='link_submenu'> <a onclick='btn_kardex_lavados_especiales();' class="item"> Kardex Lavado Especial </a> </li>

                <li class='link_submenu'>
                    <a onclick='btn_orden_domicilio();' class="item">  Orden a Domicilio </a>
                </li>

                <li class='link_submenu'>
                    <a onclick='btn_listar_orden_domicilio();' class="item">  Lista Ord Domicilio </a>
                </li>

            </ul>

        </div>
    </li>

    <li class='link'>
        <a onclick="btn_mostrar_trabajo('panel_tikeo');" > <i class='glyphicon glyphicon-check fa-lg' id="icono"></i> Tikeo  </a>
        <div style="display: none; background: transparent;" id="panel_tikeo" >

            <ul class='link_nav'>

                <!-- <li class='link_submenu'> <a onclick='btn_tikeo_cliente();' class="item"> Tikear Prenda Cliente </a> </li>   -->
                <li class='link_submenu'> <a onclick='btn_tikeo();' class="item"> Tikeo de Prenda </a> </li>
                <li class='link_submenu'> <a onclick='btn_listar_tikeo_prenda();' class="item"> Listar Prendas Tikeadas </a> </li>

            </ul>

        </div>
    </li>

    <li class='link'>
        <a onclick="btn_mostrar_trabajo('panel_lavado');" > <i class='glyphicon glyphicon-bell fa-lg' id="icono"></i> Lavado  </a>
        <div style="display: none; background: transparent;" id="panel_lavado" >

            <ul class='link_nav'>
                <li class='link_submenu'> <a onclick='btn_lavado();' class="item"> Asignar Lavado </a> </li>
                <li class='link_submenu'> <a onclick='btn_lista_prendas_lavado();' class="item"> Lista Lavado </a> </li>
            </ul>

        </div>
    </li>

    <li class='link'>
        <a onclick="btn_mostrar_trabajo('panel_orden_prenda');" > <i class='glyphicon glyphicon-retweet fa-lg' id="icono"></i> Orden y Asignacion </a>
        <div style="display: none; background: transparent;" id="panel_orden_prenda" >

            <ul class='link_nav'>
                <li class='link_submenu'> <a onclick='btn_acomodado();' class="item"> Orden de Prendas </a> </li>

                <li class='link_submenu'> <a onclick='btn_listar_acomodado();' class="item"> Listar Prendas </a> </li>

            </ul>

        </div>
    </li>

    <li class='link'>
        <a onclick="btn_mostrar_trabajo('panel_orden_entrega');" > <i class='glyphicon glyphicon-share fa-lg' id="icono"></i> Servicio de Entregas </a>
        <div style="display: none; background: transparent;" id="panel_orden_entrega" >

            <ul class='link_nav'>

                <li class='link_submenu'> <a onclick='btn_entregar();' class="item"> Entregar </a> </li>

                <li class='link_submenu'> <a onclick='btn_entrega();' class="item"> Registrar Entregas </a> </li>

                <li class='link_submenu'> <a onclick='btn_listar_entrega();' class="item"> Listar Entregas </a> </li>

            </ul>

        </div>
    </li>

    <li class='link'>
        <a onclick="btn_mostrar_trabajo('panel_control_servicios');" > <i class='glyphicon glyphicon-book fa-lg' id="icono"></i> Control de Servicios </a>
        <div style="display: none; background: transparent;" id="panel_control_servicios" >

            <ul class='link_nav'>

                <li class='link_submenu'> 
                    <a onclick='btn_almacen();' class="item"> Almacen </a> 
                </li>

                <li class='link_submenu'>
                    <a onclick='btn_cierre_caja();' class="item" > Cierre Caja </a>
                </li>

            </ul>

        </div>
    </li>
    <li class='link'>
        <a onclick="btn_mostrar_trabajo('panel_prenda');" > <i class='glyphicon glyphicon-paste fa-lg' id="icono"></i> Prenda </a>
        <div style="display: none; background: transparent;" id="panel_prenda" >

            <ul class='link_nav'>
                <li class='link_submenu'> 
                    <a onclick='btn_prenda();' class="item" > Registrar Prenda </a> 
                </li>
                <li class='link_submenu'> 
                    <a onclick='btn_forma_prenda();' class="item" > Formas de Prenda </a> 
                </li>
                <li class='link_submenu'> 
                    <a onclick='btn_color_prenda();' class="item" > Colores de Prenda </a> 
                </li>
                <!--
<li class='link_submenu'> 
<a onclick='btn_precio_kilo();' class="item" > Precio Kilo </a> 
</li> 
<li class='link_submenu'> 
<a onclick='btn_tipo_prenda();' class="item" > tipo prenda </a> 
</li>

<li class='link_submenu'> 
<a onclick='btn_moneda();' class="item" > Moneda </a> 
</li>
-->

                <li class='link_submenu'> 
                    <a onclick='btn_area_acomodado();' class="item" > Area Acomodado </a> 
                </li>

            </ul>

        </div>
    </li>

    <li class='link'>
        <a onclick='btn_sucursal();'> <i class='glyphicon glyphicon-file fa-lg' id="icono"></i> Sucursal </a>
    </li>

    <li class='link'>
        <a onclick='btn_chofer();'> <i class='glyphicon glyphicon-road fa-lg' id="icono"></i> Choferes </a>
    </li>

    <li class='link'>
        <a onclick="btn_mostrar_trabajo('panel_cliente');"> <i class='fa fa-users fa-lg' id="icono"></i> Clientes </a>

        <div style="display: none; background: transparent;" id="panel_cliente" >

            <ul class='link_nav'>

                <li class='link_submenu'> 
                    <a onclick='btn_cliente();' class="item" > Registrar Cliente </a> 
                </li>

            </ul>
        </div>
    </li>

    <li class='link'>
        <a onclick="btn_mostrar_trabajo('panel_usuario');"> <i class='glyphicon glyphicon-user' id="icono"></i> Usuarios </a>

        <div style="display: none; background: transparent;" id="panel_usuario" >

            <ul class='link_nav'>

                <li class='link_submenu'> 
                    <a onclick='btn_usuario();' class="item" > Registrar Usuario </a> 
                </li>

                <li class='link_submenu'> 
                    <a onclick='btn_cargo();' class="item" > Registrar Cargo </a> 
                </li>

            </ul>
        </div>
    </li>




</ul>

<style type="text/css">
    .link{

        background: rgba(11,56,97,1);
        background: -moz-radial-gradient(center, ellipse cover, rgba(11,56,97,1) 0%, rgba(14,68,112,1) 100%);
        background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, rgba(11,56,97,1)), color-stop(100%, rgba(14,68,112,1)));
        background: -webkit-radial-gradient(center, ellipse cover, rgba(11,56,97,1) 0%, rgba(14,68,112,1) 100%);
        background: -o-radial-gradient(center, ellipse cover, rgba(11,56,97,1) 0%, rgba(14,68,112,1) 100%);
        background: -ms-radial-gradient(center, ellipse cover, rgba(11,56,97,1) 0%, rgba(14,68,112,1) 100%);
        background: radial-gradient(ellipse at center, rgba(11,56,97,1) 0%, rgba(14,68,112,1) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#0b3861', endColorstr='#0e4470', GradientType=1 );

        border-bottom: none;

    }
    .link:hover{
        background: #0B3861;
    }

    #icono{
        margin-right: 10%;
        color: orange;
    }
    .link_submenu{
        width: 100%;
        list-style: none;

        padding-left: 0%;
        margin:0px;
        padding: 5%;
        border-bottom: 1px solid orange;
        background: #0B243B;


    }

    .link_submenu:hover{
        background: #0B243B; 
    }

    .link a {
        text-shadow: 1px 1px 1px #29220A;
        color:white;
    }

    .link_submenu .item
    {
        font-size: 14px;
        padding: 3%;
        color:white;
        text-shadow: 1px 2px 3px black;
        /*background: #0b243b; */

    }

    .item:active
    {  
        color:#F7FE2E;
        font-weight: bold;
    }
    .item:hover
    {  
        color:orange;
    }
    .link_nav{
        background: #0A122A;
    }

</style>

<script type="text/javascript">
    var estado_submenu = false;

    function btn_mostrar_trabajo(panel)
    {      
        if(estado_submenu==false)
        { //alert("ingreso mostrar");
            $("#"+panel+"").show("slow");
            estado_submenu=true;
        }

        else{
            //alert("ingreso ocultar");
            $("#"+panel+"").hide("slow");
            estado_submenu=false;
        }    
    }

</script>
