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
            $('#img_prenda').val(datos);
            mostrar_archivo();
        }
    });
});


function mostrar_archivo()
{
    var archivo = $('#img_prenda').val();
    var cadena ="<div style='width: 100%; padding-top: 1%;'><center><img src='../multimedia/imagenes/"+archivo+"' style='width: 70%; height: 350px; box-shadow: 1px 1px 1px 2px #A4A4A4;'></center></div>";
    $('#resp_img_prenda').html(cadena);

}

function btn_opciones(ID_prenda)
{
    $('#ID_contenido').val(ID_prenda);
}

//FUNCION PARA EXAMIANAR LOS DATOS

function btn_ver_prenda()
{
    var ID_prenda = $('#ID_contenido').val();
    var ob ={ID_prenda:ID_prenda};

    $.ajax({
        type: 'POST',
        url:'../vista/vista_examinar_prenda.php',
        data: ob,
        beforeSend: function(objeto){

        },
        success: function(data)
        { 
            $('#panel_examinar_prenda').html(data);
        }
    });
}


//FUNCION DE EDICION DE LOS DATOS DEL MODELO

function btn_editar_prenda()
{ 
    var ID_prenda = $('#ID_contenido').val();

    var obj = {ID_prenda:ID_prenda};

    $.ajax({
        type: 'POST',
        url: '../vista/vista_editar_prenda.php',
        data: obj,
        beforeSend: function(objeto){
        },
        success:function(data){
            $('#panel_edicion_prenda').html(data).fadeIn('slow');
        }
    });

}

function btn_guardar_cambios_prenda()
{
    var ID_prenda =$('#ID_prenda_edicion').val(); 
    var prenda = $('#prenda').val();
    var portada = $('#img_prenda').val();
    var precio = $('#precio').val();
    var tipo_prenda = $('#tipo_prenda').val();
    var moneda = $('#moneda').val();
    var forma = $('#forma').val();
    var color = $('#color').val();

    var obj = {ID_prenda: ID_prenda,
               prenda: prenda,
               portada: portada,
               precio: precio,
               tipo_prenda: tipo_prenda,
               moneda: moneda,
               forma:forma,
               color:color
              };

    $.ajax({
        type: 'POST',
        url:'../modelo/modelo_guardar_prenda.php',
        data: obj,
        beforeSend: function(objeto){
        },
        success:function(data){
            $('#respuesta_guardar_cambios_prenda').html(data).fadeIn('slow');

            setTimeout(function(){
                $('#myModal_Edicion').modal('hide').fadeIn('slow');
            },2000);

        }
    });

}


function actualizar_datos_prenda_editar()
{  $('#myModal').modal('hide').fadeIn('slow');
 $('#respuesta_guardar_cambios_prenda').html('').fadeIn('slow');
 //location.reload();
 window.setTimeout('cargar_datos(1)',1000);
}

function cargar_datos(page){
    var parametros = {'action':'ajax','page':page};
    $('#loader').fadeIn('slow');
    $.ajax({
        url:'../modelo/modelo_listar_prenda.php',
        data: parametros,
        beforeSend: function(objeto){
            $('#loader').html('cargando .... ');
        },
        success:function(data){
            $('#panel_listado_prenda').html(data).fadeIn('slow');
            $('#loader').html('');
        }
    })
}


function btn_eliminar_prenda()
{  
    var ID_prenda = $('#ID_contenido').val();
    $('#ID_eliminar_prenda').val(ID_prenda);
}

function btn_borrar_prenda()
{  
    var ID_prenda = $('#ID_eliminar_prenda').val();
    var parametros = {ID_prenda:ID_prenda};

    $.ajax({
        type: 'POST',
        url:'../modelo/modelo_eliminar_prenda.php',
        data: parametros,
        beforeSend: function(objeto){
        },
        success:function(data){
            $('#panel_eliminar_prenda').html(data).fadeIn('slow');

            setTimeout(function(){
                $('#myModal_Eliminar').modal('hide').fadeIn('slow');
            },2000);

        }
    });
}

function actualizar_datos_prenda_eliminar()
{  
    $('#respuesta_eliminar_total_prenda').html('').fadeIn('slow');

}

function actualizar_y_salir()
{
    setTimeout(function(){ cargar_datos(1); },1000);
}

