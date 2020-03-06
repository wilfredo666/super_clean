<?php
 echo "<label> Codigo de Lavado : </label>"; echo $codigo_lav = trim($_POST['codigo_lav']);
?>

<div class="row">
	<div class="col-lg-12 col-md-12 col-xs-12">
		<input type="hidden" id="tipo_lavado">
		<input type="hidden" id="codigo_lavado" value="<?php echo $codigo_lav; ?>">
		<div id="mensaje_resp_tipo_lavado"></div>
		
		<table class="table table-bordered table-condensed">
			<tr align="center">
				
				<td class="col-lg-3"> <input type="text" class="form-control" id="codigo_barras" placeholder="* codigo barras" maxlength="8" ></td>
				
				<td> <button class="btn btn-info btn-md" onclick="btn_select_tipo_lavado(1);">   SECO </button></td>

				<td> <button class="btn btn-success btn-md" onclick="btn_select_tipo_lavado(2);">  VAPOR </button></td>

				<td> <button class="btn btn-primary btn-md" onclick="btn_registrar_prenda_lavado_editar();"> Agregar </button></td>
			</tr>
		</table>
	</div>

    <div class="col-lg-12 col-md-12 col-xs-12">
    	<div id="panel_resp_registro_prenda_lavado"></div>
    </div>

</div>