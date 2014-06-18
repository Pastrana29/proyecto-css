<?php
session_start();

if (isset($_SESSION["usuario"])) {
  $usuario = $_SESSION["usuario"];
  $nombre  = $_SESSION["nombre"];
  $idusr   = $_SESSION["idusr"];
}
else
{
  $usuario = "";
  $nombre  = "";
  $idusr   = 0;
}
?>

<?php
if (isset($_GET['idtema'])) {
	$idtema= $_GET['idtema'];
}
else
{
	$idtema = 0;
}

if (isset($_POST['txtcomentario'])) {
    $comentario= $_POST["txtcomentario"];
    $idtema= $_POST['idtema'];
    $idusr= $_POST['idusr'];
  

include_once("settings/settings.inc.php"); 

$conexion = @mysql_connect(SQL_HOST, SQL_USER, SQL_PWD) or die(mysql_error());
$db = @mysql_select_db(SQL_DB, $conexion) or die(mysql_error());
$sql = "INSERT INTO comentarios (comentarios,id_tema,id_usuarios) VALUES ('".$comentario."', '".$idtema."','".$idusr."')";
$rs_comentarios = mysql_query($sql, $conexion) or die(mysql_error());
header("location:blog.php");

}

?>

<!DOCTYPE html>
<html>
	<head>
<title>Comentario</title>
	</head>
<body>
  <center>
 <table border="1"> 
 
	<form action="comentar.php" method="POST" name="comentar"><br>
   
		 <h1>Comenta Aqui</h1> 
   <?php echo "<h2> Hola, comenta Aqui $usuario</h2>";?> 
   
		 <tr><td><center><?php echo "<h3> $nombre Dice: </h3>";?></center> </td></tr>
		 	<input type="hidden" name="idtema" value="<?php echo "$idtema"; ?>">
		 	<input type="hidden" name="idusr" value="<?php echo "$idusr"; ?>">
		 	<tr><td><label>Comentar<input name="txtcomentario" type="text"  id="txtcomentario" value="" ></td></tr>
		 </td></tr>
		 <tr><td><input type="submit" value="Aceptar"> </a></td></tr>
		 
	 
  </form>
 
 </table>
 </center>
</body>
</html>