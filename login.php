<?php
require_once("soporte.php");

if ($auth->estaLogueado()) {
  header("Location:index.php");
}

$arrayErrores = [];
if ($_POST) {

  //Validar
  $arrayErrores = $validator->validarLogin($_POST);

  //Si es valido, loguear
  if (count($arrayErrores) == 0) {
    $auth->loguear($_POST["email"]);
    if (isset($_POST["recordame"])) {
      $auth->recordarUsuario($_POST["email"]);
    }
      header("Location:index.php");exit;
    }
  }

  // HEADER
  include_once("header.php");
  ?>

  <!-- CONTENIDO -->
     <div class="login_img">
      <div class="container caja">
        <div class="con_fb">
          <a class="btn-solid-lg" href="login.php" role="button">INGRESÁ con facebook</a>
          <hr>
        </div>
        <!--<?php if (count($arrayErrores) > 0) : ?>
          <ul class="errores">
            <?php foreach($arrayErrores as $error) : ?>
              <li><?=$error?></li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?> -->
        <form class="form" action="login.php" id="login" method="POST">
          <input type="text" name="email" id="email" placeholder="Email">
          <?php if (isset($arrayErrores["email"])) { ?>
            <div class="errores">
              <?php echo $arrayErrores["email"]; ?></div>
            <?php } ?>
          <input  type="password" name="password" id="password" placeholder="Contraseña">
          <?php if (isset($arrayErrores["password"])) { ?>
            <div class="errores">
          <?php echo $arrayErrores["password"]; ?></div>
          <?php } ?>
          <div class="recordarme">
            <input type="checkbox" name="recordame" value="recordame">
            <label for="recordame">Recordame</label>
          </div>
          <button class="btn-solid-lg" type="submit" name="iniciarSesion" id="iniciarSesion">INICIAR SESIÓN</button>
        </form>
        <div class="linkeo">
          <h6><a href="forgotPassword.php">¿Olvidaste tu nombre de usuario o contraseña?</a></h6>
          <br>
          <h6>¿No tenés cuenta? <a href="registro.php">Registrate</a></h6>
        </div>
        <div class="legals">
          <hr>
          <h6>Si hacés click en "INGRESÁ CON FACEBOOK" y no eres usuario de TEAMUP!, quedarás registrado y aceptarás los  <a href="#">Términos y Condiciones</a> y <a href="#"> Política de Privacidad</a> de TEAMUP!</p>
        </div>
      </div>
    </div>

    <!-- FOOTER -->
    <?php
    require_once("footer2.php");
     ?>
