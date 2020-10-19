<?php 
include('php/conexion.php');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Nuevo Usuario</title>
	<?php include('include/head.php'); ?>
</head>
<body>
	<div class="app-header navbar ">
		<div class="collapse navbar-collapse box-shadow bg-white-only">
			<ul class="nav navbar-nav navbar-left addd ">
				<?php include('include/header.php'); ?>
			</ul>
		</div>
	</div>
	<div class="container-fluid">
		<div class="padre-form">
			<div class="menu2">
				<h3>Cambiar datos</h3>
				<form method="post"class="form" action="php/login.php">
				 	<div class="form-group">
				 		<label for="exampleInputEmail1">nombre</label>
				    	<input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
				   		<input type="hidden" name="accion" value="agregar">
				  	</div>
				  	<div class="form-group">
				    	<label for="exampleInputPassword1">Email</label>
				    	<input name="email" type="email" class="form-control" id="exampleInputPassword1">
				  	</div>
				  	<div class="form-group">
				    	<label for="exampleInputPassword1">Password</label>
				    	<input name="password" type="password" class="form-control" id="exampleInputPassword1">
				  	</div>	
				  	<div class="form-group">
					    <label for="exampleFormControlSelect1">Rol de Usuario</label>
					    <select class="form-control" name="rol" id="exampleFormControlSelect1">
					 	<option value="0">Usuario</option>
					 	<option value="1">Super usuario</option>
					 	</select>
					</div>	
				  	<button type="submit" class="btn btn-primary">Enviar</button>
				</form>
			</div>
		</div>
	</div>		
</body>
</html>