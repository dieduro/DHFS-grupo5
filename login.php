<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/styles.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,600" rel="stylesheet">
    <title>TeamApp!</title>
  </head>
  <body>
    <!--header-->
    <?php
    include_once 'header.php';
     ?>
    <div class="container panel">

      <form class="" action="index.php" method="post">
        <input type="text" name="email" id="email" placeholder="e-mail"required><br><br>
        <input type="password" name="contraseña" id="contraseña" placeholder="Contraseña"required><br><br>
        <input type="checkbox" name="" value="recordame">Recúerdame</p><br><br><br>
        <button type="submit" name="iniciarSesion" id="iniciarSesion">INICIAR SESION</button>
      </form>
      <br><br><br>
      <p>¿Olvidaste tu nombre de usuario o contraseña?<br>
      ¿No tienes cuenta? <a href="registro.html">Regístrate</a>
    </p><br><br><br>
    <p>Si haces click en "Acceder con Facebook" y no eres usuario de TEAMAPP, quedarás registrado y aceptarás los  <a href="#"> Términos y Condiciones</a> y <a href="#"> Política de Privacidad</a> de TEAMAPP!</p>
    </div>
  </body>
</html>
