<?php
 require "../conector/conexion.php";
 $tipo = trim($_POST['tipo']);

 if($tipo=='registrar')
 {
   $lista= json_decode($_POST['lista']);
   $id_usuario = trim($_POST['ID_usuario']);
   
   $total = trim($_POST['total']);
   if ($total=="") {$total =0; }

   $pago = trim($_POST['pago']);
   
   $saldo = trim($_POST['saldo']);
   if ($saldo=="") {$saldo =0; }

   $codigo = "LE".date('YmdHis');
   $fecha = date('Y-m-d');
   $hora = date('H:i:s');
   $codigo = trim($codigo);

   foreach($lista as $lavado)
   { 
     $id_cliente = $lavado -> ID_cliente;
     $cliente = $lavado -> cliente;
     $id_prenda = $lavado -> ID_prenda;
     $prenda = $lavado -> prenda;
     $medida = $lavado -> medida;

    $sql= pg_query("INSERT INTO lavado_especial (cliente ,id_cliente ,prenda ,id_prenda ,medida ,total ,pago ,saldo ,id_usuario ,fecha ,hora ,codigo,estado ) VALUES ( '$cliente' , '$id_cliente' , '$prenda' , '$id_prenda' , '$medida' , '$total' , '$pago' , '$saldo' , '$id_usuario' , '$fecha' , '$hora' , '$codigo' , 'PENDIENTE')"); 
 
   }

   if($sql == TRUE )
   { 
   ?>
   <div class='alert alert-info' role='alert'>
   <strong> Registro Correcto!! </strong> Se guardaron los datos correctamente
   </div> 
   <script type="text/javascript">
      var url = '../vista/vista_imprimir_lavado_especial.php?codigo=<?php echo $codigo; ?>';
      window.open(url,'blank');

      setTimeout(function(){
       $('#panel_respuesta_prendas_lavado_especial').html("");
      },1000);

      setTimeout(function(){
       $("#myModal_lavado_especial").modal('hide');
      },1500);

      setTimeout(function(){
       cargar_datos(1); 
      },2000);

   </script>
   <?php
   }
   else
   {
   ?>
   <div class='alert alert-danger' role='alert'>
   <strong> No se Registro!! </strong> Volver a intentar
   </div> 
   <?php
   }
  }

?>