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
                $('#img_precio_kilo').val(datos);
                mostrar_archivo();
            }
        });
    });
          

    function mostrar_archivo()
    {
        var archivo = $('#img_precio_kilo').val();
        var cadena ="<div style='width: 100%; padding-top: 2%;'><center><img src='../multimedia/imagenes/"+archivo+"' style='width: 70%; height: 150px; box-shadow: 1px 1px 1px 2px #A4A4A4;'></center></div>";
        $('#resp_img_precio_kilo').html(cadena);
         
      }

  function btn_opciones(ID_precio_kilo)
  {
    $('#ID_contenido').val(ID_precio_kilo);
  }
  
  //FUNCION PARA EXAMIANAR LOS DATOS

  function btn_ver_precio_kilo()
  {
   var ID_precio_kilo = $('#ID_contenido').val();
   var ob ={ID_precio_kilo:ID_precio_kilo};
   
   $.ajax({
                type: 'POST',
                url:'../vista/vista_examinar_precio_kilo.php',
                data: ob,
                beforeSend: function(objeto){
              
                },
                success: function(data)
                { 
                 $('#panel_examinar_precio_kilo').html(data);
                }
             });
   }

  
  //FUNCION DE EDICION DE LOS DATOS DEL MODELO

  function btn_editar_precio_kilo()
  { 
     var ID_precio_kilo = $('#ID_contenido').val();

     var obj = {ID_precio_kilo:ID_precio_kilo};
    
    $.ajax({
      type: 'POST',
      url: '../vista/vista_editar_precio_kilo.php',
      data: obj,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#panel_edicion_precio_kilo').html(data).fadeIn('slow');
      }
    });

  }

  function btn_guardar_cambios_precio_kilo()
  {
    var ID_precio_kilo =$('#ID_precio_kilo_edicion').val(); 
    var precio_kilo = $('#precio_kilo').val();
    var fecha = $('#fecha').val();
    var hora = $('#hora').val();
    
    var obj = {ID_precio_kilo: ID_precio_kilo,
    precio_kilo: precio_kilo,
    fecha: fecha,
    hora: hora};
     
    $.ajax({
      type: 'POST',
      url:'../modelo/modelo_guardar_precio_kilo.php',
      data: obj,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#respuesta_guardar_cambios_precio_kilo').html(data).fadeIn('slow');
        
        setTimeout(function(){
          $('#myModal_Edicion').modal('hide').fadeIn('slow');
        },2000);

      }
    });

  }
  

  function actualizar_datos_precio_kilo_editar()
  {  $('#myModal').modal('hide').fadeIn('slow');
     $('#respuesta_guardar_cambios_precio_kilo').html('').fadeIn('slow');
     //location.reload();
     window.setTimeout('cargar_datos(1)',1000);
  }

  function cargar_datos(page){
    var parametros = {'action':'ajax','page':page};
    $('#loader').fadeIn('slow');
    $.ajax({
      url:'../modelo/modelo_listar_precio_kilo.php',
      data: parametros,
       beforeSend: function(objeto){
       $('#loader').html('cargando .... ');
      },
      success:function(data){
        $('#panel_listado_precio_kilo').html(data).fadeIn('slow');
        $('#loader').html('');
      }
    })
  }


 function btn_eliminar_precio_kilo()
 {  
    var ID_precio_kilo = $('#ID_contenido').val();
    $('#ID_eliminar_precio_kilo').val(ID_precio_kilo);
 }

 function btn_borrar_precio_kilo()
  {  
     var ID_precio_kilo = $('#ID_eliminar_precio_kilo').val();
     var parametros = {ID_precio_kilo:ID_precio_kilo};
    
     $.ajax({
      type: 'POST',
      url:'../modelo/modelo_eliminar_precio_kilo.php',
      data: parametros,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#panel_eliminar_precio_kilo').html(data).fadeIn('slow');
        
        setTimeout(function(){
          $('#myModal_Eliminar').modal('hide').fadeIn('slow');
        },2000);

      }
    });
  }

  function actualizar_datos_precio_kilo_eliminar()
  {  
     $('#respuesta_eliminar_total_precio_kilo').html('').fadeIn('slow');
     
  }

  function actualizar_y_salir()
  {
    setTimeout(function(){ cargar_datos(1); },1000);
  }

