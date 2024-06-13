<?php 
	require_once("class/class.php");

	if(isset($_POST["grabar"]) and $_POST["grabar"]=="si"){
		print_r($_POST);
		//$t=new Trabajo();
		//$t->logueo();
		exit;
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registro de Usuarios video 14</title>
	<script type="text/javascript" language="javascript" src="js/md5.js"></script>
	<script type="text/javascript" language="javascript" src="js/funciones.js"></script>
</head>
<body onload="limpiar_logueo();">
	<form action="index.php" name="form" method="post">
		<table align="center" width="400">
			<tr>
				<td valign="top" align="center" colspan="2" width="400">
					<strong>Ingrese sus Datos</strong>
					<hr>
				</td>
			</tr>
			<tr style="background-color: #cccccc;">
				<td valign="top" align="right" width="200">
					Login:
				</td>
				<td valign="top" align="left" width="200">
					<input type="text" name="user">
				</td>
			</tr>
			<tr style="background-color: #cccccc;">
				<td valign="top" align="right" width="200">
					Password:
				</td>
				<td valign="top" align="left" width="200">
					<input type="password" name="pass" id="pass">
				</td>
			</tr>
			<tr>
				<td valign="top" align="center" colspan="2" width="400">
					<hr>
					<input type="button" value="Registrarse" title="Registrarse" onclick="">
					&nbsp;&nbsp;||&nbsp;&nbsp;
					<input type="hidden" name="grabar" value="si">
					<input type="button" value="Entrar" title="Entrar" onclick="valida_logueo();">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>