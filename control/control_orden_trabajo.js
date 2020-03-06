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

    function btn_mostrar_registro()
    {
     var obj = '';
    
     $.ajax({
      type: 'POST',
      url:'../vista/orden_trabajo/vista_orden_trabajo.php',
      data: obj,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#panel_registro_orden_trabajo').html(data).fadeIn('slow');
      }
    });
    }

    function btn_registro_orden_trabajo(){
      
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
         var ob = {id_usuario : id_usuario,id_sucursal : id_sucursal,id_cliente : id_cliente,cliente : cliente,ci_nit : ci_nit,id_prenda : id_prenda,id_tipo_lavado : id_tipo_lavado,cantidad_prenda : cantidad_prenda,cantidad_peso : cantidad_peso,medida_prenda : medida_prenda,costo_prenda : costo_prenda,costo_kilo : costo_kilo,costo_metro : costo_metro,total_servicio : total_servicio,pago_servicio : pago_servicio,saldo_servicio : saldo_servicio,moneda : moneda,descuento : descuento,tipo_cliente : tipo_cliente,estado : estado,codigo_ot : codigo_ot};
    
         if(id_usuario !='' && id_sucursal !='' && id_cliente !='' && cliente !='' && ci_nit !='' && id_prenda !='' && id_tipo_lavado !='' && cantidad_prenda !='' && cantidad_peso !='' && medida_prenda !='' && costo_prenda !='' && costo_kilo !='' && costo_metro !='' && total_servicio !='' && pago_servicio !='' && saldo_servicio !='' && moneda !='' && descuento !='' && tipo_cliente !='' && estado !='' && codigo_ot !='' ){ 

                $.ajax({
                type: 'POST',
                url:'../modelo/orden_trabajo/modelo_registrar_orden_trabajo.php',
                data: ob,
                beforeSend: function(objeto){
              
                },
                success: function(data)
                { 
                 //alert(data);
                 $('#resultado_registro_orden_trabajo').html(data);
                // setTimeout(limpiar_orden_trabajo,1000);

                 
                  $('#id_usuario').val('');
                  $('#id_sucursal').val('');
                  $('#id_cliente').val('');
                  $('#cliente').val('');
                  $('#ci_nit').val('');
                  $('#id_prenda').val('');
                  $('#id_tipo_lavado').val('');
                  $('#cantidad_prenda').val('');
                  $('#cantidad_peso').val('');
                  $('#medida_prenda').val('');
                  $('#costo_prenda').val('');
                  $('#costo_kilo').val('');
                  $('#costo_metro').val('');
                  $('#total_servicio').val('');
                  $('#pago_servicio').val('');
                  $('#saldo_servicio').val('');
                  $('#moneda').val('');
                  $('#descuento').val('');
                  $('#tipo_cliente').val('');
                  $('#estado').val('');
                  $('#codigo_ot').val('');
                 
                  setTimeout(function(){
                    $('#resultado_registro_orden_trabajo').html('');
                  },1000);

                  setTimeout(function(){
                   $('#myModal_Registrar').modal('hide').fadeIn('slow');
                  },2000);

                  setTimeout(function(){
                   cargar_datos(1);
                  },3000);

                }
             });
           } 
     else{ 
     
      if (id_usuario ==''){ $('#id_usuario').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de id_usuario </label>';
      $('#resp_id_usuario').html(res);}
      if (id_sucursal ==''){ $('#id_sucursal').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de id_sucursal </label>';
      $('#resp_id_sucursal').html(res);}
      if (id_cliente ==''){ $('#id_cliente').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de id_cliente </label>';
      $('#resp_id_cliente').html(res);}
      if (cliente ==''){ $('#cliente').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de cliente </label>';
      $('#resp_cliente').html(res);}
      if (ci_nit ==''){ $('#ci_nit').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de ci_nit </label>';
      $('#resp_ci_nit').html(res);}
      if (id_prenda ==''){ $('#id_prenda').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de id_prenda </label>';
      $('#resp_id_prenda').html(res);}
      if (id_tipo_lavado ==''){ $('#id_tipo_lavado').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de id_tipo_lavado </label>';
      $('#resp_id_tipo_lavado').html(res);}
      if (cantidad_prenda ==''){ $('#cantidad_prenda').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de cantidad_prenda </label>';
      $('#resp_cantidad_prenda').html(res);}
      if (cantidad_peso ==''){ $('#cantidad_peso').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de cantidad_peso </label>';
      $('#resp_cantidad_peso').html(res);}
      if (medida_prenda ==''){ $('#medida_prenda').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de medida_prenda </label>';
      $('#resp_medida_prenda').html(res);}
      if (costo_prenda ==''){ $('#costo_prenda').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de costo_prenda </label>';
      $('#resp_costo_prenda').html(res);}
      if (costo_kilo ==''){ $('#costo_kilo').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de costo_kilo </label>';
      $('#resp_costo_kilo').html(res);}
      if (costo_metro ==''){ $('#costo_metro').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de costo_metro </label>';
      $('#resp_costo_metro').html(res);}
      if (total_servicio ==''){ $('#total_servicio').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de total_servicio </label>';
      $('#resp_total_servicio').html(res);}
      if (pago_servicio ==''){ $('#pago_servicio').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de pago_servicio </label>';
      $('#resp_pago_servicio').html(res);}
      if (saldo_servicio ==''){ $('#saldo_servicio').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de saldo_servicio </label>';
      $('#resp_saldo_servicio').html(res);}
      if (moneda ==''){ $('#moneda').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de moneda </label>';
      $('#resp_moneda').html(res);}
      if (descuento ==''){ $('#descuento').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de descuento </label>';
      $('#resp_descuento').html(res);}
      if (tipo_cliente ==''){ $('#tipo_cliente').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de tipo_cliente </label>';
      $('#resp_tipo_cliente').html(res);}
      if (estado ==''){ $('#estado').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de estado </label>';
      $('#resp_estado').html(res);}
      if (codigo_ot ==''){ $('#codigo_ot').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de codigo_ot </label>';
      $('#resp_codigo_ot').html(res);}} 
                    
      } 
    function limpiar_orden_trabajo()
    {
         $('#resultado_registro_orden_trabajo').html('');
         $('#resp_img_orden_trabajo').html('');
         $('#img_orden_trabajo').val('');
    }

    function validador_campo(campo,mensaje,cant_min)
    {   
      var cadena=$('#'+campo).val();
      var dimencion=cadena.length;
      
      if(dimencion<cant_min)
      { 
        $('#'+mensaje).html('<label style="color:red;"> min '+cant_min+' digitos ' + dimencion+'</label>');
        $('#'+campo).css('border-color','red');
  
      }
      
      else
         {     
           $('#'+campo).css('border-color','green');
           $('#'+mensaje).html('');
         }

       }

  //Validador de Caracteres en los campos

  function valida_numeros(e){
      tecla = (document.all) ? e.keyCode : e.which;
      //Tecla de retroceso para borrar, siempre la permite
      if (tecla == 8 ){ return true; }
      if (tecla == 9 ){ return true; }
      if (tecla == 0 ){ return true; }
      if (tecla == 13 ){ return true; }
      
      // Patron de entrada, en este caso solo acepta numeros
      patron =/[0-9-.]/;
      tecla_final = String.fromCharCode(tecla);
      return patron.test(tecla_final);
  }

  function valida_letras(e){
   key = e.keyCode || e.which;
   tecla = String.fromCharCode(key).toLowerCase();
   letras = ' áéíóúabcdefghijklmnñopqrstuvwxyz';
   especiales = [8,37,39,46,9]; tecla_especial = false;

   for(var i in especiales){ if(key == especiales[i]) { tecla_especial = true; break; } }
   
   if(letras.indexOf(tecla)==-1 && !tecla_especial){ return false; }
  }

  function valida_ambos(e){
   key = e.keyCode || e.which;
   tecla = String.fromCharCode(key).toLowerCase();
   letras = ' áéíóúabcdefghijklmnñopqrstuvwxyz1234567890.,@#-_/?:;';
   especiales = [8,37,39,46,9]; tecla_especial = false;

   for(var i in especiales){ if(key == especiales[i]) { tecla_especial = true; break; } }
   
   if(letras.indexOf(tecla)==-1 && !tecla_especial){ return false; }

  }

  //Validador de Correo Electronico 
  
    
  var noti_email=0; 
  function validador_correo(campo,mensaje,cant_min)
   {
      
    var email = $('#'+campo).val();
    var caract = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);

    if (caract.test(email) == false)
    {
        $('#'+mensaje).html("<label style='color:#EC7063;'> invalido </label>");
        noti_email++;
        return false;
    }
    else{$('#'+mensaje).html('valido').slideDown('slow');noti_email=0;
        return true;
       }
   }
   // MOSTRAR FECHA DE REGISTRO
   fecha();
  
  function fecha(){
    var f = new Date();
    $('#fecha').val(f.getDate() + '/' + (f.getMonth() +1) + '/' + f.getFullYear());
  }

   // MOSTRAR HORA DE REGISTRO 
  hora();
  function hora(){
    var f=new Date();
    var cad=f.getHours()+':'+f.getMinutes()+':'+f.getSeconds();
    $('#hora').val(cad);
    setTimeout('hora()',1000); 
  }

   // FUNCIONALIDADES DE LISTADO Y EDICION DE CADA AREA DE TRABAJO

  $(document).ready(function(){
    //cargar_datos(1);
    btn_listar_car_ot_general();
  });

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
  
 

  function cargar_datos_buscar(page)
  {
    var txt_buscar = $('#txt_buscar').val();
    
    if(txt_buscar==''){
      $('#resp_busqueda_orden_trabajo').html('<label style="color:red;"> !!Escribe en el campo para Buscar!! </label>');
    }

    else{
    $('#resp_busqueda_orden_trabajo').html('');

    var parametros = {'action':'ajax','page':page,'txt_buscar':txt_buscar};
    
    $('#loader').fadeIn('slow');
    
    $.ajax({
      url:'../modelo/orden_trabajo/modelo_buscar_orden_trabajo.php',
      data: parametros,
       beforeSend: function(objeto){
       $('#loader').html('cargando .... ');
      },
      success:function(data){
        $('#panel_listado_orden_trabajo').html(data).fadeIn('slow');
        $('#loader').html('');
      }
    });

    }
  } 


