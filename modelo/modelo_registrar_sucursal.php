
 <?php
 
  $sucursal= trim($_POST['sucursal']); 
  $encargado= trim($_POST['encargado']); 
  $telefono= trim($_POST['telefono']); 
  $celular= trim($_POST['celular']); // $fecha = cambiaf_a_pg($fecha);
   
  require('../conector/conexion.php');
  $sql= pg_query("INSERT INTO sucursal (sucursal ,encargado ,telefono ,celular ) VALUES ( '$sucursal' , '$encargado' , '$telefono' , '$celular' )"); 

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
