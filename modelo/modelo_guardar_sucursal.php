
  <?php 

  require('../conector/conexion.php');
 
    $sucursal = trim($_POST['sucursal']);
    
    $encargado = trim($_POST['encargado']);
    
    $telefono = trim($_POST['telefono']);
    
    $celular = trim($_POST['celular']);
    
    $ID_sucursal = $_POST['ID_sucursal'];
  
  $cadena= '';
       if($sucursal!='')
       {
       $query = pg_query("UPDATE sucursal SET sucursal = '$sucursal' WHERE id_sucursal = $ID_sucursal");$cadena.=' Se edito sucursal , ';
       } 
       if($encargado!='')
       {
       $query = pg_query("UPDATE sucursal SET encargado = '$encargado' WHERE id_sucursal = $ID_sucursal");$cadena.=' Se edito encargado , ';
       } 
       if($telefono!='')
       {
       $query = pg_query("UPDATE sucursal SET telefono = '$telefono' WHERE id_sucursal = $ID_sucursal");$cadena.=' Se edito telefono , ';
       } 
       if($celular!='')
       {
       $query = pg_query("UPDATE sucursal SET celular = '$celular' WHERE id_sucursal = $ID_sucursal");$cadena.=' Se edito celular , ';
       }  
   if($cadena!='')
   {
      ?>
      <div class='alert alert-success' role='alert'>
      <strong> CAMBIOS!! </strong> actualizados de <?php echo $cadena; ?>
      </div><?php

   }
   else
   { 
     ?>
     <div class='alert alert-danger' role='alert'>
     <strong>ALERTA! </strong> Debes ingresar datos validos.
     </div><?php
   }

  ?>
