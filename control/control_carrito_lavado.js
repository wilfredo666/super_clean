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
                $('#img_carrito_lavado').val(datos);
                mostrar_archivo();
            }
        });
    });
          

    function mostrar_archivo()
    {
        var archivo = $('#img_carrito_lavado').val();
        var cadena ="<div style='width: 100%; padding-top: 2%;'><center><img src='../multimedia/imagenes/"+archivo+"' style='width: 70%; height: 150px; box-shadow: 1px 1px 1px 2px #A4A4A4;'></center></div>";
        $('#resp_img_carrito_lavado').html(cadena);
         
      }

    function btn_mostrar_registro()
    {
     var obj = '';
    
     $.ajax({
      type: 'POST',
      url:'../vista/vista_carrito_lavado.php',
      data: obj,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#panel_registro_carrito_lavado').html(data).fadeIn('slow');
      }
    });
    }

    function btn_registro_carrito_lavado(){
      
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
         var ob = {id_usuario : id_usuario,id_cliente : id_cliente,cliente : cliente,id_sucursal : id_sucursal,id_ot : id_ot,codigo_ot : codigo_ot,tipo_lavado : tipo_lavado,estado_lavado : estado_lavado,codigo_tikeo : codigo_tikeo,id_prenda : id_prenda};
    
         if(id_usuario !='' && id_cliente !='' && cliente !='' && id_sucursal !='' && id_ot !='' && codigo_ot !='' && tipo_lavado !='' && estado_lavado !='' && codigo_tikeo !='' && id_prenda !='' ){ 

                $.ajax({
                type: 'POST',
                url:'../modelo/modelo_registrar_carrito_lavado.php',
                data: ob,
                beforeSend: function(objeto){
              
                },
                success: function(data)
                { 
                 //alert(data);
                 $('#resultado_registro_carrito_lavado').html(data);
                // setTimeout(limpiar_carrito_lavado,1000);

                 
                  $('#id_usuario').val('');
                  $('#id_cliente').val('');
                  $('#cliente').val('');
                  $('#id_sucursal').val('');
                  $('#id_ot').val('');
                  $('#codigo_ot').val('');
                  $('#tipo_lavado').val('');
                  $('#estado_lavado').val('');
                  $('#codigo_tikeo').val('');
                  $('#id_prenda').val('');
                 
                  setTimeout(function(){
                    $('#resultado_registro_carrito_lavado').html('');
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
      if (id_cliente ==''){ $('#id_cliente').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de id_cliente </label>';
      $('#resp_id_cliente').html(res);}
      if (cliente ==''){ $('#cliente').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de cliente </label>';
      $('#resp_cliente').html(res);}
      if (id_sucursal ==''){ $('#id_sucursal').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de id_sucursal </label>';
      $('#resp_id_sucursal').html(res);}
      if (id_ot ==''){ $('#id_ot').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de id_ot </label>';
      $('#resp_id_ot').html(res);}
      if (codigo_ot ==''){ $('#codigo_ot').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de codigo_ot </label>';
      $('#resp_codigo_ot').html(res);}
      if (tipo_lavado ==''){ $('#tipo_lavado').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de tipo_lavado </label>';
      $('#resp_tipo_lavado').html(res);}
      if (estado_lavado ==''){ $('#estado_lavado').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de estado_lavado </label>';
      $('#resp_estado_lavado').html(res);}
      if (codigo_tikeo ==''){ $('#codigo_tikeo').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de codigo_tikeo </label>';
      $('#resp_codigo_tikeo').html(res);}
      if (id_prenda ==''){ $('#id_prenda').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de id_prenda </label>';
      $('#resp_id_prenda').html(res);}} 
                    
      } 
    function limpiar_carrito_lavado()
    {
         $('#resultado_registro_carrito_lavado').html('');
         $('#resp_img_carrito_lavado').html('');
         $('#img_carrito_lavado').val('');
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
      url:'../modelo/modelo_listar_carrito_lavado.php',
      data: parametros,
       beforeSend: function(objeto){
       $('#loader').html('cargando .... ');
      },
      success:function(data){
        $('#panel_listado_carrito_lavado').html(data).fadeIn('slow');
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
      $('#resp_busqueda_carrito_lavado').html('<label style="color:red;"> !!Escribe en el campo para Buscar!! </label>');
    }

    else{
    $('#resp_busqueda_carrito_lavado').html('');

    var parametros = {'action':'ajax','page':page,'txt_buscar':txt_buscar};
    
    $('#loader').fadeIn('slow');
    
    $.ajax({
      url:'../modelo/modelo_buscar_carrito_lavado.php',
      data: parametros,
       beforeSend: function(objeto){
       $('#loader').html('cargando .... ');
      },
      success:function(data){
        $('#panel_listado_carrito_lavado').html(data).fadeIn('slow');
        $('#loader').html('');
      }
    });

    }
  } 
