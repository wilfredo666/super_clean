
function btn_carrito_tikeo()
{   //alert('entrar a '+'carrito_tikeo');
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


function btn_moneda()
{   //alert('entrar a '+'moneda');
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
{   //alert('entrar a '+'sucursal');
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


function btn_precio_kilo()
{   //alert('entrar a '+'precio_kilo');
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
{   //alert('entrar a '+'cierre_caja');
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
{   //alert('entrar a '+'orden_domicilio');
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


function btn_tikeo_cliente()
{   //alert('entrar a '+'tikeo_cliente');
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


function btn_tipo_prenda()
{   //alert('entrar a '+'tipo_prenda');
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

function btn_forma_prenda(){
    alert("hola mundo");
    /*var ob ='';
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
    });*/
}

function btn_cargo()
{   //alert('entrar a '+'cargo');
    var ob ='';
    $.ajax({
        type: 'POST',
        url:'../vista/vista_listar_cargo.php',
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
{   //alert('entrar a '+'chofer');
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
{   //alert('entrar a '+'carrito_acomodado');
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
{   //alert('entrar a '+'carrito_lavado');
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


function btn_cobro_lavado_especial()
{   //alert('entrar a '+'cobro_lavado_especial');
    var ob ='';
    $.ajax({
        type: 'POST',
        url:'../vista/vista_listar_cobro_lavado_especial.php',
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
{   //alert('entrar a '+'usuario');
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


function btn_orden_trabajo()
{   //alert('entrar a '+'orden_trabajo');
    var ob ='';
    $.ajax({
        type: 'POST',
        url:'../vista/vista_listar_orden_trabajo.php',
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
{   //alert('entrar a '+'cliente');
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
{   //alert('entrar a '+'tikeo');
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


function btn_area_acomodado()
{   //alert('entrar a '+'area_acomodado');
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
{   //alert('entrar a '+'carrito_orden_trabajo');
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


function btn_acomodado()
{   //alert('entrar a '+'acomodado');
    var ob ='';
    $.ajax({
        type: 'POST',
        url:'../vista/vista_listar_acomodado.php',
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


function btn_entrega()
{   //alert('entrar a '+'entrega');
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


function btn_prenda()
{   alert('entrar a ');
/*    var ob ='';
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
    });*/
}


function btn_lavado()
{   //alert('entrar a '+'lavado');
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


function btn_lavado_especial()
{   //alert('entrar a '+'lavado_especial');
    var ob ='';
    $.ajax({
        type: 'POST',
        url:'../vista/vista_listar_lavado_especial.php',
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


