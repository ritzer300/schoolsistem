<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>LogIn</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="./css/main.css">
</head>
<body class="cover" style="background-image: url(./assets/img/loginFont.jpg);">
  <div class="container">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" autocomplete="off" class="full-box logInForm">
		<p class="text-center text-muted"><i class="zmdi zmdi-account-circle zmdi-hc-5x"></i></p>
		<p class="text-center text-muted text-uppercase">Inicia sesión con tu cuenta</p>

      <div class="form-group label-floating">
        <i class="control-label" aria-hidden="false"></i>
        <input type="text" name="usuario" placeholder="Usuario" class="form-control">
      </div>

      <div class="form-group label-floating">
        <i class="control-label" aria-hidden="false"></i>
        <input type="password" name="password" placeholder="Contraseña" class="form-control">
      </div>

      <ul>
        <?php if (!empty($errores)): ?>
          <?php echo $errores ?>
        <?php endif; ?>
      </ul>
      <div class="form-group text-center">
      <button type="submit" name="submit" class="btn btn-raised btn-danger">Ingresar</button>
		</div>
    <div class="form-group text-center">
    <a href="<?php echo RUTA.'registro.php' ?>" class="login-link">¿No tienes cuenta?</a>
		</div>
    </form>
   
  </div>
  <script src="./js/jquery-3.1.1.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<script src="./js/material.min.js"></script>
	<script src="./js/ripples.min.js"></script>
	<script src="./js/sweetalert2.min.js"></script>
	<script src="./js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="./js/main.js"></script>
	<script>
		$.material.init();
	</script>
</body>
</html>
