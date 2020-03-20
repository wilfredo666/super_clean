//resp_archivo

$("input[name='file']").on('change', function(){
    var formData = new FormData($('#formulario')[0]);
    var ruta = '../modelo/doc_up_ajax.php';
    $.ajax({
        url: ruta,
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos)
        {   
            $('#img_tikeo').val(datos);
            mostrar_archivo();
        }
    });
});


function mostrar_archivo()
{
    var archivo = $('#img_tikeo').val();
    var cadena ="<div style='width: 100%; padding-top: 2%;'><center><img src='../multimedia/imagenes/"+archivo+"' style='width: 70%; height: 150px; box-shadow: 1px 1px 1px 2px #A4A4A4;'></center></div>";
    $('#resp_img_tikeo').html(cadena);

}

function btn_mostrar_registro()
{
    var obj = '';

    $.ajax({
        type: 'POST',
        url:'../vista/vista_tikeo.php',
        data: obj,
        beforeSend: function(objeto){
        },
        success:function(data){
            $('#panel_registro_tikeo').html(data).fadeIn('slow');
        }
    });
}

function btn_registro_tikeo(){

    var id_cliente = $('#id_cliente').val(); 
    var cliente = $('#cliente').val(); 
    var id_usuario = $('#id_usuario').val(); 
    var id_sucursal = $('#id_sucursal').val(); 
    var id_ot = $('#id_ot').val(); 
    var codigo_ot = $('#codigo_ot').val(); 
    var codigo_barras = $('#codigo_barras').val(); 
    var estado_tikeo = $('#estado_tikeo').val(); 
    var id_prenda = $('#id_prenda').val(); 
    var ob = {id_cliente : id_cliente,cliente : cliente,id_usuario : id_usuario,id_sucursal : id_sucursal,id_ot : id_ot,codigo_ot : codigo_ot,codigo_barras : codigo_barras,estado_tikeo : estado_tikeo,id_prenda : id_prenda};

    if(id_cliente !='' && cliente !='' && id_usuario !='' && id_sucursal !='' && id_ot !='' && codigo_ot !='' && codigo_barras !='' && estado_tikeo !='' && id_prenda !='' ){ 

        $.ajax({
            type: 'POST',
            url:'../modelo/modelo_registrar_tikeo.php',
            data: ob,
            beforeSend: function(objeto){

            },
            success: function(data)
            { 
                //alert(data);
                $('#resultado_registro_tikeo').html(data);
                // setTimeout(limpiar_tikeo,1000);


                $('#id_cliente').val('');
                $('#cliente').val('');
                $('#id_usuario').val('');
                $('#id_sucursal').val('');
                $('#id_ot').val('');
                $('#codigo_ot').val('');
                $('#codigo_barras').val('');
                $('#estado_tikeo').val('');
                $('#id_prenda').val('');

                setTimeout(function(){
                    $('#resultado_registro_tikeo').html('');
                },1000);

                setTimeout(function(){
                    $('#myModal_Registrar').modal('hide').fadeIn('slow');
                },2000);

                setTimeout(function(){
                    cargar_datos(1);
                },3000);

            }
        });
    } 
    else{ 

        if (id_cliente ==''){ $('#id_cliente').focus();
                             var res ='<label style="color:red;"> Debe llenar el campo de id_cliente </label>';
                             $('#resp_id_cliente').html(res);}
        if (cliente ==''){ $('#cliente').focus();
                          var res ='<label style="color:red;"> Debe llenar el campo de cliente </label>';
                          $('#resp_cliente').html(res);}
        if (id_usuario ==''){ $('#id_usuario').focus();
                             var res ='<label style="color:red;"> Debe llenar el campo de id_usuario </label>';
                             $('#resp_id_usuario').html(res);}
        if (id_sucursal ==''){ $('#id_sucursal').focus();
                              var res ='<label style="color:red;"> Debe llenar el campo de id_sucursal </label>';
                              $('#resp_id_sucursal').html(res);}
        if (id_ot ==''){ $('#id_ot').focus();
                        var res ='<label style="color:red;"> Debe llenar el campo de id_ot </label>';
                        $('#resp_id_ot').html(res);}
        if (codigo_ot ==''){ $('#codigo_ot').focus();
                            var res ='<label style="color:red;"> Debe llenar el campo de codigo_ot </label>';
                            $('#resp_codigo_ot').html(res);}
        if (codigo_barras ==''){ $('#codigo_barras').focus();
                                var res ='<label style="color:red;"> Debe llenar el campo de codigo_barras </label>';
                                $('#resp_codigo_barras').html(res);}
        if (estado_tikeo ==''){ $('#estado_tikeo').focus();
                               var res ='<label style="color:red;"> Debe llenar el campo de estado_tikeo </label>';
                               $('#resp_estado_tikeo').html(res);}
        if (id_prenda ==''){ $('#id_prenda').focus();
                            var res ='<label style="color:red;"> Debe llenar el campo de id_prenda </label>';
                            $('#resp_id_prenda').html(res);}} 

} 
function limpiar_tikeo()
{
    $('#resultado_registro_tikeo').html('');
    $('#resp_img_tikeo').html('');
    $('#img_tikeo').val('');
}

