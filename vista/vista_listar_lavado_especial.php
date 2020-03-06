<div class="row" style="padding: 0px; margin: 0px;">
	
	<div class="col-lg-12 col-md-12 col-xs-12" style="padding: 0px; margin: 0px; margin-top: 0.5%;">
		<table class="table table-condensed table-bordered table-hover" style="padding: 0px; margin: 0px;">
			<tr>
				<td> <input type="text" id="txt_buscar" class="form-control" onkeyup="cargar_datos_buscar(page);" placeholder="(*) Buscar Servicios "></td>
				<td>
					<button class="btn btn-default btn-md" onclick="cargar_datos_buscar(1);"> <span class=""></span> Buscar </button>
				</td>
				<td align="right">
					<button class="btn btn-default btn-md" onclick="btn_nuevo_lavado_especial();"> Nueva OT </button>
				</td>
			</tr>
		</table>
	</div>
	
	<div class="col-lg-12 col-md-12 col-xs-12" style='background:white; padding:0px; margin:0px; color:#6E6E6E;'>

		 <h4 style="margin-bottom: 0px;"> Registros de Ordenenes de Trabajo </h4>
         <p style="font-size: 10px; margin: 0px;"> Listado de todas las ordenes de trabajo </p> 

		<div id="panel_listado_lavado_especial">
			
		</div>

	</div>
<!-- FINAL DEL DIV ROW-->
</div>

<!-- Modal de registro -->

<div id='myModal_lavado_especial' class='modal fade' role='dialog'>
  <div class='modal-dialog modal-lg' style="width: 95%;">

    <!-- Modal content-->
    <div class='modal-content'>
     <div class='modal-header'>
       <button type='button' class='close' data-dismiss='modal'>&times;</button>
       <h4 class='modal-title'> Registrar lavado especial </h4>
     </div>
     
     <div class='modal-body'>

      <div id='panel_registro_lavado_especial'>
      </div>

      </div>
      <div class='modal-footer'>
      
      <button type='button' class='btn btn-default btn-md' onclick='btn_registrar_lavado_especial();'> registrar </button>

      <button type='button' class='btn btn-danger btn-md' data-dismiss='modal'> cancelar  </button>
             
      </div>
     </div>

  </div>
</div>

<script type="text/javascript" src="../control/control_lavado_especial.js"></script>