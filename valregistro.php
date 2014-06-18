<?php
	$nombre = $_POST["txtnombre"];
	$usuarios = $_POST["txtusuario"];
	$password = $_POST["txtpass"];

	include_once("settings/settings.inc.php");

	$conexion= mysql_connect (SQL_HOST,SQL_USER,SQL_PWD);
	$db=mysql_select_db(SQL_DB,$conexion) or die (MySQL_error());


	$sql_usuarios = "select * from usuarios where usuario = '$usuarios'";
	$rs_usuarios = mysql_query($sql_usuarios, $conexion) or die(mysql_error());

	$total_usuarios = mysql_num_rows($rs_usuarios);
	if($total_usuarios >= 1) 

		header("location:registro.php?error=1"); 
	else 
	{
		$sql = "INSERT into usuarios (nombre, usuario, password, tipo) VALUES ('$nombre','$usuarios','$password', 3)";
		$temas = @mysql_query($sql, $conexion);
		
		header("location:login.php?error=4");
	}
?>