function validador_campo(campo,mensaje,cant_min)
{   
    var cadena=$('#'+campo).val();
    var dimencion=cadena.length;

    if(dimencion<cant_min)
    { 
        $('#'+mensaje).html('<label style="color:red;"> min '+cant_min+' digitos ' + dimencion+'</label>');
        $('#'+campo).css('border-color','red');

    }

    else
    {     
        $('#'+campo).css('border-color','green');
        $('#'+mensaje).html('');
    }

}

//Validador de Caracteres en los campos

function valida_numeros(e){
    tecla = (document.all) ? e.keyCode : e.which;
    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8 ){ return true; }
    if (tecla == 9 ){ return true; }
    if (tecla == 0 ){ return true; }
    if (tecla == 13 ){ return true; }

    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9-.]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}

function valida_letras(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = ' áéíóúabcdefghijklmnñopqrstuvwxyz';
    especiales = [8,37,39,46,9]; tecla_especial = false;

    for(var i in especiales){ if(key == especiales[i]) { tecla_especial = true; break; } }

    if(letras.indexOf(tecla)==-1 && !tecla_especial){ return false; }
}

function valida_ambos(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = ' áéíóúabcdefghijklmnñopqrstuvwxyz1234567890.,@#-_/?:;';
    especiales = [8,37,39,46,9]; tecla_especial = false;

    for(var i in especiales){ if(key == especiales[i]) { tecla_especial = true; break; } }

    if(letras.indexOf(tecla)==-1 && !tecla_especial){ return false; }

}

//Validador de Correo Electronico 


var noti_email=0; 
function validador_correo(campo,mensaje,cant_min)
{

    var email = $('#'+campo).val();
    var caract = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);

    if (caract.test(email) == false)
    {
        $('#'+mensaje).html("<label style='color:#EC7063;'> invalido </label>");
        noti_email++;
        return false;
    }
    else{$('#'+mensaje).html('valido').slideDown('slow');noti_email=0;
         return true;
        }
}
// MOSTRAR FECHA DE REGISTRO
fecha();

function fecha(){
    var f = new Date();
    $('#fecha').val(f.getDate() + '/' + (f.getMonth() +1) + '/' + f.getFullYear());
}

// MOSTRAR HORA DE REGISTRO 
hora();
function hora(){
    var f=new Date();
    var cad=f.getHours()+':'+f.getMinutes()+':'+f.getSeconds();
    $('#hora').val(cad);
    setTimeout('hora()',1000); 
}

// FUNCIONALIDADES DE LISTADO Y EDICION DE CADA AREA DE TRABAJO

$(document).ready(function(){
    //cargar_datos(1);

    btn_listar_ordenes_trabajo_clientes();
    btn_listar_carrito_prendas_tikeadas();
});

function cargar_datos(page){

    var parametros = {'action':'ajax','page':page};

    $.ajax({
        url:'../modelo/modelo_listar_tikeo.php',
        data: parametros,
        beforeSend: function(objeto){
            $('#panel_listado_tikeo').html('cargando .... ');
        },
        success:function(data){
            $('#panel_listado_tikeo').html(data).fadeIn('slow');
        }
    });
}

