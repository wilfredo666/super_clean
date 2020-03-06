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
                $('#img_cierre_caja').val(datos);
                mostrar_archivo();
            }
        });
    });
          

    function mostrar_archivo()
    {
        var archivo = $('#img_cierre_caja').val();
        var cadena ="<div style='width: 100%; padding-top: 2%;'><center><img src='../multimedia/imagenes/"+archivo+"' style='width: 70%; height: 150px; box-shadow: 1px 1px 1px 2px #A4A4A4;'></center></div>";
        $('#resp_img_cierre_caja').html(cadena);
         
      }

  function btn_opciones(ID_cierre_caja)
  {
    $('#ID_contenido').val(ID_cierre_caja);
  }
  
  //FUNCION PARA EXAMIANAR LOS DATOS

  function btn_ver_cierre_caja()
  {
   var ID_cierre_caja = $('#ID_contenido').val();
   var ob ={ID_cierre_caja:ID_cierre_caja};
   
   $.ajax({
                type: 'POST',
                url:'../vista/vista_examinar_cierre_caja.php',
                data: ob,
                beforeSend: function(objeto){
              
                },
                success: function(data)
                { 
                 $('#panel_examinar_cierre_caja').html(data);
                }
             });
   }

  
  //FUNCION DE EDICION DE LOS DATOS DEL MODELO

  function btn_editar_cierre_caja()
  { 
     var ID_cierre_caja = $('#ID_contenido').val();

     var obj = {ID_cierre_caja:ID_cierre_caja};
    
    $.ajax({
      type: 'POST',
      url: '../vista/vista_editar_cierre_caja.php',
      data: obj,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#panel_edicion_cierre_caja').html(data).fadeIn('slow');
      }
    });

  }

  function btn_guardar_cambios_cierre_caja()
  {
    var ID_cierre_caja =$('#ID_cierre_caja_edicion').val(); 
    var fecha_cierre = $('#fecha_cierre').val();
    var id_usuario = $('#id_usuario').val();
    var id_sucursal = $('#id_sucursal').val();
    var total_generado = $('#total_generado').val();

    var obj = {
    ID_cierre_caja: ID_cierre_caja,
    fecha_cierre: fecha_cierre,
    id_usuario: id_usuario,
    id_sucursal: id_sucursal,
    total_generado: total_generado };
     
    $.ajax({
      type: 'POST',
      url:'../modelo/modelo_guardar_cierre_caja.php',
      data: obj,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#respuesta_guardar_cambios_cierre_caja').html(data).fadeIn('slow');
        
        setTimeout(function(){
          $('#myModal_Edicion').modal('hide').fadeIn('slow');
        },2000);
        
        setTimeout(function(){
          $('#myModal_opciones').modal('hide').fadeIn('slow');
        },2500);

        setTimeout(function(){
          cargar_datos(1);
        },3000);
        

      }
    });

  }
  

  function actualizar_datos_cierre_caja_editar()
  {  $('#myModal').modal('hide').fadeIn('slow');
     $('#respuesta_guardar_cambios_cierre_caja').html('').fadeIn('slow');
     //location.reload();
     window.setTimeout('cargar_datos(1)',1000);
  }

  function cargar_datos(page){
    var parametros = {'action':'ajax','page':page};
    $('#loader').fadeIn('slow');
    $.ajax({
      url:'../modelo/modelo_listar_cierre_caja.php',
      data: parametros,
       beforeSend: function(objeto){
       $('#loader').html('cargando .... ');
      },
      success:function(data){
        $('#panel_listado_cierre_caja').html(data).fadeIn('slow');
        $('#loader').html('');
      }
    })
  }


 function btn_eliminar_cierre_caja()
 {  
    var ID_cierre_caja = $('#ID_contenido').val();
    $('#ID_eliminar_cierre_caja').val(ID_cierre_caja);
 }

 function btn_borrar_cierre_caja()
  {  
     var ID_cierre_caja = $('#ID_eliminar_cierre_caja').val();
     var parametros = {ID_cierre_caja:ID_cierre_caja};
    
     $.ajax({
      type: 'POST',
      url:'../modelo/modelo_eliminar_cierre_caja.php',
      data: parametros,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#panel_eliminar_cierre_caja').html(data).fadeIn('slow');
        
        setTimeout(function(){
          $('#myModal_Eliminar').modal('hide').fadeIn('slow');
        },2000);
        
        setTimeout(function(){
          $('#myModal_opciones').modal('hide').fadeIn('slow');
        },2500);

        setTimeout(function(){
          cargar_datos(1);
        },3000);

      }
    });
  }

  function actualizar_datos_cierre_caja_eliminar()
  {  
     $('#respuesta_eliminar_total_cierre_caja').html('').fadeIn('slow');
     
  }

  function actualizar_y_salir()
  {
    setTimeout(function(){ cargar_datos(1); },1000);
  }

