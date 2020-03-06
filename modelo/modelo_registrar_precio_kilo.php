
 <?php
 
  $precio_kilo= trim($_POST['precio_kilo']); 
  $fecha= trim($_POST['fecha']); 
  $hora= trim($_POST['hora']); // $fecha = cambiaf_a_pg($fecha);
   
  require('../conector/conexion.php');
  $sql= pg_query("INSERT INTO precio_kilo (precio_kilo ,fecha ,hora ) VALUES ( '$precio_kilo' , '$fecha' , '$hora' )"); 

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
