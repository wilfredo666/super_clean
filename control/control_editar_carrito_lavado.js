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
                $('#img_carrito_lavado').val(datos);
                mostrar_archivo();
            }
        });
    });
          

    function mostrar_archivo()
    {
        var archivo = $('#img_carrito_lavado').val();
        var cadena ="<div style='width: 100%; padding-top: 2%;'><center><img src='../multimedia/imagenes/"+archivo+"' style='width: 70%; height: 150px; box-shadow: 1px 1px 1px 2px #A4A4A4;'></center></div>";
        $('#resp_img_carrito_lavado').html(cadena);
         
      }

  function btn_opciones(ID_carrito_lavado)
  {
    $('#ID_contenido').val(ID_carrito_lavado);
  }
  
  //FUNCION PARA EXAMIANAR LOS DATOS

  function btn_ver_carrito_lavado()
  {
   var ID_carrito_lavado = $('#ID_contenido').val();
   var ob ={ID_carrito_lavado:ID_carrito_lavado};
   
   $.ajax({
                type: 'POST',
                url:'../vista/vista_examinar_carrito_lavado.php',
                data: ob,
                beforeSend: function(objeto){
              
                },
                success: function(data)
                { 
                 $('#panel_examinar_carrito_lavado').html(data);
                }
             });
   }

  
  //FUNCION DE EDICION DE LOS DATOS DEL MODELO

  function btn_editar_carrito_lavado()
  { 
     var ID_carrito_lavado = $('#ID_contenido').val();

     var obj = {ID_carrito_lavado:ID_carrito_lavado};
    
    $.ajax({
      type: 'POST',
      url: '../vista/vista_editar_carrito_lavado.php',
      data: obj,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#panel_edicion_carrito_lavado').html(data).fadeIn('slow');
      }
    });

  }

  function btn_guardar_cambios_carrito_lavado()
  {
    var ID_carrito_lavado =$('#ID_carrito_lavado_edicion').val(); 
    var id_usuario = $('#id_usuario').val();
    var id_cliente = $('#id_cliente').val();
    var cliente = $('#cliente').val();
    var id_sucursal = $('#id_sucursal').val();
    var id_ot = $('#id_ot').val();
    var codigo_ot = $('#codigo_ot').val();
    var tipo_lavado = $('#tipo_lavado').val();
    var estado_lavado = $('#estado_lavado').val();
    var codigo_tikeo = $('#codigo_tikeo').val();
    var id_prenda = $('#id_prenda').val();

    
    var obj = {ID_carrito_lavado: ID_carrito_lavado,
    id_usuario: id_usuario,
    id_cliente: id_cliente,
    cliente: cliente,
    id_sucursal: id_sucursal,
    id_ot: id_ot,
    codigo_ot: codigo_ot,
    tipo_lavado: tipo_lavado,
    estado_lavado: estado_lavado,
    codigo_tikeo: codigo_tikeo,
    id_prenda: id_prenda};
     
    $.ajax({
      type: 'POST',
      url:'../modelo/modelo_guardar_carrito_lavado.php',
      data: obj,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#respuesta_guardar_cambios_carrito_lavado').html(data).fadeIn('slow');
        
        setTimeout(function(){
          $('#myModal_Edicion').modal('hide').fadeIn('slow');
        },2000);

      }
    });

  }
  

  function actualizar_datos_carrito_lavado_editar()
  {  $('#myModal').modal('hide').fadeIn('slow');
     $('#respuesta_guardar_cambios_carrito_lavado').html('').fadeIn('slow');
     //location.reload();
     window.setTimeout('cargar_datos(1)',1000);
  }

  function cargar_datos(page){
    var parametros = {'action':'ajax','page':page};
    $('#loader').fadeIn('slow');
    $.ajax({
      url:'../modelo/modelo_listar_carrito_lavado.php',
      data: parametros,
       beforeSend: function(objeto){
       $('#loader').html('cargando .... ');
      },
      success:function(data){
        $('#panel_listado_carrito_lavado').html(data).fadeIn('slow');
        $('#loader').html('');
      }
    })
  }


 function btn_eliminar_carrito_lavado()
 {  
    var ID_carrito_lavado = $('#ID_contenido').val();
    $('#ID_eliminar_carrito_lavado').val(ID_carrito_lavado);
 }

 function btn_borrar_carrito_lavado()
  {  
     var ID_carrito_lavado = $('#ID_eliminar_carrito_lavado').val();
     var parametros = {ID_carrito_lavado:ID_carrito_lavado};
    
     $.ajax({
      type: 'POST',
      url:'../modelo/modelo_eliminar_carrito_lavado.php',
      data: parametros,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#panel_eliminar_carrito_lavado').html(data).fadeIn('slow');
        
        setTimeout(function(){
          $('#myModal_Eliminar').modal('hide').fadeIn('slow');
        },2000);

      }
    });
  }

  function actualizar_datos_carrito_lavado_eliminar()
  {  
     $('#respuesta_eliminar_total_carrito_lavado').html('').fadeIn('slow');
     
  }

  function actualizar_y_salir()
  {
    setTimeout(function(){ cargar_datos(1); },1000);
  }

