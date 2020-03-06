
 <?php
 
  $id_usuario= trim($_POST['id_usuario']); 
  $id_sucursal= trim($_POST['id_sucursal']); 
  $id_cliente= trim($_POST['id_cliente']); 
  $cliente= trim($_POST['cliente']); 
  $ci_nit= trim($_POST['ci_nit']); 
  $id_prenda= trim($_POST['id_prenda']); 
  $id_tipo_lavado= trim($_POST['id_tipo_lavado']); 
  $cantidad_prenda= trim($_POST['cantidad_prenda']); 
  $cantidad_peso= trim($_POST['cantidad_peso']); 
  $medida_prenda= trim($_POST['medida_prenda']); 
  $costo_prenda= trim($_POST['costo_prenda']); 
  $costo_kilo= trim($_POST['costo_kilo']); 
  $costo_metro= trim($_POST['costo_metro']); 
  $total_servicio= trim($_POST['total_servicio']); 
  $pago_servicio= trim($_POST['pago_servicio']); 
  $saldo_servicio= trim($_POST['saldo_servicio']); 
  $moneda= trim($_POST['moneda']); 
  $descuento= trim($_POST['descuento']); 
  $tipo_cliente= trim($_POST['tipo_cliente']); 
  $estado= trim($_POST['estado']); 
  $codigo_ot= trim($_POST['codigo_ot']); // $fecha = cambiaf_a_pg($fecha);
   
  require('../conector/conexion.php');
  $sql= pg_query("INSERT INTO orden_trabajo (id_usuario ,id_sucursal ,id_cliente ,cliente ,ci_nit ,id_prenda ,id_tipo_lavado ,cantidad_prenda ,cantidad_peso ,medida_prenda ,costo_prenda ,costo_kilo ,costo_metro ,total_servicio ,pago_servicio ,saldo_servicio ,moneda ,descuento ,tipo_cliente ,estado ,codigo_ot ) VALUES ( '$id_usuario' , '$id_sucursal' , '$id_cliente' , '$cliente' , '$ci_nit' , '$id_prenda' , '$id_tipo_lavado' , '$cantidad_prenda' , '$cantidad_peso' , '$medida_prenda' , '$costo_prenda' , '$costo_kilo' , '$costo_metro' , '$total_servicio' , '$pago_servicio' , '$saldo_servicio' , '$moneda' , '$descuento' , '$tipo_cliente' , '$estado' , '$codigo_ot' )"); 

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
