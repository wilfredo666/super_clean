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
                $('#img_cobro_lavado_especial').val(datos);
                mostrar_archivo();
            }
        });
    });
          

    function mostrar_archivo()
    {
        var archivo = $('#img_cobro_lavado_especial').val();
        var cadena ="<div style='width: 100%; padding-top: 2%;'><center><img src='../multimedia/imagenes/"+archivo+"' style='width: 70%; height: 150px; box-shadow: 1px 1px 1px 2px #A4A4A4;'></center></div>";
        $('#resp_img_cobro_lavado_especial').html(cadena);
         
      }

    function btn_mostrar_registro()
    {
     var obj = '';
    
     $.ajax({
      type: 'POST',
      url:'../vista/vista_cobro_lavado_especial.php',
      data: obj,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#panel_registro_cobro_lavado_especial').html(data).fadeIn('slow');
      }
    });
    }

    function btn_registro_cobro_lavado_especial(){
      
         var codigo_lav = $('#codigo_lav').val(); 
         var total = $('#total').val(); 
         var pago = $('#pago').val(); 
         var saldo = $('#saldo').val(); 
         var id_usuario = $('#id_usuario').val(); 
         var fecha = $('#fecha').val(); 
         var hora = $('#hora').val(); 
         var ob = {codigo_lav : codigo_lav,total : total,pago : pago,saldo : saldo,id_usuario : id_usuario,fecha : fecha,hora : hora};
    
         if(codigo_lav !='' && total !='' && pago !='' && saldo !='' && id_usuario !='' && fecha !='' && hora !='' ){ 

                $.ajax({
                type: 'POST',
                url:'../modelo/modelo_registrar_cobro_lavado_especial.php',
                data: ob,
                beforeSend: function(objeto){
              
                },
                success: function(data)
                { 
                 //alert(data);
                 $('#resultado_registro_cobro_lavado_especial').html(data);
                // setTimeout(limpiar_cobro_lavado_especial,1000);

                 
                  $('#codigo_lav').val('');
                  $('#total').val('');
                  $('#pago').val('');
                  $('#saldo').val('');
                  $('#id_usuario').val('');
                  $('#fecha').val('');
                  $('#hora').val('');
                 
                  setTimeout(function(){
                    $('#resultado_registro_cobro_lavado_especial').html('');
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
     
      if (codigo_lav ==''){ $('#codigo_lav').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de codigo_lav </label>';
      $('#resp_codigo_lav').html(res);}
      if (total ==''){ $('#total').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de total </label>';
      $('#resp_total').html(res);}
      if (pago ==''){ $('#pago').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de pago </label>';
      $('#resp_pago').html(res);}
      if (saldo ==''){ $('#saldo').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de saldo </label>';
      $('#resp_saldo').html(res);}
      if (id_usuario ==''){ $('#id_usuario').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de id_usuario </label>';
      $('#resp_id_usuario').html(res);}
      if (fecha ==''){ $('#fecha').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de fecha </label>';
      $('#resp_fecha').html(res);}
      if (hora ==''){ $('#hora').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de hora </label>';
      $('#resp_hora').html(res);}} 
                    
      } 
    function limpiar_cobro_lavado_especial()
    {
         $('#resultado_registro_cobro_lavado_especial').html('');
         $('#resp_img_cobro_lavado_especial').html('');
         $('#img_cobro_lavado_especial').val('');
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
    var id_usuario = $("#id_usuario_sesion").val();
    var parametros = {'action':'ajax','page':page,id_usuario:id_usuario};

    $.ajax({
      type:'POST',
      url:'../modelo/modelo_listar_cobro_lavado_especial.php',
      data: parametros,
       beforeSend: function(objeto){
       $('#loader').html('cargando .... ');
      },
      success:function(data){
        $('#panel_listado_cobro_lavado_especial').html(data).fadeIn('slow');
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
    var id_usuario = $("#id_usuario_sesion").val();

    if(txt_buscar==''){
      $('#resp_busqueda_cobro_lavado_especial').html('<label style="color:red;"> !!Escribe en el campo para Buscar!! </label>');
    }

    else{
    $('#resp_busqueda_cobro_lavado_especial').html('');

    var parametros = {'action':'ajax','page':page,'txt_buscar':txt_buscar
    ,id_usuario:id_usuario};
    
    $.ajax({
      type : 'POST',
      url:'../modelo/modelo_buscar_cobro_lavado_especial.php',
      data: parametros,
       beforeSend: function(objeto){
       $('#loader').html('cargando .... ');
      },
      success:function(data){
        $('#panel_listado_cobro_lavado_especial').html(data).fadeIn('slow');
        $('#loader').html('');
      }
    });

    }
  } 
