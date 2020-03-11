
function btn_carrito_tikeo()
{   
    var ob ='';
    $.ajax({
        type: 'POST',
        url:'../vista/vista_listar_carrito_tikeo.php',
        data: ob,
        beforeSend: function(objeto){$("#cargando").html("<center><div id='panel_cargado'></div></center>");
                                    },
        success: function(data)
        { 
            $('#cargando').html('');
            $('#panel_contenedor_principal').html(data);

        }
    });
}

function btn_listar_tikeo_prenda()
{  
    var ob ='';
    $.ajax({
        type: 'POST',
        url:'../vista/vista_listar_tikeo_registro.php',
        data: ob,
        beforeSend: function(objeto){$("#cargando").html("<center><div id='panel_cargado'></div></center>");
                                    },
        success: function(data)
        { 
            $('#cargando').html('');
            $('#panel_contenedor_principal').html(data);

        }
    });
}

function btn_moneda()
{   
    var ob ='';
    $.ajax({
        type: 'POST',
        url:'../vista/vista_listar_moneda.php',
        data: ob,
        beforeSend: function(objeto){$("#cargando").html("<center><div id='panel_cargado'></div></center>");
                                    },
        success: function(data)
        { 
            $('#cargando').html('');
            $('#panel_contenedor_principal').html(data);

        }
    });
}


function btn_sucursal()
{    
    var ob ='';
    $.ajax({
        type: 'POST',
        url:'../vista/vista_listar_sucursal.php',
        data: ob,
        beforeSend: function(objeto){$("#cargando").html("<center><div id='panel_cargado'></div></center>");
                                    },
        success: function(data)
        { 
            $('#cargando').html('');
            $('#panel_contenedor_principal').html(data);

        }
    });
}


function btn_usuario()
{    
    var ob ='';
    $.ajax({
        type: 'POST',
        url:'../vista/vista_listar_usuario.php',
        data: ob,
        beforeSend: function(objeto){$("#cargando").html("<center><div id='panel_cargado'></div></center>");
                                    },
        success: function(data)
        { 
            $('#cargando').html('');
            $('#panel_contenedor_principal').html(data);

        }
    });
}


function btn_precio_kilo()
{    
    var ob ='';
    $.ajax({
        type: 'POST',
        url:'../vista/vista_listar_precio_kilo.php',
        data: ob,
        beforeSend: function(objeto){$("#cargando").html("<center><div id='panel_cargado'></div></center>");
                                    },
        success: function(data)
        { 
            $('#cargando').html('');
            $('#panel_contenedor_principal').html(data);

        }
    });
}


function btn_cierre_caja()
{   
    var ob ='';
    $.ajax({
        type: 'POST',
        url:'../vista/vista_listar_cierre_caja.php',
        data: ob,
        beforeSend: function(objeto){$("#cargando").html("<center><div id='panel_cargado'></div></center>");
                                    },
        success: function(data)
        { 
            $('#cargando').html('');
            $('#panel_contenedor_principal').html(data);

        }
    });
}


function btn_orden_domicilio()
{  
    var ob ='';
    $.ajax({
        type: 'POST',
        url:'../vista/vista_listar_orden_domicilio.php',
        data: ob,
        beforeSend: function(objeto){$("#cargando").html("<center><div id='panel_cargado'></div></center>");
                                    },
        success: function(data)
        { 
            $('#cargando').html('');
            $('#panel_contenedor_principal').html(data);

        }
    });
}

function btn_listar_orden_domicilio()
{   
    var ob ='';
    $.ajax({
        type: 'POST',
        url:'../vista/vista_listar_ordenes_domicilio.php',
        data: ob,
        beforeSend: function(objeto){$("#cargando").html("<center><div id='panel_cargado'></div></center>");
                                    },
        success: function(data)
        { 
            $('#cargando').html('');
            $('#panel_contenedor_principal').html(data);

        }
    });
}
function btn_color_prenda()
{  
   var ob ='';
    $.ajax({
        type: 'POST',
        url:'../vista/vista_listar_area_acomodado.php',
        data: ob,
        beforeSend: function(objeto){$("#cargando").html("<center><div id='panel_cargado'></div></center>");
                                    },
        success: function(data)
        { 
            $('#cargando').html('');
            $('#panel_contenedor_principal').html(data);

        }
    });
}

