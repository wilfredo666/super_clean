<?php
 $lista_campos = json_decode($_POST['lista']);
 $area = $_POST['area']; 

 require '../conector/conexion.php';
 include 'base_datos.php';

 
 //echo $sql_campos = mysql_query("CREATE TABLE  IF NOT EXISTS campos (ID_campo INT NOT NULL PRIMARY KEY AUTO_INCREMENT, areas VARCHAR(200), contenido TEXT)");

 $sql_verificar_campo = pg_query("SELECT table_name FROM information_schema.tables WHERE table_schema='public' AND table_type='BASE TABLE' AND table_name = '".$area."'");
 $contador=0;
 
 while($row_verificar = pg_fetch_array($sql_verificar_campo))
 {
    $contador++;
 }

 $ultima_variable = 0;

 if($contador > 0){
   pg_query("DROP TABLE ".$area);
 }

 $sql_verificar_campo = pg_query("SELECT table_name FROM information_schema.tables WHERE table_schema='public' AND table_type='BASE TABLE' AND table_name = '".$area."'");
 $contador=0;
 
 while($row_verificar = pg_fetch_array($sql_verificar_campo))
 {
    $contador++;
 }  

if($contador == 0){
 echo "<label> Creacion del area : "; echo $area; echo " </label> </br>";

 $cadena_campos ="";
 $sql_registro_area ='CREATE TABLE '.$area.' (id_'.$area.' SERIAL PRIMARY KEY,';

  foreach($lista_campos as $form)
  { 
    echo $campo = $form->campo;
    echo " - ";
    echo $tipo = $form->tipo;
    echo " - ";
    echo $id = $form->id;
    echo "</br>";

    //Registro de respaldo de los campos a agregar  
    if($id!=0)
    {   //campos con ID de referencia 
    	$cadena_campos = $cadena_campos."".$campo.":"; 
    	$cadena_campos = $cadena_campos."".$id.":";
      $cadena_campos = $cadena_campos."".$tipo.",";	
    }
    else{
    	//campos sin ID de referencia
        $cadena_campos = $cadena_campos."".$campo.":"; 
        $cadena_campos = $cadena_campos."".$tipo.",";

        if($tipo=="Text") { $sql_registro_area.=$campo.' CHAR(200),'; }
        if($tipo=="Number") { $sql_registro_area.=$campo.' INT,'; }
        if($tipo=="TextArea") { $sql_registro_area.=$campo.' TEXT,'; }
        if($tipo=="Seleccion") { $sql_registro_area.=$campo.' CHAR(250),'; }
        if($tipo=="Password") { $sql_registro_area.=$campo.' CHAR(200),'; }
        if($tipo=="Email") { $sql_registro_area.=$campo.' CHAR(300),'; }
        if($tipo=="File") { $sql_registro_area.=$campo.' CHAR(100),'; }
        if($tipo=="Time") { $sql_registro_area.=$campo.' TIME,'; }
        if($tipo=="Date") { $sql_registro_area.=$campo.' DATE,'; }
        if($tipo=="Time_auto") { $sql_registro_area.=$campo.' TIME,'; }
        if($tipo=="Date_auto") { $sql_registro_area.=$campo.' DATE,'; }
        if($tipo=="URL") { $sql_registro_area.=$campo.' CHAR(500),'; }
    }

  }

   $sql_registro_area = substr($sql_registro_area, 0, -1); 
   $sql_registro_area.=')';
   echo "</br> <h3 align='center'> Clases Generadas Correctamente XD </h3>";
    $sql_registro_area;

   $sql_res_area = pg_query($sql_registro_area);
   echo "</br>";
   
  // echo $cadena_campos; echo "</br>";
  // echo $sql_campos_insertar = mysql_query("INSERT INTO `campos`(`ID_campo`, `areas`, `contenido`) VALUES (null,'$area','$cadena_campos')");

   //INCREMENTO DEL MENU DE ACCESO DEL SISTEMA 
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

    //REGISTRO DEL CONTROLADOR DE REGISTRO DE AREAS
    
    $sql_control_menu = pg_query("SELECT table_name FROM information_schema.tables WHERE table_schema='public' AND table_type='BASE TABLE' AND table_name = '".$area."'");

    while ($row_control_menu = pg_fetch_array($sql_control_menu)) {
      
      $area_menu = $row_control_menu['table_name'];
      $control_menu ="
        function btn_".$area_menu."()
        {   alert('entrar a '+'".$area_menu."');
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
          }
          \n";
    }
    $control_menu.="";
    $rut='../control/control_menu.js';
    $file = fopen($rut, 'w');
    fwrite($file, $control_menu.PHP_EOL);
   

   //REGISTRO DE CODIGO MVC DEL AREA RESPECTIVO
  
    $vista_listar ="
    <div class='row' style='background:; margin: 0px; padding: 0px;'>
    <!-- Formulario de Busqueda-->
   
    <div class='col-lg-8 col-xs-12' style='margin: 0px; padding: 0px;' >
         <table class='table table-condensed' style='margin: 0px; padding: 0px;'>
          <tr>
            <td> 
              <input type='text' class='form-control' id='txt_buscar' placeholder='Buscar ".$area."' onkeyup ='cargar_datos_buscar(1);'>
            </td>
            <td>
              <button class='btn btn-default' onclick='cargar_datos_buscar(1);'> Buscar </button>
            </td>
          </tr>
         </table>
          <div id='resp_busqueda_".$area."' ></div>
      </div>
      <div class='col-lg-4 col-xs-12' style='padding-top:1%;'>
       
       <button type='button' class='btn btn-default btn-md' data-toggle='modal' data-target='#myModal_Registrar' onclick='btn_mostrar_registro();'> Nuevo </button>

      </div>
     
    <div class='col-lg-12 col-xs-12' style='background:white; padding:0px; margin:0px; color:#6E6E6E;'>
        
      <h3 style='margin-bottom:0px;'> Registros de ".$area." </h3>
      <p style='margin:0px; margin-bottom:3px;'> Listado de todos los datos registrados hasta la ultima fecha : </p>
              
      <div id='panel_listado_".$area."'> </div>
              
    </div>
   <!-- Final de row -->
</div>

<!-- Modal de registro -->

<div id='myModal_Registrar' class='modal fade' role='dialog'>
  <div class='modal-dialog modal-lg'>

    <!-- Modal content-->
    <div class='modal-content'>
     <div class='modal-header'>
       <button type='button' class='close' data-dismiss='modal'>&times;</button>
       <h4 class='modal-title'> Registrar ".$area." </h4>
     </div>
     
     <div class='modal-body'>

      <div id='panel_registro_".$area."'>
      </div>

      </div>
      <div class='modal-footer'>
      
      <button type='button' class='btn btn-default btn-md' onclick='btn_registro_".$area."();'> registrar </button>

      <button type='button' class='btn btn-danger btn-md' data-dismiss='modal'> cancelar  </button>
             
      </div>
     </div>

  </div>
</div>

<script src='../control/control_".$area.".js'> </script>";

$rut='../vista/vista_listar_'.$area.'.php';
$file = fopen($rut, 'w');
fwrite($file, $vista_listar. PHP_EOL);

//VISTA REGISTRO DE DATOS

   $vista_r="
   
   <div class='row' style='margin:0px; padding:0px;'> 
  
    <h2 align='center'>".$area."</h2>
    <label> Todos los campos con (*) son obligatorios </label> </br>
    ";

   foreach($lista_campos as $form)
   {    
              $campo = $form->campo; 
             // echo " - ";
              $clase = $form->tipo; 
             

             if($clase=="Text")
             {
              $vista_r.="
              <div class='col-lg-6 col-xs-6'> 
              
              <label>".$campo."</label></br>";
              $f_js='onkeyup="';
              $f_js.="validador_campo('".$campo."','resp_".$campo."',4)";
              $f_js.='"';

              $vista_r.="
              <input type='text' id='".$campo."' class='form-control' placeholder='(*)Escriba su ".$campo."' ".$f_js." maxlength='200' onkeypress='return valida_ambos(event);'>

               <div id='resp_".$campo."'></div>
               </div> 
               ";

             }

             if($clase=="Number")
             {
               $vista_r.="
               <div class='col-lg-6 col-xs-6'> 
               
               <label>".$campo."</label></br>";

               $f_js='onkeyup="';
               $f_js.="validador_campo('".$campo."','resp_".$campo."',2)";
               $f_js.='"';

               $vista_r.="
               <input type='number' id='".$campo."' class='form-control' placeholder='(*)Escriba su ".$campo."' ".$f_js." maxlength='10' min='0'  onkeypress='return valida_numeros(event);'>

               <div id='resp_".$campo."' ></div>
               </div> 
               ";

             }

             if($clase=="TextArea")
             {
               $f_js='onkeyup="';
               $f_js.="validador_campo('".$campo."','resp_".$campo."',4)";
               $f_js.='"';

               $vista_r.="
               <div class='col-lg-6 col-xs-6'> 

               <label>".$campo."</label></br>";

               $vista_r.="
                <textarea id='".$campo."' class='form-control' placeholder='(*)Escriba su ".$campo."' ".$f_js." maxlength='3000' onkeypress='return valida_ambos(event);' ></textarea> 

                <div id='resp_".$campo."'> </div>
                </div> 
                ";
             }

        if($clase == "Seleccion") {
         $vista_r.="
               <div class='col-lg-6 col-xs-6'> 
               
               <label>".$campo."</label></br>";

               $vista_r.="
               <select  id='".$campo."' class='form-control'>
                <option value=''> Seleccione </option>";
         
               $vista_r.=" <?php 
                require '../conector/conexion.php';
               $"."sql_seleccion = pg_query(";
               $vista_r.='"SELECT * FROM '.$campo.'");';

               $vista_r.="
               while ($"."row_seleccion = pg_fetch_array($"."sql_seleccion)) 
                {
                 $"."ID_campo = $"."row_seleccion['id_".$campo."'];
                 $"."campo = $"."row_seleccion['".$campo."'];";

                 $vista_r.='?>
                 <option value ='; $vista_r.="'<?php echo $"."ID_campo;?>'>";
                 $vista_r.="<?php echo $"."campo; ?></option> 
                 <?php ";
                  
                 $vista_r.="
                } ?>";

               
               $vista_r.=" 
               </select>

               <div id='resp_".$campo."' ></div>
               </div> 
               ";  }
        if($clase == "Password") { 
         $vista_r.="
               <div class='col-lg-6 col-xs-6'> 
               
               <label>".$campo."</label></br>";

               $f_js='onkeyup="';
               $f_js.="validador_campo('".$campo."','resp_".$campo."',2)";
               $f_js.='"';

               $vista_r.="
               <input type='text' id='".$campo."' class='form-control' placeholder='(*)Escriba su ".$campo."' ".$f_js." maxlength='10' min='0' onkeypress='return valida_ambos(event);'>

               <div id='resp_".$campo."' ></div>
               </div> 
               ";  }
        if($clase == "Email") {
         $vista_r.="
               <div class='col-lg-6 col-xs-6'> 
               
               <label>".$campo."</label></br>";

               $f_js='onkeyup="';
               $f_js.="validador_correo('".$campo."','resp_".$campo."',2)";
               $f_js.='"';

               $vista_r.="
               <input type='text' id='".$campo."' class='form-control' placeholder='(*)Escriba su ".$campo."' ".$f_js." maxlength='200' min='0' onkeypress='return valida_ambos(event);'>

               <div id='resp_".$campo."' ></div>
               </div> 
               ";   }
        if($clase == "File") { 
        
            $vista_r.="
            <div class='col-lg-6 col-xs-6'> 
               <form method='post' id='formulario' enctype='multipart/form-data'>
                <h6><label> Imagen </label></h6>
                <input type='hidden' class='form-control' id='img_".$area."'>
                <center> 
                 <span class='btn btn-default btn-file'> Subir Archivo
                  <input type='file' name='file' class='form-control' placeholder='(*)Escriba su archivo' accept='.doc,.pdf,.png,.jpg,.mp4,.mkv' maxlength='100'> 
                 </span>
                </center>
                 <div id='resp_img_".$area."'></div>
               </form>
            </div>

              <style type='text/css'>
                .btn-file {
                position: relative;
                overflow: hidden;
                }
              .btn-file input[type=file] {
                  position: absolute;
                  top: 0;
                  right: 0;
                  min-width: 100%;
                  min-height: 100%;
                  font-size: 100px;
                  text-align: right;
                  filter: alpha(opacity=0);
                  opacity: 0;
                  outline: none;
                  background: white;
                  cursor: inherit;
                  display: block;
              }
              </style>";
          
        }
        
        if($clase == "Time") {
                 $vista_r.="
               <div class='col-lg-6 col-xs-6'> 
               
               <label>".$campo."</label></br>";

               $f_js='onkeyup="';
               $f_js.="validador_campo('".$campo."','resp_".$campo."',2)";
               $f_js.='"';

               $vista_r.="
               <input type='time' id='".$campo."' class='form-control' placeholder='(*)Escriba su ".$campo."' ".$f_js." maxlength='20' min='0'>

               <div id='resp_".$campo."' ></div>
               </div> 
               ";  }
        if($clase == "Date") {
                 $vista_r.="
               <div class='col-lg-6 col-xs-6'> 
               
               <label>".$campo."</label></br>";

               $f_js='onkeyup="';
               $f_js.="validador_campo('".$campo."','resp_".$campo."',2)";
               $f_js.='"';

               $vista_r.="
               <input type='date' id='".$campo."' class='form-control' placeholder='(*)Escriba su ".$campo."' ".$f_js." maxlength='20' min='0'>

               <div id='resp_".$campo."' ></div>
               </div> 
               ";   }

        if($clase == "Time_auto") {
                 $vista_r.="
               <div class='col-lg-6 col-xs-6'> 
               
               <label>".$campo."</label></br>";

               $f_js='onkeyup="';
               $f_js.="validador_campo('".$campo."','resp_".$campo."',2)";
               $f_js.='"';

               $vista_r.="
               <input type='text' id='".$campo."' class='form-control' placeholder='(*)Escriba su ".$campo."' ".$f_js." maxlength='20' min='0' style='background:transparent; border:none;' disabled='true'>

               <div id='resp_".$campo."' ></div>
               </div> 
               ";   }
        if($clase == "Date_auto") {
                 $vista_r.="
               <div class='col-lg-6 col-xs-6'> 
               
               <label>".$campo."</label></br>";

               $f_js='onkeyup="';
               $f_js.="validador_campo('".$campo."','resp_".$campo."',2)";
               $f_js.='"';

               $vista_r.="
               <input type='text' id='".$campo."' class='form-control' placeholder='(*)Escriba su ".$campo."' ".$f_js." min='0' style='background:transparent; border:none;' disabled='true'>

               <div id='resp_".$campo."' ></div>
               </div> 
               ";   }
        if($clase == "URL") {
         $vista_r.="
               <div class='col-lg-6 col-xs-6'> 
               
               <label>".$campo."</label></br>";

               $f_js='onkeyup="';
               $f_js.="validador_('".$campo."','resp_".$campo."',2)";
               $f_js.='"';

               $vista_r.="
               <input type='text' id='".$campo."' class='form-control' placeholder='(*)Escriba su ".$campo."' ".$f_js." maxlength='1000' min='0' onkeypress='return valida_ambos(event);'>

               <div id='resp_".$campo."' ></div>
               </div> 
               ";   }
    }
   
   $vista_r.="</br><hr>

   <div id='resultado_registro_".$area."'></div> 
   
   </div>";
   
   $vista_r.="
   <script type='text/javascript' src='../control/control_".$area.".js'></script>";


  $rut='../vista/vista_'.$area.'.php';
  $file = fopen($rut, 'w');
  fwrite($file, $vista_r . PHP_EOL);


//MODELO REGISTRAR DATOS

 $model="
 <?php
 ";
 
  foreach($lista_campos as $form)
  {    
              $campo = $form->campo; 
             
              $clase = $form->tipo; 

              $model.="
  $".$campo."= trim($"."_POST['".$campo."']); ";        
  }
  
  $model.="// $"."fecha = cambiaf_a_pg($"."fecha);
   
  require('../conector/conexion.php');";

  $model.= "
  $"."sql= pg_query("; $model.='"INSERT INTO '.$area.' (';

   foreach($lista_campos as $form)
   {     
      $campo = $form->campo;
      $clase = $form->tipo; 
      $model.=''.$campo.' ,';       
    }

    $model = substr($model, 0, -1); 
    $model.=') VALUES (';

    foreach($lista_campos as $form)
    {     
              $campo = $form->campo; 
             
              $clase = $form->tipo; 

               $model.=" '$".$campo."' ,";  

           
    }
            
    $model = substr($model, 0, -1); 
    $model.=')");';

    $model.=" 

    if($"."sql == TRUE )
    {
      echo '<center> <h3> <label> Registro Correcto </label> </h3></center>';
    }
    else
    {
      echo '<center> <h3> <label> No se Registro!! Volver a intentar </label> </h3></center>';
    }

    function cambiaf_a_pg($"."fecha){

        ereg( '([0-9]{1,2})/([0-9]{1,2})/([0-9]{2,4})', $"."fecha, $"."mifecha);
        $"."lafecha=$"."mifecha[3].'-'.$"."mifecha[2].'-'.$"."mifecha[1];
        return $"."lafecha;
     } 

    ?>";

            

  $rut='../modelo/modelo_registrar_'.$area.'.php';
  $file = fopen($rut, 'w');
  fwrite($file, $model. PHP_EOL);

//VISTA EXAMINAR DATOS

$mod_vis_ex="
 <?php
 require('../conector/conexion.php');

 $"; $mod_vis_ex.="ID_".$area." = $"; $mod_vis_ex.="_POST['";
 $mod_vis_ex.="ID_".$area."'];

 ";

 $mod_vis_ex.="$"; $mod_vis_ex.="query = pg_query("; 
 $mod_vis_ex.='"SELECT * FROM '.$area.' WHERE id_'.$area.'=';
 $mod_vis_ex.="'".'$'."ID_".$area."'";

 $mod_vis_ex.='");';
  
 $mod_vis_ex.="
 while($"; $mod_vis_ex.="row = pg_fetch_array($"; $mod_vis_ex.="query))
  {
      ?> 
      <div class='row'>";

     foreach($lista_campos as $form)
     {     
              $campo = $form->campo; 
             
              $clase = $form->tipo; 

       $mod_vis_ex.="
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> ".$campo." : </label> </br>  
       ";


       if($clase=='File')
       {
        $mod_vis_ex.=
        "<?php $"."img = $"."row"."['".$campo."'];?>
         <div style='width:100%;' align='center'>
          <img src='../multimedia/imagenes/<?php echo $"."img; ?>'  style='height:150px; width:150px;'>
          </div> 
        </div>";
       }
       else{

           if($clase=='Date_auto')
           {

            $mod_vis_ex.="<?php $".$campo."=$"; $mod_vis_ex.="row[";
            $mod_vis_ex.="'".$campo."'];

            date_default_timezone_set('America/Los_Angeles');  
            echo date('d/m/Y', strtotime($".$campo.")) ?> 
            
            </div>";
           }

           else{
           
           $mod_vis_ex.="<?php echo $".$campo."=$"; $mod_vis_ex.="row[";

           $mod_vis_ex.="'".$campo."']; ?> 

           </div>";
              }
       }
       
      }

      $mod_vis_ex.="
    <?php
  }

 ?>
 <!-- final div row -->
 </div>
 <script type='text/javascript' src='../control/control_editar_".$area.".js'></script>
 ";

$rut='../vista/vista_examinar_'.$area.'.php';
$file = fopen($rut, 'w');
fwrite($file, $mod_vis_ex. PHP_EOL);

//MODELO EDITAR DATOS

 $mod_vis_ed="
 <?php
 require('../conector/conexion.php');

 $"; $mod_vis_ed.="ID_".$area." = $"; $mod_vis_ed.="_POST['";
 $mod_vis_ed.="ID_".$area."'];

 ";

 $mod_vis_ed.="$"; $mod_vis_ed.="query = pg_query("; 
 $mod_vis_ed.='"SELECT * FROM '.$area.' WHERE id_'.$area.'=';
 $mod_vis_ed.="'".'$'."ID_".$area."'";

 $mod_vis_ed.='");';
  
 $mod_vis_ed.="
 while($"; $mod_vis_ed.="row = pg_fetch_array($"; $mod_vis_ed.="query))
  {
      ?> 
      <div class='row'>

      <input type='hidden' id='ID_".$area."_edicion' value='<?php echo $"; $mod_vis_ed.="ID_".$area."; ?>'>
      ";

     foreach($lista_campos as $form)
     {     
              $campo = $form->campo; 
             
              $clase = $form->tipo; 

       $mod_vis_ed.="
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> ".$campo." : </label>  
       ";
       
       $mod_vis_ed.="<?php echo $".$campo."= trim($"; $mod_vis_ed.="row[";

       $mod_vis_ed.="'".$campo."']); ?> ";
      
      //ACA MODIFY

      if($clase=="Text")
      {
        $f_js='onkeyup="';
        $f_js.="validador_campo('".$campo."','resp_".$campo."',4)";
        $f_js.='"';

        $mod_vis_ed.="
         
        <input type='text' class='form-control' id='".$campo."' value='<?php echo $".$campo.";?>' placeholder='(*)Escriba su ".$campo."' ".$f_js." maxlength='100' onkeypress='return valida_letras(event);'>

        <div id='resp_".$campo."'> </div>
        </div>
        ";

        }

        if($clase=="Number")
        {
         $f_js='onkeyup="';
         $f_js.="validador_campo('".$campo."','resp_".$campo."',4)";
         $f_js.='"';
         
         $mod_vis_ed.="
         <input type='number' class='form-control' id='".$campo."' value='<?php echo $".$campo.";?>' placeholder='(*)Escriba su ".$campo."' ".$f_js." maxlength='10' min='0' onkeypress='return valida_numeros(event);'>

         <div id='resp_".$campo."'> </div>
         </div>";

        }

        if($clase=="TextArea")
        {
              
         $f_js='onkeyup="';
         $f_js.="validador_campo('".$campo."','resp_".$campo."',4)";
         $f_js.='"';

         $mod_vis_ed.="
          
         <textarea class='form-control' id='".$campo."' placeholder='(*)Escriba su ".$campo."' ".$f_js." maxlength='3000' onkeypress='return valida_ambos(event);'> <?php echo $".$campo.";?></textarea> 

         <div id='resp_".$campo."'> </div>
         </div>";

        }

        if($clase=="Seleccion")
        {   
              $mod_vis_ed.="
              <?php 

              $"."sql_".$campo." = pg_query(";
              $mod_vis_ed.='"SELECT * FROM '.$campo.' WHERE ID_'.$campo.'=';
              $mod_vis_ed.="'$".$campo."'";
              $mod_vis_ed.='");';
              
              $mod_vis_ed.="$"."row_".$campo." = pg_fetch_array($"."sql_".$campo.");
              echo $"."row_".$campo."['".$campo."']; 

              ?>

               <select  id='".$campo."' class='form-control'>
                <option value=''> Seleccione </option>";
         
               $mod_vis_ed.=" <?php 
                
               $"."sql_seleccion = pg_query(";
               $mod_vis_ed.='"SELECT * FROM '.$campo.'");';

               $mod_vis_ed.="
               while ($"."row_seleccion = pg_fetch_array($"."sql_seleccion)) 
                {
                 $"."ID_campo = $"."row_seleccion['id_".$campo."'];
                 $"."campo = $"."row_seleccion['".$campo."'];";

                 $mod_vis_ed.='?>
                 <option value ='; $mod_vis_ed.="'<?php echo $"."ID_campo;?>'>";
                 $mod_vis_ed.="<?php echo $"."campo; ?></option> 
                 <?php ";
                  
                 $mod_vis_ed.="
                } ?>";

               
               $mod_vis_ed.=" 
               </select>
               <div id='resp_".$campo."' > </div>
               </div>";

        }

        if($clase=="Password")
        {
              
         $f_js='onkeyup="';
         $f_js.="validador_campo('".$campo."','resp_".$campo."',4)";
         $f_js.='"';
         
         $mod_vis_ed.='
         <input type="password" class="form-control" id="'.$campo.'" value="<?php echo $'.$campo.';?>" placeholder="(*)Escriba su '.$campo.'" '.$f_js.'" maxlength="20" onkeypress="return valida_ambos(event);" >
         <div id="resp_'.$campo.'"></div> 
         </div>';

        }

        if($clase=="Email")
        {
              
          $f_js='onkeyup="';
          $f_js.="validador_correo('".$campo."','resp_".$campo."',4)";
          $f_js.='"';

          $mod_vis_ed.='
          <input type="email" class="form-control" id="'.$campo.'" value="<?php echo $'.$campo.';?>" placeholder="(*)Escriba su '.$campo.'" '.$f_js.'" maxlength="200" onkeypress="return valida_ambos(event);" ><div id="resp_'.$campo.'"></div>
          </div>';
        }

        if($clase=="File")
        {

                $mod_vis_ed.='

                <div style="width:100%;" align="center">
                <img src="../multimedia/imagenes/';
                $mod_vis_ed.="<?php echo $";
                $mod_vis_ed.=''.$campo.'; ?>" style="width:150px; height:150px;"';

                $mod_vis_ed.='">
                </div>
                <form method="post" id="formulario" enctype="multipart/form-data">
                <h6><label> Imagen </label></h6>
                <input type="hidden" class="form-control" id="img_'.$area.'">
                <center> 
                 <span class="btn btn-default btn-file"> Subir Archivo
                  <input type="file" name="file" class="form-control" placeholder="(*)Escriba su archivo" accept=".doc,.pdf,.png,.jpg,.mp4,.mkv" maxlength="100" > 
                 </span>
                </center>
                 <div id="resp_img_'.$area.'"></div>
               </form>
               </div>

              <style type="text/css">
                .btn-file {
                position: relative;
                overflow: hidden;
                }
              .btn-file input[type=file] {
                  position: absolute;
                  top: 0;
                  right: 0;
                  min-width: 100%;
                  min-height: 100%;
                  font-size: 100px;
                  text-align: right;
                  filter: alpha(opacity=0);
                  opacity: 0;
                  outline: none;
                  background: white;
                  cursor: inherit;
                  display: block;
              }
              </style>';
               //vista edicion img

      }

      if($clase=="Time")
      {
              
        $f_js='onkeyup="';
        $f_js.="validador_campo('".$campo."','resp_".$campo."',4)";
        $f_js.='"';
        $mod_vis_ed.='
        <input type="time" class="form-control" id="'.$campo.'" value="<?php echo $'.$campo.';?>" placeholder="(*)Escriba su '.$campo.'" '.$f_js.'" maxlength="20"><div id="resp_'.$campo.'"></div>
        </div>';

      }

      if($clase=="Time_auto")
      {
              
        $f_js='onkeyup="';
        $f_js.="validador_campo('".$campo."','resp_".$campo."',4)";
        $f_js.='"';
        $mod_vis_ed.='
        <input type="time" class="form-control" id="'.$campo.'" value="<?php echo $'.$campo.';?>" placeholder="(*)Escriba su '.$campo.'" '.$f_js.'" maxlength="20"><div id="resp_'.$campo.'"></div>
        </div>';

      }

      if($clase=="Date")
      {
              
        $f_js='onkeyup="';
        $f_js.="validador_campo('".$campo."','resp_".$campo."',4)";
        $f_js.='"';
              
        $mod_vis_ed.='
        <input type="date" class="form-control" id="'.$campo.'" value="<?php echo $'.$campo.';?>" placeholder="(*)Escriba su '.$campo.'" '.$f_js.'" maxlength="20"><div id="resp_'.$campo.'"></div>
        </div>';

      }

      if($clase=="Date_auto")
      {
              
        $f_js='onkeyup="';
        $f_js.="validador_campo('".$campo."','resp_".$campo."',4)";
        $f_js.='"';
              
        $mod_vis_ed.='
        <input type="date" class="form-control" id="'.$campo.'" value="<?php echo $'.$campo.';?>" placeholder="(*)Escriba su '.$campo.'" '.$f_js.'" maxlength="20"><div id="resp_'.$campo.'"></div>
        </div>';

      }

      if($clase=="URL")
      {       
        $f_js='onkeyup="';
        $f_js.="validador_campo('".$campo."','resp_".$campo."',4)";
        $f_js.='"';
              
        $mod_vis_ed.='
        <input type="text" class="form-control" id="'.$campo.'" value="<?php echo $'.$campo.';?>" placeholder="(*)Escriba su '.$campo.'" '.$f_js.'" maxlength="1000" onkeypress="return valida_ambos(event);" ><div id="resp_'.$campo.'"></div>
        </div>';

      }

         
      }

      $mod_vis_ed.="
      </div>
    <?php
  }

 ?>
 <!-- final div row -->
 </div>
 <script type='text/javascript' src='../control/control_editar_".$area.".js'></script>
 ";

$rut='../vista/vista_editar_'.$area.'.php';
$file = fopen($rut, 'w');
fwrite($file, $mod_vis_ed. PHP_EOL);

//MODELO GUARDAR CAMBIO DE LOS DATOS

 $mod_guard="
  <?php 

  require('../conector/conexion.php');
 ";

  foreach($lista_campos as $form)
  {     
    $campo = $form->campo; 
    $clase = $form->tipo; 

    $mod_guard.="
    $".$campo." = "."trim($"."_POST[";
    $mod_guard.="'".$campo."']);
    ";
  }

  $mod_guard.="
    $"."ID_".$area." = "."$"."_POST[";

  $mod_guard.="'ID_".$area."'];";

  $mod_guard.="
  
  $"."cadena= '';";
  
   foreach($lista_campos as $form)
   {     
    $campo = $form->campo; 
    $clase = $form->tipo; 

       $mod_guard.="
       if($".$campo."!='')
       {
       $"."query = pg_query(";
       $mod_guard.='"UPDATE '.$area.' SET '.$campo.' = ';
       $mod_guard.="'$".$campo."'";

       $mod_guard.=' WHERE id_'.$area.' = $ID_'.$area.'");';
       $mod_guard.="$"."cadena.=' Se edito ".$campo." , ';
       } ";
   }

   $mod_guard.=" 
   if($"."cadena!='')
   {
      ?>
      <div class='alert alert-success' role='alert'>
      <strong> CAMBIOS!! </strong> actualizados de <?php echo $"."cadena; ?>
      </div><?php

   }
   else
   { 
     ?>
     <div class='alert alert-danger' role='alert'>
     <strong>ALERTA! </strong> Debes ingresar datos validos.
     </div><?php
   }

  ?>";

  $rut='../modelo/modelo_guardar_'.$area.'.php';
  $file = fopen($rut, 'w');
  fwrite($file, $mod_guard. PHP_EOL);
  fclose($file); 


//MODELO ELIMINAR DATOS 
  
  $mod_elim="
  <?php
  $"."ID_".$area." = $"."_POST['";
  
  $mod_elim.="ID_".$area."'];";

  $mod_elim.="require('../conector/conexion.php');  
  
  $"."query = pg_query(";
  $mod_elim.='"DELETE FROM '.$area.' WHERE id_'.$area.' =$ID_'.$area.'");';
  $mod_elim.="
  ?>
   <div class='alert alert-info' role='alert'>
   <strong>CORRECTO!! </strong> Se elimino el dato correctamente
   </div><?php
  
  ?>
  ";

 $rut='../modelo/modelo_eliminar_'.$area.'.php';
  $file = fopen($rut, 'w');
  fwrite($file, $mod_elim. PHP_EOL);


//MODELO LISTA DE DATOS 

$mod_lis="
<?php
    require('../conector/conexion.php');
   
    $";$mod_lis.="action = (isset($";$mod_lis.="_REQUEST['action'])&& $";$mod_lis.="_REQUEST['action'] !=NULL)?$";$mod_lis.="_REQUEST['action']:'';
    
    if($";$mod_lis.="action == 'ajax'){
    include 'paginacion.php'; //incluir el archivo de paginación
    //las variables de paginación
    
    $";$mod_lis.="page = (isset($";$mod_lis.="_REQUEST['page']) && !empty($";$mod_lis.="_REQUEST['page']))?$";$mod_lis.="_REQUEST['page']:1;
    $";$mod_lis.="per_page = 10; //la cantidad de registros que desea mostrar
    $";$mod_lis.="adjacents  = 4; //brecha entre páginas después de varios adyacentes
    $";$mod_lis.="offset = ($";$mod_lis.="page - 1) * $";$mod_lis.="per_page;
    
    // Cuenta el número total de filas de la tabla 
    
    $"; $mod_lis.="count_query   = pg_query(";
    $mod_lis.='"SELECT count(*) AS numrows FROM ';
    $mod_lis.="".$area."";
    $mod_lis.='");';

    $mod_lis.="
    if ($"; $mod_lis.="row= pg_fetch_array($"; $mod_lis.="count_query)){ $"; $mod_lis.="numrows = $";$mod_lis.="row['numrows'];}
    $";$mod_lis.="total_pages = ceil($";$mod_lis.="numrows/$";$mod_lis.="per_page);
    $";$mod_lis.="reload = '../vista/vista_listar_".$area.".php';

    //consulta principal para recuperar los datos
    $"; $mod_lis.="query = pg_query(";
    $mod_lis.='"SELECT * FROM '.$area.' order by id_'.$area.' DESC OFFSET $offset LIMIT $per_page"'; 
    $mod_lis.=");
    
    if ($"; $mod_lis.="numrows>0){
      ?>
    <table class='table table-bordered'>
        <thead>
        <tr>
        ";
          
         $cont_vars = 0;
           foreach($lista_campos as $form)
            {     
              $campo = $form->campo; 
              $clase = $form->tipo; 

              if($cont_vars>=0 && $cont_vars<4){

               $mod_lis.=
               "
               <th>".$campo."</th>
               "; 
              }
             $cont_vars++;      
            }

    $mod_lis.="
      <th class='col-lg-1' aling='center'> </th> </tr>
      </thead>
      <tbody>
      <?php
       while($"; $mod_lis.="row = pg_fetch_array($"; $mod_lis.="query)){
        $"; $mod_lis.="ID_".$area."= $"; $mod_lis.="row['";

        $mod_lis.="id_".$area."'];";

        $mod_lis.="
        ?>
        <tr> ";
        $cont_vars=0;
        foreach($lista_campos as $form)
        {     
         $campo = $form->campo; 
         $clase = $form->tipo; 
         
         if($cont_vars>=0 && $cont_vars<4){
         
         if($campo=='foto')
         {
         $mod_lis.="
         <td class='col-lg-2'><center><img src='../multimedia/documentos/<?php echo $"; $mod_lis.="row['".$campo."'];?>' style='height:100px; width:80%;'> </center></td>"; 
         }
         else{
         $mod_lis.="
         <td><?php echo $"; $mod_lis.="row['".$campo."'];?></td>";  
           
           }
         }
         $cont_vars++;     
       }

    $mod_lis.="

    <td align='center'>

     <button type='button' class='btn btn-default btn-xs' onclick=";
     $mod_lis.='"btn_opciones(';
     $mod_lis.="'<?php echo $"; $mod_lis.="ID_".$area.";?>');";
     $mod_lis.='"';
     $mod_lis.="data-toggle='modal' data-target='#myModal_opciones'> ... </button>";

     $mod_lis.="</td>
     </tr>
        <?php
      }
      ?>
      </tbody>
     </table>";

    $mod_lis.="
     <!-- INICIO DE LOS MODALS -->
     
     <!-- Modal Opciones -->
        <div id='myModal_opciones' class='modal fade' role='dialog'>
          <div class='modal-dialog modal-xs'>

            <!-- Modal content-->
            <div class='modal-content'>
              <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal' 
                onclick='actualizar_y_salir();'>&times;</button>
                <h4 class='modal-title'> Opciones </h4>
              </div>
              <div class='modal-body' align='center'>
              <div id='cargando'></div>

              <input type='hidden' id='ID_contenido'>

              <button type='button' class='btn btn-default btn-md' data-toggle='modal' data-target='#myModal_Examinar' onclick='btn_ver_".$area."();'> Examinar </button>
              </br> </br>
              <button type='button' class='btn btn-default btn-md' data-toggle='modal' data-target='#myModal_Edicion' onclick='btn_editar_".$area."();'> Edicion </button>
              </br> </br>
              <button type='button' class='btn btn-danger btn-md' data-toggle='modal' data-target='#myModal_Eliminar' onclick='btn_eliminar_".$area."();'> Eliminar </button> 

              </div>
              <div class='modal-footer'>
               <center>
               <button type='button' class='btn btn-default btn-md' data-dismiss='modal' onclick='actualizar_y_salir();'> Actualizar y Salir </button>
               </center>
              </div>
            </div>

          </div>
        </div>

        <!-- Modal Examinar -->
        <div id='myModal_Examinar' class='modal fade' role='dialog'>
          <div class='modal-dialog modal-lg'>

            <!-- Modal content-->
            <div class='modal-content'>
              <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal'>&times;</button>
                <h4 class='modal-title'> Examinar ".$area." </h4>
              </div>
              <div class='modal-body'>

                <div id='panel_examinar_".$area."'>
                </div>

              </div>
              <div class='modal-footer'>
               
              <button type='button' class='btn btn-default' data-dismiss='modal'> Aceptar  </button>
             
              </div>
            </div>

          </div>
        </div>

      <!-- Modal Edicion -->
        <div id='myModal_Edicion' class='modal fade' role='dialog'>
          <div class='modal-dialog modal-lg'>

            <!-- Modal content-->
            <div class='modal-content'>
              <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal'>&times;</button>
                <h4 class='modal-title'> Editar ".$area." </h4>
              </div>
              <div class='modal-body'>

                 <div id='panel_edicion_".$area."'></div>

              </div>
              <div class='modal-footer'>
              <div id='respuesta_guardar_cambios_".$area."'></div>
                <button type='button' class='btn btn-default' onclick='btn_guardar_cambios_".$area."();' > Guardar </button>
                <button type='button' class='btn btn-danger' data-dismiss='modal'> Cerrar </button>
              </div>
            </div>

          </div>
        </div>

        <!-- Modal Eliminar -->
        <div id='myModal_Eliminar' class='modal fade' role='dialog'>
          <div class='modal-dialog'>

            <!-- Modal content-->
            <div class='modal-content'>
              <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal'>&times;</button>
                <h4 class='modal-title'> Eliminar ".$area." </h4>
              </div>
              <div class='modal-body'>
              <input type='hidden' id='ID_eliminar_".$area."'>
                
                 <div id='panel_eliminar_".$area."'>
                    <div class='alert alert-danger' role='alert'>
                   <strong> SEGURO !! </strong> Desea eliminar este dato ?
                    </div>
                 </div>

              </div>
              <div class='modal-footer'>
              <div id='respuesta_eliminar_total_".$area."'></div>
                <button type='button' class='btn btn-default' onclick='btn_borrar_".$area."();'> Eliminar </button>
                <button type='button' class='btn btn-danger' data-dismiss='modal'> Cerrar </button>
              </div>
            </div>

          </div>
        </div>

     <!-- FINALIZA EL MODALS -->

    <div class='table-pagination pull-right'>
      <?php echo paginate($"; $mod_lis.="reload, $"; $mod_lis.="page, $"; $mod_lis.="total_pages, $"; $mod_lis.="adjacents);?>
    </div>
    
      <?php
      
    } else {
      ?>
      <div class='alert alert-info alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4> Aviso!!! </h4> No se econtraron datos para mostrar
            </div>
      <?php
    }
  }
?>

<script src='../control/control_editar_".$area.".js' > </script> ";

$rut='../modelo/modelo_listar_'.$area.'.php';
$file = fopen($rut, 'w');
fwrite($file, $mod_lis. PHP_EOL);

//REGISTRO DEL MODELO BUSCAR DATOS 

$mod_lis="";
$mod_lis="
<?php
    require('../conector/conexion.php');
   
    $";$mod_lis.="action = (isset($";$mod_lis.="_REQUEST['action'])&& $";$mod_lis.="_REQUEST['action'] !=NULL)?$";$mod_lis.="_REQUEST['action']:'';
    
    if($";$mod_lis.="action == 'ajax'){
    include 'paginacion_busqueda.php'; //incluir el archivo de paginación
    //las variables de paginación
    
    $";$mod_lis.="page = (isset($";$mod_lis.="_REQUEST['page']) && !empty($";$mod_lis.="_REQUEST['page']))?$";$mod_lis.="_REQUEST['page']:1;
    
    echo 'Resultado para : <label> ';
    echo $"."txt_buscar = (isset($"."_REQUEST['txt_buscar']) && !empty($"."_REQUEST['txt_buscar']))?$"."_REQUEST['txt_buscar']:1;
    echo '</label>  / ';

    $";$mod_lis.="per_page = 10; //la cantidad de registros que desea mostrar
    $";$mod_lis.="adjacents  = 4; //brecha entre páginas después de varios adyacentes
    $";$mod_lis.="offset = ($";$mod_lis.="page - 1) * $";$mod_lis.="per_page;
    
    // Cuenta el número total de filas de la tabla 
    
    $"; $mod_lis.="count_query   = pg_query(";
    $mod_lis.='"SELECT count(*) AS numrows FROM ';
    $mod_lis.="".$area." WHERE ";

    $cont_vars = 0;
    foreach($lista_campos as $form)
    {     
        $campo = $form->campo; 
        $clase = $form->tipo; 
        
        if($cont_vars>=0 && $cont_vars<3)
        {
         $mod_lis.="".$campo." ILIKE '%$"."txt_buscar%' OR ";
        }
        $cont_vars++;           
     }
    $mod_lis = substr($mod_lis, 0, -3); 
    
    $mod_lis.='");';

    $mod_lis.="
    if ($"; $mod_lis.="row= pg_fetch_array($"; $mod_lis.="count_query)){ $"; $mod_lis.="numrows = $";$mod_lis.="row['numrows'];}
    $";$mod_lis.="total_pages = ceil($";$mod_lis.="numrows/$";$mod_lis.="per_page);
    $";$mod_lis.="reload = '../vista/vista_listar_".$area.".php';

    //consulta principal para recuperar los datos
    $"; $mod_lis.="query = pg_query(";
    $mod_lis.='"SELECT * FROM '.$area.' WHERE ';
     $cont_vars = 0;
     foreach($lista_campos as $form)
     {     
        $campo = $form->campo; 
        $clase = $form->tipo; 
        
        if($cont_vars>=0 && $cont_vars<3)
        {
         $mod_lis.="".$campo." LIKE '%$"."txt_buscar%' OR ";
        }
        $cont_vars++;
                
    }
    
    $mod_lis = substr($mod_lis, 0, -3); 

    $mod_lis.='ORDER BY id_'.$area.' DESC OFFSET $offset LIMIT $per_page"'; 
    $mod_lis.=");
    
    if ($"; $mod_lis.="numrows>0){
      ?>
    <a href='javascript:void(0);' onclick='btn_".$area."();'> Volver </a>
    <table class='table table-bordered'>
        <thead>
        <tr>
        ";
          $cont_vars = 0;
           foreach($lista_campos as $form)
            {     
              $campo = $form->campo; 
              $clase = $form->tipo; 

              if($cont_vars>=0 && $cont_vars<4){

               $mod_lis.=
               "
               <th>".$campo."</th>
               "; 
              } 
              $cont_vars++;    
            }

    $mod_lis.="
      <th class='col-lg-1' aling='center'> </th> </tr>
      </thead>
      <tbody>
      <?php
       while($"; $mod_lis.="row = pg_fetch_array($"; $mod_lis.="query)){
        $"; $mod_lis.="ID_".$area."= $"; $mod_lis.="row['";

        $mod_lis.="id_".$area."'];";

        $mod_lis.="
        ?>
        <tr> ";
        $cont_vars=0;
        foreach($lista_campos as $form)
        {     
         $campo = $form->campo; 
         $clase = $form->tipo; 

        if($cont_vars>=0 && $cont_vars<4){

         if($campo=='foto')
         {
         $mod_lis.="
         <td class='col-lg-2'><center><img src='../multimedia/documentos/<?php echo $"; $mod_lis.="row['".$campo."'];?>' style='height:100px; width:80%;'> </center></td>"; 
         }
         else{
         $mod_lis.="
         <td><?php echo $"; $mod_lis.="row['".$campo."'];?></td>";  
           
           } 
         }
         $cont_vars++;    
       }

    $mod_lis.="

    <td align='center'>

     <button type='button' class='btn btn-default btn-xs' onclick=";
     $mod_lis.='"btn_opciones(';
     $mod_lis.="'<?php echo $"; $mod_lis.="ID_".$area.";?>');";
     $mod_lis.='"';
     $mod_lis.="data-toggle='modal' data-target='#myModal_opciones'> ... </button>";

     $mod_lis.="</td>
     </tr>
        <?php
      }
      ?>
      </tbody>
     </table>";

    $mod_lis.="
     <!-- INICIO DE LOS MODALS -->
     
     <!-- Modal Opciones -->
        <div id='myModal_opciones' class='modal fade' role='dialog'>
          <div class='modal-dialog modal-xs'>

            <!-- Modal content-->
            <div class='modal-content'>
              <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal' 
                onclick='actualizar_y_salir();'>&times;</button>
                <h4 class='modal-title'> Opciones </h4>
              </div>
              <div class='modal-body' align='center'>
              <div id='cargando'></div>

              <input type='hidden' id='ID_contenido'>

              <button type='button' class='btn btn-default btn-md' data-toggle='modal' data-target='#myModal_Examinar' onclick='btn_ver_".$area."();'> Examinar </button>
              </br> </br>
              <button type='button' class='btn btn-default btn-md' data-toggle='modal' data-target='#myModal_Edicion' onclick='btn_editar_".$area."();'> Edicion </button>
              </br> </br>
              <button type='button' class='btn btn-danger btn-md' data-toggle='modal' data-target='#myModal_Eliminar' onclick='btn_eliminar_".$area."();'> Eliminar </button> 

              </div>
              <div class='modal-footer'>
               <center>
               <button type='button' class='btn btn-default btn-md' data-dismiss='modal' onclick='actualizar_y_salir();'> Actualizar y Salir </button>
               </center>
              </div>
            </div>

          </div>
        </div>

        <!-- Modal Examinar -->
        <div id='myModal_Examinar' class='modal fade' role='dialog'>
          <div class='modal-dialog modal-lg'>

            <!-- Modal content-->
            <div class='modal-content'>
              <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal'>&times;</button>
                <h4 class='modal-title'> Examinar ".$area." </h4>
              </div>
              <div class='modal-body'>

                <div id='panel_examinar_".$area."'>
                </div>

              </div>
              <div class='modal-footer'>
               
              <button type='button' class='btn btn-default' data-dismiss='modal'> Aceptar  </button>
             
              </div>
            </div>

          </div>
        </div>

      <!-- Modal Edicion -->
        <div id='myModal_Edicion' class='modal fade' role='dialog'>
          <div class='modal-dialog modal-lg'>

            <!-- Modal content-->
            <div class='modal-content'>
              <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal'>&times;</button>
                <h4 class='modal-title'> Editar ".$area." </h4>
              </div>
              <div class='modal-body'>

                 <div id='panel_edicion_".$area."'></div>

              </div>
              <div class='modal-footer'>
              <div id='respuesta_guardar_cambios_".$area."'></div>
                <button type='button' class='btn btn-default' onclick='btn_guardar_cambios_".$area."();' > Guardar </button>
                <button type='button' class='btn btn-danger' data-dismiss='modal'> Cerrar </button>
              </div>
            </div>

          </div>
        </div>

        <!-- Modal Eliminar -->
        <div id='myModal_Eliminar' class='modal fade' role='dialog'>
          <div class='modal-dialog'>

            <!-- Modal content-->
            <div class='modal-content'>
              <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal'>&times;</button>
                <h4 class='modal-title'> Eliminar ".$area." </h4>
              </div>
              <div class='modal-body'>
              <input type='hidden' id='ID_eliminar_".$area."'>
                
                 <div id='panel_eliminar_".$area."'>
                    <div class='alert alert-danger' role='alert'>
                   <strong> SEGURO !! </strong> Desea eliminar este dato ?
                    </div>
                 </div>

              </div>
              <div class='modal-footer'>
              <div id='respuesta_eliminar_total_".$area."'></div>
                <button type='button' class='btn btn-default' onclick='btn_borrar_".$area."();'> Eliminar </button>
                <button type='button' class='btn btn-danger' data-dismiss='modal'> Cerrar </button>
              </div>
            </div>

          </div>
        </div>

     <!-- FINALIZA EL MODALS -->

    <div class='table-pagination pull-right'>
      <?php echo paginate($"; $mod_lis.="reload, $"; $mod_lis.="page, $"; $mod_lis.="total_pages, $"; $mod_lis.="adjacents);?>
    </div>
    
      <?php
      
    } else {
      ?>
      <div class='alert alert-info alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4> Aviso!!! </h4> No se econtraron datos para mostrar
            </div>
      <?php
    }
  }
?>

<script src='../control/control_editar_".$area.".js' > </script> ";

$rut='../modelo/modelo_buscar_'.$area.'.php';
$file = fopen($rut, 'w');
fwrite($file, $mod_lis. PHP_EOL);

//REGISTRO DEL CONTROL DE DATOS

   $control_area="";

    $control_area.='//resp_archivo
         
    $("input'; $control_area.="[name='file']"; $control_area.='")';$control_area.=".on('change', function(){
      var formData = new FormData($('#formulario')[0]);
      var ruta = '../modelo/doc_up_ajax.php';
       $.ajax({
           url: ruta,
           type: 'POST',
           data: formData,
           contentType: false,
           processData: false,
           success: function(datos)
            {   
                $('#img_".$area."').val(datos);
                mostrar_archivo();
            }
        });
    });
          ";
    
    $control_area.="

    function mostrar_archivo()
    {
        var archivo = $('#img_".$area."').val();
        var cadena ="; 

        $control_area.='"<div style=';
        $control_area.="'width: 100%; padding-top: 2%;'><center><img src='../multimedia/imagenes/";
        $control_area.='"+archivo+"';
        
        $control_area.="' style='width: 70%; height: 150px; box-shadow: 1px 1px 1px 2px #A4A4A4;'></center></div>"; 
        
        $control_area.='";';

        $control_area.= "
        $('#resp_img_".$area."').html(cadena);
         
      }";

        $control_area.="

    function btn_mostrar_registro()
    {
     var obj = '';
    
     $.ajax({
      type: 'POST',
      url:'../vista/vista_".$area.".php',
      data: obj,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#panel_registro_".$area."').html(data).fadeIn('slow');
      }
    });
    }

    function btn_registro_".$area."(){
      ";

    foreach($lista_campos as $form)
    {    
       $campo = $form->campo; 
             
       $clase = $form->tipo; 
      // echo "la clase es : ".$clase;
            
       if($clase=='File')
       {
        $control_area.="
        var ".$campo." = $('#img_".$area."').val(); ";
       }

       else
       {
          $control_area.="
         var ".$campo." = $('#".$campo."').val(); ";
       }
            
    }
     
     $control_area.= "
         var ob = {";
     
     foreach($lista_campos as $form)
     {    
              $campo = $form->campo; 
             
              $clase = $form->tipo; 

              $control_area.="".$campo." : ".$campo.",";
            
      }

    $control_area = substr($control_area, 0, -1); 
    $control_area.="};
    ";
    
    $control_area.="
         if(";

    foreach($lista_campos as $form)
     {    
              $campo = $form->campo; 
             
              $clase = $form->tipo; 

              $control_area.="".$campo." !='' && ";
            
      }

    $control_area = substr($control_area, 0, -3); 

    $control_area.="){ ";

    $control_area.="

                $.ajax({
                type: 'POST',
                url:'../modelo/modelo_registrar_".$area.".php',
                data: ob,
                beforeSend: function(objeto){
              
                },
                success: function(data)
                { 
                 //alert(data);
                 $('#resultado_registro_".$area."').html(data);
                // setTimeout(limpiar_".$area.",1000);

                 ";

                foreach($lista_campos as $form)
                {    
                  $campo = $form->campo; 
                  $clase = $form->tipo; 
                  $control_area.="
                  $('#".$campo."').val('');";          
                  }

                  $control_area.="
                 
                  setTimeout(function(){
                    $('#resultado_registro_".$area."').html('');
                  },1000);

                  setTimeout(function(){
                   $('#myModal_Registrar').modal('hide').fadeIn('slow');
                  },2000);

                  setTimeout(function(){
                   cargar_datos(1);
                  },3000);

                }
             });
           }";

     $control_area.=" 
     else{ 
     ";
     
      foreach($lista_campos as $form)
     {    
              $campo = $form->campo; 
             
              $clase = $form->tipo; 

              $control_area.="
      if (".$campo." ==''){ $('#".$campo."').focus();
      var res ='<label style=";
      $control_area.='"color:red;"';

      $control_area.="> Debe llenar el campo de ".$campo." </label>';
      $('#resp_".$campo."').html(res);}";
            
      }

      $control_area.="} 
                    
      } ";

  // CONTROL DE VALIDACION DE CAMPOS DEL FORMULARIO 

    $control_area.="
    function limpiar_".$area."()
    {
         $('#resultado_registro_".$area."').html('');
         $('#resp_img_".$area."').html('');
         $('#img_".$area."').val('');
    }

    function validador_campo(campo,mensaje,cant_min)
    {   
      var cadena=$('#'+campo).val();
      var dimencion=cadena.length;
      
      if(dimencion<cant_min)
      { 
        $('#'+mensaje).html('<label style=";

      $control_area.='"color:red;"';
      $control_area.="> min '+cant_min+' digitos ' + dimencion+'</label>');
        $('#'+campo).css('border-color','red');
  
      }
      
      else
         {     
           $('#'+campo).css('border-color','green');
           $('#'+mensaje).html('');
         }

       }

  //Validador de Caracteres en los campos

  function valida_numeros(e){
      tecla = (document.all) ? e.keyCode : e.which;
      //Tecla de retroceso para borrar, siempre la permite
      if (tecla == 8 ){ return true; }
      if (tecla == 9 ){ return true; }
      if (tecla == 0 ){ return true; }
      if (tecla == 13 ){ return true; }
      
      // Patron de entrada, en este caso solo acepta numeros
      patron =/[0-9-.]/;
      tecla_final = String.fromCharCode(tecla);
      return patron.test(tecla_final);
  }

  function valida_letras(e){
   key = e.keyCode || e.which;
   tecla = String.fromCharCode(key).toLowerCase();
   letras = ' áéíóúabcdefghijklmnñopqrstuvwxyz';
   especiales = [8,37,39,46,9]; tecla_especial = false;

   for(var i in especiales){ if(key == especiales[i]) { tecla_especial = true; break; } }
   
   if(letras.indexOf(tecla)==-1 && !tecla_especial){ return false; }
  }

  function valida_ambos(e){
   key = e.keyCode || e.which;
   tecla = String.fromCharCode(key).toLowerCase();
   letras = ' áéíóúabcdefghijklmnñopqrstuvwxyz1234567890.,@#-_/?:;';
   especiales = [8,37,39,46,9]; tecla_especial = false;

   for(var i in especiales){ if(key == especiales[i]) { tecla_especial = true; break; } }
   
   if(letras.indexOf(tecla)==-1 && !tecla_especial){ return false; }

  }

  //Validador de Correo Electronico 
  
    
  var noti_email=0; 
  function validador_correo(campo,mensaje,cant_min)
   {
      
    var email = $('#'+campo).val();
    var caract = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);

    if (caract.test(email) == false)
    {
        $('#'+mensaje).html(";
        $control_area.= '"<label style=';
        $control_area.= "'color:#EC7063;'> invalido </label>";
        $control_area.='");
        noti_email++;
        return false;
    }
    else{';

        $control_area.="$('#'+mensaje).html('valido').slideDown('slow');";

        $control_area.="noti_email=0;
        return true;
       }
   }
   // MOSTRAR FECHA DE REGISTRO
   fecha();
  
  function fecha(){
    var f = new Date();
    $('#fecha').val(f.getDate() + '/' + (f.getMonth() +1) + '/' + f.getFullYear());
  }

   // MOSTRAR HORA DE REGISTRO 
  hora();
  function hora(){
    var f=new Date();
    var cad=f.getHours()+':'+f.getMinutes()+':'+f.getSeconds();
    $('#hora').val(cad);
    setTimeout('hora()',1000); 
  }

   // FUNCIONALIDADES DE LISTADO Y EDICION DE CADA AREA DE TRABAJO

  $(document).ready(function(){
    cargar_datos(1);
  });

  function cargar_datos(page){

    var parametros = {'action':'ajax','page':page};
    $('#loader').fadeIn('slow');
    $.ajax({
      url:'../modelo/modelo_listar_".$area.".php',
      data: parametros,
       beforeSend: function(objeto){
       $('#loader').html('cargando .... ');
      },
      success:function(data){
        $('#panel_listado_".$area."').html(data).fadeIn('slow');
        $('#loader').html('');
      }
    });
  }
  
  /*function cargar_datos_buscar(page){
    var txt_buscar = $('#txt_buscar').val();
    
    if(txt_buscar==''){
      $('#resp_busqueda').html('".'<label style="color:red;"'."> !!Escribe en el campo para Buscar!! </label>');
    }
    else{
    $('#resp_busqueda').html('');
    var parametros = {'action':'ajax','page':page,'txt_buscar':txt_buscar};
    $('#loader').fadeIn('slow');
    
    $.ajax({
      url:'../modelo/modelo_buscar_prueba.php',
      data: parametros,
       beforeSend: function(objeto){
       $('#loader').html('cargando .... ');
      },
      success:function(data){
        $('#panel_listado_prueba').html(data).fadeIn('slow');
        $('#loader').html('');
      }
    });
   }
  }
   */

  function cargar_datos_buscar(page)
  {
    var txt_buscar = $('#txt_buscar').val();
    
    if(txt_buscar==''){
      $('#resp_busqueda_".$area."').html('".'<label style="color:red;"'."> !!Escribe en el campo para Buscar!! </label>');
    }

    else{
    $('#resp_busqueda_".$area."').html('');

    var parametros = {'action':'ajax','page':page,'txt_buscar':txt_buscar};
    
    $('#loader').fadeIn('slow');
    
    $.ajax({
      url:'../modelo/modelo_buscar_".$area.".php',
      data: parametros,
       beforeSend: function(objeto){
       $('#loader').html('cargando .... ');
      },
      success:function(data){
        $('#panel_listado_".$area."').html(data).fadeIn('slow');
        $('#loader').html('');
      }
    });

    }
  } ";
  
  //echo $js;
  $rut='../control/control_'.$area.'.js';
  $file = fopen($rut, 'w');
  fwrite($file, $control_area. PHP_EOL);


//REGISTRO DEL CONTROL DE EDICION 

  $control_edit_area = '//resp_archivo
         
    $("input'; $control_edit_area.="[name='file']"; $control_edit_area.='")';$control_edit_area.=".on('change', function(){
      var formData = new FormData($('#formulario')[0]);
      var ruta = '../modelo/doc_up_ajax.php';
       $.ajax({
           url: ruta,
           type: 'POST',
           data: formData,
           contentType: false,
           processData: false,
           success: function(datos)
            {   
                $('#img_".$area."').val(datos);
                mostrar_archivo();
            }
        });
    });
          ";
    
    $control_edit_area.="

    function mostrar_archivo()
    {
        var archivo = $('#img_".$area."').val();
        var cadena ="; 

        $control_edit_area.='"<div style=';
        $control_edit_area.="'width: 100%; padding-top: 2%;'><center><img src='../multimedia/imagenes/";
        $control_edit_area.='"+archivo+"';
        
        $control_edit_area.="' style='width: 70%; height: 150px; box-shadow: 1px 1px 1px 2px #A4A4A4;'></center></div>"; 
        
        $control_edit_area.='";';

        $control_edit_area.= "
        $('#resp_img_".$area."').html(cadena);
         
      }

  function btn_opciones(ID_".$area.")
  {
    $('#ID_contenido').val(ID_".$area.");
  }
  
  //FUNCION PARA EXAMIANAR LOS DATOS

  function btn_ver_".$area."()
  {
   var ID_".$area." = $('#ID_contenido').val();
   var ob ={ID_".$area.":ID_".$area."};
   
   $.ajax({
                type: 'POST',
                url:'../vista/vista_examinar_".$area.".php',
                data: ob,
                beforeSend: function(objeto){
              
                },
                success: function(data)
                { 
                 $('#panel_examinar_".$area."').html(data);
                }
             });
   }

  ";

  $control_edit_area.="
  //FUNCION DE EDICION DE LOS DATOS DEL MODELO

  function btn_editar_".$area."()
  { 
     var ID_".$area." = $('#ID_contenido').val();

     var obj = {ID_".$area.":ID_".$area."};
    
    $.ajax({
      type: 'POST',
      url: '../vista/vista_editar_".$area.".php',
      data: obj,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#panel_edicion_".$area."').html(data).fadeIn('slow');
      }
    });

  }

  function btn_guardar_cambios_".$area."()
  {
    var ID_".$area." =$('#ID_".$area."_edicion').val(); ";
   
  $parametros = "
    
    var obj = {ID_".$area.": ID_".$area.",";
   
   foreach($lista_campos as $form)
   {     
    $campo = $form->campo; 
    $clase = $form->tipo; 

    if($clase=="File")
    {
    //id="img_'.$area.'"
    $control_edit_area.="
    var ".$campo." = $('#img_".$area."').val();";  

    $parametros.="
    ".$campo.":"." ".$campo.",";     
    }
    else
    {
    $control_edit_area.= "
    var ".$campo." = $('#".$campo."').val();";  
    $parametros.="
    ".$campo.": "."".$campo.",";     
    }
  }
    
    $parametros = substr($parametros, 0, -1); 
    $parametros.='};';

    $control_edit_area.="".$parametros."
     
    $.ajax({
      type: 'POST',
      url:'../modelo/modelo_guardar_".$area.".php',
      data: obj,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#respuesta_guardar_cambios_".$area."').html(data).fadeIn('slow');
        
        setTimeout(function(){
          $('#myModal_Edicion').modal('hide').fadeIn('slow');
        },2000);

      }
    });

  }
  

  function actualizar_datos_".$area."_editar()
  {  $('#myModal').modal('hide').fadeIn('slow');
     $('#respuesta_guardar_cambios_".$area."').html('').fadeIn('slow');
     //location.reload();
     window.setTimeout('cargar_datos(1)',1000);
  }

  function cargar_datos(page){
    var parametros = {'action':'ajax','page':page};
    $('#loader').fadeIn('slow');
    $.ajax({
      url:'../modelo/modelo_listar_".$area.".php',
      data: parametros,
       beforeSend: function(objeto){
       $('#loader').html('cargando .... ');
      },
      success:function(data){
        $('#panel_listado_".$area."').html(data).fadeIn('slow');
        $('#loader').html('');
      }
    })
  }


 function btn_eliminar_".$area."()
 {  
    var ID_".$area." = $('#ID_contenido').val();
    $('#ID_eliminar_".$area."').val(ID_".$area.");
 }

 function btn_borrar_".$area."()
  {  
     var ID_".$area." = $('#ID_eliminar_".$area."').val();
     var parametros = {ID_".$area.":ID_".$area."};
    
     $.ajax({
      type: 'POST',
      url:'../modelo/modelo_eliminar_".$area.".php',
      data: parametros,
       beforeSend: function(objeto){
      },
      success:function(data){
        $('#panel_eliminar_".$area."').html(data).fadeIn('slow');
        
        setTimeout(function(){
          $('#myModal_Eliminar').modal('hide').fadeIn('slow');
        },2000);

      }
    });
  }

  function actualizar_datos_".$area."_eliminar()
  {  
     $('#respuesta_eliminar_total_".$area."').html('').fadeIn('slow');
     
  }

  function actualizar_y_salir()
  {
    setTimeout(function(){ cargar_datos(1); },1000);
  }
";

  $rut='../control/control_editar_'.$area.'.js';
  $file = fopen($rut, 'w');
  fwrite($file, $control_edit_area. PHP_EOL);

 //Generamos el codigo del CONTROL MENU
    
    $control_menu="";

    $sql_control_menu = pg_query("SELECT table_name FROM information_schema.tables WHERE table_schema='public' AND table_type='BASE TABLE' ");
    
    while ($row_control_menu = pg_fetch_array($sql_control_menu)) {
      
      echo $area_menu = $row_control_menu['table_name'];
      echo "</br>";
      
      $control_menu.="
        function btn_".$area_menu."()
        {   //alert('entrar a '+'".$area_menu."');
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
          }
          \n";
    }
   $control_menu.="";
    $rut='../control/control_menu.js';
    $file = fopen($rut, 'w');
    fwrite($file, $control_menu.PHP_EOL);
    fclose($file); 

    $index="<?php header('Location: vista/vista_login.php')?>";
    $rut='../index.php';
    $file = fopen($rut, 'w');
    fwrite($file, $index.PHP_EOL);


 }
 else{
 	 echo "<h3> El area aplicativo y existe </h3>";
 } 
?>