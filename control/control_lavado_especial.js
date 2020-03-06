
/* FUNCIONES DE JS PARA LAVADO ESPECIAL */

function btn_nuevo_lavado_especial()
{
  $('#myModal_lavado_especial').modal({ show: 'true'}); 

  var ob = "";

  $.ajax({
      type : 'POST',
      url:'../vista/vista_registro_lavado_especial.php',
      data: ob,
      beforeSend: function(objeto){
       $('#panel_registro_lavado_especial').html('cargando .... ');
      },
      success:function(data){
       $('#panel_registro_lavado_especial').html(data).fadeIn('slow');
      }
    });
}

/* CREAMOS EL CARRITO DE COMPRAS */
var lista = [];
function lavado(ID_cliente,cliente,ID_prenda,portada,prenda,medida)
{
	this.ID_cliente = ID_cliente;
	this.cliente = cliente;
	this.ID_prenda = ID_prenda;
	this.prenda = prenda;
	this.medida = medida;
	this.portada = portada;

}

function btn_registrar_carrito_le()
{
 var ID_cliente = $("#ID_cliente").val();
 var cliente = $("#cliente").val();
 var ID_prenda = $("#ID_prenda").val();
 var prenda = $("#prenda").val();
 var medida = $("#medida").val();
 var portada = $("#portada").val();

 if (ID_cliente!="" && cliente!="" && ID_prenda!="" && prenda!="" && 
 	 medida!="" && portada!="")
 {

 var p = new lavado(ID_cliente,cliente,ID_prenda,portada,prenda,medida);
 lista.push(p);
 btn_lista_prendas_carrito();
 }
 else
 { alert('DEBE SELECCIONAR UN CLIENTE CON SU PRENDA'); 
   $("#txt_buscar_prenda").focus();
   $("#txt_buscar_cliente").focus(); }

}

function btn_lista_prendas_carrito()
{
	var cadena="<table class='table table-bordered table-condensed table-hover'>";
    var cadena = cadena+
    "<tr> <th> <center> Cliente </center> </th> "+
    "<th> <center> Portada </center></th> "+
    "<th> <center> Prenda </center></th>"+
    "<th> <center> Prenda </center></th>"+
    "</tr>";

    for (var i = 0; i < lista.length; i++) {
      
      cadena = cadena +"<tr align='center'> "+
      "<td> "+lista[i].cliente+" </td> "+
      "<td> <img src='../multimedia/imagenes/"+lista[i].portada+"' style='width:50px; height:50px;'> </td> "+
      "<td> "+lista[i].prenda+"</td> "+
      "<td> <button class='btn btn-danger btn-xs' onclick='borrar("+i+")'> Eliminar </button></td> "+
      "</tr>";
    }
   
    var cadena = cadena+"</table>";
    
    $("#panel_listado_prendas_lavado_especial").html(cadena);
}

function borrar(id_select)
{
  lista.splice( id_select, 1);
  btn_lista_prendas_carrito();	
}

function btn_buscar_cliente()
{
  var txt_buscar = $("#txt_buscar_cliente").val();
  var ID_usuario = $("#id_usuario_sesion").val();
  var ob = { opcion:'buscar_cliente', txt_buscar: txt_buscar, ID_usuario:ID_usuario };

  $.ajax({
      type : 'POST',
      url:'../modelo/modelo_operaciones_lavado_especial.php',
      data: ob,
      beforeSend: function(objeto){
       $('#resp_cliente').html('cargando .... ');
      },
      success:function(data){
       $('#resp_cliente').html(data);
      }
    });

}

function btn_cerrar_select_cliente()
{
  $('#resp_cliente').html("");
  $("#ID_cliente").val('');
  $("#cliente").val('');
  $("#txt_buscar_cliente").val('');
}

function btn_elegir_cliente(ID_cliente,cliente)
{
  $("#ID_cliente").val(ID_cliente);
  $("#cliente").val(cliente);
  $("#txt_buscar_cliente").val(cliente);
  $('#resp_cliente').html("");

}

