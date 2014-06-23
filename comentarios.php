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
      <h1>Comenta Aqui    
     <?php echo "<h2> Hola, comenta Aqui ".$usuario." </h2>";?> 
     </h1> 
        
    <textarea name="comentarios" rows="10" cols="40"></textarea>

    <a href='blog.php'>Comentar</a>
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html> 
   