<?php 
// BUENA INFO https://desarrolloweb.com/articulos/1035.php
include('php/conexion.php');
// CANTIDAD DE PAGINAS 
if ($stmt= $conn->prepare("SELECT COUNT(*) AS total FROM valores")){
	$stmt->execute();
	$result= $stmt->get_result();
	$a= $result->fetch_assoc();
}

$total=$a['total'];
//TERMINA CANTIDAD DE PAGINAS
$offset=10; // Cantidad por pagina
$can_page= intdiv($total, $offset);//DIVISION ENTERA DEL  TOTAL DE LAS PAGINAS QUE DEBERIA TENER LA TABLA
$pages=isset($_GET["p"])?$_GET['p']:0; //Numero de pagina
$page=$pages<0?$pages=0:$pages=$pages; //IF ANIDADO
$page=$pages<=$can_page?$pages=$pages:$pages=$can_page; //IF ANIDADO 
$limit=($page * $offset); //INICIO DE LA TABLA
if($stmt= $conn->prepare("SELECT id_valor,fecha, USDT_BTC, USDT_ETH, BTC_ETH FROM valores ORDER BY fecha DESC LIMIT ?,?")){
	$stmt ->bind_param("ii",$limit,$offset);
	$stmt ->execute();
	$resultado =$stmt ->get_result();
}




?>
<!DOCTYPE html>
<html>
<head>
	<title>Valores</title>
	<?php include('include/head.php');?>
</head>
<body>
	<div class="app-header navbar ">
		<div class="collapse navbar-collapse box-shadow bg-white-only">
			<ul class="nav navbar-nav navbar-left addd ">
				
				<?php include('include/header.php'); ?>
			</ul>
		</div>
	</div>
	<div class="container cont">
		<div class="padre-form">
			<div class="col-lg-8">
				<table class="table tablas table-dark">
					<thead class="thead">
					   	<tr>
					    	<th scope="col">Fecha</th>
					    	<th scope="col">USDT_BTC</th>
					    	<th scope="col">USDT_ETH</th>
					    	<th scope="col">BTC_ETH</th>
					    </tr>
					</thead>
					<tbody class="tbody">
					    <?php
					    while($reg = mysqli_fetch_assoc($resultado)):
					    ?>
					    <tr>
					      	<td><?php echo $reg["fecha"];?></td>
					      	<td><?php echo $reg["USDT_BTC"];?></td>
					      	<td><?php echo $reg["USDT_ETH"];?></td>
					      	<td><?php echo $reg["BTC_ETH"];?></td>
					    </tr>
					   	<?php endwhile; ?>
					</tbody>
					<thead class="thead">
						<div class="thead">
							<td>
							<?php 
							if ($pages>0) {
							?>	
								<th><button class="btn btn-default"><a class="link" href="verValores.php?p=<?php echo ($page-1) ?>">Siguiente</a></button> </th>

							<?php 					
							}if ($pages<$can_page){ 
							?>
								<th><button class="btn btn-default"><a class="link" href="verValores.php?p=<?php echo $page+1 ?>">Anterior</a></button> </th>
						<?php }   ?>
							</td>
							<td></td>
						</div>
						
					</thead>
				</table>
			</div>
		</div>
	</div>
</body>
</html>