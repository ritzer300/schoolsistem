<?php  
	if (!isset($_GET['id'])) {
		exit();
	}

	$codigo = $_GET['id'];
	include 'admin/conexion.php';
	$sentencia = $bd->prepare("DELETE FROM usuarios WHERE id = ?;");
	$resultado = $sentencia->execute([$codigo]);

	if ($resultado === TRUE) {
		echo "usuarios borrado exitosamente";
	}else{
		echo "Error";
	}

?>