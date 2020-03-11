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
            $('#img_entrega').val(datos);
            mostrar_archivo();
        }
    });
});

/*FUNCION DE BUSQUEDA DE CLIENTES EN TIEMPO REAL */

function btn_buscar_cliente()
{
    var txt_buscar = $("#txt_buscar").val();

    var obj = {txt_buscar : txt_buscar };

    $.ajax({
        type: 'POST',
        url: '../modelo/modelo_buscar_cliente_entrega.php',
        data: obj,
        beforeSend: function(objeto){
        },
        success:function(data){
            $('#resp_busqueda_cliente').html(data).fadeIn('slow');
        }
    });
}

function btn_buscar_cliente_reg()
{
    var txt_buscar = $("#txt_buscar").val();

    var obj = {txt_buscar : txt_buscar };

    $.ajax({
        type: 'POST',
        url: '../modelo/modelo_buscar_cliente_entrega_reg.php',
        data: obj,
        beforeSend: function(objeto){
        },
        success:function(data){
            $('#resp_busqueda_cliente').html(data).fadeIn('slow');
        }
    });
}

function btn_buscar_cliente_reg_aut()
{
    var txt_buscar = $("#txt_buscar").val();
    var obj = {txt_buscar : txt_buscar };
    $.ajax({
        type: 'POST',
        url: '../modelo/modelo_buscar_cliente_entrega.php',
        data: obj,
        beforeSend: function(objeto){
        },
        success:function(data){
            $('#resp_busqueda_cliente').html(data).fadeIn('slow');
        }
    });
}

function btn_cerrar_resultado_buscador()
{
    $('#resp_busqueda_cliente').html("");
}

function btn_seleccion_cliente_ot(id_cliente)
{
    $('#resp_busqueda_cliente').html("");
    $("#id_cliente").val(id_cliente);

    var obj = {id_cliente : id_cliente };

    $.ajax({
        type: 'POST',
        url: '../vista/orden_trabajo/vista_mostrar_cliente_ot.php',
        data: obj,
        beforeSend: function(objeto){
            $('#panel_cliente_select_ot').html("<div id='loader'> Cargando ... </div>")
        },
        success:function(data){
            $('#panel_cliente_select_ot').html(data);
        }
    });
}

function mostrar_archivo()
{
    var archivo = $('#img_entrega').val();
    var cadena ="<div style='width: 100%; padding-top: 2%;'><center><img src='../multimedia/imagenes/"+archivo+"' style='width: 70%; height: 150px; box-shadow: 1px 1px 1px 2px #A4A4A4;'></center></div>";
    $('#resp_img_entrega').html(cadena);

}

function btn_mostrar_registro()
{
    var obj = '';

    $.ajax({
        type: 'POST',
        url:'../vista/vista_entrega.php',
        data: obj,
        beforeSend: function(objeto){
        },
        success:function(data){
            $('#panel_registro_entrega').html(data).fadeIn('slow');
        }
    });
}

