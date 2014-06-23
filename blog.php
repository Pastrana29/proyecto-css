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
    <title>Blog Cristian y David</title>
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
       <h1>BLOG</h1> 
        <h1>Bienvenido <?php echo $usuario; ?> :D </h1></center> 
          <?php if ($tipo>=1) { ?> 
          <a href="cerrar.php">Cerrar Sesion</a> <?php } ?>
          <?php if ($tipo==0) { ?> 
            | <a href=" registro.php ">Registrar</a> | <a href=" login.php ">Entrar</a>
          <?php } ?>
           <?php if ($tipo==1) { ?> 
            | <a href=" ctrlus.php ">Panel De Usuarios</a> | <a href=" nuevotema.php ">Nueva Tema</a>
          <?php } ?>
      <center>  
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
       <!-- Include all compiled plugins (below), or include individual files as needed -->
       <script src="js/bootstrap.min.js"></script>  
    </body>
</html> 
         
      <?php
         
      include_once("settings/settings.inc.php"); 

      $conexion = @mysql_connect(SQL_HOST, SQL_USER, SQL_PWD) or die(mysql_error());
      $db = @mysql_select_db(SQL_DB, $conexion) or die(mysql_error());
      $sql      = "select temas.*, usuarios.nombre from temas, usuarios where temas.id_usuario = usuarios.id";
      $temas    = @mysql_query($sql, $conexion);

      echo "<table border='2'>";
      while($tema = @mysql_fetch_array($temas))
      {
       

          
          echo "<tr>";
            echo"<td colspan = '2'><h2 align='center'>".$tema['titulo']."</h2></td>";
            if ($tipo == 1) {
           echo "<td><a href='Editar.php'>Editar</a></td>";
           echo "<td><a href='borrartema.php?borraridtemas=".$tema['id']."'>Borrar</a></td>"; 
           echo "</tr>";
        
          }
                   
          echo "<tr>";
            echo "<td colspan = '5'>".$tema['fecha_pub']. " - " .$tema['nombre']."</td>";
          echo "</tr>";

          echo "<tr>";
            echo "<td colspan= '4'>".$tema['comentarios']."</td>";
            if ($tipo >= 1 And $tipo <= 3){    
          echo "</tr>";

          echo"<tr>";
            echo"<td colspan = '5'><a href='comentar.php?idtema=".$tema['id']."'>comentar</a></td>"; 
            //echo "<td><a href='ctrlus.php?idusr=".$usuario['id']."&tipo=1'>Administrdor</a></td>";
            }
          echo"</tr>";

          $sql1  = "select comentarios.*, usuarios.nombre from comentarios, temas, usuarios " . 
              "where comentarios.id_usuarios = usuarios.id and comentarios.id_tema = temas.id and comentarios.id_tema =" . $tema['id'];
          $comentarios = mysql_query($sql1, $conexion);
          
          while ($comentario=@mysql_fetch_array($comentarios))
          {
              echo"<tr>";
                echo"<td colspan = '3'>" . $comentario['nombre'] . " - " . $comentario['fecha_pub']."</td>";
                if ($tipo == 1 or $tipo == 2){
                echo"<td><a href='Editar.php'>Editar</a></td>";
                echo"<td><a href='Borrartema.php?borraridcom=".$comentario['id']."'>Borrar</a></td>";

                }
              echo"</tr>";

              echo"<tr>";
                echo"<td colspan = '5'>" . $comentario['comentarios'] . "</td>";
              echo"</tr>";
          }
      }
      echo "</table>";

      @mysql_close($conexion);

      ?>