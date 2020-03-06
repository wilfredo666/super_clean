
    <link rel='stylesheet' type='text/css' href='../libreria/bootstrap/css/bootstrap.min.css'>
    <link rel='stylesheet' type='text/css' href='../libreria/bootstrap/css/estilo_menu_left.css'>
    <link rel='stylesheet' type='text/css' href='../libreria/bootstrap/css/estilo_footer.css'>
    <link rel='stylesheet' type='text/css' href='../libreria/bootstrap/css/estilo_menu_top.css'>

    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script type='text/javascript' src='../libreria/bootstrap/js/jquery.min.js'></script>
    <script type='text/javascript' src='../libreria/bootstrap/js/bootstrap.min.js'></script>
    <script type='text/javascript' src='../control/control_menu_sistema.js'></script>

    <link href='../libreria/font-awesome/css/font-awesome.min.css' rel='stylesheet'>
    <?php
		    session_start();
		   
		    if (!empty($_SESSION['id_usuario'])) {
		      $ID_usuario = $_SESSION['id_usuario'];
		       
		       ?>
		        <input type='hidden' id='id_usuario_sesion' value='<?php echo $ID_usuario; ?>'>

		        <input type='hidden' id='id_sucursal_sesion' value='<?php echo $ID_usuario; ?>'>

		        <input type='hidden' id='size_cb' value='8'>
		        <?php
		    }
		    else{
		      ?>
		     <script type='text/javascript'>
		        window.location='../index.php';
		     </script>
		     <?php
		    }

		?>
    
