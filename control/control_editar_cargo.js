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
                $('#img_cargo').val(datos);
                mostrar_archivo();
            }
        });
    });
          

    function mostrar_archivo()
    {
        var archivo = $('#img_cargo').val();
        var cadena ="<div style='width: 100%; padding-top: 2%;'><center><img src='../multimedia/imagenes/"+archivo+"' style='width: 70%; height: 150px; box-shadow: 1px 1px 1px 2px #A4A4A4;'></center></div>";
        $('#resp_img_cargo').html(cadena);
         
      }

  function btn_opciones(ID_cargo)
  {
    $('#ID_contenido').val(ID_cargo);
  }
  
  //FUNCION PARA EXAMIANAR LOS DATOS

  function btn_ver_cargo()
  {
   var ID_cargo = $('#ID_contenido').val();
   var ob ={ID_cargo:ID_cargo};
   
   $.ajax({
                type: 'POST',
                url:'../vista/vista_examinar_cargo.php',
                data: ob,
                beforeSend: function(objeto){
              
                },
                success: function(data)
                { 
                 $('#panel_examinar_cargo').html(data);
                }
             });
   }

  
  //FUNCION DE EDICION DE LOS DATOS DEL MODELO

  function btn_editar_cargo()
  { 
     var ID_cargo = $('#ID_contenido').val();

     var obj = {ID_cargo:ID_cargo};
    
    $.ajax({
      type: 'POST',
      url: '../vista/vista_editar_cargo.php',
      data: obj,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#panel_edicion_cargo').html(data).fadeIn('slow');
      }
    });

  }

  function btn_guardar_cambios_cargo()
  {
    var ID_cargo =$('#ID_cargo_edicion').val(); 
    var cargo = $('#cargo').val();
    
    var obj = {ID_cargo: ID_cargo,
    cargo: cargo};
     
    $.ajax({
      type: 'POST',
      url:'../modelo/modelo_guardar_cargo.php',
      data: obj,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#respuesta_guardar_cambios_cargo').html(data).fadeIn('slow');
        
        setTimeout(function(){
          $('#myModal_Edicion').modal('hide').fadeIn('slow');
        },2000);

      }
    });

  }
  

  function actualizar_datos_cargo_editar()
  {  $('#myModal').modal('hide').fadeIn('slow');
     $('#respuesta_guardar_cambios_cargo').html('').fadeIn('slow');
     //location.reload();
     window.setTimeout('cargar_datos(1)',1000);
  }

  function cargar_datos(page){
    var parametros = {'action':'ajax','page':page};
    $('#loader').fadeIn('slow');
    $.ajax({
      url:'../modelo/modelo_listar_cargo.php',
      data: parametros,
       beforeSend: function(objeto){
       $('#loader').html('cargando .... ');
      },
      success:function(data){
        $('#panel_listado_cargo').html(data).fadeIn('slow');
        $('#loader').html('');
      }
    })
  }


 function btn_eliminar_cargo()
 {  
    var ID_cargo = $('#ID_contenido').val();
    $('#ID_eliminar_cargo').val(ID_cargo);
 }

 function btn_borrar_cargo()
  {  
     var ID_cargo = $('#ID_eliminar_cargo').val();
     var parametros = {ID_cargo:ID_cargo};
    
     $.ajax({
      type: 'POST',
      url:'../modelo/modelo_eliminar_cargo.php',
      data: parametros,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#panel_eliminar_cargo').html(data).fadeIn('slow');
        
        setTimeout(function(){
          $('#myModal_Eliminar').modal('hide').fadeIn('slow');
        },2000);

      }
    });
  }

  function actualizar_datos_cargo_eliminar()
  {  
     $('#respuesta_eliminar_total_cargo').html('').fadeIn('slow');
     
  }

  function actualizar_y_salir()
  {
    setTimeout(function(){ cargar_datos(1); },1000);
  }

