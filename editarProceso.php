<?php 
	//print_r($_POST);
	if (!isset($_POST['oculto'])) {
		header('Location: admin.act.php');
	}

	include 'admin/conexion.php';
	
	$id2 = $_POST['id2'];
	$nombre2 = $_POST['nom'];
	$usuario2 = $_POST['usu'];
	$password2 = $_POST['pass'];
	$tipo_usuario2 = $_POST['tip'];

	$sentencia = $bd->prepare("UPDATE usuarios SET nombre = ?, usuario = ?, password = ?, tipo_usuario = ? WHERE id = ?;");
	$resultado = $sentencia->execute([$nombre2,$usuario2,$password2,$tipo_usuario2,$id2]);

	if ($resultado === TRUE) {
		echo "exito";
	}else{
		echo "Error";
	}
?>