<?php  

include('conexion.php');

function login($conn){
	$email 		= $_POST["email"];
	$password 	= $_POST["password"];
	if ($stmt= $conn->prepare("SELECT * FROM usuario WHERE email=? AND password=? ")){
		$stmt ->bind_param("si",$email,$password);
		$stmt ->execute();
		$result = $stmt->get_result();
		$resultado = $result->fetch_assoc();
		if ($resultado){
			session_start();
			$_SESSION['usuario']=$email;	
			echo "logeado correctamente";
			header('location: ../micuenta.php');
		}else{
			echo "Error al ingresar";
		}		
	}
}

function modificar($conn){
	//modifica la base de datos (email, password), de la cuenta logeada
	$email    = $_POST["email"];		
	$password = $_POST["password"];	 
	$id  	  = $_POST["id"];
	if ($stmt = $conn-> prepare("UPDATE usuario SET email = ?, password = ? WHERE idusuario=?")){
		$stmt ->bind_param("sii",$email,$password,$id);
		$f= $stmt ->execute();
		if ($f===false){
			echo "Error";
		}
		echo "Cambios realizaos con exito";
		header('location: ../micuenta.php');
	}

}

function agregar($conn){
	$nombre 	= $_POST['name'];
	$email 		= $_POST["email"];
	$password 	= $_POST["password"];
	$rol 		= $_POST['rol'];
	if ($stmt = $conn->prepare("INSERT INTO wufto.usuario (nombre,email,password,rol) VALUES (?,?,?,?)")) {
		$stmt ->bind_param("sssi",$nombre,$email,$password,$rol);
		$f = $stmt ->execute();
		if ($f===false){
			echo 'error';
		}
		echo 'Agregado con exito';
		header('location: ../nuevoUsuario.php');


	}

}
//switch de acciones de la pagina
$accion=$_POST["accion"];

switch ($accion){
 	case 'login':
 		echo login($conn);
 		break;	
 	case 'modificar':
 		echo modificar($conn);
 		break;
 	case 'agregar':
 		echo agregar($conn);
 		break;
}

?>	