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
                $('#img_tikeo_cliente').val(datos);
                mostrar_archivo();
            }
        });
    });
          

    function mostrar_archivo()
    {
        var archivo = $('#img_tikeo_cliente').val();
        var cadena ="<div style='width: 100%; padding-top: 2%;'><center><img src='../multimedia/imagenes/"+archivo+"' style='width: 70%; height: 150px; box-shadow: 1px 1px 1px 2px #A4A4A4;'></center></div>";
        $('#resp_img_tikeo_cliente').html(cadena);
         
      }

  function btn_opciones(ID_tikeo_cliente)
  {
    $('#ID_contenido').val(ID_tikeo_cliente);
  }
  
  //FUNCION PARA EXAMIANAR LOS DATOS

  function btn_ver_tikeo_cliente()
  {
   var ID_tikeo_cliente = $('#ID_contenido').val();
   var ob ={ID_tikeo_cliente:ID_tikeo_cliente};
   
   $.ajax({
                type: 'POST',
                url:'../vista/vista_examinar_tikeo_cliente.php',
                data: ob,
                beforeSend: function(objeto){
              
                },
                success: function(data)
                { 
                 $('#panel_examinar_tikeo_cliente').html(data);
                }
             });
   }

  
  //FUNCION DE EDICION DE LOS DATOS DEL MODELO

  function btn_editar_tikeo_cliente()
  { 
     var ID_tikeo_cliente = $('#ID_contenido').val();

     var obj = {ID_tikeo_cliente:ID_tikeo_cliente};
    
    $.ajax({
      type: 'POST',
      url: '../vista/vista_editar_tikeo_cliente.php',
      data: obj,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#panel_edicion_tikeo_cliente').html(data).fadeIn('slow');
      }
    });

  }

  function btn_guardar_cambios_tikeo_cliente()
  {
    var ID_tikeo_cliente =$('#ID_tikeo_cliente_edicion').val(); 
    var id_prenda = $('#id_prenda').val();
    var id_cliente = $('#id_cliente').val();
    var cliente = $('#cliente').val();
    var codigo_barras = $('#codigo_barras').val();
    var id_usuario = $('#id_usuario').val();
    var id_sucursal = $('#id_sucursal').val();
    var fecha = $('#fecha').val();
    var hora = $('#hora').val();
    
    var obj = {ID_tikeo_cliente: ID_tikeo_cliente,
    id_prenda: id_prenda,
    id_cliente: id_cliente,
    cliente: cliente,
    codigo_barras: codigo_barras,
    id_usuario: id_usuario,
    id_sucursal: id_sucursal,
    fecha: fecha,
    hora: hora};
     
    $.ajax({
      type: 'POST',
      url:'../modelo/modelo_guardar_tikeo_cliente.php',
      data: obj,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#respuesta_guardar_cambios_tikeo_cliente').html(data).fadeIn('slow');
        
        /*setTimeout(function(){
          $('#myModal_Edicion').modal('hide').fadeIn('slow');
        },2000);*/

      }
    });

  }
  

  function actualizar_datos_tikeo_cliente_editar()
  {  $('#myModal').modal('hide').fadeIn('slow');
     $('#respuesta_guardar_cambios_tikeo_cliente').html('').fadeIn('slow');
     //location.reload();
     window.setTimeout('cargar_datos(1)',1000);
  }

  function cargar_datos(page){
    var id_usuario = $("#id_usuario_sesion").val();
    var parametros = {'action':'ajax','page':page,id_usuario:id_usuario};
     
    $.ajax({
      type : 'POST',
      url:'../modelo/modelo_listar_tikeo_cliente.php',
      data: parametros,
      beforeSend: function(objeto){
       $('#panel_listado_tikeo_cliente').html('cargando .... ');
      },
      success:function(data){
        $('#panel_listado_tikeo_cliente').html(data).fadeIn('slow');
      }
    });
  }


 function btn_eliminar_tikeo_cliente()
 {  
    var ID_tikeo_cliente = $('#ID_contenido').val();
    $('#ID_eliminar_tikeo_cliente').val(ID_tikeo_cliente);
 }

 function btn_borrar_tikeo_cliente()
  {  
     var ID_tikeo_cliente = $('#ID_eliminar_tikeo_cliente').val();
     var parametros = {ID_tikeo_cliente:ID_tikeo_cliente};
    
     $.ajax({
      type: 'POST',
      url:'../modelo/modelo_eliminar_tikeo_cliente.php',
      data: parametros,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#panel_eliminar_tikeo_cliente').html(data).fadeIn('slow');
      }
    });
  }

  function actualizar_datos_tikeo_cliente_eliminar()
  {  
     $('#respuesta_eliminar_total_tikeo_cliente').html('').fadeIn('slow');
     
  }

  function actualizar_y_salir()
  {
    setTimeout(function(){ cargar_datos(1); },1000);
  }

/* Cargar datos de registro de tikeo a cliente */

  function cargar_datos_cod_bar(page){
    var id_usuario = $("#id_usuario_sesion").val();
    var parametros = {'action':'ajax','page':page,id_usuario:id_usuario};
     
    $.ajax({
      type : 'POST',
      url:'../modelo/modelo_listar_tikeo_cliente.php',
      data: parametros,
      beforeSend: function(objeto){
       $('#panel_listado_prendas_cliente').html('cargando .... ');
      },
      success:function(data){

       $('#panel_listado_prendas_cliente').html(data).fadeIn('slow'); 
      }
    });
  }
