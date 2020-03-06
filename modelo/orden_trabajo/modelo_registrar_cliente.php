
 <?php
  
  $nombres= trim($_POST['nombres']); 
  $apellidos= trim($_POST['apellidos']); 
  $ci_nit = trim($_POST['ci_nit']); 
  $celular= trim($_POST['celular']); 
  $telefono= trim($_POST['telefono']); 
  $email= trim($_POST['email']); 
  $descuento= trim($_POST['descuento']); 
  $sexo= trim($_POST['sexo']);  
  $tipo= trim($_POST['tipo']);

  if($nombres==""){ $nombres=""; }
  if($apellidos==""){ $apellidos=""; }
  if($ci_nit==""){ $ci_nit=0; }
  if($celular==""){ $celular=0; }
  if($telefono==""){ $telefono=0; }
  if($email==""){ $email=""; }
  if($descuento==""){ $descuento=0; }
  if($sexo==""){ $sexo=""; }
  if($tipo==""){ $tipo=""; }
   
  require('../conector/conexion.php');
 
  $sql= pg_query("INSERT INTO cliente (nombres ,apellidos ,ci_nit ,celular ,telefono ,email ,descuento ,sexo, tipo ) VALUES ( '$nombres' , '$apellidos' , '$ci_nit' , '$celular' , '$telefono' , '$email' , '$descuento' , '$sexo', '$tipo' )"); 

    if($sql == TRUE )
    {
      echo '<center> <h3> <label> Registro Correcto </label> </h3></center>';
      ?>
       <script type="text/javascript">
                 setTimeout(function(){
                    $('#resultado_registro_cliente').html('');
                  },1000);

                  setTimeout(function(){
                   $('#myModal_Registrar_Cliente').modal('hide').fadeIn('slow');
                  },2000);
      </script>
      <?php
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
