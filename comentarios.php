<?php
session_start();

if (isset($_SESSION["usuario"])) {
  $usuario = $_SESSION["usuario"];
  $tipo    = $_SESSION['tipo'];
  $fecha   = $_SESSION["fecha"];
  $nombre  = $_SESSION["nombre"];
}
else
{
  $usuario = "";
  $tipo    = 0;
  $fecha   = ""; 
  $nombre  = "" ;
}
?>

<!DOCTYPE html>
<html>
  <head><title>Comentario</title></head>
    <center>   
    <h1>Comenta Aqui    
   <?php echo "<h2> Hola, comenta Aqui ".$usuario." </h2>";?> 
   </h1> 
      
  <textarea name="comentarios" rows="10" cols="40"></textarea>

  <a href='blog.php'>Comentar</a>
</html> 
   