function btn_tipo_prenda()
{  
    var ob ='';
    $.ajax({
        type: 'POST',
        url:'../vista/vista_listar_tipo_prenda.php',
        data: ob,
        beforeSend: function(objeto){$("#cargando").html("<center><div id='panel_cargado'></div></center>");
                                    },
        success: function(data)
        { 
            $('#cargando').html('');
            $('#panel_contenedor_principal').html(data);

        }
    });
}


function btn_chofer()
{
    var ob ='';
    $.ajax({
        type: 'POST',
        url:'../vista/vista_listar_chofer.php',
        data: ob,
        beforeSend: function(objeto){$("#cargando").html("<center><div id='panel_cargado'></div></center>");
                                    },
        success: function(data)
        { 
            $('#cargando').html('');
            $('#panel_contenedor_principal').html(data);

        }
    });
}


function btn_carrito_acomodado()
{ 
    var ob ='';
    $.ajax({
        type: 'POST',
        url:'../vista/vista_listar_carrito_acomodado.php',
        data: ob,
        beforeSend: function(objeto){$("#cargando").html("<center><div id='panel_cargado'></div></center>");
                                    },
        success: function(data)
        { 
            $('#cargando').html('');
            $('#panel_contenedor_principal').html(data);

        }
    });
}


function btn_carrito_lavado()
{ 
    var ob ='';
    $.ajax({
        type: 'POST',
        url:'../vista/vista_listar_carrito_lavado.php',
        data: ob,
        beforeSend: function(objeto){$("#cargando").html("<center><div id='panel_cargado'></div></center>");
                                    },
        success: function(data)
        { 
            $('#cargando').html('');
            $('#panel_contenedor_principal').html(data);

        }
    });
}


function btn_cliente()
{    
    var ob ='';
    $.ajax({
        type: 'POST',
        url:'../vista/vista_listar_cliente.php',
        data: ob,
        beforeSend: function(objeto){$("#cargando").html("<center><div id='panel_cargado'></div></center>");
                                    },
        success: function(data)
        { 
            $('#cargando').html('');
            $('#panel_contenedor_principal').html(data);

        }
    });
}


function btn_tikeo()
{    
    var ob ='';
    $.ajax({
        type: 'POST',
        url:'../vista/vista_listar_tikeo.php',
        data: ob,
        beforeSend: function(objeto){$("#cargando").html("<center><div id='panel_cargado'></div></center>");
                                    },
        success: function(data)
        { 
            $('#cargando').html('');
            $('#panel_contenedor_principal').html(data);

        }
    });
}


function btn_prenda()
{    
    var ob ='';
                $.ajax({
                    type: 'POST',
                    url:'../vista/vista_listar_prenda.php',
                    data: ob,
                    beforeSend: function(objeto){$("#cargando").html("<center><div id='panel_cargado'></div></center>");
                    },
                    success: function(data)
                    { 
                     $('#cargando').html('');
                     $('#panel_contenedor_principal').html(data);

                    }
                 });
}
function btn_forma_prenda(){
    var ob ='';
    $.ajax({
        type: 'POST',
        url:'../vista/vista_listar_forma_prenda.php',
        data: ob,
        beforeSend: function(objeto)
        {
            $("#cargando").html("<center><div id='panel_cargado'></div></center>");
        },
        success: function(data)
        { 
            $('#cargando').html('');
            $('#panel_contenedor_principal').html(data);

        }
    });
}

function btn_color_prenda()
{  
   var ob ='';
    $.ajax({
        type: 'POST',
        url:'../vista/vista_listar_color_prenda.php',
        data: ob,
        beforeSend: function(objeto){$("#cargando").html("<center><div id='panel_cargado'></div></center>");
                                    },
        success: function(data)
        { 
            $('#cargando').html('');
            $('#panel_contenedor_principal').html(data);

        }
    });
}