/* FUNCIONALIDADES DE REGISTRO DE PRENDAS SIMPLES DEL SISTEMA */

function btn_mostrar_registro_simple()
{
   var id_cliente = $("#id_cliente").val();

   if (id_cliente!="")
   {

    $('#myModal_Registrar_Simple').modal({ show: 'true'}); 
    var obj = '';
    
     $.ajax({
      type: 'POST',
      url:'../modelo/orden_trabajo/modelo_listar_prendas_simple.php',
      data: obj,
       beforeSend: function(objeto){
        $('#panel_registro_orden_trabajo_simple').html("<div id='load'> Cargando ... </div>")
      },
      success:function(data){
        $('#panel_registro_orden_trabajo_simple').html(data).fadeIn('slow');
        btn_listar_carrito_prenda_registrada();
      }
    });

   }
   else
   {
     alert("SELECCIONE UN CLIENTE");

   }
}

/* FUNCIONES DE CONTROL DE ORDEN DE TRABAJO */

function btn_agregar_prenda(id_prenda)
{
   var id_usuario  = $("#id_usuario_sesion").val();
   var id_sucursal  = $("#id_sucursal_sesion").val();
   var id_cliente  = $("#id_cliente").val();
  
   
   var obj = {id_prenda: id_prenda, id_usuario : id_usuario, id_sucursal : id_sucursal,
    id_cliente:id_cliente};
    
     $.ajax({
      type: 'POST',
      url:'../modelo/orden_trabajo/modelo_agregar_carrito_prendas_simple.php',
      data: obj,
       beforeSend: function(objeto){
        $('#panel_modal_carrito_orden_trabajo').html("<div id='load'> Cargando ... </div>")
      },
      success:function(data){

        $('#panel_modal_carrito_orden_trabajo').html(data).fadeIn('slow');

         setTimeout(function(){
          btn_listar_carrito_prenda_registrada();
         },0); 
      }
    });
}

