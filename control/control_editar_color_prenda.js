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
            $('#img_color_prenda').val(datos);
            mostrar_archivo();
        }
    });
});


function mostrar_archivo()
{
    var archivo = $('#img_color_prenda').val();
    var cadena ="<div style='width: 100%; padding-top: 2%;'><center><img src='../multimedia/imagenes/"+archivo+"' style='width: 70%; height: 150px; box-shadow: 1px 1px 1px 2px #A4A4A4;'></center></div>";
    $('#resp_img_color_prenda').html(cadena);

}

function btn_opciones(ID_color_prenda)
{
    $('#ID_contenido').val(ID_color_prenda);
}

//FUNCION DE EDICION DE LOS DATOS DEL MODELO

function btn_editar_color_prenda()
{ 
    var ID_color_prenda = $('#ID_contenido').val();

    var obj = {ID_color_prenda:ID_color_prenda};

    $.ajax({
        type: 'POST',
        url: '../vista/vista_editar_color_prenda.php',
        data: obj,
        beforeSend: function(objeto){
        },
        success:function(data){
            $('#panel_edicion_color_prenda').html(data).fadeIn('slow');
        }
    });

}

function btn_guardar_cambios_color_prenda()
{
    var ID_color_prenda =$('#ID_color_prenda_edicion').val(); 
    var nombre_color = $('#nombre_color').val();
    var cod_color = $('#cod_color').val();

    var obj = {ID_color_prenda: ID_color_prenda,
               nombre_color: nombre_color,
               cod_color:cod_color};

    $.ajax({
        type: 'POST',
        url:'../modelo/modelo_guardar_color_prenda.php',
        data: obj,
        beforeSend: function(objeto){
        },
        success:function(data){
            $('#respuesta_guardar_cambios_color_prenda').html(data).fadeIn('slow');

            setTimeout(function(){
                $('#myModal_Edicion').modal('hide').fadeIn('slow');
            },2000);

        }
    });

}


function actualizar_datos_color_prenda_editar()
{  $('#myModal').modal('hide').fadeIn('slow');
 $('#respuesta_guardar_cambios_color_prenda').html('').fadeIn('slow');
 //location.reload();
 window.setTimeout('cargar_datos(1)',1000);
}

function cargar_datos(page){
    var parametros = {'action':'ajax','page':page};
    $('#loader').fadeIn('slow');
    $.ajax({
        url:'../modelo/modelo_listar_color_prenda.php',
        data: parametros,
        beforeSend: function(objeto){
            $('#loader').html('cargando .... ');
        },
        success:function(data){
            $('#panel_listado_color_prenda').html(data).fadeIn('slow');
            $('#loader').html('');
        }
    })
}


function btn_eliminar_color_prenda()
{  
    var ID_color_prenda = $('#ID_contenido').val();
    $('#ID_eliminar_color_prenda').val(ID_color_prenda);
}

function btn_borrar_color_prenda()
{  
    var ID_color_prenda = $('#ID_eliminar_color_prenda').val();
    var parametros = {ID_color_prenda:ID_color_prenda};

    $.ajax({
        type: 'POST',
        url:'../modelo/modelo_eliminar_color_prenda.php',
        data: parametros,
        beforeSend: function(objeto){
        },
        success:function(data){
            $('#panel_eliminar_color_prenda').html(data).fadeIn('slow');

            setTimeout(function(){
                $('#myModal_Eliminar').modal('hide').fadeIn('slow');
            },2000);

        }
    });
}

function actualizar_datos_color_prenda_eliminar()
{  
    $('#respuesta_eliminar_total_color_prenda').html('').fadeIn('slow');

}

function actualizar_y_salir()
{
    setTimeout(function(){ cargar_datos(1); },1000);
}