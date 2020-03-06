
 <?php
 
  $nombre_completo= trim($_POST['nombre_completo']); 
  $direccion= trim($_POST['direccion']); 
  $celular= trim($_POST['celular']); 
  $telefono= trim($_POST['telefono']); // $fecha = cambiaf_a_pg($fecha);
   
  require('../conector/conexion.php');
  $sql= pg_query("INSERT INTO chofer (nombre_completo ,direccion ,celular ,telefono ) VALUES ( '$nombre_completo' , '$direccion' , '$celular' , '$telefono' )"); 

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
