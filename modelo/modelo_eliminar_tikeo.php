
  <?php
 
  $tipo = trim($_POST['tipo']);

  require('../conector/conexion.php');

  if ($tipo=="SOLO") {
     $id_tikeo = trim($_POST['id_tikeo']);
     $query = pg_query("DELETE FROM tikeo WHERE id_tikeo ='$id_tikeo'"); 
  }

  if ($tipo=="TODOS") {
  	 $codigo_tik = trim($_POST['codigo_tik']);
  	 $query = pg_query("DELETE FROM tikeo WHERE codigo_tik = '$codigo_tik'");
    	
  }  
  

  ?>
   <div class='alert alert-info' role='alert'>
   <strong>CORRECTO!! </strong> Se elimino el dato correctamente
   </div>
  <?php
  
    
