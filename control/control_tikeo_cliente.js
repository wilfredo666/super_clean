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
                $('#img_tikeo_cliente').val(datos);
                mostrar_archivo();
            }
        });
    });
          

    function mostrar_archivo()
    {
        var archivo = $('#img_tikeo_cliente').val();
        var cadena ="<div style='width: 100%; padding-top: 2%;'><center><img src='../multimedia/imagenes/"+archivo+"' style='width: 70%; height: 150px; box-shadow: 1px 1px 1px 2px #A4A4A4;'></center></div>";
        $('#resp_img_tikeo_cliente').html(cadena);
         
      }

    function btn_mostrar_registro()
    {
     var obj = '';
    
     $.ajax({
      type: 'POST',
      url:'../vista/vista_tikeo_cliente.php',
      data: obj,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#panel_registro_tikeo_cliente').html(data).fadeIn('slow');
        cargar_datos_cod_bar(1);
      }
    });
    }

    function btn_registro_tikeo_cliente(){
      
         var id_prenda = $('#id_prenda').val(); 
         var id_cliente = $('#id_cliente').val(); 
         var cliente = $('#cliente').val(); 
         var codigo_barras = $('#codigo_barras').val(); 
         var id_usuario = $('#id_usuario_sesion').val(); 
         var id_sucursal = $('#id_sucursal_sesion').val(); 
         var fecha = $('#fecha').val(); 
         var hora = $('#hora').val(); 
         
         var ob = { id_prenda : id_prenda,id_cliente : id_cliente,cliente : cliente,
                    codigo_barras : codigo_barras,id_usuario : id_usuario,id_sucursal : id_sucursal,
                    fecha : fecha,hora : hora};
    
         if(id_prenda !='' && id_cliente !='' && cliente !='' && codigo_barras !='' && 
            id_usuario !='' && id_sucursal !='' && fecha !='' && hora !='' ){ 

                $.ajax({
                type: 'POST',
                url:'../modelo/modelo_registrar_tikeo_cliente.php',
                data: ob,
                beforeSend: function(objeto){
              
                },
                success: function(data)
                { 
                  $('#resultado_registro_tikeo_cliente').html(data);

                  $('#id_prenda').val('');
                  $('#id_cliente').val('');
                  $('#cliente').val('');
                  $('#codigo_barras').val('');

                  $('#txt_buscar_cliente').val('');
                  $('#label_select_cliente').html('');
                  $('#txt_prenda').val('');
                  $('#label_select_prenda').html('');
                   

                  setTimeout(function(){
                    $('#resultado_registro_tikeo_cliente').html('');
                  },2000);
                  
                  setTimeout(function(){
                   cargar_datos_cod_bar(1);
                  },2500);

                }
             });
           } 
     else{ 
     
      if (id_prenda ==''){ $('#id_prenda').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de id_prenda </label>';
      $('#resp_id_prenda').html(res);}
      if (id_cliente ==''){ $('#id_cliente').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de id_cliente </label>';
      $('#resp_id_cliente').html(res);}
      if (cliente ==''){ $('#cliente').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de cliente </label>';
      $('#resp_cliente').html(res);}
      if (codigo_barras ==''){ $('#codigo_barras').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de codigo_barras </label>';
      $('#resp_codigo_barras').html(res);}
      if (id_usuario ==''){ $('#id_usuario').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de id_usuario </label>';
      $('#resp_id_usuario').html(res);}
      if (id_sucursal ==''){ $('#id_sucursal').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de id_sucursal </label>';
      $('#resp_id_sucursal').html(res);}
      if (fecha ==''){ $('#fecha').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de fecha </label>';
      $('#resp_fecha').html(res);}
      if (hora ==''){ $('#hora').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de hora </label>';
      $('#resp_hora').html(res);}} 
                    
      } 
    function limpiar_tikeo_cliente()
    {
         $('#resultado_registro_tikeo_cliente').html('');
         $('#resp_img_tikeo_cliente').html('');
         $('#img_tikeo_cliente').val('');
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
      url:'../modelo/modelo_listar_tikeo_cliente.php',
      data: parametros,
      beforeSend: function(objeto){
       $('#panel_listado_tikeo_cliente').html('cargando .... ');
      },
      success:function(data){
        $('#panel_listado_tikeo_cliente').html(data).fadeIn('slow');
      }
    });
  }
 
  function cargar_datos_buscar(page)
  {
    var txt_buscar = $('#txt_buscar').val();
    
    if(txt_buscar=='')
    {
      $('#resp_busqueda_tikeo_cliente').html('<label style="color:red;"> !!Escribe en el campo para Buscar!! </label>');
    }

    else{

      $('#resp_busqueda_tikeo_cliente').html('');
      var id_usuario = $("#id_usuario_sesion").val();
      var parametros = {'action':'ajax','page':page,'txt_buscar':txt_buscar,id_usuario:id_usuario};
      
      $.ajax({
        type : 'POST',
        url:'../modelo/modelo_buscar_tikeo_cliente.php',
        data: parametros,
         beforeSend: function(objeto){
         $('#panel_listado_tikeo_cliente').html('cargando .... ');
        },
        success:function(data){
          $('#panel_listado_tikeo_cliente').html(data).fadeIn('slow');
        }
      });

    }
  } 


