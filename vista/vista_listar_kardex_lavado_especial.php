<div class="row" style="padding: 0px; margin: 0px;">
	
	<div class="col-lg-12 col-md-12 col-xs-12" style="padding: 0px; margin: 0px; margin-top: 0.5%;">
		<table class="table table-condensed table-bordered table-hover" style="padding: 0px; margin: 0px;">
			<tr>
				<td> <input type="date" class="form-control" id="fecha_inicio"></td>
				<td> <input type="date" class="form-control" id="fecha_fin"></td>
                <td>
                	<select class="form-control" id="select_tipo">
                		<option value=""> Seleccione </option>
                		<option> servicios </option>
                		<option> cobros </option>
                		<option> todos </option>
                	</select>
                </td>
				<td>
					<button class="btn btn-default btn-md" onclick="listar_datos_se(1);"> <span class=""></span>  Listar </button>
				</td>

				 
			</tr>
		</table>
	</div>
	
	<div class="col-lg-12 col-md-12 col-xs-12" style='background:white; padding:0px; margin:0px; color:#6E6E6E;'>

		 <h4 style="margin-bottom: 0px;"> Registros de Lavados Especiales </h4>
         <p style="font-size: 10px; margin: 0px;"> Listado de todas segun fecha de trabajo </p> 

		<div id="panel_listado_kardex_lavado_especial">
			
		</div>

	</div>
<!-- FINAL DEL DIV ROW-->
</div>


<script type="text/javascript">

 function listar_datos_se()
 {
 	var fecha_inicio = $("#fecha_inicio").val();
 	var fecha_fin = $("#fecha_fin").val();
 	var tipo = $("#select_tipo").val();

 	if (tipo!="" && fecha_inicio!="" && fecha_fin!="")
 	{

 	var ob = {opcion:'listar',fecha_inicio:fecha_inicio, fecha_fin:fecha_fin, tipo:tipo };
 
    $.ajax({
     type: 'POST',
     url:'../vista/vista_opciones_kardex_lavado_especial.php',
     data: ob,
     beforeSend: function(objeto){ 
      $("#panel_listado_kardex_lavado_especial").html("<center><div id='panel_cargado'></div></center>"); },
     success: function(data)
     { 
         
        $('#panel_listado_kardex_lavado_especial').html(data);              
     }
    });
   }
   else
   {
   	 alert("DEBES SELECCIONAR LA FECHA Y EL TIPO DE LISTADO");
   }

 }

</script>
 
 