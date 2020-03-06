
 <?php
 require('../conector/conexion.php');

 $ID_carrito_orden_trabajo = $_POST['ID_carrito_orden_trabajo'];

 $query = pg_query("SELECT * FROM carrito_orden_trabajo WHERE id_carrito_orden_trabajo='$ID_carrito_orden_trabajo'");
 while($row = pg_fetch_array($query))
  {
      ?> 
      <div class='row'>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> id_usuario : </label> </br>  
       <?php echo $id_usuario=$row['id_usuario']; ?> 

           </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> id_sucursal : </label> </br>  
       <?php echo $id_sucursal=$row['id_sucursal']; ?> 

           </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> id_cliente : </label> </br>  
       <?php echo $id_cliente=$row['id_cliente']; ?> 

           </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> cliente : </label> </br>  
       <?php echo $cliente=$row['cliente']; ?> 

           </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> ci_nit : </label> </br>  
       <?php echo $ci_nit=$row['ci_nit']; ?> 

           </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> id_prenda : </label> </br>  
       <?php echo $id_prenda=$row['id_prenda']; ?> 

           </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> id_tipo_lavado : </label> </br>  
       <?php echo $id_tipo_lavado=$row['id_tipo_lavado']; ?> 

           </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> cantidad_prenda : </label> </br>  
       <?php echo $cantidad_prenda=$row['cantidad_prenda']; ?> 

           </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> cantidad_peso : </label> </br>  
       <?php echo $cantidad_peso=$row['cantidad_peso']; ?> 

           </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> medida_prenda : </label> </br>  
       <?php echo $medida_prenda=$row['medida_prenda']; ?> 

           </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> costo_prenda : </label> </br>  
       <?php echo $costo_prenda=$row['costo_prenda']; ?> 

           </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> costo_kilo : </label> </br>  
       <?php echo $costo_kilo=$row['costo_kilo']; ?> 

           </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> costo_metro : </label> </br>  
       <?php echo $costo_metro=$row['costo_metro']; ?> 

           </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> total_servicio : </label> </br>  
       <?php echo $total_servicio=$row['total_servicio']; ?> 

           </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> pago_servicio : </label> </br>  
       <?php echo $pago_servicio=$row['pago_servicio']; ?> 

           </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> saldo_servicio : </label> </br>  
       <?php echo $saldo_servicio=$row['saldo_servicio']; ?> 

           </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> moneda : </label> </br>  
       <?php echo $moneda=$row['moneda']; ?> 

           </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> descuento : </label> </br>  
       <?php echo $descuento=$row['descuento']; ?> 

           </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> tipo_cliente : </label> </br>  
       <?php echo $tipo_cliente=$row['tipo_cliente']; ?> 

           </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> estado : </label> </br>  
       <?php echo $estado=$row['estado']; ?> 

           </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> codigo_ot : </label> </br>  
       <?php echo $codigo_ot=$row['codigo_ot']; ?> 

           </div>
    <?php
  }

 ?>
 <!-- final div row -->
 </div>
 <script type='text/javascript' src='../control/control_editar_carrito_orden_trabajo.js'></script>
 