function btn_listar_carrito_prenda_registrada()
{
   var id_usuario  = $("#id_usuario_sesion").val();
   var id_sucursal  = $("#id_sucursal_sesion").val();
   var id_cliente  = $("#id_cliente").val();
  
   var obj = {id_usuario : id_usuario, id_sucursal : id_sucursal,id_cliente:id_cliente};
    
   $.ajax({
      type: 'POST',
      url:'../modelo/orden_trabajo/modelo_listar_carrito_prendas_registradas.php',
      data: obj,
       beforeSend: function(objeto){
        $('#panel_modal_carrito_orden_trabajo').html("<div id='load'> Cargando ... </div>")
      },
      success:function(data){
        $('#panel_modal_carrito_orden_trabajo').html(data).fadeIn('slow');
      }
    });
 
}

/* FUNCIONES DEL CARRITO ELIMINAR */

function btn_quitar_prenda_carrito(id_ot)
{
   var obj = {id_ot : id_ot};
    
   $.ajax({
      type: 'POST',
      url: '../modelo/orden_trabajo/modelo_eliminar_carrito_orden_trabajo.php',
      data: obj,
      beforeSend: function(objeto){
        $('#mensaje_carrito_orden_trabajo').html("<div id='load'> Cargando ... </div>")
      },
      success:function(data){
        $('#mensaje_carrito_orden_trabajo').html(data).fadeIn('slow');
        
        setTimeout(function(){
          btn_listar_carrito_prenda_registrada();
           $('#mensaje_carrito_orden_trabajo').html("").fadeIn('slow');
         },0); 
      }
    });
}


