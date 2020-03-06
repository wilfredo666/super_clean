$(document).ready(function(){
   cargar_datos(1);
  });

 function cargar_datos(page){

    var id_usuario = $("#id_usuario_sesion").val();
    var parametros = {'action':'ajax','page':page,id_usuario:id_usuario};
    
    $.ajax({
      type : 'POST',
      url:'../modelo/modelo_listar_entrega.php',
      data: parametros,
      beforeSend: function(objeto){
       $('#panel_listado_entrega').html('cargando .... ');
      },
      success:function(data){
        $('#panel_listado_entrega').html(data).fadeIn('slow');
      }
    });
}

 function cargar_datos_buscar(page)
  {
    var txt_buscar = $('#txt_buscar').val();
    
    if(txt_buscar==''){
      $('#resp_busqueda_entrega').html('<label style="color:red;"> !!Escribe en el campo para Buscar!! </label>');
    }

    else{
    $('#resp_busqueda_entrega').html('');
    var id_usuario = $("#id_usuario_sesion").val();
    var parametros = {'action':'ajax','page':page,'txt_buscar':txt_buscar,id_usuario:id_usuario};
 
    $.ajax({
      type : 'POST',
      url:'../modelo/modelo_buscar_entrega.php',
      data: parametros,
      beforeSend: function(objeto){
        $('#panel_listado_entrega').html('cargando .... ');
      },
      success:function(data){
        $('#panel_listado_entrega').html(data).fadeIn('slow');
      }
    });

    }
  } 
