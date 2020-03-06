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
                $('#img_tipo_prenda').val(datos);
                mostrar_archivo();
            }
        });
    });
          

    function mostrar_archivo()
    {
        var archivo = $('#img_tipo_prenda').val();
        var cadena ="<div style='width: 100%; padding-top: 2%;'><center><img src='../multimedia/imagenes/"+archivo+"' style='width: 70%; height: 150px; box-shadow: 1px 1px 1px 2px #A4A4A4;'></center></div>";
        $('#resp_img_tipo_prenda').html(cadena);
         
      }

  function btn_opciones(ID_tipo_prenda)
  {
    $('#ID_contenido').val(ID_tipo_prenda);
  }
  
  //FUNCION PARA EXAMIANAR LOS DATOS

  function btn_ver_tipo_prenda()
  {
   var ID_tipo_prenda = $('#ID_contenido').val();
   var ob ={ID_tipo_prenda:ID_tipo_prenda};
   
   $.ajax({
                type: 'POST',
                url:'../vista/vista_examinar_tipo_prenda.php',
                data: ob,
                beforeSend: function(objeto){
              
                },
                success: function(data)
                { 
                 $('#panel_examinar_tipo_prenda').html(data);
                }
             });
   }

  
  //FUNCION DE EDICION DE LOS DATOS DEL MODELO

  function btn_editar_tipo_prenda()
  { 
     var ID_tipo_prenda = $('#ID_contenido').val();

     var obj = {ID_tipo_prenda:ID_tipo_prenda};
    
    $.ajax({
      type: 'POST',
      url: '../vista/vista_editar_tipo_prenda.php',
      data: obj,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#panel_edicion_tipo_prenda').html(data).fadeIn('slow');
      }
    });

  }

  function btn_guardar_cambios_tipo_prenda()
  {
    var ID_tipo_prenda =$('#ID_tipo_prenda_edicion').val(); 
    var tipo_prenda = $('#tipo_prenda').val();
    
    var obj = {ID_tipo_prenda: ID_tipo_prenda,
    tipo_prenda: tipo_prenda};
     
    $.ajax({
      type: 'POST',
      url:'../modelo/modelo_guardar_tipo_prenda.php',
      data: obj,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#respuesta_guardar_cambios_tipo_prenda').html(data).fadeIn('slow');
        
        setTimeout(function(){
          $('#myModal_Edicion').modal('hide').fadeIn('slow');
        },2000);

      }
    });

  }
  

  function actualizar_datos_tipo_prenda_editar()
  {  $('#myModal').modal('hide').fadeIn('slow');
     $('#respuesta_guardar_cambios_tipo_prenda').html('').fadeIn('slow');
     //location.reload();
     window.setTimeout('cargar_datos(1)',1000);
  }

  function cargar_datos(page){
    var parametros = {'action':'ajax','page':page};
    $('#loader').fadeIn('slow');
    $.ajax({
      url:'../modelo/modelo_listar_tipo_prenda.php',
      data: parametros,
       beforeSend: function(objeto){
       $('#loader').html('cargando .... ');
      },
      success:function(data){
        $('#panel_listado_tipo_prenda').html(data).fadeIn('slow');
        $('#loader').html('');
      }
    })
  }


 function btn_eliminar_tipo_prenda()
 {  
    var ID_tipo_prenda = $('#ID_contenido').val();
    $('#ID_eliminar_tipo_prenda').val(ID_tipo_prenda);
 }

 function btn_borrar_tipo_prenda()
  {  
     var ID_tipo_prenda = $('#ID_eliminar_tipo_prenda').val();
     var parametros = {ID_tipo_prenda:ID_tipo_prenda};
    
     $.ajax({
      type: 'POST',
      url:'../modelo/modelo_eliminar_tipo_prenda.php',
      data: parametros,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#panel_eliminar_tipo_prenda').html(data).fadeIn('slow');
        
        setTimeout(function(){
          $('#myModal_Eliminar').modal('hide').fadeIn('slow');
        },2000);

      }
    });
  }

  function actualizar_datos_tipo_prenda_eliminar()
  {  
     $('#respuesta_eliminar_total_tipo_prenda').html('').fadeIn('slow');
     
  }

  function actualizar_y_salir()
  {
    setTimeout(function(){ cargar_datos(1); },1000);
  }

