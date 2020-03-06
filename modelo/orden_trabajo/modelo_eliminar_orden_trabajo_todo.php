  <?php

    $codigo_ot = trim($_POST['codigo_ot']); 
    $tipo = trim($_POST['tipo']);  

    require('../conector/conexion.php');

    if ($tipo=="TODOS") 
    {
       	$sql_comp = pg_query("SELECT COUNT(*) AS count FROM lavado WHERE codigo_ot = '$codigo_ot'");
	    $row_ot = pg_fetch_array($sql_comp);
	    $cont = $row_ot['count'];

	    if ($cont==0) {
	    ?>
	      <div class='alert alert-info' role='alert'>
			   
			<strong> CORRECTO !! </strong> Eliminacion satisfactoria
		  
		  </div>

	      <script type="text/javascript">
 
  	        setTimeout(function(){
             $('#myModal_Eliminar').modal('hide').fadeIn('slow');
            },2000);

          </script>
	    <?php
         pg_query("DELETE FROM orden_trabajo WHERE codigo_ot = '$codigo_ot'");

	    }
	    else
	    { ?>
	    	 <div class='alert alert-success' role='alert'>
			   <strong> ERROR!! </strong> La orden de trabajo ya fue asignada a lavado
			 </div>
          <?php
	    }

    }

  ?>