function btn_area_acomodado()
{    
    var ob ='';
    $.ajax({
        type: 'POST',
        url:'../vista/vista_listar_area_acomodado.php',
        data: ob,
        beforeSend: function(objeto){$("#cargando").html("<center><div id='panel_cargado'></div></center>");
                                    },
        success: function(data)
        { 
            $('#cargando').html('');
            $('#panel_contenedor_principal').html(data);

        }
    });
}


function btn_carrito_orden_trabajo()
{    
    var ob ='';
    $.ajax({
        type: 'POST',
        url:'../vista/vista_listar_carrito_orden_trabajo.php',
        data: ob,
        beforeSend: function(objeto){$("#cargando").html("<center><div id='panel_cargado'></div></center>");
                                    },
        success: function(data)
        { 
            $('#cargando').html('');
            $('#panel_contenedor_principal').html(data);

        }
    });
}

 //btn_realizar_entrega_pedido();
function btn_entrega()
{    
    var ob ='';
    $.ajax({
        type: 'POST',
        url:'../vista/vista_listar_entrega.php',
        data: ob,
        beforeSend: function(objeto){$("#cargando").html("<center><div id='panel_cargado'></div></center>");
                                    },
        success: function(data)
        { 
            $('#cargando').html('');
            $('#panel_contenedor_principal').html(data);

        }
    });
}
function btn_entregar(){
        var ob ='';
    $.ajax({
        type: 'POST',
        url:'../vista/vista_entregar.php',
        data: ob,
        beforeSend: function(objeto){$("#cargando").html("<center><div id='panel_cargado'></div></center>");
                                    },
        success: function(data)
        { 
            $('#cargando').html('');
            $('#panel_contenedor_principal').html(data);

        }
    });
}


function btn_listar_entrega()
{    
    var ob ='';
    $.ajax({
        type: 'POST',
        url:'../vista/vista_listar_entrega_lavado.php',
        data: ob,
        beforeSend: function(objeto){$("#cargando").html("<center><div id='panel_cargado'></div></center>");
                                    },
        success: function(data)
        { 
            $('#cargando').html('');
            $('#panel_contenedor_principal').html(data);

        }
    });
}          

function btn_lavado()
{   
    var ob ='';
    $.ajax({
        type: 'POST',
        url:'../vista/vista_listar_lavado.php',
        data: ob,
        beforeSend: function(objeto){$("#cargando").html("<center><div id='panel_cargado'></div></center>");
                                    },
        success: function(data)
        { 
            $('#cargando').html('');
            $('#panel_contenedor_principal').html(data);

        }
    });
}


function btn_lista_prendas_lavado()
{    
    var ob ='';
    $.ajax({
        type: 'POST',
        url:'../vista/vista_listar_lavado_prendas_reg.php',
        data: ob,
        beforeSend: function(objeto){$("#cargando").html("<center><div id='panel_cargado'></div></center>");
                                    },
        success: function(data)
        { 
            $('#cargando').html('');
            $('#panel_contenedor_principal').html(data);

        }
    });
}


function btn_orden_trabajo()
{  
    var ob ='';
    $.ajax({
        type: 'POST',
        url:'../vista/orden_trabajo/vista_listar_orden_trabajo.php',
        data: ob,
        beforeSend: function(objeto){$("#cargando").html("<center><div id='panel_cargado'></div></center>");
                                    },
        success: function(data)
        { 
            $('#cargando').html('');
            $('#panel_contenedor_principal').html(data);

        }
    });
}

function btn_listar_ordenes_trabajo()
{  
    var ob ='';
    $.ajax({
        type: 'POST',
        url:'../vista/orden_trabajo/vista_listar_ordenes_trabajo.php',
        data: ob,
        beforeSend: function(objeto){$("#cargando").html("<center><div id='panel_cargado'></div></center>");
                                    },
        success: function(data)
        { 
            $('#cargando').html('');
            $('#panel_contenedor_principal').html(data);

        }
    });
}         