/*function cargar_datos_buscar(page){
    var txt_buscar = $('#txt_buscar').val();

    if(txt_buscar==''){
      $('#resp_busqueda').html('<label style="color:red;"> !!Escribe en el campo para Buscar!! </label>');
    }
    else{
    $('#resp_busqueda').html('');
    var parametros = {'action':'ajax','page':page,'txt_buscar':txt_buscar};
    $('#loader').fadeIn('slow');

    $.ajax({
      url:'../modelo/modelo_buscar_prueba.php',
      data: parametros,
       beforeSend: function(objeto){
       $('#loader').html('cargando .... ');
      },
      success:function(data){
        $('#panel_listado_prueba').html(data).fadeIn('slow');
        $('#loader').html('');
      }
    });
   }
  }
   */

function cargar_datos_buscar(page)
{
    var txt_buscar = $('#txt_buscar').val();

    if(txt_buscar==''){
        $('#resp_busqueda_tikeo').html('<label style="color:red;"> !!Escribe en el campo para Buscar!! </label>');
    }

    else{
        $('#resp_busqueda_tikeo').html('');

        var parametros = {'action':'ajax','page':page,'txt_buscar':txt_buscar};

        $('#loader').fadeIn('slow');

        $.ajax({
            url:'../modelo/modelo_buscar_tikeo.php',
            data: parametros,
            beforeSend: function(objeto){
                $('#panel_listado_tikeo').html('cargando .... ');
            },
            success:function(data){
                $('#panel_listado_tikeo').html(data).fadeIn('slow');
            }
        });

    }
} 


/*LISTADO DE ORDENES DE TRABAJO PARA TIQUEAR */

function btn_listar_ordenes_trabajo_clientes()
{
    //panel_listado_clientes_tikeo

    var id_usuario = $("#id_usuario_sesion").val();
    var id_sucursal = $("#id_sucursal_sesion").val();

    var obj = { id_usuario:id_usuario, id_sucursal:id_sucursal };

    $.ajax({
        type : 'POST',
        url:'../modelo/modelo_listar_clientes_ot_tikeo.php',
        data: obj,
        beforeSend: function(objeto){
            $('#panel_listado_clientes_tikeo').html('cargando .... ');
        },
        success:function(data){
            $('#panel_listado_clientes_tikeo').html(data).fadeIn('slow');
        }
    });

}

function cargar_div_col_for(codigo_ot){
    var obj={codigo_ot:codigo_ot};
    $.ajax({
        type : 'POST',
        url:'../modelo/modelo_listar_prendas_ot_tikeo2.php',
        data: obj,
        beforeSend: function(objeto){
            $('#panel_listado_prendas_up').html('cargando .... ');
        },
        success:function(data){
            $('#panel_listado_prendas_up').html(data).fadeIn('slow');
        }
    });
}
function btn_mostrar_prendas_orden_trabajo(codigo_ot)
{
    var obj = { codigo_ot: codigo_ot };

    $.ajax({
        type : 'POST',
        url:'../modelo/modelo_listar_prendas_ot_tikeo.php',
        data: obj,
        beforeSend: function(objeto){
            $('#panel_listado_prendas_para_tikeo').html('cargando .... ');
        },
        success:function(data){
            $('#panel_listado_prendas_para_tikeo').html(data).fadeIn('slow');
        }
    });

}

function btn_mostrar_prendas_orden_trabajo2(cod_barr,codigo_ot)
{
    var obj = { codigo_ot: codigo_ot,
               cod_barr:cod_barr};

    $.ajax({
        type : 'POST',
        url:'../modelo/modelo_listar_prendas_ot_tikeo2.php',
        data: obj,
        beforeSend: function(objeto){
            $('#panel_listado_prendas_up').html('cargando .... ');
        },
        success:function(data){
            $('#panel_listado_prendas_up').html(data).fadeIn('slow');
        }
    });

}
function verificar_col_for(cod_barr, orden_trabajo, id_orden_trabajo){
    var size = cod_barr.length;
    var cod_barr=cod_barr;
    var orden_trabajo=orden_trabajo;
    var id_orden_trabajo=id_orden_trabajo;
    var obj={
        size:size,
        cod_barr:cod_barr,
        orden_trabajo:orden_trabajo,
        id_orden_trabajo:id_orden_trabajo
    }
    $.ajax({
        type : 'POST',
        url:'../modelo/modelo_listar_prendas_ot_tikeo2.php',
        data: obj,
        beforeSend: function(objeto){
            $('#panel_listado_prendas_up').html('cargando .... ');
        },
        success:function(data){
            $('#panel_listado_prendas_up').html(data).fadeIn('slow');
        }
    }); 

}