function btn_buscar_prenda()
{
  var txt_buscar = $("#txt_buscar_prenda").val();
  var ID_usuario = $("#id_usuario_sesion").val();
  var ob = { opcion:'buscar_prenda', txt_buscar: txt_buscar, ID_usuario:ID_usuario };

  $.ajax({
      type : 'POST',
      url:'../modelo/modelo_operaciones_lavado_especial.php',
      data: ob,
      beforeSend: function(objeto){
       $('#resp_prenda').html('cargando .... ');
      },
      success:function(data){
       $('#resp_prenda').html(data);
      }
    });

}

function btn_elegir_prenda(ID_prenda,prenda,portada)
{
  $("#ID_prenda").val(ID_prenda);
  $("#prenda").val(prenda);
  $("#portada").val(portada);
  $("#txt_buscar_prenda").val(prenda);
  $('#resp_prenda').html("");

}

function btn_calcular_pago()
{
  var pago = $("#pago").val();
  var saldo = $("#saldo").val();

  if (pago=="") { pago=0; }
  if (saldo=="") { saldo=0; }

  if (pago>0)
  {
    $("#saldo").val(pago);
  }
  else
  {
  	$("#saldo").val(0);
  }
}

function btn_registrar_lavado_especial()
{
  var ID_usuario = $("#id_usuario_sesion").val();
  var total = $("#total").val();
  var pago = $("#pago").val();
  var saldo = $("#saldo").val();
  var size = lista.length;
 
  if (ID_usuario!="" && pago!="" && size>0)
  {
  	var lista_json = JSON.stringify(lista);
  	var ob = {tipo:'registrar', ID_usuario:ID_usuario, total:total, pago:pago, 
  	saldo:saldo, lista:lista_json };

    $.ajax({
      type : 'POST',
      url:'../modelo/modelo_registrar_lavado_especial.php',
      data: ob,
      beforeSend: function(objeto){
       $('#panel_respuesta_prendas_lavado_especial').html('cargando .... ');
      },
      success:function(data){
       $('#panel_respuesta_prendas_lavado_especial').html(data);
      }
    });	

  }
  else
  {
  	alert("DEBE CARGAR PRENDAS,CLIENTE Y SU PAGO CORRESPONDIENTE");
  }

}

 $(document).ready(function(){
    cargar_datos(1);
  });

function cargar_datos(page){
    var id_usuario = $("#id_usuario_sesion").val();
    var parametros = {'action':'ajax','page':page,id_usuario:id_usuario};
    
    $.ajax({
      type:'POST',
      url:'../modelo/modelo_listar_lavado_especial.php',
      data: parametros,
       beforeSend: function(objeto){
       $('#loader').html('cargando .... ');
      },
      success:function(data){
        $('#panel_listado_lavado_especial').html(data).fadeIn('slow');
        $('#loader').html('');
      }
    });
}

function btn_buscar(){
    var txt_buscar = $("#txt_buscar").val();
    var id_usuario = $("#id_usuario_sesion").val();
    var parametros = {'action':'ajax','page':page, txt_buscar:txt_buscar,id_usuario:id_usuario };
   
    $.ajax({
      type : 'POST',
      url:'../modelo/modelo_buscar_lavado_especial.php',
      data: parametros,
       beforeSend: function(objeto){
       $('#loader').html('cargando .... ');
      },
      success:function(data){
        $('#panel_listado_lavado_especial').html(data).fadeIn('slow');
        $('#loader').html('');
      }
    });
  }

function cargar_datos_buscar(page)
  {
    var txt_buscar = $('#txt_buscar').val();
    
    if(txt_buscar==''){
      $('#resp_busqueda_acomodado').html('<label style="color:red;"> !!Escribe en el campo para Buscar!! </label>');
    }

    else{
    $('#resp_busqueda_acomodado').html('');
    
    var id_usuario = $("#id_usuario_sesion").val();

    var parametros = {'action':'ajax','page':page,'txt_buscar':txt_buscar,
    id_usuario:id_usuario};
  
    $.ajax({
      type : 'POST',
      url:'../modelo/modelo_buscar_lavado_especial.php',
      data: parametros,
       beforeSend: function(objeto){
       $('#loader').html('cargando .... ');
      },
      success:function(data){
        $('#panel_listado_lavado_especial').html(data).fadeIn('slow');
        $('#loader').html('');
      }
    });

    }
  } 