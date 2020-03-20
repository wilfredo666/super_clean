<div class='row' style='margin:0px; padding:0px;'> 


    <label> Todos los campos con (*) son obligatorios </label> </br>

<div class='col-lg-12 col-xs-12'> 
    <form method='post' id='formulario' enctype='multipart/form-data'>
        <label> Portada </label></br>
    <input type='hidden' class='form-control' id='img_prenda'>
    <center> 
        <span class='btn btn-default btn-file'> Subir Archivo
            <input type='file' name='file' class='form-control' placeholder='(*)Escriba su archivo' accept='.doc,.pdf,.png,.jpg,.mp4,.mkv' maxlength='100'> 
        </span>
    </center>
    <div id='resp_img_prenda'></div>
    </form>
</div>

<div class='col-lg-6 col-xs-6'> 

    <label>prenda</label></br>
<input type='text' id='prenda' class='form-control' placeholder='(*)Escriba su prenda' onkeyup="validador_campo('prenda','resp_prenda',4)" maxlength='200' onkeypress='return valida_ambos(event);'>

<div id='resp_prenda'></div>
</div> 


<style type='text/css'>
    .btn-file {
        position: relative;
        overflow: hidden;
    }
    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }
</style>
<div class='col-lg-6 col-xs-6'> 

    <label>Precio</label></br>
<input type='number' id='precio' class='form-control' placeholder='(*)Escriba su precio' onkeyup="validador_campo('precio','resp_precio',2)" maxlength='10' min='0'  onkeypress='return valida_numeros(event);'>

<div id='resp_precio' ></div>
</div> 

<div class='col-lg-6 col-xs-6'> 

    <label>Tipo de prenda</label></br>
<select  id='tipo_prenda' class='form-control'>
    <option value=''> Seleccione </option> <?php 
    require '../conector/conexion.php';
    $sql_seleccion = pg_query("SELECT * FROM tipo_prenda");
    while ($row_seleccion = pg_fetch_array($sql_seleccion)) 
    {
        $ID_campo = $row_seleccion['id_tipo_prenda'];
        $campo = $row_seleccion['tipo_prenda'];?>
    <option value ='<?php echo $ID_campo;?>'><?php echo $campo; ?></option> 
    <?php 
    } ?> 
</select>

<div id='resp_tipo_prenda' ></div>
</div> 

<div class='col-lg-6 col-xs-6'> 

    <label>Moneda</label></br>
<select  id='moneda' class='form-control'>
    <option value=''> Seleccione </option> <?php 
    require '../conector/conexion.php';
    $sql_seleccion = pg_query("SELECT * FROM moneda");
    while ($row_seleccion = pg_fetch_array($sql_seleccion)) 
    {
        $ID_campo = $row_seleccion['id_moneda'];
        $campo = $row_seleccion['moneda'];?>
    <option value ='<?php echo $ID_campo;?>'><?php echo $campo; ?></option> 
    <?php 
    } ?> 
</select>

<div id='resp_moneda' ></div>
</div>

</br><hr>

<div id='resultado_registro_prenda'></div> 

</div>
<script type='text/javascript' src='../control/control_prenda.js'></script>
