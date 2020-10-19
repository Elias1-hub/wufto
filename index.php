<!---Login de wufto pagina inicial-->
<?php 
session_start();
if (isset($_SESSION['usuario'])){
	header('location:micuenta.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Wufto</title>
	<?php include('include/head.php') ?>
</head>
<body class="login">
	<div class="top-div">
		<div class="header">
			<div class="row">
				<div class="col-lg-5 col-xs-12 wufto">
					<h1>WUFTO</h1>
				</div>
			</div>
		</div>
		<div class="from-top h1">
			<h1>Iniciar sesión</h1>
		</div>
	</div>	
	<div class="bot-div ">
		<div class="from-bot container">
			<form method="post" action="php/login.php">
			 	<div class="form-group">
			 		<label for="exampleInputEmail1">Email</label>
			    	<input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
			   		<small id="emailHelp" class="form-text text-muted"><!--mensajito abajo de email--></small>
			   		<input type="hidden" name="accion" value="login">
			  	</div>
			  	<div class="form-group">
			    	<label for="exampleInputPassword1">Password</label>
			    	<input name="password" type="password" class="form-control" id="exampleInputPassword1">
			  	</div>
			  	<button type="submit" class="btn btn-primary">Enviar</button>
			</form>
		</div>
	</div>
</body>	
</html