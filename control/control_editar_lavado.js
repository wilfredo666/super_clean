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
                $('#img_lavado').val(datos);
                mostrar_archivo();
            }
        });
    });
          

    function mostrar_archivo()
    {
        var archivo = $('#img_lavado').val();
        var cadena ="<div style='width: 100%; padding-top: 2%;'><center><img src='../multimedia/imagenes/"+archivo+"' style='width: 70%; height: 150px; box-shadow: 1px 1px 1px 2px #A4A4A4;'></center></div>";
        $('#resp_img_lavado').html(cadena);
         
      }

  function btn_opciones(ID_lavado)
  {
    $('#ID_contenido').val(ID_lavado);
  }
  
  //FUNCION PARA EXAMIANAR LOS DATOS

  function btn_ver_lavado()
  {
   var ID_lavado = $('#ID_contenido').val();
   var ob ={ID_lavado:ID_lavado};
   
   $.ajax({
                type: 'POST',
                url:'../vista/vista_examinar_lavado.php',
                data: ob,
                beforeSend: function(objeto){
              
                },
                success: function(data)
                { 
                 $('#panel_examinar_lavado').html(data);
                }
             });
   }

  
  //FUNCION DE EDICION DE LOS DATOS DEL MODELO

  function btn_editar_lavado()
  { 
     var ID_lavado = $('#ID_contenido').val();

     var obj = {ID_lavado:ID_lavado};
    
    $.ajax({
      type: 'POST',
      url: '../vista/vista_editar_lavado.php',
      data: obj,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#panel_edicion_lavado').html(data).fadeIn('slow');
      }
    });

  }

  function btn_guardar_cambios_lavado()
  {
    var ID_lavado =$('#ID_lavado_edicion').val(); 
    var id_usuario = $('#id_usuario').val();
    var id_cliente = $('#id_cliente').val();
    var cliente = $('#cliente').val();
    var id_sucursal = $('#id_sucursal').val();
    var id_ot = $('#id_ot').val();
    var codigo_ot = $('#codigo_ot').val();
    var tipo_lavado = $('#tipo_lavado').val();
    var estado_lavado = $('#estado_lavado').val();
    var codigo_tikeo = $('#codigo_tikeo').val();
    var id_prenda = $('#id_prenda').val();
    
    var obj = {ID_lavado: ID_lavado,
    id_usuario: id_usuario,
    id_cliente: id_cliente,
    cliente: cliente,
    id_sucursal: id_sucursal,
    id_ot: id_ot,
    codigo_ot: codigo_ot,
    tipo_lavado: tipo_lavado,
    estado_lavado: estado_lavado,
    codigo_tikeo: codigo_tikeo,
    id_prenda: id_prenda};
     
    $.ajax({
      type: 'POST',
      url:'../modelo/modelo_guardar_lavado.php',
      data: obj,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#respuesta_guardar_cambios_lavado').html(data).fadeIn('slow');
        
        setTimeout(function(){
          $('#myModal_Edicion').modal('hide').fadeIn('slow');
        },2000);

      }
    });

  }
  

  function actualizar_datos_lavado_editar()
  {  $('#myModal').modal('hide').fadeIn('slow');
     $('#respuesta_guardar_cambios_lavado').html('').fadeIn('slow');
     //location.reload();
     window.setTimeout('cargar_datos(1)',1000);
  }

 function cargar_datos(page){
    var id_usuario = $("#id_usuario_sesion").val();
    var parametros = {'action':'ajax','page':page,id_usuario:id_usuario};
     
    $.ajax({
      type : 'POST',
      url:'../modelo/modelo_listar_lavado.php',
      data: parametros,
      beforeSend: function(objeto){
       $('#panel_listado_lavado').html('cargando .... ');
      },
      success:function(data){
       $('#panel_listado_lavado').html(data).fadeIn('slow');  
      }
    });
 }


 function btn_eliminar_lavado()
 {  
    var ID_lavado = $('#ID_contenido').val();
    $('#ID_eliminar_lavado').val(ID_lavado);
 }

 function btn_borrar_lavado()
  {  
     var id_lavado = $('#ID_eliminar_lavado').val();
     var parametros = {id_lavado:id_lavado,tipo:"TODOS"};
    
     $.ajax({
      type: 'POST',
      url:'../modelo/modelo_eliminar_lavado.php',
      data: parametros,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#panel_eliminar_lavado').html(data).fadeIn('slow');
        
        setTimeout(function(){
          $('#myModal_Eliminar').modal('hide').fadeIn('slow');
        },2000);

      }
    });
  }

  function actualizar_datos_lavado_eliminar()
  {  
     $('#respuesta_eliminar_total_lavado').html('').fadeIn('slow');
     
  }

  function actualizar_y_salir()
  {
    setTimeout(function(){ cargar_datos(1); },1000);
  }


