<div class='row' style='margin:0px; padding:0px;'> 

    <label> Todos los campos con (*) son obligatorios </label> </br>

<div class='col-lg-6 col-xs-6'> 

    <label>Color de prenda</label></br>
<input type='text' id='nombre_color' class='form-control' placeholder='(*)Escriba el nombre de color' onkeyup="validador_campo('nombre_color','resp_color_prenda',3)" maxlength='200' onkeypress='return valida_ambos(event);'></br>
<div id='resp_color_prenda'></div>

<label>Seleccione el color</label>
<input type='color' id='cod_color'>
</div> 
</br><hr>

<div id='resultado_registro_color_prenda'></div> 

</div>
<script type='text/javascript' src='../control/control_color_prenda.js'></script>
