<?php
  require '../conector/conexion.php';
  require 'base_datos.php';
  
  echo "<p> LISTA DE VARIABLES DEL AREA USUARIO </p>";
  $lista_campos = json_decode($_POST['lista']);
  
  $sql_registro_area ='CREATE TABLE usuario (id_usuario SERIAL PRIMARY KEY,';

  foreach($lista_campos as $form)
  { 
    echo $campo = $form->campo;
    echo " - ";
    echo $tipo = $form->tipo;
    echo "</br>";

        if($tipo=="Text") { $sql_registro_area.=$campo.' CHAR(200),'; }
        if($tipo=="Number") { $sql_registro_area.=$campo.' INT,'; }
        if($tipo=="TextArea") { $sql_registro_area.=$campo.' TEXT,'; }
        if($tipo=="Seleccion") { $sql_registro_area.=$campo.' CHAR(200),'; }
        if($tipo=="Password") { $sql_registro_area.=$campo.' CHAR(200),'; }
        if($tipo=="Email") { $sql_registro_area.=$campo.' CHAR(300),'; }
        if($tipo=="File") { $sql_registro_area.=$campo.' CHAR(200),'; }
        if($tipo=="Time") { $sql_registro_area.=$campo.' TIME,'; }
        if($tipo=="Date") { $sql_registro_area.=$campo.' DATE,'; }
        if($tipo=="Time_auto") { $sql_registro_area.=$campo.' TIME,'; }
        if($tipo=="Date_auto") { $sql_registro_area.=$campo.' DATE,'; }
        if($tipo=="Url") { $sql_registro_area.=$campo.' TEXT,'; }
 }
 
  $sql_registro_area = substr($sql_registro_area, 0, -1); 
  $sql_registro_area.=')';

  // echo "</br>";
  $sql_registro_area;
  // echo "</br>";
   //echo $sql_res_area = mysql_query($sql_registro_area);
 

  $sql_verificar = pg_query("SELECT * FROM usuario");
  //echo " verificar = "; echo $row_ver = pg_fetch_array($sql_verificar);

  

  if($sql_verificar==FALSE)
  {
 	echo "<p> Crear la tupla usuario </p>";
 	
 	pg_query($sql_registro_area);

 	//Aqui Creamos las clases del login

 	$vista_ingreso="
	<!DOCTYPE html>
	<html>
	<head>
	  <title> Login </title>
	  <link rel='stylesheet' type='text/css' href='../libreria/bootstrap/css/bootstrap.css'>
	  <script type='text/javascript' src='../libreria/bootstrap/js/jquery.min.js'></script>
	  <script type='text/javascript' src='../libreria/bootstrap/js/bootstrap.min.js'></script>
	  
	  <link rel='icon' type='image/png' href='sigfrid.png' />
	  <link href='../libreria/font-awesome/css/font-awesome.min.css' rel='stylesheet'>
	  <link rel='stylesheet' type='text/css' href='../libreria/bootstrap/css/estilo_menu_left.css'>

	  <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />

	  <script type='text/javascript' src='../control/control_login.js'></script>
	</head>
	<body>
	  <div class='row'>
	    <div class='col-lg-4 col-md-4 col-sm-4 col-xs-12'></div>
	    <div class='col-lg-4 col-md-4 col-sm-4 col-xs-12'>
	      <div class='hidden-xs'>
	        </br>
	        </br>
	        </br>
	        </br>
	      </div>
	        <div style='box-shadow: 1px 2px 3px #D8D8D8; border:1px solid #D8D8D8; margin-top: 2%; padding: 3%;'>
	          </br>
	          <h3 align='center'> Bienvenido al Sistema </h3>
	          <p> LLene todos los campos para ingresar</p>
	          </br>
	          <input type='text' class='form-control' id='email' placeholder='email'>
	          <div id='res_email'></div>
	          <hr>
	          <input type='password' class='form-control' id='password' placeholder='password'>
	          <div id='res_password'></div>
	          <hr>
	          <a href=''> mostrar password </a>
	          </br>
	          </br>
	          <div id='panel_respuesta_login'></div>
	          <center>
	            <button class='btn btn-success' style='width: 100%; border-radius: 0px; background: #2d2d2d; border:1px solid #2d2d2d;' onclick='btn_ingresar_login();'> Ingresar </button>
	          </center>
	          </br>
	          <center> <a href=''> Ovidaste tu password ?</a> </center>
	        </div>
	    </div>
	  </div>

	</body>
	</html>
    ";

    $rut='../vista/vista_login.php';
    $file = fopen($rut, 'w');
    fwrite($file, $vista_ingreso . PHP_EOL);

 	$modelo_ingreso="
    
	<?php
	 session_start();

	 $"."email = $"."_POST['email'];
	 $"."password = $"."_POST['password'];

	 require '../conector/conexion.php';

	 $"."sql = pg_query("; $modelo_ingreso.='"SELECT * FROM usuario WHERE email =';
	 $modelo_ingreso.="'$"."email' AND password = '$"."password'";
	 $modelo_ingreso.='");';
	 
	 $modelo_ingreso.="
	 $"."cont =0;
	 $"."ID_cuenta;

	 while ($"."row = pg_fetch_array($"."sql)) {
	 	$"."cont++;
	 	$"."ID_usuario = $"."row['id_usuario'];
	 }

	 if($"."cont==1){

	 	// echo 'Cuenta Correcta';
	 	 $"."_SESSION['ID_usuario']= $"."ID_usuario;
	 	 ?>
	     <script type='text/javascript'>
	        window.location='../vista/vista_menu_usuario.php';
	     </script>
	 	 <?php
	 }
	 else{?>
        <label style='color:red;''> Cuenta Incorrecta !!! Intente de Nuevo </label>
	 	<?php
	 }
	?>
 	
 	";

 	$rut='../modelo/modelo_login.php';
    $file = fopen($rut, 'w');
    fwrite($file, $modelo_ingreso . PHP_EOL);

 	$control_ingreso="
	function btn_ingresar_login()
	{
	  var email = $('#email').val();
	  var password = $('#password').val();
	  
	  if(email!='' && password!='')
	  {
	  	var ob = {email:email, password:password};
	     
	    $.ajax({
	                type: 'POST',
	                url:'../modelo/modelo_login.php',
	                data: ob,
	                beforeSend: function(objeto){
	                
	                },
	                success: function(data)
	                { 
	                 $('#panel_respuesta_login').html(data);
	                 $('#email').val('');
					 $('#password').val('');
	                }
	             });
	  }

	  else{
	     var mensaje = '';
	    
	     if (password == ''){
	       	$('#password').focus();
	       	 mensaje = mensaje+' Debes escribir un password ';
	     }

	     if(email==''){
	      $('#email').focus();
	        mensaje = mensaje+' Debes escribir un email ';
	     }
	  	 
	  	 $('#panel_respuesta_login').html('<label>'+mensaje+'</label>');
	    }
	  
	 }
    "; 

 	$rut='../control/control_login.js';
    $file = fopen($rut, 'w');
    fwrite($file, $control_ingreso . PHP_EOL);

  }
  else{

 	echo "<p> Area modificada con exito </p>";
 	pg_query("DROP TABLE usuario");
 	//pg_query($sql_registro_area);

 	echo "<p>Crear la tupla usuario</p>";
 	pg_query($sql_registro_area);

 	//Aqui Creamos las clases del login

 	$vista_ingreso="
	<!DOCTYPE html>
	<html>
	<head>
	  <title> Login </title>
	  <link rel='stylesheet' type='text/css' href='../libreria/bootstrap/css/bootstrap.min.css'>
	  <script type='text/javascript' src='../libreria/bootstrap/js/jquery.min.js'></script>
	  <script type='text/javascript' src='../libreria/bootstrap/js/bootstrap.min.js'></script>
	  <link rel='icon' type='image/png' href='sigfrid.png' />
	  <link href='../libreria/font-awesome/css/font-awesome.min.css' rel='stylesheet'>
	  <link rel='stylesheet' type='text/css' href='../libreria/bootstrap/css/estilo_menu_left.css'>
	  <script type='text/javascript' src='../control/control_login.js'></script>
	</head>
	<body>
	  <div class='row'>
	    <div class='col-lg-4 col-md-4 col-sm-4 col-xs-12'></div>
	    <div class='col-lg-4 col-md-4 col-sm-4 col-xs-12'>
	      <div class='hidden-xs'>
	        </br>
	        </br>
	        </br>
	        </br>
	      </div>
	        <div style='box-shadow: 1px 2px 3px #D8D8D8; border:1px solid #D8D8D8; margin-top: 2%; padding: 3%;'>
	          </br>
	          <h3 align='center'> Bienvenido al Sistema </h3>
	          <p> LLene todos los campos para ingresar</p>
	          </br>
	          <input type='text' class='form-control' id='email' placeholder='email'>
	          <div id='res_email'></div>
	          <hr>
	          <input type='password' class='form-control' id='password' placeholder='password'>
	          <div id='res_password'></div>
	          <hr>
	          <a href=''> mostrar password </a>
	          </br>
	          </br>
	          <div id='panel_respuesta_login'></div>
	          <center>
	            <button class='btn btn-success' style='width: 100%; border-radius: 0px; background: #2d2d2d; border:1px solid #2d2d2d;' onclick='btn_ingresar_login();'> Ingresar </button>
	          </center>
	          </br>
	          <center> <a href=''> Ovidaste tu password ?</a> </center>
	        </div>
	    </div>
	  </div>

	</body>
	</html>
    ";

    $rut='../vista/vista_login.php';
    $file = fopen($rut, 'w');
    fwrite($file, $vista_ingreso.PHP_EOL);

    //Creacion del HEADER 
    $vista_header="
    <link rel='stylesheet' type='text/css' href='../libreria/bootstrap/css/bootstrap.min.css'>
    <link rel='stylesheet' type='text/css' href='../libreria/bootstrap/css/estilo_menu_left.css'>
    <link rel='stylesheet' type='text/css' href='../libreria/bootstrap/css/estilo_footer.css'>
    <link rel='stylesheet' type='text/css' href='../libreria/bootstrap/css/estilo_menu_top.css'>

    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />

    <script type='text/javascript' src='../libreria/bootstrap/js/jquery.min.js'></script>
    <script type='text/javascript' src='../libreria/bootstrap/js/bootstrap.min.js'></script>
    <script type='text/javascript' src='../control/control_menu.js'></script>

    <link href='../libreria/font-awesome/css/font-awesome.min.css' rel='stylesheet'>
    <?php
		   session_start();
		   
		    if (!empty($";
		    $vista_header.="_SESSION['ID_usuario'])) {
		      $";
		    $vista_header.="ID_usuario = $";
		    $vista_header.="_SESSION['ID_usuario'];
		       ?>
		      <input type='hidden' id='ID_usuario_sesion' value='<?php echo $";
		      $vista_header.="ID_usuario; ?>'>

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
    ";

    $rut='../vista/vista_header.php';
    $file = fopen($rut, 'w');
    fwrite($file, $vista_header.PHP_EOL);

    //Creacion del FOOTER 
    $vista_footer="
    <div class='search-text'> 
       <div class='container'>
         <div class='row text-center'>
         
           <div class='form'>
               <h4>SIGN UP TO OUR NEWSLETTER</h4>
                <form id='search-form' class='form-search form-horizontal'>
                    <input type='text' class='input-search' placeholder='Email Address'>
                    <button type='submit' class='btn-searc'> SUBMIT </button>
                </form>
            </div>
        
          </div>         
       </div>     
	</div>
	
    <footer>
       <div class='container'>
           <div class='row text-center'>
                
                <div class='col-lg-4 col-md-4 col-sm-4 col-xs-12'>
                  <ul class='menu'>
                        <span>Blogs</span>    
                        <li> <a href='#'>Blog 1 </a> </li>
                               
                        <li><a href='#'>Blog 2</a></li>
                               
                        <li><a href='#'>Blog 3</a></li>
                        
                        <li><a href='#'>Blog 4</a></li>
                      </ul>
                </div>
                
                <div class='col-lg-4 col-md-4 col-sm-4 col-xs-12'>
                    <ul class='menu' >
                         <span> Menu </span>    
                         <li><a href='Home</a></li>
                               
                         <li><a href='#'>About</a></li>
                               
                         <li><a href='#'>Blog</a></li>
                               
                         <li><a href='#'>Gallery </a></li>
                     </ul>
                </div>
           
                <div class='col-lg-4 col-md-4 col-sm-4 col-xs-12'>
                  <ul class='adress'>
                        <span>LINKS</span>       
                        <li><a href='#'>Gallery 1</a></li>
                               
                        <li><a href='#'>Gallery 2</a></li>
                               
                        <li><a href='#'>Gallery 3</a></li>
                        
                        <li><a href='#'>Gallery 4</a></li>
                   </ul>
               </div>
               
               <div class='col-lg-8 col-lg-offset-2' id='icons'>
                  <div class='col-lg-2'>
                    <a href='#'><i class='fa fa-facebook'></i></a>
                  </div>
                  <div class='col-lg-2'>
                     <a href='#'><i class='fa fa-github'></i></a>
                  </div>
                  <div class='col-lg-2'
                    <a href='#'><i class='fa fa-google-plus'></i></a>
                  </div>
                  <div class='col-lg-2'>
                    <a href='#'><i class='fa fa-tumblr'></i></a>
                  </div>
                  <div class='col-lg-2'>
                    <a href='#'><i class='fa fa-linkedin'></i></a>
                  </div>
                  <div class='col-lg-2'>
                    <a href='#'><i class='fa fa-dropbox'></i></a>
                  </div>
               </div>

           </div> 
        </div>
    </footer>
    ";

    $rut='../vista/vista_footer.php';
    $file = fopen($rut, 'w');
    fwrite($file, $vista_footer.PHP_EOL);

    //Creacion de MENU LEFT USUARIO
    
    $sql_areas_menu = pg_query("SELECT table_name FROM information_schema.tables WHERE table_schema='public' AND table_type='BASE TABLE'");

    $vista_menu_left="<ul class='link_nav'>";
    while ($row_tablas = pg_fetch_array($sql_areas_menu)) {
    	$link_menu = $row_tablas['table_name'];
    	$vista_menu_left.="
    	<li class='link'>
	    <a onclick='btn_".$link_menu."();'> <i class='fa fa-gift fa-lg'></i> ".$link_menu."</a>
	    </li>";
    }
    $vista_menu_left.="</ul>";
    
    $rut='../vista/vista_menu_left.php';
    $file = fopen($rut, 'w');
    fwrite($file, $vista_menu_left.PHP_EOL);

     
    //Creacion del MENU USUARIO 
    $vista_menu_usuario ="
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
	      <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1' aria-expanded='false'>
	        <span class='sr-only'>Toggle navigation</span>
	        <span class='icon-bar'></span>
	        <span class='icon-bar'></span>
	        <span class='icon-bar'></span>
	      </button>
	      <a class='navbar-brand' href='vista_menu_usuario.php' style='color:white;'> Sistema </a>
	    </div>

	    <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
	      <ul class='nav navbar-nav'>
	      </ul>

	      <ul class='nav navbar-nav navbar-right'>
	        
	        <li class='dropdown'>
	          <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false' style='color:white; background:transparent;' > Session <span class='caret'></span></a>
	          <ul class='dropdown-menu'>
	            <li><a href='#'> Usuario </a></li>
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
	 <?php require 'vista_menu_left.php';?>
	</div>

	<div class='col-lg-10 col-md-10 col-xs-12'>
	<h2> Sistema Elavorado por Sigfrid 2.0 </h2>
	  <div id='cargando'></div>
	  <div id='panel_contenedor_principal'></div>                
	</div>

	<!-- Final del row principal -->
	</div>
	</body>
	<?php require 'vista_footer.php'; ?>
	</html>";

    $rut='../vista/vista_menu_usuario.php';
    $file = fopen($rut, 'w');
    fwrite($file, $vista_menu_usuario.PHP_EOL);
 	
 	//Clase Modelo Ingreso

 	$modelo_ingreso='
	<?php
	 session_start();

	 $email = $_POST["email"];
	 $password = $_POST["password"];

	 require "../conector/conexion.php";

	 $sql = pg_query("SELECT * FROM usuario WHERE email =';
	 $modelo_ingreso.= "'$";
	 $modelo_ingreso.="email' AND password = '$";
	 $modelo_ingreso.="password'";
	 $modelo_ingreso.='");
	 $cont =0;
	 $ID_cuenta;

	 while ($row = pg_fetch_array($sql)) {
	 	$cont++;
	 	$ID_usuario = $row["id_usuario"];
	 }

	 if($cont==1){

	 	// echo "Cuenta Correcta";
	 	 $_SESSION["ID_usuario"]= $ID_usuario;
	 	 ?>
	     <script type="text/javascript">
	        window.location="../vista/vista_menu_usuario.php";
	     </script>
	 	 <?php
	 }
	 else{?>
        <label style=color:red;"> Cuenta Incorrecta !!! Intente de Nuevo </label>
	 	<?php
	 }
	?>
 	';

 	$rut='../modelo/modelo_login.php';
    $file = fopen($rut, 'w');
    fwrite($file, $modelo_ingreso.PHP_EOL);
    
    //Control de Ingreso Usuario
 	$control_ingreso="
	function btn_ingresar_login()
	{
	  var email = $('#email').val();
	  var password = $('#password').val();
	  
	  if(email!='' && password!='')
	  {
	  	var ob = {email:email, password:password};
	     
	    $.ajax({
	                type: 'POST',
	                url:'../modelo/modelo_login.php',
	                data: ob,
	                beforeSend: function(objeto){
	                
	                },
	                success: function(data)
	                { 
	                 $('#panel_respuesta_login').html(data);
	                 $('#email').val('');
					 $('#password').val('');
	                }
	             });
	  }

	  else{
	     var mensaje = '';
	    
	     if (password == ''){
	       	$('#password').focus();
	       	 mensaje = mensaje+' Debes escribir un password ';
	     }

	     if(email==''){
	      $('#email').focus();
	        mensaje = mensaje+' Debes escribir un email ';
	     }
	  	 
	  	 $('#panel_respuesta_login').html('<label>'+mensaje+'</label>');
	    }
	  
	 }";
 	 
 	$rut='../control/control_login.js';
    $file = fopen($rut, 'w');
    fwrite($file, $control_ingreso.PHP_EOL);
    fclose($file); 

    //Generamos el codigo del CONTROL MENU
    
    $control_menu="";

    $sql_control_menu = pg_query("SELECT table_name FROM information_schema.tables WHERE table_schema='public' AND table_type='BASE TABLE'");
    
    while ($row_control_menu = pg_fetch_array($sql_control_menu)) {
    	$area_menu = $row_control_menu['table_name'];
    	$control_menu.="
		    function btn_".$area_menu."()
		    {  
		     var ob ='';
			  $.ajax({
		                type: 'POST',
		                url:'../vista/vista_listar_".$area_menu.".php',
		                data: ob,
		                beforeSend: function(objeto){";

		                $control_menu.='$("#cargando").html("<center><div id=';
		                $control_menu.="'panel_cargado'>";
		                $control_menu.='</div></center>");';
		                $control_menu.="
		                },
		                success: function(data)
		                { 
		                 $('#cargando').html('');
		                 $('#panel_contenedor_principal').html(data);
		                
		                }
		             });
		      }\n";
    }
   $control_menu.="";
    $rut='../control/control_menu.js';
    $file = fopen($rut, 'w');
    fwrite($file, $control_menu.PHP_EOL);
    fclose($file); 

    $index="<?php header('Location: vista/vista_login.php')?>";
    $rut='index.php';
    $file = fopen($rut, 'w');
    fwrite($file, $index.PHP_EOL);
    fclose($file); 

    $cerrar_sesion="
    <?php
	  session_start();
	  session_unset();
	  session_destroy();
	  ?>
	
	<meta http-equiv='Refresh' content='0; URL=../index.php'>";
    
    $rut='../vista/vista_salir.php';
    $file = fopen($rut, 'w');
    fwrite($file, $cerrar_sesion.PHP_EOL);
    fclose($file); 
  }

  //Insertamos el administrador por defecto

  $sql_admin = pg_query("INSERT INTO usuario (id_usuario,email, password) VALUES ('1','admin@gmail.com', 'admin')");


?>