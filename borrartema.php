<?php
include_once("settings/settings.inc.php"); 

$conexion = @mysql_connect(SQL_HOST, SQL_USER, SQL_PWD) or die(mysql_error());
$db = @mysql_select_db(SQL_DB, $conexion) or die(mysql_error());
$sql      = "select temas.*, usuarios.nombre from temas, usuarios where temas.id_usuario = usuarios.id";
$temas    = @mysql_query($sql, $conexion);

if (isset($_GET['borraridtemas'])) {
  	$idtema = $_GET['borraridtemas'];

  	@mysql_query("DELETE FROM temas WHERE id = $idtema", $conexion);
  }
  header("location:blog.php");
?>


<?php

$sql1      = "select comentarios.*, usuarios.nombre from temas, usuarios where comentarios.id_usuario = comentarios.id";
$com   = @mysql_query($sql1, $conexion);

if (isset($_GET['borraridcom'])) {
  	$idcom = $_GET['borraridcom'];

  	@mysql_query("DELETE FROM comentarios WHERE id = $idcom", $conexion);
  }
  header("location:blog.php");
?>