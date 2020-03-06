<?php

$tipo = trim($_POST['tipo']);
$codigo_barras = trim($_POST['codigo_barras']);
$tam_cb = strlen($codigo_barras);
require "../conector/conexion.php";

if ($tam_cb==8) {

/* MOSTRAR DETALLES DE LA PRENDA Y A QUIEN PERTENECE */

/* LISTADO DE PRENDA EN TIKEO */
$sql_cont = pg_query("SELECT COUNT(*) AS count FROM tikeo WHERE codigo_barras = '$codigo_barras'");
$row_cont = pg_fetch_array($sql_cont);

$cont = $row_cont['count'];

if ($cont>0) {

$sql_prend_tik = pg_query("SELECT * FROM tikeo WHERE codigo_barras = '$codigo_barras'");
$row_prend_tik = pg_fetch_array($sql_prend_tik);

$cliente = $row_prend_tik['cliente'];
$id_prenda = $row_prend_tik['id_prenda'];

$sql_prend = pg_query("SELECT * FROM prenda WHERE id_prenda = '$id_prenda'");
$row_prend = pg_fetch_array($sql_prend);
$prenda = $row_prend['prenda'];
$portada = $row_prend['portada'];

$codigo_barras = $row_prend_tik['codigo_barras'];
$id_usuario = $row_prend_tik['id_usuario'];

$sql_usr = pg_query("SELECT * FROM usuario WHERE id_usuario = '$id_usuario'");
$row_usr = pg_fetch_array($sql_usr);
$usuario = $row_usr['nombres']." ".$row_usr['apellidos'];

$id_sucursal = $row_prend_tik['id_sucursal']; 
$sql_suc = pg_query("SELECT * FROM sucursal WHERE id_sucursal = '$id_sucursal'");
$row_suc = pg_fetch_array($sql_suc);
$sucursal = $row_suc['sucursal'];


$fecha = $row_prend_tik['fecha'];
$hora = $row_prend_tik['hora'];

?>

<table class="table table-bordered table-condensed table-hober">
 <tr>
 	<td align="center"> 
 	 <img src="../multimedia/imagenes/<?php echo $portada; ?>" style="width: 50px; height: 50px; margin: 0px;" >
 	</td>
 	<td align="center"> <?php echo $prenda; ?> </td>
 	<td> codigo de barras </td>
 	<td> <?php echo $codigo_barras; ?> </td>
 	<th rowspan="2"> <center> SUCURSAL  </br> <?php echo $sucursal; ?> </center> </th>
 </tr>
 <tr>
 	<td> Cliente </td>
 	<td> <?php echo $cliente; ?></td>
 	<td> fecha : </td>
 	<td> <?php echo $fecha; echo " "; echo $hora; ?></td>
 	

 </tr>	
</table>

<div class="row">
<div class='col-lg-6 col-md-6 col-xs-12' style='margin: 0px; padding: 0px;' >
       
       <h4 style="background: #01A9DB; color:white; margin-left:1%; margin-right: 1%; margin-bottom: 0px; padding: 1%;"> TIKEO DE SERVICIO </h4> 
       
       <div style="padding: 1%; margin: 1%; border:1px solid #01A9DB; margin-top: 0px; background: #FAFAFA; height: 250px; overflow-y: scroll;">

       	 <div class="table-responsive">
       	  <table class="table table-bordered table-condensed table-hover" style="font-size: 10px;">
       	    <tr>
       	    	<th> Prenda </th>
       	    	<th class="col-lg-3"> cliente </th>
       	    	<th> COT </th>
       	    	<th> CT </th>
       	    	<th> CB </th>
       	    	<th> Fecha </th>
       	    </tr>
        
			<?php

			/* LISTADO DE PRENDA EN TIKEO */
			$sql_tik = pg_query("SELECT * FROM tikeo WHERE codigo_barras = '$codigo_barras'");
			while ($row_tik = pg_fetch_array($sql_tik)) {
    
			 $cliente = $row_tik['cliente'];
			 $codigo_ot = $row_tik['codigo_ot'];
			 $codigo_barras = $row_tik['codigo_barras'];
			 $estado_tikeo = $row_tik['estado_tikeo'];
			 $id_prenda = $row_tik['id_prenda'];
			 $codigo_tik = $row_tik['codigo_tik'];
			 $fecha = $row_tik['fecha'];
			 $hora = $row_tik['hora'];
			 $fecha_tikeo = $fecha." ".$hora;

			 $sql_prend = pg_query("SELECT * FROM prenda WHERE id_prenda = '$id_prenda'");
			 $row_prend = pg_fetch_array($sql_prend);
			 $prenda = $row_prend['prenda'];
			 $portada = $row_prend['portada'];


			 ?>
			 <tr>
			 	<td align="center"><?php echo $prenda; ?>
			 		</br> <label style="color:green;"> <?php echo $estado_tikeo; ?> </label>
			 	</td>
			 	<td align="center"><?php echo $cliente; ?></td>
			 	<td align="center"><?php echo $codigo_ot; ?></td>
			 	<td align="center"><?php echo $codigo_tik; ?></td>
			 	<td align="center"><?php echo $codigo_barras; ?></td>
			 	<td align="center"><?php echo $fecha_tikeo; ?></td>
			 </tr>

			 <?php
			}
			?>
			</table>
			</div>

       </div>
    </div>


    <div class='col-lg-6 col-md-6 col-xs-12' style='margin: 0px; padding: 0px;' >

       <h4 style="background: #0174DF; color:white; margin-left:1%; margin-right: 1%; margin-bottom: 0px; padding: 1%;"> ASIGNACION DE LAVADO </h4> 
       
       <div style="padding: 1%; margin: 1%; border:1px solid #0174DF; margin-top: 0px; background: #FAFAFA; height: 250px; overflow-y: scroll;">

       	 <div class="table-responsive">
       	  <table class="table table-bordered table-condensed table-hover" style="font-size: 10px;">
       	    <tr>
       	    	<th> Prenda </th>
       	    	<th class="col-lg-3"> cliente </th>
       	    	<th> COT </th>
       	    	<th> CLAV </th>
       	    	<th> CB </th>
       	    	<th> Fecha </th>
       	    </tr>
        
			<?php

			/* LISTADO DE PRENDA EN LAVADO */
			$sql_lav = pg_query("SELECT * FROM lavado WHERE codigo_tikeo = '$codigo_barras'");
			while ($row_lav = pg_fetch_array($sql_lav)) {
    
			 $cliente = $row_lav['cliente'];
			 $codigo_ot = $row_lav['codigo_ot'];
			 $codigo_barras = $row_lav['codigo_tikeo'];
			 $estado_lavado = $row_lav['estado_lavado'];
			 $id_prenda = $row_lav['id_prenda'];
			 $codigo_lavado = $row_lav['codigo_lavado'];
			 $fecha = $row_lav['fecha'];
			 $hora = $row_lav['hora'];
			 $fecha_lav = $fecha." ".$hora;

			 $sql_prend = pg_query("SELECT * FROM prenda WHERE id_prenda = '$id_prenda'");
			 $row_prend = pg_fetch_array($sql_prend);
			 $prenda = $row_prend['prenda'];
			 $portada = $row_prend['portada'];


			 ?>
			 <tr>
			 	<td align="center"><?php echo $prenda; ?>
			 		</br> <label style="color:green;"> <?php echo $estado_lavado; ?> </label>
			 	</td>
			 	<td align="center"><?php echo $cliente; ?></td>
			 	<td align="center"><?php echo $codigo_ot; ?></td>
			 	<td align="center"><?php echo $codigo_lavado; ?></td>
			 	<td align="center"><?php echo $codigo_barras; ?></td>
			 	<td align="center"><?php echo $fecha_lav; ?></td>
			 </tr>

			 <?php
			}
			?>
			</table>
			</div>

         
       </div>
    </div>



    <div class='col-lg-6 col-md-6 col-xs-12' style='margin: 0px; padding: 0px;' >
     
       <h4 style="background: #088A29; color:white; margin-left:1%; margin-right: 1%; margin-bottom: 0px; padding: 1%;"> AREA DE ACOMODADO </h4> 
       
       <div style="padding: 1%; margin: 1%; border:1px solid #088A29; margin-top: 0px; background: #FAFAFA; height: 250px; overflow-y: scroll;">

       	 <div class="table-responsive">
       	  <table class="table table-bordered table-condensed table-hover" style="font-size: 10px;">
       	    <tr>
       	    	<th> Prenda </th>
       	    	<th class="col-lg-3"> cliente </th>
       	    	<th> COT </th>
       	    	<th> CACM </th>
       	    	<th> CB </th>
       	    	<th> Fecha </th>
       	    </tr>
        
			<?php

			/* LISTADO DE PRENDA EN LAVADO */
			$sql_acom = pg_query("SELECT * FROM acomodado WHERE codigo_tikeo = '$codigo_barras'");
            while ($row_acom = pg_fetch_array($sql_acom)) {
    
			 $cliente = $row_acom['cliente'];
			 $codigo_ot = $row_acom['codigo_ot'];
			 $codigo_barras = $row_acom['codigo_tikeo'];
			 $estado_acomodado = $row_acom['estado_acomodado'];
			 $id_prenda = $row_acom['id_prenda'];
			 $codigo_ac = $row_acom['codigo_ac'];
			 $fecha = $row_acom['fecha'];
			 $hora = $row_acom['hora'];
			 $fecha_acom = $fecha." ".$hora;

			 $sql_prend = pg_query("SELECT * FROM prenda WHERE id_prenda = '$id_prenda'");
			 $row_prend = pg_fetch_array($sql_prend);
			 $prenda = $row_prend['prenda'];
			 $portada = $row_prend['portada'];


			 ?>
			 <tr>
			 	<td align="center"><?php echo $prenda; ?>
			 		</br> <label style="color:green;"> <?php echo $estado_lavado; ?> </label>
			 	</td>
			 	<td align="center"><?php echo $cliente; ?></td>
			 	<td align="center"><?php echo $codigo_ot; ?></td>
			 	<td align="center"><?php echo $codigo_ac; ?></td>
			 	<td align="center"><?php echo $codigo_barras; ?></td>
			 	<td align="center"><?php echo $fecha_acom; ?></td>
			 </tr>

			 <?php
			}
			?>
			</table>
			</div>         

       </div>      
    </div>



 <div class='col-lg-6 col-md-6 col-xs-12' style='margin: 0px; padding: 0px;' >

       <h4 style="background: #01DF3A; color:white; margin-left:1%; margin-right: 1%; margin-bottom: 0px; padding: 1%;"> SERVICIO DE ENTREGAS </h4> 
       
       <div style="padding: 1%; margin: 1%; border:1px solid #01DF3A; margin-top: 0px; background: #FAFAFA; height: 250px; overflow-y: scroll;">

       	 <div class="table-responsive">
       	  <table class="table table-bordered table-condensed table-hover" style="font-size: 10px;">
       	    <tr>
       	    	<th> Prenda </th>
       	    	<th class="col-lg-3"> cliente </th>
       	    	<th> COT </th>
       	    	<th> CENT </th>
       	    	<th> CB </th>
       	    	<th> Fecha </th>
       	    </tr>
        
			<?php

			/* LISTADO DE PRENDA EN LAVADO */
			 $sql_ent = pg_query("SELECT * FROM entrega e, tikeo t WHERE e.codigo_ot = t.codigo_ot AND t.codigo_barras = '$codigo_barras'");
			 while($row_ent = pg_fetch_array($sql_ent))
			 {

			 $codigo_ot_ent = $row_ent['codigo_ot'];

			 $sql_e = pg_query("SELECT * FROM entrega WHERE codigo_ot = '$codigo_ot_ent'");
			 $row_e = pg_fetch_array($sql_e);
			 $estado_e = $row_e['estado'];
			

			 $sql_ent_ot = pg_query("SELECT * FROM orden_trabajo WHERE codigo_ot = '$codigo_ot_ent' LIMIT 1");
             while ($row_ent_ot = pg_fetch_array($sql_ent_ot)) {
             
             $id_entrega = $row_ent['id_entrega'];
			 $cliente = $row_ent_ot['cliente'];
			 $codigo_ot = $row_ent_ot['codigo_ot'];
			 $codigo_barras = $row_ent['codigo_barras'];
			 $id_prenda = $row_ent_ot['id_prenda'];
			 
			 $fecha = $row_ent_ot['fecha'];
			 $hora = $row_ent_ot['hora'];
			 $fecha_ent = $fecha." ".$hora;

			 $sql_prend = pg_query("SELECT * FROM prenda WHERE id_prenda = '$id_prenda'");
			 $row_prend = pg_fetch_array($sql_prend);
			 $prenda = $row_prend['prenda'];
			 $portada = $row_prend['portada'];



			 ?>
			 <tr>
			 	<td align="center"><?php echo $prenda; ?>
			 		</br> <label style="color:green;"> <?php echo $estado_e; ?> </label>
			 	</td>
			 	<td align="center"><?php echo $cliente; ?></td>
			 	<td align="center"><?php echo $codigo_ot; ?></td>
			 	<td align="center"><?php echo"E"; echo $id_entrega; ?></td>
			 	<td align="center"><?php echo $codigo_barras; ?></td>
			 	<td align="center"><?php echo $fecha_ent; ?></td>
			 </tr>

			 <?php
			}
		  }
			?>
			</table>
			</div>
         
       </div>     
 </div>

<?php
   /* Final del condicion if cont */
  }

  else{
  	echo " No se encontro los la prenda ";
  	?>
   <div class='alert alert-info' role='alert'>
   <strong> NO SE ENCONTRO LA PRENDA!! </strong>  Vuelva a intentar
   </div><?php
  
  }

}

else{

}

?>

</div>