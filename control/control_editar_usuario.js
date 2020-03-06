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
                $('#img_usuario').val(datos);
                mostrar_archivo();
            }
        });
    });
          

    function mostrar_archivo()
    {
        var archivo = $('#img_usuario').val();
        var cadena ="<div style='width: 100%; padding-top: 2%;'><center><img src='../multimedia/imagenes/"+archivo+"' style='width: 70%; height: 150px; box-shadow: 1px 1px 1px 2px #A4A4A4;'></center></div>";
        $('#resp_img_usuario').html(cadena);
         
      }

  function btn_opciones(ID_usuario)
  {
    $('#ID_contenido').val(ID_usuario);
  }
  
  //FUNCION PARA EXAMIANAR LOS DATOS

  function btn_ver_usuario()
  {
   var ID_usuario = $('#ID_contenido').val();
   var ob ={ID_usuario:ID_usuario};
   
   $.ajax({
                type: 'POST',
                url:'../vista/vista_examinar_usuario.php',
                data: ob,
                beforeSend: function(objeto){
              
                },
                success: function(data)
                { 
                 $('#panel_examinar_usuario').html(data);
                }
             });
   }

  
  //FUNCION DE EDICION DE LOS DATOS DEL MODELO

  function btn_editar_usuario()
  { 
     var ID_usuario = $('#ID_contenido').val();

     var obj = {ID_usuario:ID_usuario};
    
    $.ajax({
      type: 'POST',
      url: '../vista/vista_editar_usuario.php',
      data: obj,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#panel_edicion_usuario').html(data).fadeIn('slow');
      }
    });

  }

  function btn_guardar_cambios_usuario()
  {
    var ID_usuario =$('#ID_usuario_edicion').val(); 
    var email = $('#email').val();
    var password = $('#password').val();
    var sucursal = $('#sucursal').val();
    var cargo = $('#cargo').val();
    var nombres = $('#nombres').val();
    var apellidos = $('#apellidos').val();
    var ci = $('#ci').val();
    var numero = $('#numero').val();
    
    var obj = {ID_usuario: ID_usuario,
    email: email,
    password: password,
    sucursal: sucursal,
    cargo: cargo,
    nombres: nombres,
    apellidos: apellidos,
    ci: ci,
    numero: numero};
     
    $.ajax({
      type: 'POST',
      url:'../modelo/modelo_guardar_usuario.php',
      data: obj,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#respuesta_guardar_cambios_usuario').html(data).fadeIn('slow');
        
        setTimeout(function(){
          $('#myModal_Edicion').modal('hide').fadeIn('slow');
        },2000);

      }
    });

  }
  

  function actualizar_datos_usuario_editar()
  {  $('#myModal').modal('hide').fadeIn('slow');
     $('#respuesta_guardar_cambios_usuario').html('').fadeIn('slow');
     //location.reload();
     window.setTimeout('cargar_datos(1)',1000);
  }

  function cargar_datos(page){
    var parametros = {'action':'ajax','page':page};
    $('#loader').fadeIn('slow');
    $.ajax({
      url:'../modelo/modelo_listar_usuario.php',
      data: parametros,
       beforeSend: function(objeto){
       $('#loader').html('cargando .... ');
      },
      success:function(data){
        $('#panel_listado_usuario').html(data).fadeIn('slow');
        $('#loader').html('');
      }
    })
  }


 function btn_eliminar_usuario()
 {  
    var ID_usuario = $('#ID_contenido').val();
    $('#ID_eliminar_usuario').val(ID_usuario);
 }

 function btn_borrar_usuario()
  {  
     var ID_usuario = $('#ID_eliminar_usuario').val();
     var parametros = {ID_usuario:ID_usuario};
    
     $.ajax({
      type: 'POST',
      url:'../modelo/modelo_eliminar_usuario.php',
      data: parametros,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#panel_eliminar_usuario').html(data).fadeIn('slow');
        
        setTimeout(function(){
          $('#myModal_Eliminar').modal('hide').fadeIn('slow');
        },2000);

      }
    });
  }

  function actualizar_datos_usuario_eliminar()
  {  
     $('#respuesta_eliminar_total_usuario').html('').fadeIn('slow');
     
  }

  function actualizar_y_salir()
  {
    setTimeout(function(){ cargar_datos(1); },1000);
  }

