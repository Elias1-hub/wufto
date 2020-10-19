<?php 
include('php/conexion.php');
//UPDATE DE TABLA INDEX
$USDT_BTC= "UPDATE indexs SET 
index1=(SELECT AVG(USDT_BTC) FROM valores ORDER BY fecha DESC LIMIT 0,10), 
index2=(SELECT AVG(USDT_BTC) FROM valores ORDER BY fecha DESC LIMIT 0,50),
index3=(SELECT AVG(USDT_BTC) FROM valores ORDER BY fecha DESC LIMIT 0,200) 
WHERE id=1";
$USDT_ETH= "UPDATE indexs SET 
index1=(SELECT AVG(USDT_ETH) FROM valores ORDER BY fecha DESC LIMIT 0,10), 
index2=(SELECT AVG(USDT_ETH) FROM valores ORDER BY fecha DESC LIMIT 0,50),
index3=(SELECT AVG(USDT_ETH) FROM valores ORDER BY fecha DESC LIMIT 0,200) 
WHERE id=2";
$BTC_ETH= "UPDATE indexs SET 
index1=(SELECT AVG(USDT_ETH) FROM valores ORDER BY fecha DESC LIMIT 0,10), 
index2=(SELECT AVG(USDT_ETH) FROM valores ORDER BY fecha DESC LIMIT 0,50),
index3=(SELECT AVG(USDT_ETH) FROM valores ORDER BY fecha DESC LIMIT 0,200) 
WHERE id=3";

$list=array($USDT_BTC,$USDT_ETH,$BTC_ETH);
for ($i=0; $i <count($list) ; $i++) {
	if ($stmt= $conn->prepare($list[$i])){
		$stmt->execute();

	}  	
}
//MOSTRAR EN TABLA Prepared Statements
if ($stmt= $conn->prepare("SELECT nombre,index1,index2,index3 FROM indexs")){
	$stmt ->execute();
	$resultado = $stmt ->get_result();
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Indices</title>
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
			<div class="col-lg-8">
				<table class="table table-striped ">
					<thead class="thead">
					   	<tr>
					    	<th scope="col">nombre</th>
					    	<th scope="col">Indice 1</th>
					    	<th scope="col">Indice 2</th>
					    	<th scope="col">Indice 3</th>
					    </tr>	
					</thead>
					<tbody class="tbody">
						<?php
					    while($reg = mysqli_fetch_assoc($resultado)):
					    ?>	   
					    <tr>
					    	<td><?php echo $reg["nombre"];?></td>
					      	<td><?php echo $reg["index1"];?></td>
					      	<td><?php echo $reg["index2"];?></td>
					      	<td><?php echo $reg["index3"];?></td>
					    </tr>
					    <?php endwhile; ?>
					</tbody>
				</table>	
			</div>
		</div>
	</div>				
</body>		

</html>