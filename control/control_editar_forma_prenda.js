  function btn_opciones(ID_forma_prenda)
  {
    $('#ID_contenido').val(ID_forma_prenda);
  }
function btn_ver_forma_prenda(){
    var ID_forma_prenda = $('#ID_contenido').val();
    var ob ={ID_forma_prenda:ID_forma_prenda};

    $.ajax({
        type: 'POST',
        url:'../vista/vista_examinar_forma_prenda.php',
        data: ob,
        beforeSend: function(objeto){

        },
        success: function(data)
        { 
            $('#panel_examinar_forma_prenda').html(data);
            console.log(ID_forma_prenda);
        }
    });
}
  function actualizar_y_salir()
  {
    setTimeout(function(){ cargar_datos(1); },1000);
  }
function btn_editar_forma_prenda()
  { 
     var ID_forma_prenda = $('#ID_contenido').val();

     var obj = {ID_forma_prenda:ID_forma_prenda};
    
    $.ajax({
      type: 'POST',
      url: '../vista/vista_editar_forma_prenda.php',
      data: obj,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#panel_edicion_forma_prenda').html(data).fadeIn('slow');
      }
    });

  }

  function btn_guardar_cambios_forma_prenda()
  {
    var ID_forma_prenda =$('#id_forma_prenda').val(); 
    var forma_prenda = $('#forma_prenda').val();
    
    var obj = {ID_forma_prenda: ID_forma_prenda,
    forma_prenda: forma_prenda};
     
    $.ajax({
      type: 'POST',
      url:'../modelo/modelo_guardar_forma_prenda.php',
      data: obj,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#respuesta_guardar_cambios_forma_prenda').html(data).fadeIn('slow');
        
        setTimeout(function(){
          $('#myModal_Edicion').modal('hide').fadeIn('slow');
        },2000);

      }
    });
  }

 function btn_eliminar_forma_prenda()
 {  
    var ID_forma_prenda = $('#ID_contenido').val();
    $('#ID_eliminar_forma_prenda').val(ID_forma_prenda);
 }

function btn_borrar_forma_prenda()
  {  
     var ID_forma_prenda = $('#ID_eliminar_forma_prenda').val();
     var parametros = {ID_forma_prenda:ID_forma_prenda};
    
     $.ajax({
      type: 'POST',
      url:'../modelo/modelo_eliminar_forma_prenda.php',
      data: parametros,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#panel_eliminar_forma_prenda').html(data).fadeIn('slow');
        
        setTimeout(function(){
          $('#myModal_Eliminar').modal('hide').fadeIn('slow');
        },2000);

      }
    });
  }