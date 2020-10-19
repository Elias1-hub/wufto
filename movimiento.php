<?php 
include('php/conexion.php');




if ($stmt = $conn->prepare("SELECT * FROM movimiento INNER JOIN usuario ON movimiento.id_usuario=usuario.idusuario WHERE usuario.email=?")){
	$stmt -> bind_param('s',$_SESSION['usuario']);
	$stmt ->execute();
	$resultado = $stmt -> get_result();
	

}	
//SELECT monto_inicial FROM usuario WHERE idusuario=2
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
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
	<div class="container">
		<div class="row">
			<div class="col-lg-9 ">
				<table class="table table-dark ">
					<thead>
					   	<tr>
					    	<th scope="col">Fecha</th>
					    	<th scope="col">Tipo</th>
					    	<th scope="col">Saldo</th>
					    </tr>	
					</thead>
					<tbody>
						<?php
					    while($reg = mysqli_fetch_assoc($resultado)):
					    ?>	   
					    <tr>
					    	<td><?php echo $reg['fecha'];?></td>
					      	<td><?php echo $a=$reg["tipo"]=1?$a='Extraccion':$a='Ingreso';?></td>
					      	<td><?php echo $reg["saldo_actual"];?></td>
					    </tr>
					    <?php endwhile; ?>
					</tbody>
				</table>	
			</div>
		</div>
	</div>
</body>
</html>