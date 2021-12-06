<?php session_start();

require 'admin/config.php';
require 'functions.php';
// comprobar session
if (!isset($_SESSION['usuario'])) {
  header('Location: '.RUTA.'login.php');
}

$conexion = conexion($bd_config);
$admin = iniciarSession('usuarios', $conexion);

if ($admin['tipo_usuario'] == 'administrador') {
  // traer el nombre del usuario
  $user = iniciarSession('usuarios', $conexion);

  require 'views/nuevo.admin.view.php';

} else {
  header('Location: '.RUTA.'index.php');
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $usuario = limpiarDatos($_POST['usuario']);
  $password = limpiarDatos($_POST['password']);
//  $password = hash('sha512', $password);
  $rol = $_POST['rol'];
  $genero = $_POST['genero'];

  $errores = '';

  // validar los campos de texto
  if (empty($usuario) || empty($password) || empty($rol)) {
      $errores .= '<li class="error">Por favor rellene todos los campos</li>';
  }else{
      // validacion de que el usuario no exista
      $conexion = conexion($bd_config);
      $statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario LIMIT 1');
      $statement->execute(array(
          ':usuario' => $usuario
      ));
      $resultado = $statement->fetch();

      if ($resultado != false) {
          $errores .= '<li class="error">Este usuario ya existe</li>';
      }
  }

  if($errores == ''){
      $conexion = conexion($bd_config);
      $statement = $conexion->prepare('INSERT INTO usuarios (id, usuario, password, tipo_usuario, genero) VALUES(null, :usuario, :password, :tipo_usuario, :genero)');
      $statement->execute(
          array(
              ':usuario' => $usuario,
              ':password' => $password,
              ':tipo_usuario' => $rol,
              ':genero' => $genero
          )    
      );

      header('Location: '.RUTA.'login.php');

  }
}
?>
