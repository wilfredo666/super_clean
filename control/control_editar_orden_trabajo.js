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
                $('#img_orden_trabajo').val(datos);
                mostrar_archivo();
            }
        });
    });
          

    function mostrar_archivo()
    {
        var archivo = $('#img_orden_trabajo').val();
        var cadena ="<div style='width: 100%; padding-top: 2%;'><center><img src='../multimedia/imagenes/"+archivo+"' style='width: 70%; height: 150px; box-shadow: 1px 1px 1px 2px #A4A4A4;'></center></div>";
        $('#resp_img_orden_trabajo').html(cadena);
         
      }

  function btn_opciones(ID_orden_trabajo)
  {
    $('#ID_contenido').val(ID_orden_trabajo);
  }
  
  //FUNCION PARA EXAMIANAR LOS DATOS

  function btn_ver_orden_trabajo()
  {
   var ID_orden_trabajo = $('#ID_contenido').val();
   var ob ={ID_orden_trabajo:ID_orden_trabajo};
   
   $.ajax({
                type: 'POST',
                url:'../vista/orden_trabajo/vista_examinar_orden_trabajo.php',
                data: ob,
                beforeSend: function(objeto){
              
                },
                success: function(data)
                { 
                 $('#panel_examinar_orden_trabajo').html(data);
                }
             });
   }

  
  //FUNCION DE EDICION DE LOS DATOS DEL MODELO

  function btn_editar_orden_trabajo()
  { 
     var ID_orden_trabajo = $('#ID_contenido').val();

     var obj = {ID_orden_trabajo:ID_orden_trabajo};
    
    $.ajax({
      type: 'POST',
      url: '../vista/orden_trabajo/vista_editar_orden_trabajo.php',
      data: obj,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#panel_edicion_orden_trabajo').html(data).fadeIn('slow');
      }
    });

  }


  function cargar_datos(page){
    
    var id_usuario = $("#id_usuario_sesion").val();
    
    var obj = {'action':'ajax','page':page,id_usuario:id_usuario};
    
    $.ajax({
      type : 'POST',
      url:'../modelo/orden_trabajo/modelo_listar_orden_trabajo.php',
      data: obj,
       beforeSend: function(objeto){
        $('#panel_listado_orden_trabajo').html('cargando .... ');
      },
      success:function(data){
        $('#panel_listado_orden_trabajo').html(data).fadeIn('slow');
      }
    });
  }


 function btn_eliminar_orden_trabajo()
 {  
    var ID_orden_trabajo = $('#ID_contenido').val();
    $('#ID_eliminar_orden_trabajo').val(ID_orden_trabajo);
 }

 function btn_borrar_orden_trabajo()
 {  
     var codigo_ot = $('#ID_eliminar_orden_trabajo').val();
     var parametros = { codigo_ot:codigo_ot , tipo:"TODOS" };
    
     $.ajax({
      type: 'POST',
      url:'../modelo/orden_trabajo/modelo_eliminar_orden_trabajo_todo.php',
      data: parametros,
      beforeSend: function(objeto){
        $('#panel_eliminar_orden_trabajo').html("<div> Cargando... </div>");
      },
      success:function(data){
        $('#panel_eliminar_orden_trabajo').html(data).fadeIn('slow');
      }
     });
  }

  function actualizar_datos_orden_trabajo_eliminar()
  {  
     $('#respuesta_eliminar_total_orden_trabajo').html('').fadeIn('slow');  
  }

  function actualizar_y_salir()
  {
    setTimeout(function(){ cargar_datos(1); },1000);
  }

  function btn_editar_prenda_simple(id_ot)
  {
    var cantidad = $("#cantidad_"+id_ot+"").val();
    // alert("holas mundo XDD = "+id_ot+" - "+cantidad);

    var total = $("#total_aux").val();
    var pago = $("#pago_aux").val();
    var saldo = $("#saldo_aux").val();

    var ob = {id_ot:id_ot,cantidad:cantidad, total: total, pago: pago, saldo:saldo, tipo:"SIMPLE"};
    $.ajax({
      type: 'POST',
      url:'../modelo/orden_trabajo/modelo_guardar_cambios_orden_trabajo.php',
      data: ob,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#respuesta_guardar_cambios_orden_trabajo').html(data).fadeIn('slow');
        alert("Edicion Correcta");
        setTimeout(function(){
         btn_editar_orden_trabajo();
        },1000);

      }
    });


  }

  function btn_editar_prenda_kilo(id_ot)
  {
    var cantidad_kilo = $("#cantidad_kilo_"+id_ot+"").val();
    var peso_kilo = $("#peso_kilo_"+id_ot+"").val();

    //alert("holas mundo XDD = "+id_orden_trabajo+" - "+cantidad_kilo + " - " + peso_kilo);

    var total = $("#total_aux").val();
    var pago = $("#pago_aux").val();
    var saldo = $("#saldo_aux").val();

    var ob = {id_ot:id_ot,cantidad_kilo:cantidad_kilo, peso_kilo: peso_kilo,
              total: total, pago: pago, saldo:saldo, tipo:"KILO"};
    $.ajax({
      type: 'POST',
      url:'../modelo/orden_trabajo/modelo_guardar_cambios_orden_trabajo.php',
      data: ob,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#respuesta_guardar_cambios_orden_trabajo').html(data).fadeIn('slow');
       
        alert("Edicion Correcta");
        setTimeout(function(){
         btn_editar_orden_trabajo();
        },1000);

      }
    });
  }

  function btn_editar_prenda_metro(id_ot)
  {
    var cantidad_metro = $("#cantidad_metro_"+id_ot+"").val();
    var medida_metro = $("#medida_metro_"+id_ot+"").val();

    //alert("holas mundo XDD = "+id_orden_trabajo+" * "+cantidad_metro+" * "+medida_metro);

    var total = $("#total_aux").val();
    var pago = $("#pago_aux").val();
    var saldo = $("#saldo_aux").val();

    var ob = {id_ot:id_ot,cantidad_metro:cantidad_metro, medida_metro:medida_metro,
              total: total, pago: pago, saldo:saldo, tipo:"X_METRO"};
    $.ajax({
      type: 'POST',
      url:'../modelo/orden_trabajo/modelo_guardar_cambios_orden_trabajo.php',
      data: ob,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#respuesta_guardar_cambios_orden_trabajo').html(data).fadeIn('slow');
       
        alert("Edicion Correcta");
        setTimeout(function(){
         btn_editar_orden_trabajo();
        },1000);

      }
    });
  }

 //SUMA DE TOTALES DE ROPA EN LA EDICION

 function btn_cantidad_ropa_simple(id_ot)
 {
  var cantidad = $("#cantidad_"+id_ot+"").val();
  var costo_prenda = $("#costo_prenda").val();
  var suma = (cantidad * costo_prenda);
  suma = parseFloat(suma);

  var total = parseFloat($("#total").val());
  var nuevo_total = parseFloat(total+suma);

  var pago = $("#pago").val();
  var resta = parseFloat(nuevo_total - pago);

  $("#saldo_aux").val(resta);

  $("#total_aux").val(nuevo_total);

 }

 function btn_cantidad_ropa_kilo(id_ot)
 {
  var cantidad_kilo = $("#cantidad_kilo_"+id_ot+"").val();
  var peso_kilo = $("#peso_kilo_"+id_ot+"").val();
  var costo_kilo = $("#costo_kilo").val();
  var suma = (peso_kilo * costo_kilo);
  suma = parseFloat(suma);

  var total = parseFloat($("#total").val());
  var nuevo_total = parseFloat(total+suma);

  var pago = $("#pago").val();
  var resta = parseFloat(nuevo_total - pago);

  $("#saldo_aux").val(resta);

  $("#total_aux").val(nuevo_total);

 }

 function btn_cantidad_ropa_metro(id_ot)
 {
  var cantidad_metro = $("#cantidad_metro_"+id_ot+"").val();
  var medida_metro = $("#medida_metro_"+id_ot+"").val();
  var costo_metro = $("#costo_metro").val();
  
  var suma = (medida_metro * costo_metro * cantidad_metro);
  suma = parseFloat(suma);

  var total = parseFloat($("#total").val());
  var nuevo_total = parseFloat(total+suma);

  var pago = $("#pago").val();
  var resta = parseFloat(nuevo_total - pago);

  $("#saldo_aux").val(resta);

  $("#total_aux").val(nuevo_total);

 }

  function btn_prenda_eliminar_simple(id_ot)
  {
    var ob = {id_ot:id_ot, tipo:"SIMPLE"};
    $.ajax({
      type: 'POST',
      url:'../modelo/orden_trabajo/modelo_eliminar_orden_trabajo.php',
      data: ob,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#respuesta_guardar_cambios_orden_trabajo').html(data).fadeIn('slow');
       
        alert("Edicion Correcta");
        setTimeout(function(){
         btn_editar_orden_trabajo();
        },1000);
         
      }
    });
  }

  function btn_prenda_eliminar_kilo(id_ot)
  {
    var ob = {id_ot:id_ot, tipo:"KILO"};
    $.ajax({
      type: 'POST',
      url:'../modelo/orden_trabajo/modelo_eliminar_orden_trabajo.php',
      data: ob,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#respuesta_guardar_cambios_orden_trabajo').html(data).fadeIn('slow');
       
        alert("Edicion Correcta");
        setTimeout(function(){
         btn_editar_orden_trabajo();
        },1000);
        
      }
    });
  }

  function btn_prenda_eliminar_metro(id_ot)
  {
    var ob = {id_ot:id_ot, tipo:"X_METRO"};
    $.ajax({
      type: 'POST',
      url:'../modelo/orden_trabajo/modelo_eliminar_orden_trabajo.php',
      data: ob,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#respuesta_guardar_cambios_orden_trabajo').html(data).fadeIn('slow');
       
        alert("Edicion Correcta");
        setTimeout(function(){
         btn_editar_orden_trabajo();
        },1000);
         
      }
    });
  }

