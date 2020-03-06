function btn_mostrar_registro(){
 var obj = '';
    
     $.ajax({
      type: 'POST',
      url:'../vista/vista_forma_prenda.php',
      data: obj,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#panel_registro_forma_prenda').html(data).fadeIn('slow');
      }
    });
}
function btn_registro_forma_prenda(){
    var forma_prenda = $('#forma_prenda').val(); 
         var ob = {forma_prenda : forma_prenda};
    
         if(forma_prenda !='' ){ 

                $.ajax({
                type: 'POST',
                url:'../modelo/modelo_registrar_forma_prenda.php',
                data: ob,
                beforeSend: function(objeto){
              
                },
                success: function(data)
                { 
                 //alert(data);
                 $('#resultado_registro_forma_prenda').html(data);
                // setTimeout(limpiar_area_acomodado,1000);

                 
                  $('#forma_prenda').val(''); //???
                 
                  setTimeout(function(){
                    $('#resultado_registro_forma_prenda').html('');
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
     
      if (forma_prenda ==''){ $('#forma_prenda').focus();
      var res ='<label style="color:red;"> Debe llenar el campo de forma de prenda </label>';
      $('#resp_forma_prenda').html(res);}}
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

function cargar_datos(page){

    var parametros = {'action':'ajax','page':page};
    $('#loader').fadeIn('slow');
    $.ajax({
      url:'../modelo/modelo_listar_forma_prenda.php',
      data: parametros,
       beforeSend: function(objeto){
       $('#loader').html('cargando .... ');
      },
      success:function(data){
        $('#panel_listado_forma_prenda').html(data).fadeIn('slow');
        $('#loader').html('');
      }
    });
  }

//listar formas de prendas
  $(document).ready(function(){
    cargar_datos(1);
  });

function cargar_datos_buscar(page)
  {
    var txt_buscar = $('#txt_buscar').val();
    
    if(txt_buscar==''){
      $('#resp_busqueda_forma_prenda').html('<label style="color:red;"> !!Escribe en el campo para Buscar!! </label>');
    }

    else{
    $('#resp_busqueda_forma_prenda').html('');

    var parametros = {'action':'ajax','page':page,'txt_buscar':txt_buscar};
    
    $('#loader').fadeIn('slow');
    
    $.ajax({
      url:'../modelo/modelo_buscar_forma_prenda.php',
      data: parametros,
       beforeSend: function(objeto){
       $('#loader').html('cargando .... ');
      },
      success:function(data){
        $('#panel_listado_forma_prenda').html(data).fadeIn('slow');
        $('#loader').html('');
      }
    });

    }
  } 