/* FUNCIONALIDADES DE REGISTRO DE PRENDAS KILO DEL SISTEMA */

function btn_mostrar_registro_kilo()
{
  var id_cliente = $("#id_cliente").val();

  if(id_cliente!="")
  {
    $('#myModal_Registrar_Kilo').modal({ show: 'true'}); 
     var obj = '';
     $.ajax({
      type: 'POST',
      url:'../modelo/orden_trabajo/modelo_listar_prendas_kilo.php',
      data: obj,
       beforeSend: function(objeto){
        $('#panel_registro_orden_trabajo_kilo').html("<div id='load'> Cargando ... </div>")
      },
      success:function(data){
        $('#panel_registro_orden_trabajo_kilo').html(data).fadeIn('slow');
        btn_listar_carrito_prenda_kilo_registrada();
      }
    });
  }
  else
  {
    alert("SELECCIONE UN CLIENTE");
  }
}

function btn_seleccionar_prenda_kilo(id_prenda,img)
{
  $("#id_prenda_seleccionada").val(id_prenda);
  var img = "<img src='../multimedia/imagenes/"+img+"' style='width:100px; height:100px;'>";
  $("#mensaje_prenda_seleccionada").html("<center>"+img+"</br> <label> Prenda Seleccionada </label> </center>");
  $("#cantidad_ropa_kilo").focus();
}

function btn_agregar_prenda_kilo()
{
   var id_usuario = $("#id_usuario_sesion").val();
   var id_sucursal = $("#id_sucursal_sesion").val();
   var id_cliente = $("#id_cliente").val();
   var cantidad = $("#cantidad_ropa_kilo").val();
   var id_prenda = $("#id_prenda_seleccionada").val();
  

  if(id_prenda!="")
  {
   var obj = {id_prenda: id_prenda, id_usuario : id_usuario, id_sucursal : id_sucursal,
    id_cliente:id_cliente, cantidad : cantidad };
    
     $.ajax({
      type: 'POST',
      url:'../modelo/orden_trabajo/modelo_agregar_carrito_prendas_kilo.php',
      data: obj,
       beforeSend: function(objeto){
        $('#panel_modal_carrito_orden_trabajo_kilo').html("<div id='load'> Cargando ... </div>")
      },
      success:function(data){

        $('#panel_modal_carrito_orden_trabajo_kilo').html(data).fadeIn('slow');
        $("#cantidad_ropa_kilo").val("");
         setTimeout(function(){
          btn_listar_carrito_prenda_kilo_registrada();
         },0); 
      }
    });
  }
  else
  { 
    var mensaje = "Se Debe Seleccionar : ";
    if(id_prenda==""){ mensaje = mensaje+" Prenda, "; }
    if(cantidad=="" ){ mensaje = mensaje+" Cantidad "; }
    alert(mensaje);
  }

}


