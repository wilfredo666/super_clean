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
                $('#img_carrito_tikeo').val(datos);
                mostrar_archivo();
            }
        });
    });
          

    function mostrar_archivo()
    {
        var archivo = $('#img_carrito_tikeo').val();
        var cadena ="<div style='width: 100%; padding-top: 2%;'><center><img src='../multimedia/imagenes/"+archivo+"' style='width: 70%; height: 150px; box-shadow: 1px 1px 1px 2px #A4A4A4;'></center></div>";
        $('#resp_img_carrito_tikeo').html(cadena);
         
      }

  function btn_opciones(ID_carrito_tikeo)
  {
    $('#ID_contenido').val(ID_carrito_tikeo);
  }
  
  //FUNCION PARA EXAMIANAR LOS DATOS

  function btn_ver_carrito_tikeo()
  {
   var ID_carrito_tikeo = $('#ID_contenido').val();
   var ob ={ID_carrito_tikeo:ID_carrito_tikeo};
   
   $.ajax({
                type: 'POST',
                url:'../vista/vista_examinar_carrito_tikeo.php',
                data: ob,
                beforeSend: function(objeto){
              
                },
                success: function(data)
                { 
                 $('#panel_examinar_carrito_tikeo').html(data);
                }
             });
   }

  
  //FUNCION DE EDICION DE LOS DATOS DEL MODELO

  function btn_editar_carrito_tikeo()
  { 
     var ID_carrito_tikeo = $('#ID_contenido').val();

     var obj = {ID_carrito_tikeo:ID_carrito_tikeo};
    
    $.ajax({
      type: 'POST',
      url: '../vista/vista_editar_carrito_tikeo.php',
      data: obj,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#panel_edicion_carrito_tikeo').html(data).fadeIn('slow');
      }
    });

  }

  function btn_guardar_cambios_carrito_tikeo()
  {
    var ID_carrito_tikeo =$('#ID_carrito_tikeo_edicion').val(); 
    var id_cliente = $('#id_cliente').val();
    var cliente = $('#cliente').val();
    var id_usuario = $('#id_usuario').val();
    var id_sucursal = $('#id_sucursal').val();
    var id_ot = $('#id_ot').val();
    var codigo_ot = $('#codigo_ot').val();
    var codigo_barras = $('#codigo_barras').val();
    var estado_tikeo = $('#estado_tikeo').val();
    var id_prenda = $('#id_prenda').val();
    
    var obj = {ID_carrito_tikeo: ID_carrito_tikeo,
    id_cliente: id_cliente,
    cliente: cliente,
    id_usuario: id_usuario,
    id_sucursal: id_sucursal,
    id_ot: id_ot,
    codigo_ot: codigo_ot,
    codigo_barras: codigo_barras,
    estado_tikeo: estado_tikeo,
    id_prenda: id_prenda};
     
    $.ajax({
      type: 'POST',
      url:'../modelo/modelo_guardar_carrito_tikeo.php',
      data: obj,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#respuesta_guardar_cambios_carrito_tikeo').html(data).fadeIn('slow');
        
        setTimeout(function(){
          $('#myModal_Edicion').modal('hide').fadeIn('slow');
        },2000);

      }
    });

  }
  

  function actualizar_datos_carrito_tikeo_editar()
  {  $('#myModal').modal('hide').fadeIn('slow');
     $('#respuesta_guardar_cambios_carrito_tikeo').html('').fadeIn('slow');
     //location.reload();
     window.setTimeout('cargar_datos(1)',1000);
  }

  function cargar_datos(page){
    var parametros = {'action':'ajax','page':page};
    $('#loader').fadeIn('slow');
    $.ajax({
      url:'../modelo/modelo_listar_carrito_tikeo.php',
      data: parametros,
       beforeSend: function(objeto){
       $('#loader').html('cargando .... ');
      },
      success:function(data){
        $('#panel_listado_carrito_tikeo').html(data).fadeIn('slow');
        $('#loader').html('');
      }
    })
  }


 function btn_eliminar_carrito_tikeo()
 {  
    var ID_carrito_tikeo = $('#ID_contenido').val();
    $('#ID_eliminar_carrito_tikeo').val(ID_carrito_tikeo);
 }

 function btn_borrar_carrito_tikeo()
  {  
     var ID_carrito_tikeo = $('#ID_eliminar_carrito_tikeo').val();
     var parametros = {ID_carrito_tikeo:ID_carrito_tikeo};
    
     $.ajax({
      type: 'POST',
      url:'../modelo/modelo_eliminar_carrito_tikeo.php',
      data: parametros,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#panel_eliminar_carrito_tikeo').html(data).fadeIn('slow');
        
        setTimeout(function(){
          $('#myModal_Eliminar').modal('hide').fadeIn('slow');
        },2000);

      }
    });
  }

  function actualizar_datos_carrito_tikeo_eliminar()
  {  
     $('#respuesta_eliminar_total_carrito_tikeo').html('').fadeIn('slow');
     
  }

  function actualizar_y_salir()
  {
    setTimeout(function(){ cargar_datos(1); },1000);
  }