// Boton de Agregar Nueva Prenda Simple 

function btn_agregar_edicion_simple(codigo_ot)
{
    $('#Modal_Edicion_Agregar_Prenda_Simple').modal({
        show: 'true'
    }); 

    var ob = {codigo_ot:codigo_ot, tipo:"SIMPLE"};
    $.ajax({
      type: 'POST',
      url:'../vista/orden_trabajo/vista_editar_agregar_orden_trabajo_simple.php',
      data: ob,
      beforeSend: function(objeto){
        $('#panel_editar_prenda_simple').html("<div> Cargando ... </div>");
      },
      success:function(data){
        $('#panel_editar_prenda_simple').html(data).fadeIn('slow');
        
      }
    });
}

function btn_agregar_prenda_simple_edicion(codigo_ot, id_prenda)
{
  var cantidad = $("#cantidad_"+id_prenda).val();
  var precio = $("#precio_"+id_prenda).val();
  var suma = parseFloat(cantidad*precio);

  //alert(codigo_ot+" - "+ cantidad+" - "+precio+" = "+suma);

  var ob = { id_prenda: id_prenda, codigo_ot:codigo_ot, cantidad:cantidad, precio:precio, 
             suma:suma, tipo:"SIMPLE" };
    
  $.ajax({
      type: 'POST',
      url:'../modelo/orden_trabajo/modelo_editar_agregar_orden_trabajo_simple.php',
      data: ob,
      beforeSend: function(objeto){
        $('#mensaje_resp_agregar_prenda_simple_edicion').html("<div> Cargando ... </div>");
      },
      success:function(data){
        $('#mensaje_resp_agregar_prenda_simple_edicion').html(data).fadeIn('slow');
        
      }
  });

}

