
 <?php
  
  require('../conector/conexion.php');
  $codigo_lav = trim($_POST['codigo']); 
  $total= trim($_POST['total']); 
  $pago= trim($_POST['pago']); 
  $saldo= trim($_POST['saldo']); 
  $id_usuario= trim($_POST['id_usuario']); 
  $fecha= date('Y-m-d'); 
  $hora= date('H:i:s');
   
  $sql = pg_query("INSERT INTO cobro_lavado_especial (codigo_lav ,total ,pago ,saldo ,id_usuario ,fecha ,hora ) VALUES ( '$codigo_lav' , '$total' , '$pago' , '$saldo' , '$id_usuario' , '$fecha' , '$hora' )"); 

  $sql_upd = pg_query("UPDATE lavado_especial SET estado = 'ENTREGADO' WHERE codigo = '$codigo_lav'");

    if($sql == TRUE )
    {
      echo '<center> <h3> <label> Registro Correcto </label> </h3></center>';
    }
    else
    {
      echo '<center> <h3> <label> No se Registro!! Volver a intentar </label> </h3></center>';
    }

    function cambiaf_a_pg($fecha){

        ereg( '([0-9]{1,2})/([0-9]{1,2})/([0-9]{2,4})', $fecha, $mifecha);
        $lafecha=$mifecha[3].'-'.$mifecha[2].'-'.$mifecha[1];
        return $lafecha;
     } 

    ?>
