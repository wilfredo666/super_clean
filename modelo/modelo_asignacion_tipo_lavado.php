<?php
$id_lavado = $_POST['id_lavado'];
$tipo_lavado = $_POST['tipo_lavado'];

?>
<div style="padding: 3%;">
 <div class='alert alert-success' role='alert'>
   <input type="hidden" id="tipo_lavado_registro" value="<?php echo $id_lavado; ?>">
  <h3 align="center"> <strong> LAVADO "<?php echo $tipo_lavado; ?>" </strong> </h3> 
</div>

</div>
 
 