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

    function btn_mostrar_registro()
    {
     var obj = '';
    
     $.ajax({
      type: 'POST',
      url:'../vista/vista_carrito_orden_trabajo.php',
      data: obj,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#panel_registro_carrito_orden_trabajo').html(data).fadeIn('slow');
      }
    });
    }

    function btn_registro_carrito_orden_trabajo(){
      
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
                url:'../modelo/modelo_registrar_carrito_orden_trabajo.php',
                data: ob,
                beforeSend: function(objeto){
              
                },
                success: function(data)
                { 
                 //alert(data);
                 $('#resultado_registro_carrito_orden_trabajo').html(data);
                // setTimeout(limpiar_carrito_orden_trabajo,1000);

                 
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
                    $('#resultado_registro_carrito_orden_trabajo').html('');
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
    function limpiar_carrito_orden_trabajo()
    {
         $('#resultado_registro_carrito_orden_trabajo').html('');
         $('#resp_img_carrito_orden_trabajo').html('');
         $('#img_carrito_orden_trabajo').val('');
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
    cargar_datos(1);
  });

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
    });
  }
  
  /*function cargar_datos_buscar(page){
    var txt_buscar = $('#txt_buscar').val();
    
    if(txt_buscar==''){
      $('#resp_busqueda').html('<label style="color:red;"> !!Escribe en el campo para Buscar!! </label>');
    }
    else{
    $('#resp_busqueda').html('');
    var parametros = {'action':'ajax','page':page,'txt_buscar':txt_buscar};
    $('#loader').fadeIn('slow');
    
    $.ajax({
      url:'../modelo/modelo_buscar_prueba.php',
      data: parametros,
       beforeSend: function(objeto){
       $('#loader').html('cargando .... ');
      },
      success:function(data){
        $('#panel_listado_prueba').html(data).fadeIn('slow');
        $('#loader').html('');
      }
    });
   }
  }
   */

  function cargar_datos_buscar(page)
  {
    var txt_buscar = $('#txt_buscar').val();
    
    if(txt_buscar==''){
      $('#resp_busqueda_carrito_orden_trabajo').html('<label style="color:red;"> !!Escribe en el campo para Buscar!! </label>');
    }

    else{
    $('#resp_busqueda_carrito_orden_trabajo').html('');

    var parametros = {'action':'ajax','page':page,'txt_buscar':txt_buscar};
    
    $('#loader').fadeIn('slow');
    
    $.ajax({
      url:'../modelo/modelo_buscar_carrito_orden_trabajo.php',
      data: parametros,
       beforeSend: function(objeto){
       $('#loader').html('cargando .... ');
      },
      success:function(data){
        $('#panel_listado_carrito_orden_trabajo').html(data).fadeIn('slow');
        $('#loader').html('');
      }
    });

    }
  } 
