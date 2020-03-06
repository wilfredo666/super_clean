
 <?php
 
  $id_cliente= trim($_POST['id_cliente']); 
  $cliente= trim($_POST['cliente']); 
  $id_usuario= trim($_POST['id_usuario']); 
  $id_sucursal= trim($_POST['id_sucursal']); 
  $id_ot= trim($_POST['id_ot']); 
  $codigo_ot= trim($_POST['codigo_ot']); 
  $codigo_barras= trim($_POST['codigo_barras']); 
  $estado_tikeo= trim($_POST['estado_tikeo']); 
  $id_prenda= trim($_POST['id_prenda']); // $fecha = cambiaf_a_pg($fecha);
   
  require('../conector/conexion.php');
  $sql= pg_query("INSERT INTO tikeo (id_cliente ,cliente ,id_usuario ,id_sucursal ,id_ot ,codigo_ot ,codigo_barras ,estado_tikeo ,id_prenda ) VALUES ( '$id_cliente' , '$cliente' , '$id_usuario' , '$id_sucursal' , '$id_ot' , '$codigo_ot' , '$codigo_barras' , '$estado_tikeo' , '$id_prenda' )"); 

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
