<?php 
$mensaje = " ";
	$host_db = "localhost";
	 $user_db = "root";
	 $pass_db = " ";
	  
	  include_once("settings/settings.inc.php");

	 $conexion = mysql_connect(SQL_HOST, SQL_USER, SQL_PWD)or die(mysql_error());
	 $db=mysql_select_db(SQL_DB, $conexion) or die(mysql_error());;
	 $buscarUsuario = "select * from usuarios WHERE usuarios = '$_POST[usuario]' ";
	 $result = mysql_query($buscarUsuario);
	 $count = mysql_num_rows($result);
	  
	 if ($count == 1){
	 echo "<br />". "El Nombre de Usuario ya Existe en nuestra Base de Datos!" . "<br />";
	  
	echo "<a href='registro.html'>Escoger otro Nombre de Usuario</a>";
	  
	exit;
	 }
	 else{
	 
	 $query = "INSERT INTO usuarios(USUARIO,PASSWORD) VALUES ('$_POST[usuario]', '$_POST[password]')";
	 
	 if (!mysql_query($query, $conexion))
	 {
	 die('Error: ' . mysql_error());
	 $mensaje= "Error al crear el usuario." . "<br />";
	 }
	 
	 else{
	 $mensaje= "<br />" . "<h2>" . "Usuario Creado Exitosamente!" . "</h2>";
	 }
	 
	 }
	 
	 mysql_close($conexion)
	 
?>

<doctype html>
<html>
	<head>
<title>Inicio de sesion</title>
	</head>
<body>
 <table border="1"> 
	<form action="validarlogin.php" method="post" name="login"><br>
		<tr><td><h2>Inicio de Sesion<h2></td></tr> 		
		<tr><td><?php echo $mensaje; ?></td><tr> 
		 <tr><td><label>usuario<input name="txtusuario" type="text"  id="txtusuario" value="" ></td></tr>
		 <tr><td><label>password<input name="txtpass" type="password" id="password"  value=""></td></tr>
		 <tr><td><input type="submit" value="Enviar"> <right> <a href=" registro.php ">registrar</a> </td></tr>
	</form>
 </table>
</body>
</html>

