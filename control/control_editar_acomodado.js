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
                $('#img_acomodado').val(datos);
                mostrar_archivo();
            }
        });
    });
          

    function mostrar_archivo()
    {
        var archivo = $('#img_acomodado').val();
        var cadena ="<div style='width: 100%; padding-top: 2%;'><center><img src='../multimedia/imagenes/"+archivo+"' style='width: 70%; height: 150px; box-shadow: 1px 1px 1px 2px #A4A4A4;'></center></div>";
        $('#resp_img_acomodado').html(cadena);
         
      }

  function btn_opciones(ID_acomodado)
  {
    $('#ID_contenido').val(ID_acomodado);
  }
  
  //FUNCION PARA EXAMIANAR LOS DATOS

  function btn_ver_acomodado()
  {
   var ID_acomodado = $('#ID_contenido').val();
   var ob ={ID_acomodado:ID_acomodado};
   
   $.ajax({
                type: 'POST',
                url:'../vista/vista_examinar_acomodado.php',
                data: ob,
                beforeSend: function(objeto){
              
                },
                success: function(data)
                { 
                 $('#panel_examinar_acomodado').html(data);
                }
             });
   }

  
  //FUNCION DE EDICION DE LOS DATOS DEL MODELO

  function btn_editar_acomodado()
  { 
     var ID_acomodado = $('#ID_contenido').val();

     var obj = {ID_acomodado:ID_acomodado};
    
    $.ajax({
      type: 'POST',
      url: '../vista/vista_editar_acomodado.php',
      data: obj,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#panel_edicion_acomodado').html(data).fadeIn('slow');
      }
    });

  }

  function btn_guardar_cambios_acomodado()
  {
    var ID_acomodado =$('#ID_acomodado').val(); 
    
    var select_lugar = $('#select_lugar').val();
    
    var obj = {ID_acomodado : ID_acomodado,
    select_lugar : select_lugar };
     
    $.ajax({
      type: 'POST',
      url:'../modelo/modelo_guardar_acomodado.php',
      data: obj,
      beforeSend: function(objeto){
        $('#respuesta_guardar_cambios_acomodado').html("<div id='cargando'> cargando ... </div>");
      },
      success:function(data){
        $('#respuesta_guardar_cambios_acomodado').html(data).fadeIn('slow');
        
       setTimeout(function(){
          $('#myModal_Edicion').modal('hide').fadeIn('slow');
        },2000); 

      }
    });

  }
  

  function actualizar_datos_acomodado_editar()
  {  $('#myModal').modal('hide').fadeIn('slow');
     $('#respuesta_guardar_cambios_acomodado').html('').fadeIn('slow');
     //location.reload();
     window.setTimeout('cargar_datos(1)',1000);
  }

function cargar_datos(page){
    var id_usuario = $("#id_usuario_sesion").val();
    var parametros = {'action':'ajax','page':page,id_usuario:id_usuario};
     
    $.ajax({
      type : 'POST',
      url:'../modelo/modelo_listar_acomodado.php',
      data: parametros,
      beforeSend: function(objeto){
       $('#panel_listado_acomodado').html('cargando .... ');
      },
      success:function(data){
        $('#panel_listado_acomodado').html(data).fadeIn('slow');
      }
    });
}


 function btn_eliminar_acomodado()
 {  
    var ID_acomodado = $('#ID_contenido').val();
    $('#ID_eliminar_acomodado').val(ID_acomodado);
 }

 function btn_borrar_acomodado()
  {  
     var ID_acomodado = $('#ID_eliminar_acomodado').val();
     var parametros = {ID_acomodado:ID_acomodado};
    
     $.ajax({
      type: 'POST',
      url:'../modelo/modelo_eliminar_acomodado.php',
      data: parametros,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#panel_eliminar_acomodado').html(data).fadeIn('slow');
        
        setTimeout(function(){
          $('#myModal_Eliminar').modal('hide').fadeIn('slow');
        },2000);

      }
    });
  }

  function actualizar_datos_acomodado_eliminar()
  {  
     $('#respuesta_eliminar_total_acomodado').html('').fadeIn('slow');
     
  }

  function actualizar_y_salir()
  {
    setTimeout(function(){ cargar_datos(1); },1000);
  }

