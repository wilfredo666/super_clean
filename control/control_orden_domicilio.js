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
                $('#img_orden_domicilio').val(datos);
                mostrar_archivo();
            }
        });
    });
          

    function mostrar_archivo()
    {
        var archivo = $('#img_orden_domicilio').val();
        var cadena ="<div style='width: 100%; padding-top: 2%;'><center><img src='../multimedia/imagenes/"+archivo+"' style='width: 70%; height: 150px; box-shadow: 1px 1px 1px 2px #A4A4A4;'></center></div>";
        $('#resp_img_orden_domicilio').html(cadena);
         
      }

    function btn_mostrar_registro()
    {
     var obj = '';
    
     $.ajax({
      type: 'POST',
      url:'../vista/vista_orden_domicilio.php',
      data: obj,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#panel_registro_orden_domicilio').html(data).fadeIn('slow');
      }
    });
    }

    function btn_registro_orden_domicilio(){
      
         var id_ot = $('#id_ot').val(); 
         var codigo_ot = $('#codigo_ot').val(); 
         var id_chofer = $('#id_chofer').val(); 
         var precio_envio = $('#precio_envio').val(); 
         var fecha = $('#fecha').val(); 
         var hora = $('#hora').val(); 
         var ob = {id_ot : id_ot,codigo_ot : codigo_ot,id_chofer : id_chofer,precio_envio : precio_envio,fecha : fecha,hora : hora};
    
         if(id_ot !='' && codigo_ot !='' && id_chofer !='' && precio_envio !='' && fecha !='' && hora !='' ){ 

                $.ajax({
                type: 'POST',
                url:'../modelo/modelo_registrar_orden_domicilio.php',
                data: ob,
                beforeSend: function(objeto){
              
                },
                success: function(data)
                { 
                 //alert(data);
                 $('#resultado_registro_orden_domicilio').html(data);
                // setTimeout(limpiar_orden_domicilio,1000);

                 
                  $('#id_ot').val('');
                  $('#codigo_ot').val('');
                  $('#id_chofer').val('');
                  $('#precio_envio').val('');
                  $('#fecha').val('');
                  $('#hora').val('');
                 
                  setTimeout(function(){
                    $('#resultado_registro_orden_domicilio').html('');
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
     
      if (id_ot ==''){ $('#id_ot').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de id_ot </label>';
      $('#resp_id_ot').html(res);}
      if (codigo_ot ==''){ $('#codigo_ot').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de codigo_ot </label>';
      $('#resp_codigo_ot').html(res);}
      if (id_chofer ==''){ $('#id_chofer').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de id_chofer </label>';
      $('#resp_id_chofer').html(res);}
      if (precio_envio ==''){ $('#precio_envio').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de precio_envio </label>';
      $('#resp_precio_envio').html(res);}
      if (fecha ==''){ $('#fecha').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de fecha </label>';
      $('#resp_fecha').html(res);}
      if (hora ==''){ $('#hora').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de hora </label>';
      $('#resp_hora').html(res);}} 
                    
      } 
    function limpiar_orden_domicilio()
    {
         $('#resultado_registro_orden_domicilio').html('');
         $('#resp_img_orden_domicilio').html('');
         $('#img_orden_domicilio').val('');
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
    $('#fecha_reg').val(f.getDate() + '/' + (f.getMonth() +1) + '/' + f.getFullYear());
     setTimeout('fecha()',1000);
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
  });

  function cargar_datos(page){

    var parametros = {'action':'ajax','page':page};
    $('#loader').fadeIn('slow');
    $.ajax({
      url:'../modelo/modelo_listar_orden_domicilio.php',
      data: parametros,
       beforeSend: function(objeto){
       $('#loader').html('cargando .... ');
      },
      success:function(data){
        $('#panel_listado_orden_domicilio').html(data).fadeIn('slow');
        $('#loader').html('');
      }
    });
  }
  
 




  function btn_registrar_ot_envio(codigo_ot)
  {
    var ob = {codigo_ot : codigo_ot };
     $.ajax({
      type : 'POST',
      url:'../modelo/modelo_formulario_orden_domicilio.php',
      data: ob,
       beforeSend: function(objeto){
       $('#panel_formulario_registro_ot_chofer').html('cargando .... ');
      },
      success:function(data){
        $('#panel_formulario_registro_ot_chofer').html(data).fadeIn('slow');
      }
    });
  }

  function btn_registrar_ot_chofer()
  {
     
    var precio_envio = $("#costo_envio").val();
    var codigo_ot = $("#codigo_ot").val();
    var id_chofer = $("#select_chofer").val();
    var fecha = $('#fecha_reg').val(); 
    var hora = $('#hora').val(); 
   
    if(codigo_ot !='' && id_chofer !='' && precio_envio !='' && fecha !='' && hora !='' ){ 
      $('#resp_id_chofer').html("");
      $('#resp_precio_envio').html("");
     var ob = {codigo_ot : codigo_ot,id_chofer : id_chofer,precio_envio : precio_envio,
               fecha : fecha,hora : hora };
    
       $.ajax({
       type: 'POST',
       url:'../modelo/modelo_registrar_orden_domicilio.php',
       data: ob,
       beforeSend: function(objeto){
        $('#panel_registro_envio_domiciolio').html("cargando ...");      
       },
       success: function(data)
       {         
        $('#panel_registro_envio_domiciolio').html(data);
       }
    });
  }

    else{ 
     
      if (id_chofer ==''){ $('#id_chofer').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de chofer </label>';
      $('#resp_id_chofer').html(res);}
      
      if (precio_envio ==''){ $('#precio_envio').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de costo de envio </label>';
      $('#resp_precio_envio').html(res);}
      
      
                    
      } 
  }
