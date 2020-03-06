$(document).ready(function(){
  cargar_datos(1);
});

function cargar_datos(page){

    var id_usuario = $("#id_usuario_sesion").val();
    var obj = {'action':'ajax','page':page,id_usuario:id_usuario};
    
    $.ajax({
      type : 'POST',
      url:'../modelo/orden_trabajo/modelo_listar_orden_trabajo.php',
      data: obj,
       beforeSend: function(objeto){
        $('#panel_listado_orden_trabajo').html('cargando .... ');
      },
      success:function(data){
        $('#panel_listado_orden_trabajo').html(data).fadeIn('slow');
      }
    });
  
}

  function cargar_datos_buscar(page)
  {
    var txt_buscar = $('#txt_buscar').val();
    
    if(txt_buscar==''){
      $('#resp_busqueda_orden_trabajo').html('<label style="color:red;"> !!Escribe en el campo para Buscar!! </label>');
    }

    else{
    
    $('#resp_busqueda_orden_trabajo').html('');
    var id_usuario = $("#id_usuario_sesion").val();
    var obj = {'action':'ajax','page':page,'txt_buscar':txt_buscar,id_usuario:id_usuario};
    
    $.ajax({
      type : 'POST',
      url:'../modelo/orden_trabajo/modelo_buscar_orden_trabajo.php',
      data: obj,
       beforeSend: function(objeto){
       $('#panel_listado_orden_trabajo').html('cargando .... ');
      },
      success:function(data){
        $('#panel_listado_orden_trabajo').html(data).fadeIn('slow');
      }
    });

    }
  } 