function btn_listar_carrito_prenda_kilo_registrada()
{

   var id_usuario  = $("#id_usuario_sesion").val();
   var id_sucursal  = $("#id_sucursal_sesion").val();
   var id_cliente  = $("#id_cliente").val();
  
   var obj = {id_usuario : id_usuario, id_sucursal : id_sucursal,id_cliente:id_cliente};
    
   $.ajax({
      type: 'POST',
      url:'../modelo/orden_trabajo/modelo_listar_carrito_prendas_kilo_registradas.php',
      data: obj,
       beforeSend: function(objeto){
        $('#panel_modal_carrito_orden_trabajo_kilo').html("<div id='load'> Cargando ... </div>")
      },
      success:function(data){
        $('#panel_modal_carrito_orden_trabajo_kilo').html(data).fadeIn('slow');
      }
    });
}

function btn_quitar_prenda_carrito_kilo(id_ot)
{
   var obj = {id_ot : id_ot};
    
   $.ajax({
      type: 'POST',
      url: '../modelo/orden_trabajo/modelo_eliminar_carrito_orden_trabajo.php',
      data: obj,
      beforeSend: function(objeto){
        $('#mensaje_carrito_orden_trabajo_kilo').html("<div id='load'> Cargando ... </div>")
      },
      success:function(data){
        $('#mensaje_carrito_orden_trabajo_kilo').html(data).fadeIn('slow');
        
        setTimeout(function(){
          btn_listar_carrito_prenda_kilo_registrada();
           $('#mensaje_carrito_orden_trabajo_kilo').html("").fadeIn('slow');
         },0); 
      }
    });
}

/* FUNCIONALIDADES DE ROPA POR METRO */

function btn_mostrar_registro_metro()
{
  var id_cliente = $("#id_cliente").val();

  if(id_cliente!="")
  {
    $('#myModal_Registrar_Metro').modal({ show: 'true'}); 
     var obj = '';
     $.ajax({
      type: 'POST',
      url:'../modelo/orden_trabajo/modelo_listar_prendas_metro.php',
      data: obj,
       beforeSend: function(objeto){
        $('#panel_registro_orden_trabajo_metro').html("<div id='load'> Cargando ... </div>")
      },
      success:function(data){
        $('#panel_registro_orden_trabajo_metro').html(data).fadeIn('slow');
        btn_listar_carrito_prenda_metro_registrada();
      }
    });
  }
  else
  {
    alert("SELECCIONE UN CLIENTE");
  }

}

function btn_listar_carrito_prenda_metro_registrada()
{
   var id_usuario  = $("#id_usuario_sesion").val();
   var id_sucursal  = $("#id_sucursal_sesion").val();
   var id_cliente  = $("#id_cliente").val();
  
   var obj = {id_usuario : id_usuario, id_sucursal : id_sucursal,id_cliente:id_cliente};
    
   $.ajax({
      type: 'POST',
      url:'../modelo/orden_trabajo/modelo_listar_carrito_prendas_metro_registradas.php',
      data: obj,
       beforeSend: function(objeto){
        $('#panel_modal_carrito_orden_trabajo_metro').html("<div id='load'> Cargando ... </div>")
      },
      success:function(data){
        $('#panel_modal_carrito_orden_trabajo_metro').html(data).fadeIn('slow');
      }
    });
}

function btn_quitar_prenda_carrito_metro(id_ot)
{

  var obj = {id_ot : id_ot};
    
   $.ajax({
      type: 'POST',
      url: '../modelo/orden_trabajo/modelo_eliminar_carrito_orden_trabajo.php',
      data: obj,
      beforeSend: function(objeto){
        $('#mensaje_carrito_orden_trabajo_kilo').html("<div id='load'> Cargando ... </div>")
      },
      success:function(data){
        $('#mensaje_carrito_orden_trabajo_kilo').html(data).fadeIn('slow');
        
        setTimeout(function(){
          btn_listar_carrito_prenda_kilo_registrada();
           $('#mensaje_carrito_orden_trabajo_kilo').html("").fadeIn('slow');
         },0); 
      }
    });
}

function btn_seleccionar_prenda_metro(id_prenda, img)
{
  $("#id_prenda_seleccionada").val(id_prenda);
  
  var imagen = "<img src='../multimedia/imagenes/"+img+"' style='width:100px; height:100px;'>";
  
  $("#mensaje_prenda_seleccionada_metro").html("<center>"+imagen+"</br> <label> Prenda Seleccionada </label> </center>");
  
  $("#medida_ropa_metro").focus();

}