/* Cargar datos de registro de tikeo a cliente */

  function cargar_datos_cod_bar(page){
    var id_usuario = $("#id_usuario_sesion").val();
    var parametros = {'action':'ajax','page':page,id_usuario:id_usuario};
     
    $.ajax({
      type : 'POST',
      url:'../modelo/modelo_listar_tikeo_cliente.php',
      data: parametros,
      beforeSend: function(objeto){
       $('#panel_listado_prendas_cliente').html('cargando .... ');
      },
      success:function(data){

       $('#panel_listado_prendas_cliente').html(data).fadeIn('slow'); 
      }
    });
  }

function btn_select_cliente_tikeo()
{
    var txt_buscar = $("#txt_buscar_cliente").val();
    var obj = {opcion:"cliente", txt_buscar : txt_buscar };
     
    $.ajax({
      type : 'POST',
      url:'../modelo/modelo_select_tikeo_cliente.php',
      data: obj,
      beforeSend: function(objeto){
       $('#resp_cliente').html('cargando .... ');
      },
      success:function(data){

       $('#resp_cliente').html(data).fadeIn('slow'); 
      }
    });
}

function btn_cerrar_select_cliente()
{
   $('#resp_cliente').html("");
   $('#cliente').val("");
   $('#id_cliente').val("");
   $('#label_select_cliente').html("");
}

function btn_select_cliente_item(id_cliente,cliente)
{
   $('#cliente').val(cliente);
   $('#label_select_cliente').html(cliente);
   $('#id_cliente').val(id_cliente);
   $('#resp_cliente').html("");

}

function btn_select_cliente_ropa()
{
    var txt_prenda = $("#txt_prenda").val();
    var obj = {opcion:"prenda", txt_prenda : txt_prenda };
     
    $.ajax({
      type : 'POST',
      url:'../modelo/modelo_select_tikeo_cliente.php',
      data: obj,
      beforeSend: function(objeto){
       $('#resp_prenda').html('cargando .... ');
      },
      success:function(data){

       $('#resp_prenda').html(data).fadeIn('slow'); 
      }
    });
}

function btn_select_prenda_item(id_prenda,prenda)
{
   $('#prenda').val(prenda);
   $('#label_select_prenda').html(prenda);
   $('#id_prenda').val(id_prenda);
   $('#resp_prenda').html("");

}

function btn_cerrar_select_prenda()
{
   $('#resp_prenda').html("");
   $('#prenda').val("");
   $('#id_prenda').val("");
   $('#label_select_prenda').html("");

}