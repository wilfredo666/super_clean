<?php
require "../conector/conexion.php";

$id_usuario = $_POST['id_usuario'];
$id_sucursal = $_POST['id_sucursal'];

$sql_user = pg_query("SELECT * FROM usuario u, sucursal s, cargo c WHERE
u.cargo = c.id_cargo AND u.sucursal = s.id_sucursal AND u.id_usuario='$id_usuario'");
$row_user = pg_fetch_array($sql_user);

  $email = trim($row_user['email']);
  $password = trim($row_user['password']);
  $sucursal = trim($row_user['sucursal']);
  $cargo = trim($row_user['cargo']);
  $nombres = trim($row_user['nombres']);
  $apellidos = trim($row_user['apellidos']);
  $ci = trim($row_user['ci']);
  $numero = trim($row_user['numero']);

?>

<div class="row">
	<div class="col-lg-4 col-md-4 col-xs-12"></div>
	<div class="col-lg-4 col-md-4 col-xs-12">
		<table class="table table-bordered table-hover table-striped">
			<tr>
				<th> USUARIO </th>
			</tr>
			<tr>
				<td align="center"> <img src="../multimedia/iconos/logotipo_user.png" style="width: 300px; height: 300px; "></td>
			</tr>
			<tr>
				<td align="center" style="font-weight: bold; text-transform: uppercase;"> <?php echo $nombres; echo " "; echo $apellidos;  ?></td>
			</tr>

			<tr>
				<td> <?php echo "CARGO : "; echo $cargo;  ?></td>
			</tr>

			<tr>
				<td> <?php echo "SUCURSAL : "; echo $sucursal;  ?></td>
			</tr>

			<tr>
				<td> <?php echo " CI : "; echo $ci;  ?></td>
			</tr>

			<tr>
				<td> <?php echo " CELULAR : "; echo $numero;  ?></td>
			</tr>
			<tr>
				<td> <?php echo " CORREO : "; echo $email;  ?></td>
			</tr>

		</table>
	</div>
	
</div>