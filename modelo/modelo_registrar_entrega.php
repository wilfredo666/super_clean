<?php
  $codigo_ot= trim($_POST['codigo_ot']); 
  $estado= trim($_POST['estado']); 
  $fecha= trim($_POST['fecha']); 
  $hora= trim($_POST['hora']);
  $total = trim($_POST['total']);
  $pago = trim($_POST['pago']);
  $saldo = trim($_POST['saldo']);
   
  require('../conector/conexion.php');

  $sql_ver = pg_query("SELECT COUNT (*) AS count FROM entrega WHERE codigo_ot = '$codigo_ot'");
  $row_ver = pg_fetch_array($sql_ver);
  $cont=$row_ver['count'];

  if($cont==0)
  {
     $sql= pg_query("INSERT INTO entrega (codigo_ot ,estado ,fecha ,hora ,total ,pago , saldo) VALUES ( '$codigo_ot' , '$estado' , '$fecha' , '$hora','$total', '$pago', '$saldo' )"); 

     $sql_ot= pg_query("UPDATE orden_trabajo SET estado='ENTREGADO' WHERE codigo_ot='$codigo_ot'");

     $sql_ot= pg_query("UPDATE acomodado SET estado_acomodado='INACTIVO' WHERE codigo_ot='$codigo_ot'"); 

    if($sql == TRUE )
    { ?>
        <div class='alert alert-info' role='alert'>
         <strong> REGISTRO CORRECTO!! </strong> Se guardo los datos correctamente
        </div>

        <script type="text/javascript">
          setTimeout(function(){
            btn_listar_entrega();
          },3000);
        </script>
    <?php
    }
    else
    { ?>
        <div class='alert alert-danger' role='alert'>
         <strong> ERROR!! </strong> No se guardo los datos en la base de datos
        </div>
    <?php
    }
   
  }
  else
  { ?>
        <div class='alert alert-danger' role='alert'>
         <strong> ALERTA!! </strong> La Orden de Trabajo ya se Entrego
        </div>
  <?php
  }
?>
