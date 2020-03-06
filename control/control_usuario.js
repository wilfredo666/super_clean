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
                $('#img_usuario').val(datos);
                mostrar_archivo();
            }
        });
    });
          

    function mostrar_archivo()
    {
        var archivo = $('#img_usuario').val();
        var cadena ="<div style='width: 100%; padding-top: 2%;'><center><img src='../multimedia/imagenes/"+archivo+"' style='width: 70%; height: 150px; box-shadow: 1px 1px 1px 2px #A4A4A4;'></center></div>";
        $('#resp_img_usuario').html(cadena);
         
      }

    function btn_mostrar_registro()
    {
     var obj = '';
    
     $.ajax({
      type: 'POST',
      url:'../vista/vista_usuario.php',
      data: obj,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#panel_registro_usuario').html(data).fadeIn('slow');
      }
    });
    }

    function btn_registro_usuario(){
      
         var email = $('#email').val(); 
         var password = $('#password').val(); 
         var sucursal = $('#sucursal').val(); 
         var cargo = $('#cargo').val(); 
         var nombres = $('#nombres').val(); 
         var apellidos = $('#apellidos').val(); 
         var ci = $('#ci').val(); 
         var numero = $('#numero').val(); 
         var ob = {email : email,password : password,sucursal : sucursal,cargo : cargo,nombres : nombres,apellidos : apellidos,ci : ci,numero : numero};
    
         if(email !='' && password !='' && sucursal !='' && cargo !='' && nombres !='' && apellidos !='' && ci !='' && numero !='' ){ 

                $.ajax({
                type: 'POST',
                url:'../modelo/modelo_registrar_usuario.php',
                data: ob,
                beforeSend: function(objeto){
              
                },
                success: function(data)
                { 
                 //alert(data);
                 $('#resultado_registro_usuario').html(data);
                // setTimeout(limpiar_usuario,1000);

                 
                  $('#email').val('');
                  $('#password').val('');
                  $('#sucursal').val('');
                  $('#cargo').val('');
                  $('#nombres').val('');
                  $('#apellidos').val('');
                  $('#ci').val('');
                  $('#numero').val('');
                 
                  setTimeout(function(){
                    $('#resultado_registro_usuario').html('');
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
     
      if (email ==''){ $('#email').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de email </label>';
      $('#resp_email').html(res);}
      if (password ==''){ $('#password').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de password </label>';
      $('#resp_password').html(res);}
      if (sucursal ==''){ $('#sucursal').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de sucursal </label>';
      $('#resp_sucursal').html(res);}
      if (cargo ==''){ $('#cargo').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de cargo </label>';
      $('#resp_cargo').html(res);}
      if (nombres ==''){ $('#nombres').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de nombres </label>';
      $('#resp_nombres').html(res);}
      if (apellidos ==''){ $('#apellidos').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de apellidos </label>';
      $('#resp_apellidos').html(res);}
      if (ci ==''){ $('#ci').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de ci </label>';
      $('#resp_ci').html(res);}
      if (numero ==''){ $('#numero').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de numero </label>';
      $('#resp_numero').html(res);}} 
                    
      } 
    function limpiar_usuario()
    {
         $('#resultado_registro_usuario').html('');
         $('#resp_img_usuario').html('');
         $('#img_usuario').val('');
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
          setTimeout(function(){ $('#'+mensaje).html("");},3000);
          noti_email++;
          return false;
    }
    else{ 
          $('#'+mensaje).html('valido').slideDown('slow');noti_email=0;
          setTimeout(function(){ $('#'+mensaje).html("");},3000);
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
      url:'../modelo/modelo_listar_usuario.php',
      data: parametros,
       beforeSend: function(objeto){
       $('#loader').html('cargando .... ');
      },
      success:function(data){
        $('#panel_listado_usuario').html(data).fadeIn('slow');
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
      $('#resp_busqueda_usuario').html('<label style="color:red;"> !!Escribe en el campo para Buscar!! </label>');
    }

    else{
    $('#resp_busqueda_usuario').html('');

    var parametros = {'action':'ajax','page':page,'txt_buscar':txt_buscar};
    
    $('#loader').fadeIn('slow');
    
    $.ajax({
      url:'../modelo/modelo_buscar_usuario.php',
      data: parametros,
       beforeSend: function(objeto){
       $('#loader').html('cargando .... ');
      },
      success:function(data){
        $('#panel_listado_usuario').html(data).fadeIn('slow');
        $('#loader').html('');
      }
    });

    }
  } 
