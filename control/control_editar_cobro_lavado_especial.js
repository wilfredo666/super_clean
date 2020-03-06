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
                $('#img_cobro_lavado_especial').val(datos);
                mostrar_archivo();
            }
        });
    });
          

    function mostrar_archivo()
    {
        var archivo = $('#img_cobro_lavado_especial').val();
        var cadena ="<div style='width: 100%; padding-top: 2%;'><center><img src='../multimedia/imagenes/"+archivo+"' style='width: 70%; height: 150px; box-shadow: 1px 1px 1px 2px #A4A4A4;'></center></div>";
        $('#resp_img_cobro_lavado_especial').html(cadena);
         
      }

  function btn_opciones(ID_cobro_lavado_especial)
  {
    $('#ID_contenido').val(ID_cobro_lavado_especial);
  }
  
  //FUNCION PARA EXAMIANAR LOS DATOS

  function btn_ver_cobro_lavado_especial()
  {
   var ID_cobro_lavado_especial = $('#ID_contenido').val();
   var ob ={ID_cobro_lavado_especial:ID_cobro_lavado_especial};
   
   $.ajax({
                type: 'POST',
                url:'../vista/vista_examinar_cobro_lavado_especial.php',
                data: ob,
                beforeSend: function(objeto){
              
                },
                success: function(data)
                { 
                 $('#panel_examinar_cobro_lavado_especial').html(data);
                }
             });
   }

  
  //FUNCION DE EDICION DE LOS DATOS DEL MODELO

  function btn_editar_cobro_lavado_especial()
  { 
     var ID_cobro_lavado_especial = $('#ID_contenido').val();

     var obj = {ID_cobro_lavado_especial:ID_cobro_lavado_especial};
    
    $.ajax({
      type: 'POST',
      url: '../vista/vista_editar_cobro_lavado_especial.php',
      data: obj,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#panel_edicion_cobro_lavado_especial').html(data).fadeIn('slow');
      }
    });

  }

  function btn_guardar_cambios_cobro_lavado_especial()
  {
    var ID_cobro_lavado_especial =$('#ID_cobro_lavado_especial_edicion').val(); 
    var codigo_lav = $('#codigo_lav').val();
    var total = $('#total').val();
    var pago = $('#pago').val();
    var saldo = $('#saldo').val();
    var id_usuario = $('#id_usuario').val();
    var fecha = $('#fecha').val();
    var hora = $('#hora').val();
    
    var obj = {ID_cobro_lavado_especial: ID_cobro_lavado_especial,
    codigo_lav: codigo_lav,
    total: total,
    pago: pago,
    saldo: saldo,
    id_usuario: id_usuario,
    fecha: fecha,
    hora: hora};
     
    $.ajax({
      type: 'POST',
      url:'../modelo/modelo_guardar_cobro_lavado_especial.php',
      data: obj,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#respuesta_guardar_cambios_cobro_lavado_especial').html(data).fadeIn('slow');
        
        setTimeout(function(){
          $('#myModal_Edicion').modal('hide').fadeIn('slow');
        },2000);

      }
    });

  }
  

  function actualizar_datos_cobro_lavado_especial_editar()
  {  $('#myModal').modal('hide').fadeIn('slow');
     $('#respuesta_guardar_cambios_cobro_lavado_especial').html('').fadeIn('slow');
     //location.reload();
     window.setTimeout('cargar_datos(1)',1000);
  }

  function cargar_datos(page){
    var id_usuario = $("#id_usuario_sesion").val();
    var parametros = {'action':'ajax','page':page,id_usuario:id_usuario};

    $.ajax({
      type:'POST',
      url:'../modelo/modelo_listar_cobro_lavado_especial.php',
      data: parametros,
       beforeSend: function(objeto){
       $('#loader').html('cargando .... ');
      },
      success:function(data){
        $('#panel_listado_cobro_lavado_especial').html(data).fadeIn('slow');
        $('#loader').html('');
      }
    });
  }


 function btn_eliminar_cobro_lavado_especial()
 {  
    var ID_cobro_lavado_especial = $('#ID_contenido').val();
    $('#ID_eliminar_cobro_lavado_especial').val(ID_cobro_lavado_especial);
 }

 function btn_borrar_cobro_lavado_especial()
  {  
     var ID_cobro_lavado_especial = $('#ID_eliminar_cobro_lavado_especial').val();
     var parametros = {ID_cobro_lavado_especial:ID_cobro_lavado_especial};
    
     $.ajax({
      type: 'POST',
      url:'../modelo/modelo_eliminar_cobro_lavado_especial.php',
      data: parametros,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#panel_eliminar_cobro_lavado_especial').html(data).fadeIn('slow');
        
        setTimeout(function(){
          $('#myModal_Eliminar').modal('hide').fadeIn('slow');
        },2000);

      }
    });
  }

  function actualizar_datos_cobro_lavado_especial_eliminar()
  {  
     $('#respuesta_eliminar_total_cobro_lavado_especial').html('').fadeIn('slow');
     
  }

  function actualizar_y_salir()
  {
    setTimeout(function(){ cargar_datos(1); },1000);
  }