function btn_agregar_prenda_metro()
{
   var id_usuario = $("#id_usuario_sesion").val();
   var id_sucursal = $("#id_sucursal_sesion").val();
   var id_cliente = $("#id_cliente").val();
   var cantidad = $("#medida_ropa_metro").val();
   var id_prenda = $("#id_prenda_seleccionada").val();
  

  if(id_prenda!="")
  {
   var obj = {id_prenda: id_prenda, id_usuario : id_usuario, id_sucursal : id_sucursal,
    id_cliente:id_cliente, cantidad : cantidad };
    
     $.ajax({
      type: 'POST',
      url:'../modelo/orden_trabajo/modelo_agregar_carrito_prendas_metro.php',
      data: obj,
       beforeSend: function(objeto){
        $('#panel_modal_carrito_orden_trabajo_metro').html("<div id='load'> Cargando ... </div>")
      },
      success:function(data){

        $('#panel_modal_carrito_orden_trabajo_metro').html(data).fadeIn('slow');
        $("#medida_ropa_metro").val("");
         
         setTimeout(function(){
          btn_listar_carrito_prenda_metro_registrada();
         },0);
         
      }
    });
  }
  else
  { 
    var mensaje = "Se Debe Seleccionar : ";
    if(id_prenda==""){ mensaje = mensaje+" Prenda, "; }
    if(cantidad=="" ){ mensaje = mensaje+" Medida "; }
    alert(mensaje);
  }
  
}

function btn_quitar_prenda_carrito_metro(id_ot)
{

  var obj = {id_ot : id_ot};
    
   $.ajax({
      type: 'POST',
      url: '../modelo/orden_trabajo/modelo_eliminar_carrito_orden_trabajo.php',
      data: obj,
      beforeSend: function(objeto){
        $('#mensaje_carrito_orden_trabajo_metro').html("<div id='load'> Cargando ... </div>")
      },
      success:function(data){
        $('#mensaje_carrito_orden_trabajo_metro').html(data).fadeIn('slow');
        
        setTimeout(function(){
          btn_listar_carrito_prenda_metro_registrada();
           $('#mensaje_carrito_orden_trabajo_metro').html("").fadeIn('slow');
         },0); 
      }
    });
}


/* FUNCIONALIDAD PARA EL REGISTRO DE CLIENTES NUEVOS */

function btn_mostrar_registro_cliente()
{
     var obj = '';
    
     $.ajax({
      type: 'POST',
      url:'../vista/vista_cliente.php',
      data: obj,
       beforeSend: function(objeto){
      },
      success:function(data){
      $('#panel_registro_nuevo_cliente').html(data).fadeIn('slow');
      }
    });
}

function btn_registro_cliente_orden_trabajo(){
      
         var nombres = $('#nombres').val(); 
         var apellidos = $('#apellidos').val(); 
         var ci_nit = $('#ci_nit').val(); 
         var celular = $('#celular').val(); 
         var telefono = $('#telefono').val(); 
         var email = $('#email').val(); 
         var descuento = $('#descuento').val(); 
         var sexo = $('#sexo').val(); 
         var tipo = $('#tipo').val(); 

         var ob = {nombres : nombres,apellidos : apellidos,ci_nit : ci_nit,celular : celular,
         telefono : telefono,email : email,descuento : descuento,sexo : sexo, tipo:tipo };
    
         if(ci_nit !='' && celular !='' && descuento !='' && sexo !='' )
         { 

                $.ajax({
                type: 'POST',
                url:'../modelo/orden_trabajo/modelo_registrar_cliente.php',
                data: ob,
                beforeSend: function(objeto){
              
                },
                success: function(data)
                { 
                  $('#resultado_registro_cliente').html(data);
 
                }
             });
           } 
     else{ 
     
      if (nombres ==''){ $('#nombres').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de nombres </label>';
      $('#resp_nombres').html(res);}
      if (apellidos ==''){ $('#apellidos').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de apellidos </label>';
      $('#resp_apellidos').html(res);}
      if (ci_nit ==''){ $('#ci_nit').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de ci/nit </label>';
      $('#resp_ci_nit').html(res);}
      if (celular ==''){ $('#celular').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de celular </label>';
      $('#resp_celular').html(res);}
      if (telefono ==''){ $('#telefono').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de telefono </label>';
      $('#resp_telefono').html(res);}
      if (email ==''){ $('#email').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de email </label>';
      $('#resp_email').html(res);}
      if (descuento ==''){ $('#descuento').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de descuento </label>';
      $('#resp_descuento').html(res);}
      if (sexo ==''){ $('#sexo').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de sexo </label>';
      $('#resp_sexo').html(res);}} 
                    
      } 