//Agregar Prendas por Kilo

function btn_agregar_edicion_kilo(codigo_ot)
{
  $('#Modal_Edicion_Agregar_Prenda_Kilo').modal({
     show: 'true'
  });

  var ob = {codigo_ot:codigo_ot, tipo:"KILO" };
    
  $.ajax({
      type: 'POST',
      url:'../vista/orden_trabajo/vista_editar_agregar_orden_trabajo_simple.php',
      data: ob,
      beforeSend: function(objeto){
        $('#panel_editar_prenda_kilo').html("<div> Cargando ... </div>");
      },
      success:function(data){
        $('#panel_editar_prenda_kilo').html(data).fadeIn('slow');
        
      }
  });

}

function btn_agregar_prenda_kilo_edicion(codigo_ot, id_prenda)
{
  var cantidad = $("#cantidad_"+id_prenda).val();
  var peso = $("#peso_"+id_prenda).val();
  var precio = $("#precio_"+id_prenda).val();
  var suma = parseFloat(cantidad*precio*peso);

  var ob = { id_prenda: id_prenda, codigo_ot:codigo_ot, cantidad:cantidad, precio:precio, 
             suma:suma, peso:peso, tipo:"KILO" };
    
  $.ajax({
      type: 'POST',
      url:'../modelo/orden_trabajo/modelo_editar_agregar_orden_trabajo_simple.php',
      data: ob,
      beforeSend: function(objeto){
        $('#mensaje_resp_agregar_prenda_kilo_edicion').html("<div> Cargando ... </div>");
      },
      success:function(data){
        $('#mensaje_resp_agregar_prenda_kilo_edicion').html(data).fadeIn('slow');
        
      }
  });

}


