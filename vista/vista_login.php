
	<!DOCTYPE html>
	<html>
	<head>
	  <title> Menu  Ingreso </title>
	  <link rel='stylesheet' type='text/css' href='../libreria/bootstrap/css/bootstrap.min.css'>
	  <script type='text/javascript' src='../libreria/bootstrap/js/jquery.min.js'></script>
	  <script type='text/javascript' src='../libreria/bootstrap/js/bootstrap.min.js'></script>
	  <link rel='icon' type='image/png' href='sigfrid.png' />
	  <link href='../libreria/font-awesome/css/font-awesome.min.css' rel='stylesheet'>
	  <link rel='stylesheet' type='text/css' href='../libreria/bootstrap/css/estilo_menu_left.css'>
	  <script type='text/javascript' src='../control/control_login.js'></script>
	</head>
	<body>

    <header>
	<nav class='navbar navbar-default' style='margin-bottom: 0px; background: #084B8A; margin:0px; border-radius:0px; border:none;'>
	  <div class='container-fluid'>
	    
	   <div class='navbar-header'>
	      <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1' aria-expanded='false' style="border-color: orange; background: transparent;">
	        <span class='sr-only'> Toggle navigation </span>
	        <span class='icon-bar' style="background-color:orange;"></span>
	        <span class='icon-bar' style="background-color:orange;"></span>
	        <span class='icon-bar' style="background-color:orange;"></span>
	      </button>
	     <a class='navbar-brand' href='vista_menu_usuario.php' style='color:orange;'> 
	      	<img src="../multimedia/iconos/logo_superclean.png" style="width: 25px; height: 25px; float: left;"> Super Clean </a>
	    </div>

	    <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
	      <ul class='nav navbar-nav'>
	       
	      </ul>

	     
	        </li>
	      </ul>

	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	</header>
	  <div class='row' style="margin:0px; padding: 0px; ">
	    
	    <div class='col-lg-3 col-md-3 col-sm-3 col-xs-12' style="margin: 0px; padding: 1%;">
	      <div class='hidden-xs'>
	        </br>
	        </br>
	        
	        
	      </div>
	        <div style='box-shadow: 1px 2px 3px #D8D8D8; border:1px solid #D8D8D8; margin-top: 2%; padding: 3%;'>
	          </br>
	          <h3 align='center' style="margin-bottom: 0px;"> Sistema Super Clean </h3>
	          <p  align='center' style="font-size: 10px; margin-top: 0px;"> LLene todos los campos para ingresar</p>
	          </br>
	          <input type='text' class='form-control' id='email' placeholder='email'>
	          <div id='res_email'></div> </br>
	          
	          <input type='password' class='form-control' id='password' placeholder='password'>
	          <div id='res_password'></div>

	         </br>

	          <select class="form-control" id="sucursal">
	          	<option value=""> Sucursal </option>
	          	 <?php 
                 require "../conector/conexion.php";
                 $sql_sucursal = pg_query("SELECT * FROM sucursal ORDER BY sucursal ASC");
                 while($row_sucursal = pg_fetch_array($sql_sucursal))
                 {
                 	$id_sucursal = $row_sucursal['id_sucursal'];
                 	$sucursal = $row_sucursal['sucursal'];
                 	?>
                 	<option value="<?php echo $id_sucursal; ?>"><?php echo $sucursal; ?></option>
                 	<?php

                 }
	          	 ?>
	          </select>

	          </br>
 
	          <select class="form-control" id="cargo">
	          	<option value="">  Cargo </option>
	          	 <?php 
                 
                 $sql_cargo = pg_query("SELECT * FROM cargo ORDER BY cargo ASC");
                 while($row_cargo = pg_fetch_array($sql_cargo))
                 {
                 	$id_cargo = $row_cargo['id_cargo'];
                 	$cargo = $row_cargo['cargo'];
                 	?>
                 	<option value="<?php echo $cargo; ?>"><?php echo $cargo; ?></option>
                 	<?php

                 }
	          	 ?>
	          </select>

	          <div id='res_tipo_user'></div>
	       
	          </br>
	          <div id='panel_respuesta_login'></div>
	          <center>
	            <button class='btn btn-primary' style='width: 100%;' onclick='btn_ingresar_login();'> Ingresar </button>
	          </center>
	          </br>
	          <center> <a href='javascript:void();' onclick="btn_mostrar_password();"> Ovidaste tu password ?</a> </center>
	        </div>
	    </div>


	     <div class='col-lg-9 col-md-9 col-sm-9 col-xs-12' style="margin: 0px; padding: 1%;">
	     	 
	     	 <div id="myCarousel" class="carousel slide" data-ride="carousel">
			  <!-- Indicators -->
			  <ol class="carousel-indicators">
			    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			    <li data-target="#myCarousel" data-slide-to="1"></li>
			    <li data-target="#myCarousel" data-slide-to="2"></li>
			  </ol>

			  <!-- Wrapper for slides -->
			  <div class="carousel-inner">
			    <div class="item active">
			      <img src="../multimedia/portadas/slider1.jpg" style="width: 100%; height: 550px;" >
			    </div>

			    <div class="item">
			      <img src="../multimedia/portadas/slider2.jpg" style="width: 100%; height: 550px;" >
			    </div>

			    <div class="item">
			      <img src="../multimedia/portadas/slider3.jpg" style="width: 100%; height: 550px;" >
			    </div>
			  </div>

			  <!-- Left and right controls -->
			  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
			    <span class="glyphicon glyphicon-chevron-left"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="right carousel-control" href="#myCarousel" data-slide="next">
			    <span class="glyphicon glyphicon-chevron-right"></span>
			    <span class="sr-only">Next</span>
			  </a>

			</div>
			
			<!-- final del componente slider -->
	     </div>
      <!-- final row -->
	  </div>
   
	</body>
	 
	</html>
    
