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
                $('#img_tikeo').val(datos);
                mostrar_archivo();
            }
        });
    });
          

    function mostrar_archivo()
    {
        var archivo = $('#img_tikeo').val();
        var cadena ="<div style='width: 100%; padding-top: 2%;'><center><img src='../multimedia/imagenes/"+archivo+"' style='width: 70%; height: 150px; box-shadow: 1px 1px 1px 2px #A4A4A4;'></center></div>";
        $('#resp_img_tikeo').html(cadena);
         
      }

  function btn_opciones(ID_tikeo)
  {
    $('#ID_contenido').val(ID_tikeo);
  }
  
  //FUNCION PARA EXAMIANAR LOS DATOS

  function btn_ver_tikeo()
  {
   var ID_tikeo = $('#ID_contenido').val();
   var ob ={ID_tikeo:ID_tikeo};
   
   $.ajax({
                type: 'POST',
                url:'../vista/vista_examinar_tikeo.php',
                data: ob,
                beforeSend: function(objeto){
              
                },
                success: function(data)
                { 
                 $('#panel_examinar_tikeo').html(data);
                }
             });
   }

  
  //FUNCION DE EDICION DE LOS DATOS DEL MODELO

  function btn_editar_tikeo()
  { 
     var ID_tikeo = $('#ID_contenido').val();

     var obj = {ID_tikeo:ID_tikeo};
    
    $.ajax({
      type: 'POST',
      url: '../vista/vista_editar_tikeo.php',
      data: obj,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#panel_edicion_tikeo').html(data).fadeIn('slow');
      }
    });

  }

  function btn_guardar_cambios_tikeo()
  {
    var ID_tikeo =$('#ID_tikeo_edicion').val(); 
    var id_cliente = $('#id_cliente').val();
    var cliente = $('#cliente').val();
    var id_usuario = $('#id_usuario').val();
    var id_sucursal = $('#id_sucursal').val();
    var id_ot = $('#id_ot').val();
    var codigo_ot = $('#codigo_ot').val();
    var codigo_barras = $('#codigo_barras').val();
    var estado_tikeo = $('#estado_tikeo').val();
    var id_prenda = $('#id_prenda').val();
    
    var obj = {ID_tikeo: ID_tikeo,
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
      url:'../modelo/modelo_guardar_tikeo.php',
      data: obj,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#respuesta_guardar_cambios_tikeo').html(data).fadeIn('slow');
        
        setTimeout(function(){
          $('#myModal_Edicion').modal('hide').fadeIn('slow');
        },2000);

      }
    });

  }
  

  function actualizar_datos_tikeo_editar()
  {  $('#myModal').modal('hide').fadeIn('slow');
     $('#respuesta_guardar_cambios_tikeo').html('').fadeIn('slow');
     //location.reload();
     window.setTimeout('cargar_datos(1)',1000);
  }

  function cargar_datos(page){
    var parametros = {'action':'ajax','page':page};
    $('#loader').fadeIn('slow');
    $.ajax({
      url:'../modelo/modelo_listar_tikeo.php',
      data: parametros,
       beforeSend: function(objeto){
       $('#loader').html('cargando .... ');
      },
      success:function(data){
        $('#panel_listado_tikeo').html(data).fadeIn('slow');
        $('#loader').html('');
      }
    })
  }


 function btn_eliminar_tikeo()
 {  
    var ID_tikeo = $('#ID_contenido').val();
    $('#ID_eliminar_tikeo').val(ID_tikeo);
 }

 function btn_borrar_tikeo()
  {  
     var codigo_tik = $('#ID_eliminar_tikeo').val();
     var obj = {codigo_tik:codigo_tik, tipo:"TODOS"};
    
     $.ajax({
      type: 'POST',
      url:'../modelo/modelo_eliminar_tikeo.php',
      data: obj,
       beforeSend: function(objeto){
        $('#panel_eliminar_tikeo').html("<div> Cargando ... </div>");
      },
      success:function(data){
        $('#panel_eliminar_tikeo').html(data).fadeIn('slow'); 
       
      setTimeout(function(){
          $('#myModal_Eliminar').modal('hide').fadeIn('slow');
        },2000);

      }
    });
  }

  function actualizar_datos_tikeo_eliminar()
  {  
     $('#respuesta_eliminar_total_tikeo').html('').fadeIn('slow');
     
  }

  function actualizar_y_salir()
  {
    setTimeout(function(){ cargar_datos(1); },1000);
  }

  function btn_editar_prenda_tikeada(id_tikeo)
  {
    var codigo_barras = $("#codigo_bar_"+id_tikeo).val();
    var obj = { codigo_barras:codigo_barras, id_tikeo:id_tikeo };
     
     $.ajax({
      type: 'POST',
      url:'../modelo/modelo_guardar_tikeo.php',
      data: obj,
       beforeSend: function(objeto){
        $('#panel_respuesta_editar_tikeo').html("<div> Cargando ... </div>");
      },
      success:function(data){
        $('#panel_respuesta_editar_tikeo').html(data).fadeIn('slow');

      setTimeout(function(){
          $('#panel_respuesta_editar_tikeo').html("");
      },2000);

      setTimeout(function(){
          btn_editar_tikeo()    
      },3000);
      
      }
    });
  }


 function btn_eliminar_prenda_tikeada(id_tikeo)
 {  
    var obj = {id_tikeo:id_tikeo,tipo:"SOLO"};
     
     $.ajax({
      type: 'POST',
      url:'../modelo/modelo_eliminar_tikeo.php',
      data: obj,
       beforeSend: function(objeto){
        $('#panel_respuesta_editar_tikeo').html("<div> Cargando ... </div>");
      },
      success:function(data){
        $('#panel_respuesta_editar_tikeo').html(data).fadeIn('slow');

      setTimeout(function(){
          $('#panel_respuesta_editar_tikeo').html("");
      },2000);

      setTimeout(function(){
          btn_editar_tikeo()    
      },3000);
      
      }
    }); 

  }
