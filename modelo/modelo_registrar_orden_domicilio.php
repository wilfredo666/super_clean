<?php
    
  $codigo_ot= trim($_POST['codigo_ot']); 
  $id_chofer= trim($_POST['id_chofer']); 
  $precio_envio= trim($_POST['precio_envio']); 
  $fecha= trim($_POST['fecha']); 
  $hora= trim($_POST['hora']); // $fecha = cambiaf_a_pg($fecha);
   
  require('../conector/conexion.php');

  $sql_ver = pg_query("SELECT COUNT(*) AS count FROM orden_domicilio WHERE codigo_ot ='$codigo_ot'");
  $row_ver = pg_fetch_array($sql_ver);
  $cont = $row_ver['count'];

  if ($cont ==0) {
  $sql= pg_query("INSERT INTO orden_domicilio (codigo_ot ,id_chofer ,precio_envio ,fecha ,hora ) VALUES ( '$codigo_ot' , '$id_chofer' , '$precio_envio' , '$fecha' , '$hora' )"); 

    if($sql == TRUE )
    {
       
      ?>
         <div class='alert alert-info' role='alert'>
         <strong> REGISTRO CORRECTO!! </strong> Datos almacenados correctamente
         </div>
         <script type="text/javascript">
           setTimeout(function(){
            btn_listar_orden_domicilio();
           },2000);
         </script>
      <?php
    }
    else
    {
      echo '<center> <h3> <label> No se Registro!! Volver a intentar </label> </h3></center>';
    }
  }

  else{
      ?>
         <div class='alert alert-danger' role='alert'>
         <strong> ERROR !! </strong> La entrega de orden de trabaja ya fue asignada
         </div>
         
      <?php    
  }

    function cambiaf_a_pg($fecha){

        ereg( '([0-9]{1,2})/([0-9]{1,2})/([0-9]{2,4})', $fecha, $mifecha);
        $lafecha=$mifecha[3].'-'.$mifecha[2].'-'.$mifecha[1];
        return $lafecha;
     } 

    ?>
