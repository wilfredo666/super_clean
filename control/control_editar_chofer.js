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
                $('#img_chofer').val(datos);
                mostrar_archivo();
            }
        });
    });
          

    function mostrar_archivo()
    {
        var archivo = $('#img_chofer').val();
        var cadena ="<div style='width: 100%; padding-top: 2%;'><center><img src='../multimedia/imagenes/"+archivo+"' style='width: 70%; height: 150px; box-shadow: 1px 1px 1px 2px #A4A4A4;'></center></div>";
        $('#resp_img_chofer').html(cadena);
         
      }

  function btn_opciones(ID_chofer)
  {
    $('#ID_contenido').val(ID_chofer);
  }
  
  //FUNCION PARA EXAMIANAR LOS DATOS

  function btn_ver_chofer()
  {
   var ID_chofer = $('#ID_contenido').val();
   var ob ={ID_chofer:ID_chofer};
   
   $.ajax({
                type: 'POST',
                url:'../vista/vista_examinar_chofer.php',
                data: ob,
                beforeSend: function(objeto){
              
                },
                success: function(data)
                { 
                 $('#panel_examinar_chofer').html(data);
                }
             });
   }

  
  //FUNCION DE EDICION DE LOS DATOS DEL MODELO

  function btn_editar_chofer()
  { 
     var ID_chofer = $('#ID_contenido').val();

     var obj = {ID_chofer:ID_chofer};
    
    $.ajax({
      type: 'POST',
      url: '../vista/vista_editar_chofer.php',
      data: obj,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#panel_edicion_chofer').html(data).fadeIn('slow');
      }
    });

  }

  function btn_guardar_cambios_chofer()
  {
    var ID_chofer =$('#ID_chofer_edicion').val(); 
    var nombre_completo = $('#nombre_completo').val();
    var direccion = $('#direccion').val();
    var celular = $('#celular').val();
    var telefono = $('#telefono').val();
    
    var obj = {ID_chofer: ID_chofer,
    nombre_completo: nombre_completo,
    direccion: direccion,
    celular: celular,
    telefono: telefono};
     
    $.ajax({
      type: 'POST',
      url:'../modelo/modelo_guardar_chofer.php',
      data: obj,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#respuesta_guardar_cambios_chofer').html(data).fadeIn('slow');
        
        setTimeout(function(){
          $('#myModal_Edicion').modal('hide').fadeIn('slow');
        },2000);

      }
    });

  }
  

  function actualizar_datos_chofer_editar()
  {  $('#myModal').modal('hide').fadeIn('slow');
     $('#respuesta_guardar_cambios_chofer').html('').fadeIn('slow');
     //location.reload();
     window.setTimeout('cargar_datos(1)',1000);
  }

  function cargar_datos(page){
    var parametros = {'action':'ajax','page':page};
    $('#loader').fadeIn('slow');
    $.ajax({
      url:'../modelo/modelo_listar_chofer.php',
      data: parametros,
       beforeSend: function(objeto){
       $('#loader').html('cargando .... ');
      },
      success:function(data){
        $('#panel_listado_chofer').html(data).fadeIn('slow');
        $('#loader').html('');
      }
    })
  }


 function btn_eliminar_chofer()
 {  
    var ID_chofer = $('#ID_contenido').val();
    $('#ID_eliminar_chofer').val(ID_chofer);
 }

 function btn_borrar_chofer()
  {  
     var ID_chofer = $('#ID_eliminar_chofer').val();
     var parametros = {ID_chofer:ID_chofer};
    
     $.ajax({
      type: 'POST',
      url:'../modelo/modelo_eliminar_chofer.php',
      data: parametros,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#panel_eliminar_chofer').html(data).fadeIn('slow');
        
        setTimeout(function(){
          $('#myModal_Eliminar').modal('hide').fadeIn('slow');
        },2000);

      }
    });
  }

  function actualizar_datos_chofer_eliminar()
  {  
     $('#respuesta_eliminar_total_chofer').html('').fadeIn('slow');
     
  }

  function actualizar_y_salir()
  {
    setTimeout(function(){ cargar_datos(1); },1000);
  }

