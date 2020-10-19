<?php 
include('php/conexion.php');




if ($stmt = $conn->prepare("SELECT * FROM usuario WHERE email=?")){
	$stmt -> bind_param('s',$_SESSION['usuario']);
	$stmt ->execute();
	$resulta = $stmt -> get_result();
	$dato = $resulta ->fetch_array();

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
	<div class="top_container" style="display: block; width: 100%;">
		<div>
			<div class="centrado rfrom">
				<div class="header-lg">
					<div class="row">
						<div class="col-xs-12 col-sm-9">
							<h1>Dashboard</h1>
						</div>
					</div>
				</div>
				<div class="row text-center">
					<div class="col-xs-6 col-sm-3">
						<div class="panel-default tal panel p15 item" style="height: 100px">
							<div class="dt w100p">
								<div class="dtc vam">
									<span>Saldo</span>
								</div>
								<div class="dtc tar vam">
									<div class="h1 c1">10000$</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-6 col-sm-3">
						<div class="panel-default tal panel p15 item" style="height: 100px">
							<div class="dt w100p">
								<div class="dtc vam">
									<span>Saldo original</span>
								</div>
								<div class="dtc tar vam">
									<div class="h1 c1"><?php echo $dato['monto_inicial'] ?>$</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-6 col-sm-3">
						<div class="panel-default tal panel p15 item" style="height: 100px">
							<div class="dt w100p">
								<div class="dtc vam">
									<span>Gamancia</span>
								</div>
								<div class="dtc tar vam">
									<div class="h1 c1">9000$</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-6 col-sm-3">
						<div class="panel-default tal panel p15 item" style="height: 100px">
							<div class="dt w100p">
								<div class="dtc vam">
									<span>Porcentaje</span>
								</div>
								<div class="dtc tar vam">
									<div class="h1 c1">10%</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>