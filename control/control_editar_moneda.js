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
                $('#img_moneda').val(datos);
                mostrar_archivo();
            }
        });
    });
          

    function mostrar_archivo()
    {
        var archivo = $('#img_moneda').val();
        var cadena ="<div style='width: 100%; padding-top: 2%;'><center><img src='../multimedia/imagenes/"+archivo+"' style='width: 70%; height: 150px; box-shadow: 1px 1px 1px 2px #A4A4A4;'></center></div>";
        $('#resp_img_moneda').html(cadena);
         
      }

  function btn_opciones(ID_moneda)
  {
    $('#ID_contenido').val(ID_moneda);
  }
  
  //FUNCION PARA EXAMIANAR LOS DATOS

  function btn_ver_moneda()
  {
   var ID_moneda = $('#ID_contenido').val();
   var ob ={ID_moneda:ID_moneda};
   
   $.ajax({
                type: 'POST',
                url:'../vista/vista_examinar_moneda.php',
                data: ob,
                beforeSend: function(objeto){
              
                },
                success: function(data)
                { 
                 $('#panel_examinar_moneda').html(data);
                }
             });
   }

  
  //FUNCION DE EDICION DE LOS DATOS DEL MODELO

  function btn_editar_moneda()
  { 
     var ID_moneda = $('#ID_contenido').val();

     var obj = {ID_moneda:ID_moneda};
    
    $.ajax({
      type: 'POST',
      url: '../vista/vista_editar_moneda.php',
      data: obj,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#panel_edicion_moneda').html(data).fadeIn('slow');
      }
    });

  }

  function btn_guardar_cambios_moneda()
  {
    var ID_moneda =$('#ID_moneda_edicion').val(); 
    var moneda = $('#moneda').val();
    
    var obj = {ID_moneda: ID_moneda,
    moneda: moneda};
     
    $.ajax({
      type: 'POST',
      url:'../modelo/modelo_guardar_moneda.php',
      data: obj,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#respuesta_guardar_cambios_moneda').html(data).fadeIn('slow');
        
        setTimeout(function(){
          $('#myModal_Edicion').modal('hide').fadeIn('slow');
        },2000);

      }
    });

  }
  

  function actualizar_datos_moneda_editar()
  {  $('#myModal').modal('hide').fadeIn('slow');
     $('#respuesta_guardar_cambios_moneda').html('').fadeIn('slow');
     //location.reload();
     window.setTimeout('cargar_datos(1)',1000);
  }

  function cargar_datos(page){
    var parametros = {'action':'ajax','page':page};
    $('#loader').fadeIn('slow');
    $.ajax({
      url:'../modelo/modelo_listar_moneda.php',
      data: parametros,
       beforeSend: function(objeto){
       $('#loader').html('cargando .... ');
      },
      success:function(data){
        $('#panel_listado_moneda').html(data).fadeIn('slow');
        $('#loader').html('');
      }
    })
  }


 function btn_eliminar_moneda()
 {  
    var ID_moneda = $('#ID_contenido').val();
    $('#ID_eliminar_moneda').val(ID_moneda);
 }

 function btn_borrar_moneda()
  {  
     var ID_moneda = $('#ID_eliminar_moneda').val();
     var parametros = {ID_moneda:ID_moneda};
    
     $.ajax({
      type: 'POST',
      url:'../modelo/modelo_eliminar_moneda.php',
      data: parametros,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#panel_eliminar_moneda').html(data).fadeIn('slow');
        
        setTimeout(function(){
          $('#myModal_Eliminar').modal('hide').fadeIn('slow');
        },2000);

      }
    });
  }

  function actualizar_datos_moneda_eliminar()
  {  
     $('#respuesta_eliminar_total_moneda').html('').fadeIn('slow');
     
  }

  function actualizar_y_salir()
  {
    setTimeout(function(){ cargar_datos(1); },1000);
  }

