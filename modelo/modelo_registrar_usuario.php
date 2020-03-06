
 <?php
 
  $email= trim($_POST['email']); 
  $password= trim($_POST['password']); 
  $sucursal= trim($_POST['sucursal']); 
  $cargo= trim($_POST['cargo']); 
  $nombres= trim($_POST['nombres']); 
  $apellidos= trim($_POST['apellidos']); 
  $ci= trim($_POST['ci']); 
  $numero= trim($_POST['numero']); // $fecha = cambiaf_a_pg($fecha);
   
  require('../conector/conexion.php');
  $sql= pg_query("INSERT INTO usuario (email ,password ,sucursal ,cargo ,nombres ,apellidos ,ci ,numero ) VALUES ( '$email' , '$password' , '$sucursal' , '$cargo' , '$nombres' , '$apellidos' , '$ci' , '$numero' )"); 

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