/*FUNCION DE BUSQUEDA DE CLIENTES EN TIEMPO REAL */

function btn_buscar_clientes_ot()
{
  var txt_buscar = $("#txt_buscar").val();

  var obj = {txt_buscar : txt_buscar };
    
     $.ajax({
      type: 'POST',
      url: '../modelo/orden_trabajo/modelo_buscar_cliente_orden_trabajo.php',
      data: obj,
      beforeSend: function(objeto){
        //$('#resp_busqueda_orden_trabajo').html("<div id='loader'> Cargando ... </div>")
      },
      success:function(data){
      $('#resp_busqueda_orden_trabajo').html(data).fadeIn('slow');
      }
    });
}

function btn_cerrar_resultado_buscador()
{
  $('#resp_busqueda_orden_trabajo').html("");
}

function btn_seleccion_cliente_ot(id_cliente)
{
  $('#resp_busqueda_orden_trabajo').html("");
  $("#id_cliente").val(id_cliente);

  var obj = {id_cliente : id_cliente };
    
  $.ajax({
      type: 'POST',
      url: '../vista/orden_trabajo/vista_mostrar_cliente_ot.php',
      data: obj,
      beforeSend: function(objeto){
        $('#panel_cliente_select_ot').html("<div id='loader'> Cargando ... </div>")
      },
      success:function(data){
        $('#panel_cliente_select_ot').html(data);
      }
    });
}

/* FUNCIONES DE CARGADO DE CARRITO AL INGRESAR ALA ORDEN DE TRABAJO */

function btn_listar_car_ot_general()
{  
   var id_usuario  = $("#id_usuario_sesion").val();
   var id_sucursal  = $("#id_sucursal_sesion").val();

   var obj = {id_usuario : id_usuario, id_sucursal : id_sucursal};
    
     $.ajax({
      type: 'POST',
      url:'../modelo/orden_trabajo/modelo_listar_carrito_general.php',
      data: obj,
       beforeSend: function(objeto){
        $('#panel_listado_prendas_carrito_general').html("<div id='load'> Cargando ... </div>")
      },
      success:function(data){

        $('#panel_listado_prendas_carrito_general').html(data).fadeIn('slow');
        btn_mostrar_total_costo_ot();
        btn_mostrar_cliente_actual_ot();

      }
    });
}

function btn_mostrar_total_costo_ot()
{
   var id_usuario  = $("#id_usuario_sesion").val();
   var id_sucursal  = $("#id_sucursal_sesion").val();

   var obj = {id_usuario : id_usuario, id_sucursal : id_sucursal};
    
     $.ajax({
      type: 'POST',
      url:'../modelo/orden_trabajo/modelo_sumar_carrito_general.php',
      data: obj,
       beforeSend: function(objeto){
        $('#panel_total_costos_ot').html("<div id='load'> Cargando ... </div>")
      },
      success:function(data){

        $('#panel_total_costos_ot').html(data).fadeIn('slow');
      }
    });

}

function btn_mostrar_cliente_actual_ot()
{
   var id_usuario  = $("#id_usuario_sesion").val();
   var id_sucursal  = $("#id_sucursal_sesion").val();

   var obj = {id_usuario : id_usuario, id_sucursal : id_sucursal};
    
     $.ajax({
      type: 'POST',
      url:'../vista/orden_trabajo/vista_mostrar_cliente_carrito_general.php',
      data: obj,
       beforeSend: function(objeto){
        $('#panel_cliente_select_ot').html("<div id='load'> Cargando ... </div>")
      },
      success:function(data){

        $('#panel_cliente_select_ot').html(data).fadeIn('slow');
        //btn_mostrar_id_cliente_actual_ot();
      }
    });

}

