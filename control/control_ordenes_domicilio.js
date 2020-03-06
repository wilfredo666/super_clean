   // FUNCIONALIDADES DE LISTADO Y EDICION DE CADA AREA DE TRABAJO

  $(document).ready(function(){
    cargar_datos(1);
  });

  function cargar_datos(page){

    var id_usuario = $("#id_usuario_sesion").val();
    var obj = {'action':'ajax','page':page,id_usuario:id_usuario};
     
    $.ajax({
      type : 'POST',
      url:'../modelo/modelo_listar_orden_domicilio.php',
      data: obj,
      beforeSend: function(objeto){
       $('#panel_listado_orden_domicilio').html('cargando .... ');
      },
      success:function(data){
      $('#panel_listado_orden_domicilio').html(data).fadeIn('slow');
        
      }
    });
  }

  function cargar_datos_buscar(page)
  {
    var txt_buscar = $('#txt_buscar').val();
    
    if(txt_buscar==''){
      $('#resp_busqueda_orden_domicilio').html('<label style="color:red;"> !!Escribe en el campo para Buscar!! </label>');
    }

    else{
    $('#resp_busqueda_orden_domicilio').html('');
    
    var id_usuario = $("#id_usuario_sesion").val();
    var parametros = {'action':'ajax','page':page,'txt_buscar':txt_buscar,id_usuario:id_usuario};
 
    $.ajax({
      type : 'POST',
      url:'../modelo/modelo_buscar_orden_domicilio.php',
      data: parametros,
      beforeSend: function(objeto){
        $('#panel_listado_orden_domicilio').html('cargando .... ');
      },
      success:function(data){
        $('#panel_listado_orden_domicilio').html(data).fadeIn('slow');
        
      }
    });

    }
  } 
  