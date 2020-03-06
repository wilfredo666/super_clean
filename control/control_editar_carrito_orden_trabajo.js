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
                $('#img_carrito_orden_trabajo').val(datos);
                mostrar_archivo();
            }
        });
    });
          

    function mostrar_archivo()
    {
        var archivo = $('#img_carrito_orden_trabajo').val();
        var cadena ="<div style='width: 100%; padding-top: 2%;'><center><img src='../multimedia/imagenes/"+archivo+"' style='width: 70%; height: 150px; box-shadow: 1px 1px 1px 2px #A4A4A4;'></center></div>";
        $('#resp_img_carrito_orden_trabajo').html(cadena);
         
      }

  function btn_opciones(ID_carrito_orden_trabajo)
  {
    $('#ID_contenido').val(ID_carrito_orden_trabajo);
  }
  
  //FUNCION PARA EXAMIANAR LOS DATOS

  function btn_ver_carrito_orden_trabajo()
  {
   var ID_carrito_orden_trabajo = $('#ID_contenido').val();
   var ob ={ID_carrito_orden_trabajo:ID_carrito_orden_trabajo};
   
   $.ajax({
                type: 'POST',
                url:'../vista/vista_examinar_carrito_orden_trabajo.php',
                data: ob,
                beforeSend: function(objeto){
              
                },
                success: function(data)
                { 
                 $('#panel_examinar_carrito_orden_trabajo').html(data);
                }
             });
   }

  
  //FUNCION DE EDICION DE LOS DATOS DEL MODELO

  function btn_editar_carrito_orden_trabajo()
  { 
     var ID_carrito_orden_trabajo = $('#ID_contenido').val();

     var obj = {ID_carrito_orden_trabajo:ID_carrito_orden_trabajo};
    
    $.ajax({
      type: 'POST',
      url: '../vista/vista_editar_carrito_orden_trabajo.php',
      data: obj,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#panel_edicion_carrito_orden_trabajo').html(data).fadeIn('slow');
      }
    });

  }

  function btn_guardar_cambios_carrito_orden_trabajo()
  {
    var ID_carrito_orden_trabajo =$('#ID_carrito_orden_trabajo_edicion').val(); 
    var id_usuario = $('#id_usuario').val();
    var id_sucursal = $('#id_sucursal').val();
    var id_cliente = $('#id_cliente').val();
    var cliente = $('#cliente').val();
    var ci_nit = $('#ci_nit').val();
    var id_prenda = $('#id_prenda').val();
    var id_tipo_lavado = $('#id_tipo_lavado').val();
    var cantidad_prenda = $('#cantidad_prenda').val();
    var cantidad_peso = $('#cantidad_peso').val();
    var medida_prenda = $('#medida_prenda').val();
    var costo_prenda = $('#costo_prenda').val();
    var costo_kilo = $('#costo_kilo').val();
    var costo_metro = $('#costo_metro').val();
    var total_servicio = $('#total_servicio').val();
    var pago_servicio = $('#pago_servicio').val();
    var saldo_servicio = $('#saldo_servicio').val();
    var moneda = $('#moneda').val();
    var descuento = $('#descuento').val();
    var tipo_cliente = $('#tipo_cliente').val();
    var estado = $('#estado').val();
    var codigo_ot = $('#codigo_ot').val();
    
    var obj = {ID_carrito_orden_trabajo: ID_carrito_orden_trabajo,
    id_usuario: id_usuario,
    id_sucursal: id_sucursal,
    id_cliente: id_cliente,
    cliente: cliente,
    ci_nit: ci_nit,
    id_prenda: id_prenda,
    id_tipo_lavado: id_tipo_lavado,
    cantidad_prenda: cantidad_prenda,
    cantidad_peso: cantidad_peso,
    medida_prenda: medida_prenda,
    costo_prenda: costo_prenda,
    costo_kilo: costo_kilo,
    costo_metro: costo_metro,
    total_servicio: total_servicio,
    pago_servicio: pago_servicio,
    saldo_servicio: saldo_servicio,
    moneda: moneda,
    descuento: descuento,
    tipo_cliente: tipo_cliente,
    estado: estado,
    codigo_ot: codigo_ot};
     
    $.ajax({
      type: 'POST',
      url:'../modelo/modelo_guardar_carrito_orden_trabajo.php',
      data: obj,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#respuesta_guardar_cambios_carrito_orden_trabajo').html(data).fadeIn('slow');
        
        setTimeout(function(){
          $('#myModal_Edicion').modal('hide').fadeIn('slow');
        },2000);

      }
    });

  }
  

  function actualizar_datos_carrito_orden_trabajo_editar()
  {  $('#myModal').modal('hide').fadeIn('slow');
     $('#respuesta_guardar_cambios_carrito_orden_trabajo').html('').fadeIn('slow');
     //location.reload();
     window.setTimeout('cargar_datos(1)',1000);
  }

  function cargar_datos(page){
    var parametros = {'action':'ajax','page':page};
    $('#loader').fadeIn('slow');
    $.ajax({
      url:'../modelo/modelo_listar_carrito_orden_trabajo.php',
      data: parametros,
       beforeSend: function(objeto){
       $('#loader').html('cargando .... ');
      },
      success:function(data){
        $('#panel_listado_carrito_orden_trabajo').html(data).fadeIn('slow');
        $('#loader').html('');
      }
    })
  }


 function btn_eliminar_carrito_orden_trabajo()
 {  
    var ID_carrito_orden_trabajo = $('#ID_contenido').val();
    $('#ID_eliminar_carrito_orden_trabajo').val(ID_carrito_orden_trabajo);
 }

 function btn_borrar_carrito_orden_trabajo()
  {  
     var ID_carrito_orden_trabajo = $('#ID_eliminar_carrito_orden_trabajo').val();
     var parametros = {ID_carrito_orden_trabajo:ID_carrito_orden_trabajo};
    
     $.ajax({
      type: 'POST',
      url:'../modelo/modelo_eliminar_carrito_orden_trabajo.php',
      data: parametros,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#panel_eliminar_carrito_orden_trabajo').html(data).fadeIn('slow');
        
        setTimeout(function(){
          $('#myModal_Eliminar').modal('hide').fadeIn('slow');
        },2000);

      }
    });
  }

  function actualizar_datos_carrito_orden_trabajo_eliminar()
  {  
     $('#respuesta_eliminar_total_carrito_orden_trabajo').html('').fadeIn('slow');
     
  }

  function actualizar_y_salir()
  {
    setTimeout(function(){ cargar_datos(1); },1000);
  }

