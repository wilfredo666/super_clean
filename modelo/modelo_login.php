
	<?php
	 session_start();

	 echo $email = trim($_POST["email"]);
	 echo $password = trim($_POST["password"]);
	 echo $cargo = trim($_POST["cargo"]); 
	 echo $sucursal = trim($_POST["sucursal"]);

	 require "../conector/conexion.php";

	 $sql = pg_query("SELECT * FROM usuario WHERE email ='$email' AND password = '$password' AND sucursal='$sucursal'");
	 $cont =0;
	 $ID_cuenta;

	 while ($row = pg_fetch_array($sql)) {
	 	$cont++;
	 	$id_usuario = $row["id_usuario"];
	 	$id_sucursal = $row["sucursal"];
	 }

	 if($cont==1){

	 	  //echo "Cuenta Correcta"; echo " - ";
	 	  $_SESSION["id_usuario"] = $id_usuario;    
	 	  $_SESSION["id_sucursal"] = $id_sucursal;

	 	  if ($cargo == "administrador") {
	 	    ?>
	        <script type="text/javascript">
	        window.location="../vista/vista_menu_usuario.php";
	        </script>
	 	    <?php
	 	   
	 	  } 

	 	  if ($cargo == "recepcionista") {
	 	  	?>
	        <script type="text/javascript">
	        window.location="../vista/vista_menu_recepcionista.php";
	        </script>
	 	    <?php
	 	  }

	 	  if ($cargo == "planchador") {
	 	  	?>
	        <script type="text/javascript">
	        window.location="../vista/vista_menu_planchador.php";
	        </script>
	 	    <?php	 	
	 	  }
	     

	 }
	 else{?>
        <label style="color:red;"> Cuenta Incorrecta !!! Intente de Nuevo </label>
	 	<?php
	 }

	 
	?>
 	
