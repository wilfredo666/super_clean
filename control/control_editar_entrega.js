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
                $('#img_entrega').val(datos);
                mostrar_archivo();
            }
        });
    });
          

    function mostrar_archivo()
    {
        var archivo = $('#img_entrega').val();
        var cadena ="<div style='width: 100%; padding-top: 2%;'><center><img src='../multimedia/imagenes/"+archivo+"' style='width: 70%; height: 150px; box-shadow: 1px 1px 1px 2px #A4A4A4;'></center></div>";
        $('#resp_img_entrega').html(cadena);
         
      }

  function btn_opciones(ID_entrega)
  {
    $('#ID_contenido').val(ID_entrega);
  }
  
  //FUNCION PARA EXAMIANAR LOS DATOS

  function btn_ver_entrega()
  {
   var ID_entrega = $('#ID_contenido').val();
   var ob ={ID_entrega:ID_entrega};
   
   $.ajax({
                type: 'POST',
                url:'../vista/vista_examinar_entrega.php',
                data: ob,
                beforeSend: function(objeto){
              
                },
                success: function(data)
                { 
                 $('#panel_examinar_entrega').html(data);
                }
             });
   }

  
  //FUNCION DE EDICION DE LOS DATOS DEL MODELO

  function btn_editar_entrega()
  { 
     var ID_entrega = $('#ID_contenido').val();

     var obj = {ID_entrega:ID_entrega};
    
    $.ajax({
      type: 'POST',
      url: '../vista/vista_editar_entrega.php',
      data: obj,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#panel_edicion_entrega').html(data).fadeIn('slow');
      }
    });

  }

  function btn_guardar_cambios_entrega()
  {
    var ID_entrega =$('#ID_entrega_edicion').val(); 
    var codigo_ot = $('#codigo_ot').val();
    var estado = $('#estado').val();
    var fecha = $('#fecha').val();
    var hora = $('#hora').val();

    var total = $('#total').val()
    var pago = $('#pago').val()
    var saldo = $('#saldo').val()
    
    var obj = {
    ID_entrega: ID_entrega,
    codigo_ot: codigo_ot,
    estado: estado,
    total : total,
    pago : pago,
    saldo : saldo,
    fecha: fecha,
    hora: hora };
     
    $.ajax({
      type: 'POST',
      url:'../modelo/modelo_guardar_entrega.php',
      data: obj,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#respuesta_guardar_cambios_entrega').html(data).fadeIn('slow');
        
        setTimeout(function(){
          $('#myModal_Edicion').modal('hide').fadeIn('slow');
        },2000);

        setTimeout(function(){
          $('#myModal_opciones').modal('hide').fadeIn('slow');
        },2500);

        setTimeout(function(){ cargar_datos(1); }, 3000);

      }
    });

  }
  

  function actualizar_datos_entrega_editar()
  {  $('#myModal').modal('hide').fadeIn('slow');
     $('#respuesta_guardar_cambios_entrega').html('').fadeIn('slow');
     //location.reload();
     window.setTimeout('cargar_datos(1)',1000);
  }

  function cargar_datos(page){

    var id_usuario = $("#id_usuario_sesion").val();
    var parametros = {'action':'ajax','page':page,id_usuario:id_usuario};
    
    $.ajax({
      type : 'POST',
      url:'../modelo/modelo_listar_entrega.php',
      data: parametros,
      beforeSend: function(objeto){
       $('#panel_listado_entrega').html('cargando .... ');
      },
      success:function(data){
        $('#panel_listado_entrega').html(data).fadeIn('slow');
      }
    });
  }


 function btn_eliminar_entrega()
 {  
    var ID_entrega = $('#ID_contenido').val();
    $('#ID_eliminar_entrega').val(ID_entrega);
 }

 function btn_borrar_entrega()
  {  
     var ID_entrega = $('#ID_eliminar_entrega').val();
     var parametros = {ID_entrega:ID_entrega};
    
     $.ajax({
      type: 'POST',
      url:'../modelo/modelo_eliminar_entrega.php',
      data: parametros,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#panel_eliminar_entrega').html(data).fadeIn('slow');
        
        setTimeout(function(){
          $('#myModal_Eliminar').modal('hide').fadeIn('slow');
        },2000);

        setTimeout(function(){
          $('#myModal_opciones').modal('hide').fadeIn('slow');
        },2500);

        setTimeout(function(){ cargar_datos(1); }, 3000);
      }
    });
  }

  function actualizar_datos_entrega_eliminar()
  {  
     $('#respuesta_eliminar_total_entrega').html('').fadeIn('slow');
     
  }

  function actualizar_y_salir()
  {
    setTimeout(function(){ cargar_datos(1); },1000);
  }

