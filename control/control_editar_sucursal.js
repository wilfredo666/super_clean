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
                $('#img_sucursal').val(datos);
                mostrar_archivo();
            }
        });
    });
          

    function mostrar_archivo()
    {
        var archivo = $('#img_sucursal').val();
        var cadena ="<div style='width: 100%; padding-top: 2%;'><center><img src='../multimedia/imagenes/"+archivo+"' style='width: 70%; height: 150px; box-shadow: 1px 1px 1px 2px #A4A4A4;'></center></div>";
        $('#resp_img_sucursal').html(cadena);
         
      }

  function btn_opciones(ID_sucursal)
  {
    $('#ID_contenido').val(ID_sucursal);
  }
  
  //FUNCION PARA EXAMIANAR LOS DATOS

  function btn_ver_sucursal()
  {
   var ID_sucursal = $('#ID_contenido').val();
   var ob ={ID_sucursal:ID_sucursal};
   
   $.ajax({
                type: 'POST',
                url:'../vista/vista_examinar_sucursal.php',
                data: ob,
                beforeSend: function(objeto){
              
                },
                success: function(data)
                { 
                 $('#panel_examinar_sucursal').html(data);
                }
             });
   }

  
  //FUNCION DE EDICION DE LOS DATOS DEL MODELO

  function btn_editar_sucursal()
  { 
     var ID_sucursal = $('#ID_contenido').val();

     var obj = {ID_sucursal:ID_sucursal};
    
    $.ajax({
      type: 'POST',
      url: '../vista/vista_editar_sucursal.php',
      data: obj,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#panel_edicion_sucursal').html(data).fadeIn('slow');
      }
    });

  }

  function btn_guardar_cambios_sucursal()
  {
    var ID_sucursal =$('#ID_sucursal_edicion').val(); 
    var sucursal = $('#sucursal').val();
    var encargado = $('#encargado').val();
    var telefono = $('#telefono').val();
    var celular = $('#celular').val();
    
    var obj = {ID_sucursal: ID_sucursal,
    sucursal: sucursal,
    encargado: encargado,
    telefono: telefono,
    celular: celular};
     
    $.ajax({
      type: 'POST',
      url:'../modelo/modelo_guardar_sucursal.php',
      data: obj,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#respuesta_guardar_cambios_sucursal').html(data).fadeIn('slow');
        
        setTimeout(function(){
          $('#myModal_Edicion').modal('hide').fadeIn('slow');
        },2000);

      }
    });

  }
  

  function actualizar_datos_sucursal_editar()
  {  $('#myModal').modal('hide').fadeIn('slow');
     $('#respuesta_guardar_cambios_sucursal').html('').fadeIn('slow');
     //location.reload();
     window.setTimeout('cargar_datos(1)',1000);
  }

  function cargar_datos(page){
    var parametros = {'action':'ajax','page':page};
    $('#loader').fadeIn('slow');
    $.ajax({
      url:'../modelo/modelo_listar_sucursal.php',
      data: parametros,
       beforeSend: function(objeto){
       $('#loader').html('cargando .... ');
      },
      success:function(data){
        $('#panel_listado_sucursal').html(data).fadeIn('slow');
        $('#loader').html('');
      }
    })
  }


 function btn_eliminar_sucursal()
 {  
    var ID_sucursal = $('#ID_contenido').val();
    $('#ID_eliminar_sucursal').val(ID_sucursal);
 }

 function btn_borrar_sucursal()
  {  
     var ID_sucursal = $('#ID_eliminar_sucursal').val();
     var parametros = {ID_sucursal:ID_sucursal};
    
     $.ajax({
      type: 'POST',
      url:'../modelo/modelo_eliminar_sucursal.php',
      data: parametros,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#panel_eliminar_sucursal').html(data).fadeIn('slow');
        
        setTimeout(function(){
          $('#myModal_Eliminar').modal('hide').fadeIn('slow');
        },2000);

      }
    });
  }

  function actualizar_datos_sucursal_eliminar()
  {  
     $('#respuesta_eliminar_total_sucursal').html('').fadeIn('slow');
     
  }

  function actualizar_y_salir()
  {
    setTimeout(function(){ cargar_datos(1); },1000);
  }

