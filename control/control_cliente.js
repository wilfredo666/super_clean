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
                $('#img_cliente').val(datos);
                mostrar_archivo();
            }
        });
    });
          

    function mostrar_archivo()
    {
        var archivo = $('#img_cliente').val();
        var cadena ="<div style='width: 100%; padding-top: 2%;'><center><img src='../multimedia/imagenes/"+archivo+"' style='width: 70%; height: 150px; box-shadow: 1px 1px 1px 2px #A4A4A4;'></center></div>";
        $('#resp_img_cliente').html(cadena);
         
      }

    function btn_mostrar_registro()
    {
     var obj = '';
    
     $.ajax({
      type: 'POST',
      url:'../vista/vista_cliente.php',
      data: obj,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#panel_registro_cliente').html(data).fadeIn('slow');
      }
    });
    }

    function btn_registro_cliente(){
      
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
    
         if( ci_nit !='' && celular !='' && sexo !=''){ 

                $.ajax({
                type: 'POST',
                url:'../modelo/modelo_registrar_cliente.php',
                data: ob,
                beforeSend: function(objeto){
              
                },
                success: function(data)
                { 
               
                  $('#resultado_registro_cliente').html(data);
 
                  $('#nombres').val('');
                  $('#apellidos').val('');
                  $('#ci_nit').val('');
                  $('#celular').val('');
                  $('#telefono').val('');
                  $('#email').val('');
                  $('#descuento').val('');
                  $('#sexo').val('');
                 
                  setTimeout(function(){
                    $('#resultado_registro_cliente').html('');
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
     
      if (nombres ==''){ $('#nombres').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de nombres </label>';
      $('#resp_nombres').html(res);}
      if (apellidos ==''){ $('#apellidos').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de apellidos </label>';
      $('#resp_apellidos').html(res);}
      if (ci_nit ==''){ $('#ci_nit').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de ci_nit </label>';
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
    function limpiar_cliente()
    {
         $('#resultado_registro_cliente').html('');
         $('#resp_img_cliente').html('');
         $('#img_cliente').val('');
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
      type : 'POST',
      url:'../modelo/modelo_listar_cliente.php',
      data: parametros,
      beforeSend: function(objeto){
        $('#panel_listado_cliente').html('cargando .... ');
      },
      success:function(data){
        $('#panel_listado_cliente').html(data).fadeIn('slow');
         
      }
    });
  }
  
  function cargar_datos_buscar(page)
  {
    var txt_buscar = $('#txt_buscar').val();
    var id_usuario = $("#id_usuario_sesion").val();

    if(txt_buscar==''){
      $('#resp_busqueda_cliente').html('<label style="color:red;"> !!Escribe en el campo para Buscar!! </label>');
    }

    else{
    $('#resp_busqueda_cliente').html('');

    var parametros = {'action':'ajax','page':page,'txt_buscar':txt_buscar,id_usuario:id_usuario};

    $.ajax({
      type : 'POST',
      url:'../modelo/modelo_buscar_cliente.php',
      data: parametros,
      beforeSend: function(objeto){
       $('#panel_listado_cliente').html('cargando .... ');
      },
      success:function(data){
        $('#panel_listado_cliente').html(data).fadeIn('slow');
      }
    });

    }
  } 
