<?php

	$mensaje = "";
	if (isset($_GET["error"])) {
  		$error =$_GET["error"];
  		if ($error <> ""){
	  		switch ($error) {
  				case '1':
  					$mensaje= "El usuario ya existe!";
  				break;
			}
		}
	}  else {
  		$error ="";
	}			

?>


<!DOCTYPE html>
<html>
	<head>
<title>Registrarse</title>
	</head>
<body>
 <table border="1"> 
	<form action="valregistro.php" method="post" name="registro"><br>
		<tr><td><h2>Registrate Aqui<h2></td></tr>
		<tr><td><?php echo $mensaje; ?></td><tr> 
		<tr><td><label>Nombre<input name="txtnombre" type="text"  id="txtnombre" maxlength="10" value="" ></td></tr> 		 
		 <tr><td><label>Usuario<input name="txtusuario" type="text"  id="txtusuario" maxlength="12" value="" ></td></tr>
		 <tr><td><label>Password<input name="txtpass" type="password" id="txtpass" maxlength="10" value=""></td></tr>
		 <tr><td><input type="submit" value="Guardar"> </td></tr>
	</form>
 </table>
</body>
</html>