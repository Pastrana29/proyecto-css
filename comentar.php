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
  <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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
 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    
</body>
</html>