function btn_registro_entrega(){

    var codigo_ot = $('#codigo_ot').val(); 
    var estado = $('#estado').val(); 
    var fecha = $('#fecha').val(); 
    var hora = $('#hora').val(); 
    var ob = {codigo_ot : codigo_ot,estado : estado,fecha : fecha,hora : hora};

    if(codigo_ot !='' && estado !='' && fecha !='' && hora !='' ){ 

        $.ajax({
            type: 'POST',
            url:'../modelo/modelo_registrar_entrega.php',
            data: ob,
            beforeSend: function(objeto){

            },
            success: function(data)
            { 
                //alert(data);
                $('#resultado_registro_entrega').html(data);
                // setTimeout(limpiar_entrega,1000);


                $('#codigo_ot').val('');
                $('#estado').val('');
                $('#fecha').val('');
                $('#hora').val('');

                setTimeout(function(){
                    $('#resultado_registro_entrega').html('');
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

        if (codigo_ot ==''){ $('#codigo_ot').focus();
                            var res ='<label style="color:red;"> Debe llenar el campo de codigo_ot </label>';
                            $('#resp_codigo_ot').html(res);}
        if (estado ==''){ $('#estado').focus();
                         var res ='<label style="color:red;"> Debe llenar el campo de estado </label>';
                         $('#resp_estado').html(res);}
        if (fecha ==''){ $('#fecha').focus();
                        var res ='<label style="color:red;"> Debe llenar el campo de fecha </label>';
                        $('#resp_fecha').html(res);}
        if (hora ==''){ $('#hora').focus();
                       var res ='<label style="color:red;"> Debe llenar el campo de hora </label>';
                       $('#resp_hora').html(res);}} 

} 
function limpiar_entrega()
{
    $('#resultado_registro_entrega').html('');
    $('#resp_img_entrega').html('');
    $('#img_entrega').val('');
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
});

function cargar_datos(page){

    var id_usuario = $("#id_usuario_sesion").val();
    var parametros = {'action':'ajax','page':page,id_usuario:id_usuario};

    $.ajax({
        type : 'POST',
        url:'../modelo/modelo_listar_entrega.php',
        data: parametros,
        beforeSend: function(objeto){
            $('#panel_listado_entrega').html('cargando .... ');
        },
        success:function(data){
            $('#panel_listado_entrega').html(data).fadeIn('slow');
        }
    });
}

function cargar_datos_buscar(page)
{
    var txt_buscar = $('#txt_buscar').val();

    if(txt_buscar==''){
        $('#resp_busqueda_entrega').html('<label style="color:red;"> !!Escribe en el campo para Buscar!! </label>');
    }

    else{
        $('#resp_busqueda_entrega').html('');
        var id_usuario = $("#id_usuario_sesion").val();
        var parametros = {'action':'ajax','page':page,'txt_buscar':txt_buscar,id_usuario:id_usuario};

        $.ajax({
            type : 'POST',
            url:'../modelo/modelo_buscar_entrega.php',
            data: parametros,
            beforeSend: function(objeto){
                $('#panel_listado_entrega').html('cargando .... ');
            },
            success:function(data){
                $('#panel_listado_entrega').html(data).fadeIn('slow');
            }
        });

    }
} 
function btn_entregar_ot(codigo_ot){
    var ob = { codigo_ot : codigo_ot };

    $.ajax({
        type : "POST",
        url:'../vista/vista_entrega_servicio_detalle_aut.php',
        data: ob,
        beforeSend: function(objeto){
            $('#panel_detalle_ot_entrega').html('cargando .... ');
        },
        success:function(data){

            $('#panel_detalle_ot_entrega').html(data).fadeIn('slow');

        }
    });
}
function btn_listar_detalle_entrega(codigo_ot)
{
    var ob = { codigo_ot : codigo_ot };

    $.ajax({
        type : "POST",
        url:'../vista/vista_entrega_servicio_detalle.php',
        data: ob,
        beforeSend: function(objeto){
            $('#panel_detalle_ot_entrega').html('cargando .... ');
        },
        success:function(data){

            $('#panel_detalle_ot_entrega').html(data).fadeIn('slow');

        }
    });
}

function btn_realizar_notificacion_pedido(codigo_ot)
{
    $('#myModal_Notificar_Cliente').modal({ show: 'true' }); 

    var ob = {codigo_ot:codigo_ot};
    $.ajax({
        type : "POST",
        url:'../vista/vista_notificacion_servicio_entrega.php',
        data: ob,
        beforeSend: function(objeto){
            $('#panel_notifiaciones_entrega').html('cargando .... ');
        },
        success:function(data){

            $('#panel_notifiaciones_entrega').html(data).fadeIn('slow');

        }
    });

}

function btn_realizar_entrega_pedido()
{
    var codigo_ot = $("#codigo_ot").val();
    var d = new Date();
    var fecha = d.getFullYear()+"-"+(d.getMonth()+1)+"-"+d.getDate();
    var hora = d.getHours()+":"+d.getMinutes()+":"+d.getSeconds();
    var estado = "FINALIZADO";

    var total = $("#pago_servicio").val();
    var pago = $("#pago_servicio").val();
    var saldo = $("#saldo_servicio").val();

    // alert(" variables "+pago_servicio+"-"+codigo_ot+"-"+fecha+"-"+hora+"-"+estado);

    var ob = {codigo_ot:codigo_ot, total:total, pago:pago, saldo:saldo, fecha:fecha, hora:hora,
              estado:estado };
    $.ajax({
        type : "POST",
        url:'../modelo/modelo_registrar_entrega.php',
        data: ob,
        beforeSend: function(objeto){
            $('#panel_resultado_entrega_orden_servicio').html('cargando .... ');
        },
        success:function(data){

            $('#panel_resultado_entrega_orden_servicio').html(data).fadeIn('slow');

        }
    });

}

function btn_calcular_pago_ot_entrega()
{

    var total_servicio = $("#total_servicio").val();
    var pago_servicio = $("#pago_servicio").val();
    //var saldo_servicio = $("#saldo_servicio").val();


    if (total_servicio==""){ total_servicio = 0; }
    else{ total_servicio = parseInt(total_servicio); }

    if (pago_servicio==""){ pago_servicio = 0; }
    else{ pago_servicio = parseInt(pago_servicio); }

    /*
  if (saldo_servicio==""){ saldo_servicio = 0; }
  else{ saldo_servicio = parseFloat(saldo_servicio); }
  */

    var operacion_saldo = parseInt(total_servicio - pago_servicio);
    $("#saldo_servicio").val(operacion_saldo);
}

function btn_enviar_correo_notificacion(correo,mensaje)
{ 
    //alert("alert : "+correo+" - "+mensaje);
    var ob = { mensaje:mensaje , correo:correo };
    $.ajax({
        type : "POST",
        url:'../vista/vista_enviar_correo.php',
        data: ob,
        beforeSend: function(objeto){
            $('#panel_respuesta_envio_correo_electronico').html('cargando .... ');
        },
        success:function(data){

            $('#panel_respuesta_envio_correo_electronico').html(data);

        }
    });

}