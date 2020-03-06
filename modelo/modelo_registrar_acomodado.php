
 <?php
 
  $id_cliente= trim($_POST['id_cliente']); 
  $cliente= trim($_POST['cliente']); 
  $id_usuario= trim($_POST['id_usuario']); 
  $id_sucursal= trim($_POST['id_sucursal']); 
  $id_ot= trim($_POST['id_ot']); 
  $codigo_ot= trim($_POST['codigo_ot']); 
  $id_lugar= trim($_POST['id_lugar']); 
  $lugar= trim($_POST['lugar']); 
  $estado_acomodado= trim($_POST['estado_acomodado']); 
  $codigo_tikeo= trim($_POST['codigo_tikeo']); 
  $tipo_lavado= trim($_POST['tipo_lavado']); 
  $id_lavado= trim($_POST['id_lavado']); 
  $id_prenda= trim($_POST['id_prenda']);  
   
  require('../conector/conexion.php');
  
  $sql= pg_query("INSERT INTO acomodado (id_cliente ,cliente ,id_usuario ,id_sucursal ,id_ot ,codigo_ot ,id_lugar ,lugar ,estado_acomodado ,codigo_tikeo ,tipo_lavado ,id_lavado ,id_prenda ) VALUES ( '$id_cliente' , '$cliente' , '$id_usuario' , '$id_sucursal' , '$id_ot' , '$codigo_ot' , '$id_lugar' , '$lugar' , '$estado_acomodado' , '$codigo_tikeo' , '$tipo_lavado' , '$id_lavado' , '$id_prenda' )"); 

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
