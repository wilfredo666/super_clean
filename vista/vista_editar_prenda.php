
<?php
require('../conector/conexion.php');

$ID_prenda = trim($_POST['ID_prenda']);

$query = pg_query("SELECT * FROM prenda WHERE id_prenda='$ID_prenda'");
while($row = pg_fetch_array($query))
{
?> 
<div class='row'>

    <input type='hidden' id='ID_prenda_edicion' value='<?php echo $ID_prenda; ?>'>

    <div class='col-lg-6 col-sm-6 col-xs-12'>

        <label> portada : </label>  
        <?php $portada= trim($row['portada']); ?> 

        <div style="width:100%;" align="center">
            <img src="../multimedia/imagenes/<?php echo $portada; ?>" style="width:150px; height:150px;">
        </div>
        <form method="post" id="formulario" enctype="multipart/form-data">
            <h6><label> Cambiar Imagen </label></h6>
            <input type="hidden" class="form-control" id="img_prenda">
            <center> 
                <span class="btn btn-default btn-file"> Subir Archivo
                    <input type="file" name="file" class="form-control" placeholder="(*)Escriba su archivo" accept=".doc,.pdf,.png,.jpg,.mp4,.mkv" maxlength="100" > 
                </span>
            </center>
            <div id="resp_img_prenda"></div>
        </form>
    </div>

    <style type="text/css">
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

    <div class='col-lg-6 col-sm-6 col-xs-12'>

        <label> prenda : </label>  
        <?php echo $prenda= trim($row['prenda']); ?> 

        <input type='text' class='form-control' id='prenda' value='<?php echo $prenda;?>' placeholder='(*)Escriba su prenda' onkeyup="validador_campo('prenda','resp_prenda',4)" maxlength='100' onkeypress='return valida_letras(event);'>

        <div id='resp_prenda'> </div>
    </div>

    <div class='col-lg-6 col-sm-6 col-xs-12'>

        <label> precio : </label>  
        <?php echo $precio= trim($row['precio']); ?> 
        <input type='text' class='form-control' id='precio' value='<?php echo $precio;?>' placeholder='(*)Escriba su precio' onkeyup="validador_campo('precio','resp_precio',4)" maxlength='3' min='0' onkeypress='return valida_numeros(event);'>

        <div id='resp_precio'> </div>
    </div>
    <div class='col-lg-6 col-sm-6 col-xs-12'>

        <label> tipo : </label>  
        <?php $tipo_prenda= trim($row['tipo_prenda']);

 $sql_tipo_prenda = pg_query("SELECT * FROM tipo_prenda WHERE ID_tipo_prenda='$tipo_prenda'");$row_tipo_prenda = pg_fetch_array($sql_tipo_prenda);
 echo $row_tipo_prenda['tipo_prenda']; 

        ?>

        <select  id='tipo_prenda' class='form-control'>
            <option value=''> Seleccione </option> <?php 

 $sql_seleccion = pg_query("SELECT * FROM tipo_prenda");
 while ($row_seleccion = pg_fetch_array($sql_seleccion)) 
 {
     $ID_campo = $row_seleccion['id_tipo_prenda'];
     $campo = $row_seleccion['tipo_prenda'];?>
            <option value ='<?php echo $ID_campo;?>'><?php echo $campo; ?></option> 
            <?php 
 } ?> 
        </select>
        <div id='resp_tipo_prenda' > </div>
    </div>
    <div class='col-lg-6 col-sm-6 col-xs-12'>

        <label> moneda : </label>  
        <?php $moneda= trim($row['moneda']); ?> 
        <?php 

 $sql_moneda = pg_query("SELECT * FROM moneda WHERE ID_moneda='$moneda'");$row_moneda = pg_fetch_array($sql_moneda);
 echo $row_moneda['moneda']; 

        ?>

        <select  id='moneda' class='form-control'>
            <option value=''> Seleccione </option> <?php 

 $sql_seleccion = pg_query("SELECT * FROM moneda");
 while ($row_seleccion = pg_fetch_array($sql_seleccion)) 
 {
     $ID_campo = $row_seleccion['id_moneda'];
     $campo = $row_seleccion['moneda'];?>
            <option value ='<?php echo $ID_campo;?>'><?php echo $campo; ?></option> 
            <?php 
 } ?> 
        </select>
        <div id='resp_moneda' > </div>
    </div>

</div>
<?php
}

?>
<!-- final div row -->
</div>
<script type='text/javascript' src='../control/control_editar_prenda.js'></script>

