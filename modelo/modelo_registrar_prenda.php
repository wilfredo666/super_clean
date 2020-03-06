
 <?php
 
  $prenda= trim($_POST['prenda']); 
  $portada= trim($_POST['portada']); 
  $precio= trim($_POST['precio']); 
  $tipo_prenda= trim($_POST['tipo_prenda']); 
  $moneda= trim($_POST['moneda']);
  $forma= trim($_POST['forma']); 
  $color= trim($_POST['color']); 
  // $fecha = cambiaf_a_pg($fecha);

  if ($portada=="") {
      $portada = 'icono_prenda.png';
  }
   
  require('../conector/conexion.php');
  $sql= pg_query("INSERT INTO prenda (prenda ,portada ,precio ,tipo_prenda ,moneda, id_forma, id_color ) VALUES ( '$prenda' , '$portada' , '$precio' , '$tipo_prenda' , '$moneda', '$forma', '$color' )"); 

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
