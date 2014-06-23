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
 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>