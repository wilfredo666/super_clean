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
                $('#img_area_acomodado').val(datos);
                mostrar_archivo();
            }
        });
    });
          

    function mostrar_archivo()
    {
        var archivo = $('#img_area_acomodado').val();
        var cadena ="<div style='width: 100%; padding-top: 2%;'><center><img src='../multimedia/imagenes/"+archivo+"' style='width: 70%; height: 150px; box-shadow: 1px 1px 1px 2px #A4A4A4;'></center></div>";
        $('#resp_img_area_acomodado').html(cadena);
         
      }

  function btn_opciones(ID_area_acomodado)
  {
    $('#ID_contenido').val(ID_area_acomodado);
  }
  
  //FUNCION PARA EXAMIANAR LOS DATOS

  function btn_ver_area_acomodado()
  {
   var ID_area_acomodado = $('#ID_contenido').val();
   var ob ={ID_area_acomodado:ID_area_acomodado};
   
   $.ajax({
                type: 'POST',
                url:'../vista/vista_examinar_area_acomodado.php',
                data: ob,
                beforeSend: function(objeto){
              
                },
                success: function(data)
                { 
                 $('#panel_examinar_area_acomodado').html(data);
                }
             });
   }

  
  //FUNCION DE EDICION DE LOS DATOS DEL MODELO

  function btn_editar_area_acomodado()
  { 
     var ID_area_acomodado = $('#ID_contenido').val();

     var obj = {ID_area_acomodado:ID_area_acomodado};
    
    $.ajax({
      type: 'POST',
      url: '../vista/vista_editar_area_acomodado.php',
      data: obj,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#panel_edicion_area_acomodado').html(data).fadeIn('slow');
      }
    });

  }

  function btn_guardar_cambios_area_acomodado()
  {
    var ID_area_acomodado =$('#ID_area_acomodado_edicion').val(); 
    var area_acomodado = $('#area_acomodado').val();
    
    var obj = {ID_area_acomodado: ID_area_acomodado,
    area_acomodado: area_acomodado};
     
    $.ajax({
      type: 'POST',
      url:'../modelo/modelo_guardar_area_acomodado.php',
      data: obj,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#respuesta_guardar_cambios_area_acomodado').html(data).fadeIn('slow');
        
        setTimeout(function(){
          $('#myModal_Edicion').modal('hide').fadeIn('slow');
        },2000);

      }
    });

  }
  

  function actualizar_datos_area_acomodado_editar()
  {  $('#myModal').modal('hide').fadeIn('slow');
     $('#respuesta_guardar_cambios_area_acomodado').html('').fadeIn('slow');
     //location.reload();
     window.setTimeout('cargar_datos(1)',1000);
  }

  function cargar_datos(page){
    var parametros = {'action':'ajax','page':page};
    $('#loader').fadeIn('slow');
    $.ajax({
      url:'../modelo/modelo_listar_area_acomodado.php',
      data: parametros,
       beforeSend: function(objeto){
       $('#loader').html('cargando .... ');
      },
      success:function(data){
        $('#panel_listado_area_acomodado').html(data).fadeIn('slow');
        $('#loader').html('');
      }
    })
  }


 function btn_eliminar_area_acomodado()
 {  
    var ID_area_acomodado = $('#ID_contenido').val();
    $('#ID_eliminar_area_acomodado').val(ID_area_acomodado);
 }

 function btn_borrar_area_acomodado()
  {  
     var ID_area_acomodado = $('#ID_eliminar_area_acomodado').val();
     var parametros = {ID_area_acomodado:ID_area_acomodado};
    
     $.ajax({
      type: 'POST',
      url:'../modelo/modelo_eliminar_area_acomodado.php',
      data: parametros,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#panel_eliminar_area_acomodado').html(data).fadeIn('slow');
        
        setTimeout(function(){
          $('#myModal_Eliminar').modal('hide').fadeIn('slow');
        },2000);

      }
    });
  }

  function actualizar_datos_area_acomodado_eliminar()
  {  
     $('#respuesta_eliminar_total_area_acomodado').html('').fadeIn('slow');
     
  }

  function actualizar_y_salir()
  {
    setTimeout(function(){ cargar_datos(1); },1000);
  }