function btn_agregar_edicion_metro(codigo_ot)
{
  $('#Modal_Edicion_Agregar_Prenda_Metro').modal({
     show: 'true'
  });

  var ob = {codigo_ot:codigo_ot, tipo:"X_METRO" };
    
  $.ajax({
      type: 'POST',
      url:'../vista/orden_trabajo/vista_editar_agregar_orden_trabajo_simple.php',
      data: ob,
      beforeSend: function(objeto){
        $('#panel_editar_prenda_metro').html("<div> Cargando ... </div>");
      },
      success:function(data){
        $('#panel_editar_prenda_metro').html(data).fadeIn('slow');
        
      }
  });

}

function btn_agregar_prenda_medida_edicion(codigo_ot, id_prenda)
{
  var cantidad = $("#cantidad_"+id_prenda).val();
  var medida = $("#medida_"+id_prenda).val();
  var precio = $("#precio_"+id_prenda).val();
  var suma = parseFloat(cantidad*precio*medida);

  var ob = { id_prenda: id_prenda, codigo_ot:codigo_ot, cantidad:cantidad, precio:precio, 
             suma:suma, medida:medida, tipo:"X_METRO" };
    
  $.ajax({
      type: 'POST',
      url:'../modelo/orden_trabajo/modelo_editar_agregar_orden_trabajo_simple.php',
      data: ob,
      beforeSend: function(objeto){
        $('#mensaje_resp_agregar_prenda_kilo_edicion').html("<div> Cargando ... </div>");
      },
      success:function(data){
        $('#mensaje_resp_agregar_prenda_kilo_edicion').html(data).fadeIn('slow');
        
      }
  });

}


//cierre de modals 

function btn_cerrar_modal_edicion_simple()
{
  $('#Modal_Edicion_Agregar_Prenda_Simple').modal("hide");
}

function btn_imprimir_ot_listado()
{
   var codigo_ot = $("#ID_contenido").val();
   window.open("../vista/orden_trabajo/impresion_list_ot.php?codigo_ot="+codigo_ot+"", '_blank');
}