function btn_mostrar_id_cliente_actual_ot()
{
   var id_usuario  = $("#id_usuario_sesion").val();
   var id_sucursal  = $("#id_sucursal_sesion").val();

   var obj = {id_usuario : id_usuario, id_sucursal : id_sucursal};
    
     $.ajax({
      type: 'POST',
      url:'../vista/orden_trabajo/vista_mostrar_id_cliente_carrito_general.php',
      data: obj,
       beforeSend: function(objeto){
        $('#id_cliente').val("<div id='load'> Cargando ... </div>")
      },
      success:function(data){

        $('#id_cliente').val(data).fadeIn('slow');
      }
    });

}

/* OPERACIONES DE SUMA DE KILOGRAMOS DE VENTA DE ROPA */

function btn_sumar_costo_kilo()
{
   var peso_ropa = $("#peso_prendas_kilo").val();
   var id_usuario  = $("#id_usuario_sesion").val();
   var id_sucursal  = $("#id_sucursal_sesion").val();

   var obj = {id_usuario : id_usuario, id_sucursal : id_sucursal, peso_ropa: peso_ropa };
    
     $.ajax({
      type: 'POST',
      url:'../modelo/orden_trabajo/modelo_sumar_peso_carrito_general.php',
      data: obj,
       beforeSend: function(objeto){
        $('#panel_servicio_pedido_cliente_cambio_kilo').html("<div id='load'> Cargando ... </div>")
      },
      success:function(data){

        $('#panel_servicio_pedido_cliente_cambio_kilo').html(data).fadeIn('slow');
      }
    });
}

/* FUNCIONES DE PAGO DEL SERVICIO DE ORDEN DE ENTREGA */

function btn_pago_servicio_lavado()
{ 
  var total_costo_ot = $("#total_costo_ot").val();
  var pago_servicio = $("#pago_servicio").val();
 

  var operacion = pago_servicio - total_costo_ot;
  operacion = Math.round(operacion);

  if (operacion<0) {
    operacion = operacion*(-1);
     $("#saldo_servicio").val(operacion);
  }
  else{
     $("#saldo_servicio").val(operacion);
  }
}

function btn_eliminar_prenda_general(id_ot)
{
  $("#id_eliminar_prenda_ot").val(id_ot);
}

function btn_borrar_prenda_registro_general()
{
   var id_ot = $("#id_eliminar_prenda_ot").val();
   var obj = {id_ot : id_ot};
    
   $.ajax({
      type: 'POST',
      url: '../modelo/orden_trabajo/modelo_eliminar_carrito_orden_trabajo.php',
      data: obj,
      beforeSend: function(objeto){
        $('#panel_registro_eliminar_prenda').html("<div id='load'> Cargando ... </div>")
      },
      success:function(data){
        $('#panel_registro_eliminar_prenda').html(data).fadeIn('slow');
        
        setTimeout(function(){
           $('#panel_registro_eliminar_prenda').html("").fadeIn('slow');
         },1000); 
        
        setTimeout(function(){
            $('#myModal_Eliminar_Prenda').modal('hide').fadeIn('slow');
         },2000);

        setTimeout(function(){
            btn_orden_trabajo();
         },3000); 
      }
    });
}

/* REGISTRO DE ORDEN DE TRABAJO EN GENERAL */

function btn_registrar_servicio_ot_general()
{
  var peso_prendas_kilo = $("#peso_prendas_kilo").val();  
  var total_costo_ot = $("#total_costo_ot").val();
  var pago_servicio = $("#pago_servicio").val();
  var saldo_servicio = $("#saldo_servicio").val();

  var id_usuario  = $("#id_usuario_sesion").val();
  var id_sucursal  = $("#id_sucursal_sesion").val();

  var obj = {peso_prendas_kilo : peso_prendas_kilo, total_costo_ot:total_costo_ot,
  pago_servicio:pago_servicio, saldo_servicio:saldo_servicio, id_usuario:id_usuario,
  id_sucursal:id_sucursal};
    
   $.ajax({
      type: 'POST',
      url: '../modelo/orden_trabajo/modelo_registrar_carrito_orden_trabajo.php',
      data: obj,
      beforeSend: function(objeto){
        $('#panel_respuesta_registro_ot_general').html("<div id='load'> Cargando ... </div>")
      },
      success:function(data){

        $('#panel_respuesta_registro_ot_general').html(data);

        //window.open('http://solimusic.solidevtecnology.com/vista/inicio.php','Continue_to_Application','width=500,height=500');

      }
    });


}
