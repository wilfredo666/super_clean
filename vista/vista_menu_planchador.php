
	<!DOCTYPE html>
	<html>
	<head>
	<title> Menu </title>
	 <?php
	  require 'vista_header.php';
	 ?>

	</head>
	<body>

	<header>
	<nav class='navbar navbar-default' style='margin-bottom: 0px; background: #0B3861; margin:0px; border-radius:0px; border:none;'>
	  <div class='container-fluid'>
	    
	    <div class='navbar-header'>
           <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1' aria-expanded='false' style="background: transparent; border: 1px solid orange;">
            <span class='sr-only'>Toggle navigation</span>
            <span class='icon-bar' style="background: orange;"></span>
            <span class='icon-bar' style="background: orange;"></span>
            <span class='icon-bar' style="background: orange;"></span>
          </button>

	      <a class='navbar-brand' href='vista_menu_planchador.php' style='color:orange;'> 
	      	<img src="../multimedia/iconos/logo_superclean.png" style="width: 25px; height: 25px; float: left;"> Super Clean </a>
	    </div>

	    <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
         
         <ul class='nav navbar-nav hidden-lg hidden-md'>
            <style type="text/css">
             #item{ color: white; background: transparent; cursor:pointer; } 
             #item:hover{ background: #0B3861; color:yellow; }   
            </style>

            <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:white; background: transparent;"> Lavado <span class="caret"></span></a>
            
               <ul class="dropdown-menu"> 
                
                <li> <a onclick='btn_lavado();' id="item"> Asignar Lavado </a> </li>
                <li> <a onclick='btn_lista_prendas_lavado();' id="item"> Lista Lavado </a> </li>

               </ul>

            </li>

	      </ul>

	      <ul class='nav navbar-nav navbar-right'>
	        
	        <li class='dropdown'>
	          <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false' style='color:white; background:transparent;' > Session <span class='caret'></span></a>
	          <ul class='dropdown-menu'>
	            <li><a href='javascript:void();' onclick="btn_examinar_perfil();"> Usuario </a></li>
	            <li><a href='vista_salir.php'> Salir </a></li>
	            
	          </ul>
	        </li>
	      </ul>

	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	</header>

	<div class='row' style='padding: 0px; margin: 0px;'>

	<div class='col-lg-2 col-md-2 col-xs-12' style='background: #2d2d2d; padding: 0px; margin: 0px;'>
     <div class="hidden-xs">
       <?php require 'vista_menu_aside_planchador.php';?>
     </div>
	</div>

	<div class='col-lg-10 col-md-10 col-xs-12'>
	  <h3 style="margin: 0px; padding: 0.5%; padding-left: 0px; font-weight: bold; font-style: italic; border-bottom: 1px solid #6E6E6E;"> Sistema de Control </h3>
	  <div id='cargando'></div>
	  <div id='panel_contenedor_principal'>
	  	

	  	<div class="row">
          
          <div class='col-lg-4 col-md-4 col-xs-12' style='margin: 0px; padding: 0px;' >
       
           <h4 style="background: #01A9DB; color:white; margin-left:1%; margin-right: 1%; margin-bottom: 0px; padding: 1%;"> ORDENES DE TRABAJO </h4> 
       
             <div style="padding: 1%; margin: 1%; border:1px solid #01A9DB; margin-top: 0px; background: #FAFAFA; height: 250px;">
             	<table>
             		<tr>
             			<td> 
                        <img src="../multimedia/iconos/procesos/ot.png" style="width: 230px; height: 230px;">
             			</td>
             			<td style="padding: 1%;">
             			 <label style="font-size: 15px; color: black;"> ORDENES DE TRABAJO </label> </br>
             			<label style="font-size: 10px;"> CANTIDAD : </label> 
             			<?php
             			require "../conector/conexion.php";
             			$sql_ot = pg_query("SELECT DISTINCT codigo_ot FROM orden_trabajo WHERE estado='ACTIVO'");
             			$contador_ot = 0;
             			while($row_ot = pg_fetch_array($sql_ot))
             			{
             				$contador_ot++;
             			}

             			if ($contador_ot>0) {
             			?><label style="font-size: 20px; color:red;"> <?php echo $contador_ot; ?> </label> <?php
             			
             			}
             			else{ ?><label style="font-size: 20px; color:blue;"> <?php echo $contador_ot; ?> </label> <?php }

             			?>
             			</td>
             		</tr>
             	</table>
             	
             </div>
          </div>

          <div class='col-lg-4 col-md-4 col-xs-12' style='margin: 0px; padding: 0px;' >
       
           <h4 style="background: #01A9DB; color:white; margin-left:1%; margin-right: 1%; margin-bottom: 0px; padding: 1%;"> TIKEO DE PRENDAS </h4> 
       
             <div style="padding: 1%; margin: 1%; border:1px solid #01A9DB; margin-top: 0px; background: #FAFAFA; height: 250px; overflow-y: scroll;">
             	
             	<table>
             		<tr>
             			<td> 
                        <img src="../multimedia/iconos/procesos/tik.png" style="width: 230px; height: 230px;">
             			</td>
             			<td style="padding: 1%;">
             			 <label style="font-size: 15px; color: black;"> TIKEO DE PRENDAS </label> </br>
             			<label style="font-size: 10px;"> CANTIDAD : </label> 
             			
             			<?php

             			$sql_tik = pg_query("SELECT DISTINCT codigo_tik FROM tikeo WHERE estado_tikeo='ACTIVO'");
             			$contador_tik = 0;
             			while($row_tik = pg_fetch_array($sql_tik))
             			{
             				$contador_tik++;
             			}

             			if ($contador_tik>0) {
             			?><label style="font-size: 20px; color:red;"> <?php echo $contador_tik; ?> </label> <?php
             			
             			}
             			else{ ?><label style="font-size: 20px; color:blue;"> <?php echo $contador_tik; ?> </label> <?php }

             			?>
             			</td>

             			</td>
             		</tr>
             	</table>

             </div>
          </div>

          <div class='col-lg-4 col-md-4 col-xs-12' style='margin: 0px; padding: 0px;' >
       
           <h4 style="background: #01A9DB; color:white; margin-left:1%; margin-right: 1%; margin-bottom: 0px; padding: 1%;"> ASIGNACION DE LAVADO </h4> 
       
             <div style="padding: 1%; margin: 1%; border:1px solid #01A9DB; margin-top: 0px; background: #FAFAFA; height: 250px; overflow-y: scroll;">
             	
             	<table>
             		<tr>
             			<td> 
                        <img src="../multimedia/iconos/procesos/lav.png" style="width: 230px; height: 230px;">
             			</td>
             			<td style="padding: 1%;">
             			 <label style="font-size: 15px; color: black;"> LAVADO </label> </br>
             			<label style="font-size: 10px;"> CANTIDAD : </label>
             			<?php

             			$sql_lav = pg_query("SELECT DISTINCT codigo_lavado FROM lavado WHERE estado_lavado='ACTIVO'");
             			$contador_lav = 0;
             			while($row_lav = pg_fetch_array($sql_lav))
             			{
             				$contador_lav++;
             			}

             			if ($contador_lav>0) {
             			?><label style="font-size: 20px; color:red;"> <?php echo $contador_lav; ?> </label> <?php
             			
             			}
             			else{ ?><label style="font-size: 20px; color:blue;"> <?php echo $contador_lav; ?> </label> <?php }

             			?>

             			</td>
             		</tr>
             	</table>

             </div>
          </div>

          <div class='col-lg-4 col-md-4 col-xs-12' style='margin: 0px; padding: 0px;' >
       
           <h4 style="background: #01A9DB; color:white; margin-left:1%; margin-right: 1%; margin-bottom: 0px; padding: 1%;"> ORDEN DE PRENDAS </h4> 
       
             <div style="padding: 1%; margin: 1%; border:1px solid #01A9DB; margin-top: 0px; background: #FAFAFA; height: 250px; overflow-y: scroll;">
             	
             	<table>
             		<tr>
             			<td> 
                        <img src="../multimedia/iconos/procesos/ord.png" style="width: 230px; height: 230px;">
             			</td>
             			<td style="padding: 1%;">
             			 <label style="font-size: 15px; color: black;"> ORDEN DE PRENDAS </label> </br>
             			<label style="font-size: 10px;"> CANTIDAD : </label> 
             			
             			<?php

             			$sql_ac = pg_query("SELECT DISTINCT codigo_ac FROM acomodado WHERE estado_acomodado='ACTIVO'");
             			$contador_ac = 0;
             			while($row_ac = pg_fetch_array($sql_ac))
             			{
             				$contador_ac++;
             			}

             			if ($contador_ac>0) {
             			?><label style="font-size: 20px; color:red;"> <?php echo $contador_ac; ?> </label> <?php
             			
             			}
             			else{ ?><label style="font-size: 20px; color:blue;"> <?php echo $contador_ac; ?> </label> <?php }

             			?>

             			</td>
             		</tr>
             	</table>

             </div>
          </div>

          <div class='col-lg-4 col-md-4 col-xs-12' style='margin: 0px; padding: 0px;' >
       
           <h4 style="background: #01A9DB; color:white; margin-left:1%; margin-right: 1%; margin-bottom: 0px; padding: 1%;"> ENTREGAS DEL SERVICIO </h4> 
       
             <div style="padding: 1%; margin: 1%; border:1px solid #01A9DB; margin-top: 0px; background: #FAFAFA; height: 250px; overflow-y: scroll;">
             	
             	<table>
             		<tr>
             			<td> 
                        <img src="../multimedia/iconos/procesos/ent.png" style="width: 230px; height: 230px;">
             			</td>
             			<td style="padding: 1%;">
             			 <label style="font-size: 15px; color: black;"> ENTREGAS </label> </br>
             			<label style="font-size: 10px;"> CANTIDAD : </label> 

             			<?php

             			$sql_ent = pg_query("SELECT DISTINCT codigo_ot FROM orden_trabajo WHERE estado='ACTIVO'");
             			$contador_ent = 0;
             			while($row_ent = pg_fetch_array($sql_ent))
             			{
             				$contador_ent++;
             			}

             			if ($contador_ent>0) {
             			?><label style="font-size: 20px; color:red;"> <?php echo $contador_ent; ?> </label> <?php
             			
             			}
             			else{ ?><label style="font-size: 20px; color:blue;"> <?php echo $contador_ent; ?> </label> <?php }

             			?>

             			</td>
             		</tr>
             	</table>

             </div>
          </div>

          <div class='col-lg-4 col-md-4 col-xs-12' style='margin: 0px; padding: 0px;' >
       
           <h4 style="background: #01A9DB; color:white; margin-left:1%; margin-right: 1%; margin-bottom: 0px; padding: 1%;"> ALMACEN </h4> 
       
             <div style="padding: 1%; margin: 1%; border:1px solid #01A9DB; margin-top: 0px; background: #FAFAFA; height: 250px; overflow-y: scroll;">
             	
             	<table>
             		<tr>
             			<td> 
                        <img src="../multimedia/iconos/procesos/alm.png" style="width: 230px; height: 230px;">
             			</td>
             			<td style="padding: 1%;">
             			 <label style="font-size: 15px; color: black;"> ALMACEN </label> </br>
             			 

             			<?php

             			$sql_alm = pg_query("SELECT * FROM orden_trabajo WHERE estado='ACTIVO'");
             			$contador_alm = 0;
             			while($row_alm = pg_fetch_array($sql_alm))
             			{
             				$contador_alm++;
             			}

             			if ($contador_alm>0) {
             			?><label style="font-size: 10px;"> CANTIDAD :</label>
             			  <label style="font-size: 20px; color:red;"><?php echo $contador_alm; ?></label>  <?php
             			
             			}
             			else{ ?><label style="font-size: 10px;"> CANTIDAD : </label> <label style="font-size: 20px; color:blue;"> <?php echo $contador_alm; ?> </label> <?php }

             			?>

             			</td>
             		</tr>
             	</table>

             </div>
          </div>

        
        </div>
       	<!-- FINAL DE LOS CONTENIDOS -->
	  </div>                
	</div>


	<!-- Final del row principal -->
	</div>
	</body>
	<?php require 'vista_footer.php'; ?>
	</html>
