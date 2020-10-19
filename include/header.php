
<?php 


if ($stmt = $conn->prepare("SELECT * FROM usuario WHERE email=?")){
	$stmt -> bind_param('s',$_SESSION['usuario']);
	$stmt ->execute();
	$resulta = $stmt -> get_result();
	$dato = $resulta ->fetch_array();

}

if ($dato['rol']==1){

?>
<li><a href="micuenta.php">Mi Usuario</a></li>
<li><a href="nuevoUsuario.php">Nuevo Usuario</a></li>
<li><a href="indices.php">Indices</a></li>
<li><a href="verValores.php">Valores</a></li>
<li><a href="cerrar.php">Cerrar</a></li>


<?php }	

else  {
?>



<li><a href="micuenta.php">Mi Usuario</a></li>
<li><a href="dashboard.php">Dashboard</a></li>
<li><a href="movimiento.php">Movimientos</a></li>
<li><a href="cerrar.php">Cerrar</a></li>



<?php  
}
	?>