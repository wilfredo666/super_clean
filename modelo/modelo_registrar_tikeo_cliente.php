
 <?php
 
  $id_prenda= trim($_POST['id_prenda']); 
  $id_cliente= trim($_POST['id_cliente']); 
  $cliente= trim($_POST['cliente']); 
  $codigo_barras= trim($_POST['codigo_barras']); 
  $id_usuario= trim($_POST['id_usuario']); 
  $id_sucursal= trim($_POST['id_sucursal']); 
  $fecha= trim($_POST['fecha']); 
  $hora= trim($_POST['hora']);
  $fecha = cambiaf_a_pg($fecha);

  require('../conector/conexion.php');
   

  $sql= pg_query("INSERT INTO tikeo_cliente (id_prenda ,id_cliente ,cliente ,codigo_barras ,id_usuario ,id_sucursal ,fecha ,hora ) VALUES ( '$id_prenda' , '$id_cliente' , '$cliente' , '$codigo_barras' , '$id_usuario' , '$id_sucursal' , '$fecha' , '$hora' )"); 

    if($sql == TRUE )
    {
      ?>
      <div class='alert alert-info' role='alert'>
      <strong> REGISTRO CORRECTO!! </strong> Se agregaron los datos correctamente
      </div>
      <?php

    }
    else
    { ?>
      <div class='alert alert-info' role='alert'>
      <strong> ERROR!! </strong> Vuelva a intentar el registro
      </div>
      <?php
    }

    function cambiaf_a_pg($fecha){

        ereg( '([0-9]{1,2})/([0-9]{1,2})/([0-9]{2,4})', $fecha, $mifecha);
        $lafecha=$mifecha[3].'-'.$mifecha[2].'-'.$mifecha[1];
        return $lafecha;
     } 

    ?>
