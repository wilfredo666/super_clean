 <?php
 require('../conector/conexion.php');
 $codigo = trim($_POST['ID_lavado_especial']);
 ?>
 <table class="table table-bordered table-hover">
  <tr>
    <th> CODIGO </th>
    <th> CLIENTE </th>
    <th> PRENDA </th>
    <th> MEDIDA </th>
    <th> PRECIO </th>
    <th> TOTAL </th>
    <th> PAGO </th>
    <th> SALDO </th>
    <th> FECHA </th>
    <th> HORA </th>

  </tr>
 <?php
 $query = pg_query("SELECT * FROM lavado_especial WHERE codigo='$codigo'");
 while($row = pg_fetch_array($query))
 {  
    $cliente = trim($row['cliente']);
    $prenda = trim($row['prenda']);
    $id_prenda  = trim($row['id_prenda']);
    $medida = trim($row['medida']);
    $total = trim($row['total']);
    $pago = trim($row['pago']);
    $saldo = trim($row['saldo']);
    $fecha = trim($row['fecha']);
    $hora = trim($row['hora']);

    $sql_pr = pg_query("SELECT * FROM prenda WHERE id_prenda ='$id_prenda'");
    $row_pr = pg_fetch_array($sql_pr);
    $precio = $row_pr['precio'];
 
  ?> 
  <tr>
    <td> <?php echo $codigo; ?></td>
    <td> <?php echo $cliente; ?></td>
    <td> <?php echo $prenda; ?></td>
    <td> <?php echo $medida; ?></td>
    <td> <?php echo $precio; echo " Bs/m"; ?></td>
    <td> <?php echo $medida*$precio; ?></td>
    <td> <?php echo $medida*$precio; ?></td>
    <td> <?php echo $saldo; ?></td>
    <td> <?php echo $fecha; ?></td>
    <td> <?php echo $hora; ?></td>
  </tr>
  
  <?php
  }
  ?>

  <tr>
    <td>
      total
    </td>
    <td>
      <?php echo $total; ?>
    </td>
    <td>
      pago
    </td>
    <td>
      <?php echo $pago; ?>
    </td>
    <td>
      saldo
    </td>
    <td>
      <?php echo $saldo; ?>
    </td>
  </tr>
</table>
 <!-- final div row -->
 </div>
 <script type='text/javascript' src='../control/control_editar_lavado_especial.js'></script>
 
