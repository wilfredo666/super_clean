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
                $('#img_orden_domicilio').val(datos);
                mostrar_archivo();
            }
        });
    });
          

    function mostrar_archivo()
    {
        var archivo = $('#img_orden_domicilio').val();
        var cadena ="<div style='width: 100%; padding-top: 2%;'><center><img src='../multimedia/imagenes/"+archivo+"' style='width: 70%; height: 150px; box-shadow: 1px 1px 1px 2px #A4A4A4;'></center></div>";
        $('#resp_img_orden_domicilio').html(cadena);
         
      }

  function btn_opciones(ID_orden_domicilio)
  {
    $('#ID_contenido').val(ID_orden_domicilio);
  }
  
  //FUNCION PARA EXAMIANAR LOS DATOS

  function btn_ver_orden_domicilio()
  {
   var ID_orden_domicilio = $('#ID_contenido').val();
   var ob ={ID_orden_domicilio:ID_orden_domicilio};
   
   $.ajax({
                type: 'POST',
                url:'../vista/vista_examinar_orden_domicilio.php',
                data: ob,
                beforeSend: function(objeto){
              
                },
                success: function(data)
                { 
                 $('#panel_examinar_orden_domicilio').html(data);
                }
             });
   }

  
  //FUNCION DE EDICION DE LOS DATOS DEL MODELO

  function btn_editar_orden_domicilio()
  { 
     var ID_orden_domicilio = $('#ID_contenido').val();

     var obj = {ID_orden_domicilio:ID_orden_domicilio};
    
    $.ajax({
      type: 'POST',
      url: '../vista/vista_editar_orden_domicilio.php',
      data: obj,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#panel_edicion_orden_domicilio').html(data).fadeIn('slow');
      }
    });

  }

  function btn_guardar_cambios_orden_domicilio()
  {
    var ID_orden_domicilio =$('#ID_orden_domicilio_edicion').val(); 
    var id_ot = $('#id_ot').val();
    var codigo_ot = $('#codigo_ot').val();
    var id_chofer = $('#id_chofer').val();
    var precio_envio = $('#precio_envio').val();
    var fecha = $('#fecha').val();
    var hora = $('#hora').val();
    
    var obj = {ID_orden_domicilio: ID_orden_domicilio,
    id_ot: id_ot,
    codigo_ot: codigo_ot,
    id_chofer: id_chofer,
    precio_envio: precio_envio,
    fecha: fecha,
    hora: hora};
     
    $.ajax({
      type: 'POST',
      url:'../modelo/modelo_guardar_orden_domicilio.php',
      data: obj,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#respuesta_guardar_cambios_orden_domicilio').html(data).fadeIn('slow');
        
        setTimeout(function(){
          $('#myModal_Edicion').modal('hide').fadeIn('slow');
        },2000);

      }
    });

  }
  

  function actualizar_datos_orden_domicilio_editar()
  {  $('#myModal').modal('hide').fadeIn('slow');
     $('#respuesta_guardar_cambios_orden_domicilio').html('').fadeIn('slow');
     //location.reload();
     window.setTimeout('cargar_datos(1)',1000);
  }

 function cargar_datos(page){

    var id_usuario = $("#id_usuario_sesion").val();
    var obj = {'action':'ajax','page':page,id_usuario:id_usuario};
     
    $.ajax({
      type : 'POST',
      url:'../modelo/modelo_listar_orden_domicilio.php',
      data: obj,
      beforeSend: function(objeto){
       $('#panel_listado_orden_domicilio').html('cargando .... ');
      },
      success:function(data){
      $('#panel_listado_orden_domicilio').html(data).fadeIn('slow');
        
      }
    });
  }


 function btn_eliminar_orden_domicilio()
 {  
    var ID_orden_domicilio = $('#ID_contenido').val();
    $('#ID_eliminar_orden_domicilio').val(ID_orden_domicilio);
 }

 function btn_borrar_orden_domicilio()
  {  
     var ID_orden_domicilio = $('#ID_eliminar_orden_domicilio').val();
     var parametros = {ID_orden_domicilio:ID_orden_domicilio};
    
     $.ajax({
      type: 'POST',
      url:'../modelo/modelo_eliminar_orden_domicilio.php',
      data: parametros,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#panel_eliminar_orden_domicilio').html(data).fadeIn('slow');
        
        setTimeout(function(){
          $('#myModal_Eliminar').modal('hide').fadeIn('slow');
        },2000);

      }
    });
  }

  function actualizar_datos_orden_domicilio_eliminar()
  {  
     $('#respuesta_eliminar_total_orden_domicilio').html('').fadeIn('slow');
     
  }

  function actualizar_y_salir()
  {
    setTimeout(function(){ cargar_datos(1); },1000);
  }