function btn_asignar_codigo_barras_tikeo(id_ot,codigo_ot)
{
    var codigo_tik = $("#codigo_barras_tik_"+id_ot).val();
    var size = codigo_tik.length;
    var id_usuario = $("#id_usuario_sesion").val();
    var id_sucursal = $("#id_sucursal_sesion").val();
    var color=$("#color").val();
    var forma=$("#forma").val();
    var color2=$("#color2").val();
    var forma2=$("#forma2").val();
    var cod_ot=codigo_ot;
    setTimeout(function(){

        var obj = { codigo_tik: codigo_tik,
                   id_ot : id_ot,
                   size:size,
                   id_usuario:id_usuario,
                   id_sucursal: id_sucursal,
                   color:color,
                   forma:forma,
                   color2:color2,
                   forma2:forma2,
                   cod_ot:cod_ot};

        $.ajax({
            type : 'POST',
            url:'../modelo/modelo_agregar_prenda_ot_tikeada.php',
            data: obj,
            beforeSend: function(objeto){
                $("#panel_listado_prendas_tikeadas").html('cargando .... ');
            },
            success:function(data){
                $("#panel_listado_prendas_tikeadas").html(data).fadeIn('slow');
            }
        }); 

    },0);
}

function btn_listar_carrito_prendas_tikeadas()
{
    var id_usuario = $("#id_usuario_sesion").val();
    var id_sucursal = $("#id_sucursal_sesion").val();

    var obj = { id_usuario : id_usuario, id_sucursal:id_sucursal };

    $.ajax({
        type : 'POST',
        url:'../modelo/modelo_listar_prendas_carrito_tikeo.php',
        data: obj,
        beforeSend: function(objeto){
            $('#panel_listado_prendas_tikeadas').html('cargando .... ');
        },
        success:function(data){
            $('#panel_listado_prendas_tikeadas').html(data).fadeIn('slow');
            btn_filtrar_carrito_tikeo();
        }
    });

}

function btn_eliminar_ordenes_tiket(id_car_tiket)
{


    var obj ={'id_carrito_tikeo':id_car_tiket};

    $.ajax({
        type : 'POST',
        url:'../modelo/modelo_eliminar_carrito_tikeo.php',
        data: obj,
        beforeSend: function(objeto){
            $('#panel_listado_prendas_tikeadas').html('cargando .... ');
        },
        success:function(data){
            $('#panel_listado_prendas_tikeadas').html(data).fadeIn('slow');

            setTimeout(function(){
                btn_listar_carrito_prendas_tikeadas();
            },100);
        }
    });

}


function btn_filtrar_carrito_tikeo()
{
    var id_usuario = $("#id_usuario_sesion").val();
    var id_sucursal = $("#id_sucursal_sesion").val();

    var obj = { id_usuario : id_usuario, id_sucursal:id_sucursal };

    $.ajax({
        type : 'POST',
        url:'../modelo/modelo_filtrar_codigo_barras_tikeo.php',
        data: obj,
        beforeSend: function(objeto){
            $('#panel_filtro_carrito_tikeo').html('cargando .... ');
        },
        success:function(data){
            $('#panel_filtro_carrito_tikeo').html(data).fadeIn('slow');

        }
    });
}

/* REGISTRO DE PRENDAS TIKEADAS DEL CARRITO DE COMPRAS AL TIKEO */
function btn_registrar_prendas_tiket()
{

    var id_usuario = $("#id_usuario_sesion").val();
    var id_sucursal = $("#id_sucursal_sesion").val();

    var obj = { id_usuario : id_usuario, id_sucursal:id_sucursal };

    $.ajax({
        type : 'POST',
        url:'../modelo/modelo_registrar_carrito_tikeo.php',
        data: obj,
        beforeSend: function(objeto){
            $('#panel_resultado_registro_carrito_tikeo').html('cargando .... ');
        },
        success:function(data){
            $('#panel_resultado_registro_carrito_tikeo').html(data).fadeIn('slow');

            setTimeout(function(){

                btn_listar_tikeo_prenda();
            },2000);
        }
    });
}
