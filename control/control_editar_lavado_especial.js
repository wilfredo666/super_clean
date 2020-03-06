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
                $('#img_lavado_especial').val(datos);
                mostrar_archivo();
            }
        });
    });
          

    function mostrar_archivo()
    {
        var archivo = $('#img_lavado_especial').val();
        var cadena ="<div style='width: 100%; padding-top: 2%;'><center><img src='../multimedia/imagenes/"+archivo+"' style='width: 70%; height: 150px; box-shadow: 1px 1px 1px 2px #A4A4A4;'></center></div>";
        $('#resp_img_lavado_especial').html(cadena);
         
      }

  function btn_opciones(ID_lavado_especial)
  {
    $('#ID_contenido').val(ID_lavado_especial);
  }
  
  //FUNCION PARA EXAMIANAR LOS DATOS

  function btn_ver_lavado_especial()
  {
   var ID_lavado_especial = $('#ID_contenido').val();
   var ob ={ID_lavado_especial:ID_lavado_especial};
   
   $.ajax({
                type: 'POST',
                url:'../vista/vista_examinar_lavado_especial.php',
                data: ob,
                beforeSend: function(objeto){
              
                },
                success: function(data)
                { 
                 $('#panel_examinar_lavado_especial').html(data);
                }
             });
   }

  
  //FUNCION DE EDICION DE LOS DATOS DEL MODELO

  function btn_editar_lavado_especial()
  { 
     var ID_lavado_especial = $('#ID_contenido').val();

     var obj = {ID_lavado_especial:ID_lavado_especial};
    
    $.ajax({
      type: 'POST',
      url: '../vista/vista_editar_lavado_especial.php',
      data: obj,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#panel_edicion_lavado_especial').html(data).fadeIn('slow');
      }
    });

  }

  function btn_guardar_cambios_lavado_especial()
  {
    var ID_lavado_especial =$('#ID_lavado_especial_edicion').val(); 
    var cliente = $('#cliente').val();
    var id_cliente = $('#id_cliente').val();
    var prenda = $('#prenda').val();
    var id_prenda = $('#id_prenda').val();
    var medida = $('#medida').val();
    var total = $('#total').val();
    var pago = $('#pago').val();
    var saldo = $('#saldo').val();
    var id_usuario = $('#id_usuario').val();
    var fecha = $('#fecha').val();
    var hora = $('#hora').val();
    var codigo = $('#codigo').val();
    
    var obj = {ID_lavado_especial: ID_lavado_especial,
    cliente: cliente,
    id_cliente: id_cliente,
    prenda: prenda,
    id_prenda: id_prenda,
    medida: medida,
    total: total,
    pago: pago,
    saldo: saldo,
    id_usuario: id_usuario,
    fecha: fecha,
    hora: hora,
    codigo: codigo};
     
    $.ajax({
      type: 'POST',
      url:'../modelo/modelo_guardar_lavado_especial.php',
      data: obj,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#respuesta_guardar_cambios_lavado_especial').html(data).fadeIn('slow');
        
        setTimeout(function(){
          $('#myModal_Edicion').modal('hide').fadeIn('slow');
        },2000);

      }
    });

  }
  

  function actualizar_datos_lavado_especial_editar()
  {  $('#myModal').modal('hide').fadeIn('slow');
     $('#respuesta_guardar_cambios_lavado_especial').html('').fadeIn('slow');
     //location.reload();
     window.setTimeout('cargar_datos(1)',1000);
  }

 
  function cargar_datos(page){
    var id_usuario = $("#id_usuario_sesion").val();
    var parametros = {'action':'ajax','page':page,id_usuario:id_usuario};
    
    $.ajax({
      type:'POST',
      url:'../modelo/modelo_listar_lavado_especial.php',
      data: parametros,
       beforeSend: function(objeto){
       $('#loader').html('cargando .... ');
      },
      success:function(data){
        $('#panel_listado_lavado_especial').html(data).fadeIn('slow');
        $('#loader').html('');
      }
    });
  }
 
 function btn_eliminar_lavado_especial()
 {  
    var ID_lavado_especial = $('#ID_contenido').val();
    $('#ID_eliminar_lavado_especial').val(ID_lavado_especial);
 }

 function btn_borrar_lavado_especial()
  {  
     var ID_lavado_especial = $('#ID_eliminar_lavado_especial').val();
     var parametros = {ID_lavado_especial:ID_lavado_especial};
    
     $.ajax({
      type: 'POST',
      url:'../modelo/modelo_eliminar_lavado_especial.php',
      data: parametros,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#panel_eliminar_lavado_especial').html(data).fadeIn('slow');
        
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

  function actualizar_datos_lavado_especial_eliminar()
  {  
     $('#respuesta_eliminar_total_lavado_especial').html('').fadeIn('slow');
     
  }

  function actualizar_y_salir()
  {
    setTimeout(function(){ cargar_datos(1); },1000);
  }

  function btn_cobrar_lavado_especial()
  {
    var ID_contenido = $("#ID_contenido").val();
    var ob = {codigo : ID_contenido };
    
    $.ajax({
      type: 'POST',
      url:'../vista/vista_cobrar_lavado_especial.php',
      data: ob,
      beforeSend: function(objeto){
        $('#panel_cobrar_lavado_especial').html('cargando... ');
      },
      success:function(data){
        $('#panel_cobrar_lavado_especial').html(data);
      }
    });
  }

var lista_cobro = [];

function cobro_lavado(id_lavado,costo)
{
  this.id_lavado = id_lavado;
  this.costo = costo;
}

function btn_calcular_medida(id_lavado)
{
  //alert(lista_cobro.length);
  var total = 0;
 
  for (var i = 0; i < lista_cobro.length; i++) {
    var id_lavado = lista_cobro[i].id_lavado;
    var medida = $('#medida_'+id_lavado).val();
    var costo = lista_cobro[i].costo;

    if (medida=="") { medida=0; }
    if (costo=="") { costo=0; }

    var operacion = parseFloat(medida)*parseFloat(costo);
    total = total + operacion;
    btn_actualizar_prenda_le(id_lavado,medida);
  }

  $("#total").val(total);
  btn_calcular_total();
}

function btn_calcular_total()
{ var total = $("#total").val();
  var pago = $("#pago").val();
  var saldo = $("#saldo").val();

  if (pago=="") { pago=0; }
  if (saldo=="") { saldo=0; }

  var operacion = parseFloat(total) - parseFloat(pago);

  if (operacion>0)
  {
    $("#saldo").val(operacion);
  }
  else
  { operacion = operacion*(-1);
    $("#cambio").val(operacion);
    $("#saldo").val(0);
  }
}

function btn_registrar_cobro_le()
{
  var codigo = $("#codigo").val();
  var total = $("#total").val();
  var pago  = $("#pago").val();
  var saldo = $("#saldo").val();
  var id_usuario = $("#id_usuario_sesion").val();
 
  var ob = {id_usuario:id_usuario, codigo:codigo, 
  total:total, pago:pago, saldo:saldo };
    
    $.ajax({
      type: 'POST',
      url:'../modelo/modelo_registrar_cobro_lavado_especial.php',
      data: ob,
      beforeSend: function(objeto){
        $('#panel_resultado_cobro_le').html('cargando... ');
      },
      success:function(data){
        $('#panel_resultado_cobro_le').html(data);
        
        setTimeout(function(){
         $("#myModal_Cobrar").modal('hide');
        },1000);

        setTimeout(function(){
         $("#myModal_opciones").modal('hide');
        },1500);

        setTimeout(function(){
          cargar_datos(1);
        },2000);

        setTimeout(function(){
        var url = '../vista/vista_imprimir_lavado_especial.php?codigo='+codigo;
        window.open(url, '_blank'); },2500);


      }
    });

}

function btn_actualizar_prenda_le(id_lavado,medida)
{
    var ob = {opcion:'editar_le', id_lavado:id_lavado, medida:medida };
    
    $.ajax({
      type: 'POST',
      url:'../modelo/modelo_operaciones_lavado_especial.php',
      data: ob,
      beforeSend: function(objeto){
        $('#panel_resultado_cobro_le').html('cargando... ');
      },
      success:function(data){
        $('#panel_resultado_cobro_le').html(data);
      }
    });

}

function btn_imprimir_nota_le()
{
  var codigo = $("#ID_contenido").val();
  var url = "../vista/vista_imprimir_lavado_especial.php?codigo="+codigo;
  window.open(url, '_blank'); 
}

function btn_agregar_edicion_LE(codigo)
{
    $('#myModal_Agregar_edicion').modal('show');
    var ob = {opcion:'mostrar_agregar', codigo:codigo };
    
    $.ajax({
      type: 'POST',
      url:'../modelo/modelo_operaciones_lavado_especial.php',
      data: ob,
      beforeSend: function(objeto){
        $('#panel_agregar_edicion_lavado_especial').html('cargando... ');
      },
      success:function(data){
        $('#panel_agregar_edicion_lavado_especial').html(data);
      }
    });
}

function btn_buscar_agregar_prenda_LE()
{
  var txt_buscar = $("#txt_buscar_prenda").val();
  

   var ob = {opcion:'buscar_prenda_le', txt_buscar:txt_buscar};
    
    $.ajax({
      type: 'POST',
      url:'../modelo/modelo_operaciones_lavado_especial.php',
      data: ob,
      beforeSend: function(objeto){
        $('#resp_prenda_le').html('cargando... ');
      },
      success:function(data){
        $('#resp_prenda_le').html(data);
      }
    });
}

function btn_elegir_prenda_le(id_prenda,prenda)
{
  $("#id_prenda").val(id_prenda);
  $("#prenda").val(prenda);

  $("#txt_buscar_prenda").val(prenda);

  $("#resp_prenda_le").html("");
 
}

function btn_cerrar_select_prenda_pe()
{
  $("#id_prenda").val("");
  $("#prenda").val("");

  $("#txt_buscar_prenda").val("");
  $("#resp_prenda_le").html("");

}

function btn_agregar_edicion_le()
{
  var id_prenda = $("#id_prenda").val();
  var prenda = $("#prenda").val();
  var id_cliente = $("#id_cliente").val();
  var cliente = $("#cliente").val();
  var codigo = $("#codigo").val();

 
  var ob = {opcion:'registrar_prenda_le', id_prenda:id_prenda, prenda:prenda,
   id_cliente:id_cliente, cliente:cliente, codigo:codigo };
    
    $.ajax({
      type: 'POST',
      url:'../modelo/modelo_operaciones_lavado_especial.php',
      data: ob,
      beforeSend: function(objeto){
        $('#panel_resultado_registro_LE').html('cargando... ');
      },
      success:function(data){
        $('#panel_resultado_registro_LE').html(data);

        setTimeout(function(){
          $('#panel_resultado_registro_LE').html("");
        },1000);

        setTimeout(function(){
          $('#myModal_Agregar_edicion').modal('hide');
        },1500);

        setTimeout(function(){
           btn_actualizar_edicion_le(codigo);
        },2000);

      }
    });
 
}

function btn_actualizar_edicion_le(codigo)
{
    var obj = {ID_lavado_especial:codigo};
    
    $.ajax({
      type: 'POST',
      url: '../vista/vista_editar_lavado_especial.php',
      data: obj,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#panel_edicion_lavado_especial').html(data).fadeIn('slow');
      }
    });
}