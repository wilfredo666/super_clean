
  <?php 

  require('../conector/conexion.php');
 
    $email = trim($_POST['email']);
    
    $password = trim($_POST['password']);
    
    $sucursal = trim($_POST['sucursal']);
    
    $cargo = trim($_POST['cargo']);
    
    $nombres = trim($_POST['nombres']);
    
    $apellidos = trim($_POST['apellidos']);
    
    $ci = trim($_POST['ci']);
    
    $numero = trim($_POST['numero']);
    
    $ID_usuario = $_POST['ID_usuario'];
  
  $cadena= '';
       if($email!='')
       {
       $query = pg_query("UPDATE usuario SET email = '$email' WHERE id_usuario = $ID_usuario");$cadena.=' Se edito email , ';
       } 
       if($password!='')
       {
       $query = pg_query("UPDATE usuario SET password = '$password' WHERE id_usuario = $ID_usuario");$cadena.=' Se edito password , ';
       } 
       if($sucursal!='')
       {
       $query = pg_query("UPDATE usuario SET sucursal = '$sucursal' WHERE id_usuario = $ID_usuario");$cadena.=' Se edito sucursal , ';
       } 
       if($cargo!='')
       {
       $query = pg_query("UPDATE usuario SET cargo = '$cargo' WHERE id_usuario = $ID_usuario");$cadena.=' Se edito cargo , ';
       } 
       if($nombres!='')
       {
       $query = pg_query("UPDATE usuario SET nombres = '$nombres' WHERE id_usuario = $ID_usuario");$cadena.=' Se edito nombres , ';
       } 
       if($apellidos!='')
       {
       $query = pg_query("UPDATE usuario SET apellidos = '$apellidos' WHERE id_usuario = $ID_usuario");$cadena.=' Se edito apellidos , ';
       } 
       if($ci!='')
       {
       $query = pg_query("UPDATE usuario SET ci = '$ci' WHERE id_usuario = $ID_usuario");$cadena.=' Se edito ci , ';
       } 
       if($numero!='')
       {
       $query = pg_query("UPDATE usuario SET numero = '$numero' WHERE id_usuario = $ID_usuario");$cadena.=' Se edito numero , ';
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
