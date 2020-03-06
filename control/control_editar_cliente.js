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
                $('#img_cliente').val(datos);
                mostrar_archivo();
            }
        });
    });
          

    function mostrar_archivo()
    {
        var archivo = $('#img_cliente').val();
        var cadena ="<div style='width: 100%; padding-top: 2%;'><center><img src='../multimedia/imagenes/"+archivo+"' style='width: 70%; height: 150px; box-shadow: 1px 1px 1px 2px #A4A4A4;'></center></div>";
        $('#resp_img_cliente').html(cadena);
         
      }

  function btn_opciones(ID_cliente)
  {
    $('#ID_contenido').val(ID_cliente);
  }
  
  //FUNCION PARA EXAMIANAR LOS DATOS

  function btn_ver_cliente()
  {
   var ID_cliente = $('#ID_contenido').val();
   var ob ={ ID_cliente:ID_cliente };
   
   $.ajax({
                type: 'POST',
                url:'../vista/vista_examinar_cliente.php',
                data: ob,
                beforeSend: function(objeto){
              
                },
                success: function(data)
                { 
                 $('#panel_examinar_cliente').html(data);
                }
             });
   }

  
  //FUNCION DE EDICION DE LOS DATOS DEL MODELO

  function btn_editar_cliente()
  { 
     var ID_cliente = $('#ID_contenido').val();

     var obj = {ID_cliente:ID_cliente};
    
    $.ajax({
      type: 'POST',
      url: '../vista/vista_editar_cliente.php',
      data: obj,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#panel_edicion_cliente').html(data).fadeIn('slow');
      }
    });

  }

  function btn_guardar_cambios_cliente()
  {
    var ID_cliente =$('#ID_cliente_edicion').val(); 
    var nombres = $('#nombres').val();
    var apellidos = $('#apellidos').val();
    var ci_nit = $('#ci_nit').val();
    var celular = $('#celular').val();
    var telefono = $('#telefono').val();
    var email = $('#email').val();
    var descuento = $('#descuento').val();
    var sexo = $('#sexo').val();
    var tipo = $('#tipo').val();
    
    var obj = {ID_cliente: ID_cliente,
    nombres: nombres,
    apellidos: apellidos,
    ci_nit: ci_nit,
    celular: celular,
    telefono: telefono,
    email: email,
    descuento: descuento,
    sexo: sexo, tipo : tipo };
     
    $.ajax({
      type: 'POST',
      url:'../modelo/modelo_guardar_cliente.php',
      data: obj,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#respuesta_guardar_cambios_cliente').html(data).fadeIn('slow');
        
        setTimeout(function(){
          $('#myModal_Edicion').modal('hide').fadeIn('slow');
        },2000);

      }
    });

  }
  

  function actualizar_datos_cliente_editar()
  {  $('#myModal').modal('hide').fadeIn('slow');
     $('#respuesta_guardar_cambios_cliente').html('').fadeIn('slow');
     //location.reload();
     window.setTimeout('cargar_datos(1)',1000);
  }

  function cargar_datos(page){
   var id_usuario = $("#id_usuario_sesion").val();
   var parametros = {'action':'ajax','page':page,id_usuario:id_usuario};
    
    $.ajax({
      type : 'POST',
      url:'../modelo/modelo_listar_cliente.php',
      data: parametros,
      beforeSend: function(objeto){
        $('#panel_listado_cliente').html('cargando .... ');
      },
      success:function(data){
        $('#panel_listado_cliente').html(data).fadeIn('slow');
         
      }
    });
  }


 function btn_eliminar_cliente()
 {  
    var ID_cliente = $('#ID_contenido').val();
    $('#ID_eliminar_cliente').val(ID_cliente);
 }

 function btn_borrar_cliente()
  {  
     var ID_cliente = $('#ID_eliminar_cliente').val();
     var parametros = {ID_cliente:ID_cliente};
    
     $.ajax({
      type: 'POST',
      url:'../modelo/modelo_eliminar_cliente.php',
      data: parametros,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#panel_eliminar_cliente').html(data).fadeIn('slow');
        
        setTimeout(function(){
          $('#myModal_Eliminar').modal('hide').fadeIn('slow');
        },2000);

      }
    });
  }

  function actualizar_datos_cliente_eliminar()
  {  
     $('#respuesta_eliminar_total_cliente').html('').fadeIn('slow');
     
  }

  function actualizar_y_salir()
  {
    setTimeout(function(){ cargar_datos(1); },1000);
  }

