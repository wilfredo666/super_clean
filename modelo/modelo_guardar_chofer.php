
  <?php 

  require('../conector/conexion.php');
 
    $nombre_completo = trim($_POST['nombre_completo']);
    
    $direccion = trim($_POST['direccion']);
    
    $celular = trim($_POST['celular']);
    
    $telefono = trim($_POST['telefono']);
    
    $ID_chofer = $_POST['ID_chofer'];
  
  $cadena= '';
       if($nombre_completo!='')
       {
       $query = pg_query("UPDATE chofer SET nombre_completo = '$nombre_completo' WHERE id_chofer = $ID_chofer");$cadena.=' Se edito nombre_completo , ';
       } 
       if($direccion!='')
       {
       $query = pg_query("UPDATE chofer SET direccion = '$direccion' WHERE id_chofer = $ID_chofer");$cadena.=' Se edito direccion , ';
       } 
       if($celular!='')
       {
       $query = pg_query("UPDATE chofer SET celular = '$celular' WHERE id_chofer = $ID_chofer");$cadena.=' Se edito celular , ';
       } 
       if($telefono!='')
       {
       $query = pg_query("UPDATE chofer SET telefono = '$telefono' WHERE id_chofer = $ID_chofer");$cadena.=' Se edito telefono , ';
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
