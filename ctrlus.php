<?php

include_once("settings/settings.inc.php");
$conexion = @mysql_connect(SQL_HOST, SQL_USER, SQL_PWD) or die(mysql_error());
$db = @mysql_select_db(SQL_DB, $conexion) or die(mysql_error());

// Actualiza tipo de usuario
if (isset($_GET['idusr'])){
	$idus = $_GET['idusr'];
	$tipo = $_GET['tipo'];

	$sql1 = "UPDATE usuarios SET tipo = '$tipo' WHERE id = '$idus'";
	$usuarios = @mysql_query($sql1, $conexion);
}

// Borrar usuario
if (isset($_GET['borraridusr'])) {
	$usr = $_GET['borraridusr'];

	$sql2 = "DELETE FROM usuarios WHERE id = $usr";  
	$usuarios   = @mysql_query($sql2, $conexion);
}

// Todos los usuarios
$sql        = "SELECT id,tipo,nombre,usuario from usuarios ORDER BY usuarios.tipo ";
$usuarios   = @mysql_query($sql, $conexion);
?>

<!doctype html>
<html> 
	<head>  
	 <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <head>
	<body> 
	  <center>
		<form name= "myform" action="validarlogin.php" method="post" name="admin">
		<center>
          <h1><font color="black">CAMBIO DE USUARIO</font></h1>
        </center>
		<TABLE BORDER="0" CELLSPACING="18" WIDTH="150">  
          <?php
            while($usuario = @mysql_fetch_array($usuarios))
            {
            echo"<tr>";
          	    echo "<td><b><center>".$usuario['nombre']."</center></b></td>";
             	echo "<td><b><center>".$usuario['usuario']."</center></b></td>";
             	echo "<td><a href='ctrlus.php?idusr=".$usuario['id']."&tipo=1'>Administrdor</a></td>";
             	echo "<td><a href='ctrlus.php?idusr=".$usuario['id']."&tipo=2'>Editor</a></td>";
             	echo "<td><a href='ctrlus.php?idusr=".$usuario['id']."&tipo=3'>Usuario</a></td>";
             	echo "<td><a href='ctrlus.php?borraridusr=".$usuario['id']."'>Borrar</a></td>";
             	echo "<td><b><center>".$usuario['tipo']."</center></b></td>";
	   		echo"</tr>";
	   	    } 
	   	  
	   	  ?>
		<a href=" blog.php ">Regresar al blog</a>	
		</center>
		</table>
		</form>
	  </center>
	  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	</body>
</html>