//funcion de edicion de lavado 

function btn_editar_prenda_lavado(id_lavado)
{
     var tipo_lavado = $("#tipo_lavado_"+id_lavado).val();
     var obj = {id_lavado:id_lavado, tipo_lavado:tipo_lavado };
     
     $.ajax({
      type: 'POST',
      url:'../modelo/modelo_guardar_lavado.php',
      data: obj,
      beforeSend: function(objeto){
          $('#mensaje_edicion_lavado').html("<div> cargando ... </div>");
      },
      success:function(data){
          $('#mensaje_edicion_lavado').html(data).fadeIn('slow');
          
          setTimeout(function(){
           $('#mensaje_edicion_lavado').html("").fadeIn('slow');
          },2000);

          setTimeout(function(){
           btn_editar_lavado();
          },3000);

      }
    });
}


function btn_eliminar_prenda_lavado(id_lavado)
{
     var obj = {id_lavado:id_lavado, tipo:"SIMPLE" };
     
     $.ajax({
      type: 'POST',
      url:'../modelo/modelo_eliminar_lavado.php',
      data: obj,
      beforeSend: function(objeto){
        $('#mensaje_edicion_lavado').html("<div> cargando ... </div>");
      },
      success:function(data){
          $('#mensaje_edicion_lavado').html(data).fadeIn('slow');
          
          setTimeout(function(){
           $('#mensaje_edicion_lavado').html("").fadeIn('slow');
          },2000);

          setTimeout(function(){
           btn_editar_lavado();
          },3000);

      }
    });
}

function btn_agregar_edicion_prenda_lavado(codigo_lav)
{
    $('#myModal_Nuevo_Lavado').modal({ show: 'true' }); 

    var obj =  {codigo_lav:codigo_lav};
     
     $.ajax({
      type: 'POST',
      url:'../vista/vista_agregar_prenda_edicion_lavado.php',
      data: obj,
      beforeSend: function(objeto){
        $('#panel_agregar_prenda_lavado').html("<div> cargando ... </div>");
      },
      success:function(data){

        $('#panel_agregar_prenda_lavado').html(data).fadeIn('slow');
        setTimeout(function(){ $("#codigo_barras").focus(); },1000);
      
      }
    });
  
}

function btn_select_tipo_lavado(opcion)
{
  $("#tipo_lavado").val(opcion);
  if (opcion==1)
  {
   $("#mensaje_resp_tipo_lavado").html('<label style="color:green"> LAVADO SECO </label>');
  }
  if (opcion==2) {
    $("#mensaje_resp_tipo_lavado").html('<label style="color:green"> LAVADO VAPOR </label>');
  }
}

function btn_registrar_prenda_lavado_editar()
{
  var tipo_lavado = $("#tipo_lavado").val();
  var codigo_lavado = $("#codigo_lavado").val();
  var codigo_barras = $("#codigo_barras").val();

  //alert(tipo_lavado +" - "+ codigo_lavado +" - "+ codigo_barras );

  if (tipo_lavado!=""){
     
     var obj = { codigo_lavado:codigo_lavado, codigo_barras:codigo_barras, 
     tipo_lavado:tipo_lavado};
     
     $.ajax({
      type: 'POST',
      url:'../modelo/modelo_agregar_prenda_edicion_lavado.php',
      data: obj,
      beforeSend: function(objeto){
        $('#panel_resp_registro_prenda_lavado').html("<div> cargando ... </div>");
      },
      success:function(data){
        $('#panel_resp_registro_prenda_lavado').html(data).fadeIn('slow');

      }
    });

  }
  else{
    alert("Deve seleccionar una opcion de lavado");
  }

}

function btn_imprimir_lav_listado()
{
   var codigo_lav = $("#ID_contenido").val();
    
   window.open("../vista/impresion_list_lav.php?codigo_lav="+codigo_lav+"", '_blank');
}