function btn_acomodado()
{   
    var ob ='';
    $.ajax({
        type: 'POST',
        url:'../vista/vista_listar_acomodado.php',
        data: ob,
        beforeSend: function(objeto){
            $('#panel_contenedor_principal').html("<center><div id='panel_cargado'></div></center>");
        },
        success: function(data)
        { 
            $('#panel_contenedor_principal').html(data);

        }
    });
}



function btn_listar_acomodado()
{   
    var ob ='';
    $.ajax({
        type: 'POST',
        url:'../vista/vista_listar_acomodado_listado.php',
        data: ob,
        beforeSend: function(objeto){
            $('#panel_contenedor_principal').html("<center><div id='panel_cargado'></div></center>");
        },
        success: function(data)
        { 
            $('#panel_contenedor_principal').html(data);
        }
    });
}


function btn_cargo()
{    
    var ob ='';
    $.ajax({
        type: 'POST',
        url:'../vista/vista_listar_cargo.php',
        data: ob,
        beforeSend: function(objeto){
            $('#panel_contenedor_principal').html("<center><div id='panel_cargado'></div></center>");
        },
        success: function(data)
        { 
            $('#panel_contenedor_principal').html(data);
        }
    });
}

function btn_tikeo_cliente()
{   
    var ob ='';
    $.ajax({
        type: 'POST',
        url:'../vista/vista_listar_tikeo_cliente.php',
        data: ob,
        beforeSend: function(objeto){$("#cargando").html("<center><div id='panel_cargado'></div></center>");
                                    },
        success: function(data)
        { 
            $('#cargando').html('');
            $('#panel_contenedor_principal').html(data);

        }
    });
}

function btn_almacen()
{
    var ob ='';
    $.ajax({
        type: 'POST',
        url:'../vista/vista_listar_almacen_ot.php',
        data: ob,
        beforeSend: function(objeto){$("#cargando").html("<center><div id='panel_cargado'></div></center>");
                                    },
        success: function(data)
        { 
            $('#cargando').html('');
            $('#panel_contenedor_principal').html(data);

        }
    });
}

function btn_examinar_perfil()
{
    var id_usuario = $("#id_usuario_sesion").val(); 
    var id_sucursal = $("#id_sucursal_sesion").val();
    var ob = {id_usuario : id_usuario, id_sucursal:id_sucursal };

    $.ajax({
        type: 'POST',
        url:'../vista/vista_examinar_usuario_cuenta.php',
        data: ob,
        beforeSend: function(objeto){$("#cargando").html("<center><div id='panel_cargado'></div></center>");
                                    },
        success: function(data)
        { 
            $('#cargando').html('');
            $('#panel_contenedor_principal').html(data);

        }
    });
}

function btn_lavados_especiales()
{   
    var ob = "";
    $.ajax({
        type: 'POST',
        url:'../vista/vista_listar_lavado_especial.php',
        data: ob,
        beforeSend: function(objeto){ 
            $("#cargando").html("<center><div id='panel_cargado'></div></center>"); },
        success: function(data)
        { 
            $('#cargando').html('');
            $('#panel_contenedor_principal').html(data);              
        }
    });

}

function btn_cobro_lavados_especiales()
{   
    var ob = "";
    $.ajax({
        type: 'POST',
        url:'../vista/vista_listar_cobro_lavado_especial.php',
        data: ob,
        beforeSend: function(objeto){ 
            $("#cargando").html("<center><div id='panel_cargado'></div></center>"); },
        success: function(data)
        { 
            $('#cargando').html('');
            $('#panel_contenedor_principal').html(data);              
        }
    });

}

function btn_kardex_lavados_especiales()
{   
    var ob = "";
    $.ajax({
        type: 'POST',
        url:'../vista/vista_listar_kardex_lavado_especial.php',
        data: ob,
        beforeSend: function(objeto){ 
            $("#cargando").html("<center><div id='panel_cargado'></div></center>"); },
        success: function(data)
        { 
            $('#cargando').html('');
            $('#panel_contenedor_principal').html(data);              
        }
    });

}