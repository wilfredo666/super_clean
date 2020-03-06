
  <?php 

  require('../conector/conexion.php');
 
    $nombres = trim($_POST['nombres']);
    
    $apellidos = trim($_POST['apellidos']);
    
    $ci_nit = trim($_POST['ci_nit']);
    
    $celular = trim($_POST['celular']);
    
    $telefono = trim($_POST['telefono']);
    
    $email = trim($_POST['email']);
    
    $descuento = trim($_POST['descuento']);
    
    $sexo = trim($_POST['sexo']);
    
    $ID_cliente = $_POST['ID_cliente'];

    $tipo = $_POST['tipo'];
  
    $cadena= '';
       if($nombres!='')
       {
       $query = pg_query("UPDATE cliente SET nombres = '$nombres' WHERE id_cliente = $ID_cliente");$cadena.=' Se edito nombres , ';
       } 
       if($apellidos!='')
       {
       $query = pg_query("UPDATE cliente SET apellidos = '$apellidos' WHERE id_cliente = $ID_cliente");$cadena.=' Se edito apellidos , ';
       } 
       if($ci_nit!='')
       {
       $query = pg_query("UPDATE cliente SET ci_nit = '$ci_nit' WHERE id_cliente = $ID_cliente");$cadena.=' Se edito ci_nit , ';
       } 
       if($celular!='')
       {
       $query = pg_query("UPDATE cliente SET celular = '$celular' WHERE id_cliente = $ID_cliente");$cadena.=' Se edito celular , ';
       } 
       if($telefono!='')
       {
       $query = pg_query("UPDATE cliente SET telefono = '$telefono' WHERE id_cliente = $ID_cliente");$cadena.=' Se edito telefono , ';
       } 
       if($email!='')
       {
       $query = pg_query("UPDATE cliente SET email = '$email' WHERE id_cliente = $ID_cliente");$cadena.=' Se edito email , ';
       } 
       if($descuento!='')
       {
       $query = pg_query("UPDATE cliente SET descuento = '$descuento' WHERE id_cliente = $ID_cliente");$cadena.=' Se edito descuento , ';
       } 
       
       if($sexo!='')
       {
       $query = pg_query("UPDATE cliente SET sexo = '$sexo' WHERE id_cliente = $ID_cliente");$cadena.=' Se edito sexo , ';
       }

       if($tipo!='')
       {
       $query = pg_query("UPDATE cliente SET tipo = '$tipo' WHERE id_cliente = $ID_cliente");$cadena.=' Se edito tipo , ';
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
