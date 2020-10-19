<?php

include('php/conexion.php');
//Prepared Statements
if ($stmt = $conn->prepare("SELECT * FROM usuario WHERE email=?")){
	$stmt -> bind_param('s',$_SESSION['usuario']);
	$stmt ->execute();
	$resulta = $stmt -> get_result();
	$dato = $resulta ->fetch_array();
}
if ($dato['rol']==1){
?>

<!DOCTYPE html>
<html>
<head>
	<title>Mi cuenta</title>
	<?php include('include/head.php') ?>
</head>
<body>
	<div class="app-header navbar ">
		<div class="collapse navbar-collapse box-shadow bg-white-only">
			<ul class="nav navbar-nav navbar-left addd ">
				<?php include('include/header.php'); ?>
			</ul>
		</div>
	</div>
	<div class="container">
		<div class="padre-form">
			<form method="post" class="form" action="php/login.php">
				<h3>Cambiar datos</h3>
			 	<div class="form-group">
			 		<label for="exampleInputEmail1">Email</label>
			    	<input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
			   		<small id="emailHelp" class="form-text text-muted"><!--mensajito abajo de email--></small>
			   		<input type="hidden" name="accion" value="modificar">
			   		<input type="hidden" name="id" value="<?php echo $dato['idusuario'] ?>">
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
</html>
<?php }else{ 
	?>
<!DOCTYPE html>
<html>
<head>
	<title>Mi cuenta</title>
	<?php include('include/head.php') ?>
</head>
<body>
	<div class="app-header navbar ">
		<div class="collapse navbar-collapse box-shadow bg-white-only">
			<ul class="nav navbar-nav navbar-left addd ">
				<?php include('include/header.php'); ?>
			</ul>
		</div>
	</div>
	<div class="container">
		<div class="padre-form ">
			<form method="post" class="form" action="php/login.php">
				<h3>Cambiar datos</h3>
			 	<div class="form-group">
			 		<label for="exampleInputEmail1">Email</label>
			    	<input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
			   		<small id="emailHelp" class="form-text text-muted"><!--mensajito abajo de email--></small>
			   		<input type="hidden" name="accion" value="modificar">
			   		<input type="hidden" name="id" value="<?php echo $dato['idusuario'] ?>">
			  	</div>
			  	<div class="form-group">
			    	<label for="exampleInputPassword1">Password</label>
			    	<input name="password" type="password" class="form-control" id="exampleInputPassword1">
			  	</div>
			  	<button type="submit" class="btn btn-primary ">Enviar</button>
			</form>
		</div>
	</div>
</body>
</html>


<?php  
}

	

 ?>