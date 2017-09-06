    <!--header-->
    <?php
    include_once 'header.php';
     ?>
    <div class="container">
      <div>
        <a class="btn-solid-lg" href="login.php.php" role="button">INGRESÁ con facebook</a>
      </div>
      <form class="" action="index.php" method="post">
        <input class="form-box" type="text" name="email" id="email" placeholder="e-mail"required><br><br>
        <input class="form-box" type="password" name="contraseña" id="contraseña" placeholder="Contraseña"required><br><br>
        <input class="form-box" type="checkbox" name="" value="recordame">Recúerdame</p><br><br><br>
        <button class="btn-solid" type="submit" name="iniciarSesion" id="iniciarSesion">INICIAR SESION</button>
      </form>
      <br><br><br>
      <p>¿Olvidaste tu nombre de usuario o contraseña?<br>
      ¿No tienes cuenta? <a href="registro.html">Regístrate</a>
    </p><br><br><br>
    <p>Si haces click en "Acceder con Facebook" y no eres usuario de TEAMAPP, quedarás registrado y aceptarás los  <a href="#"> Términos y Condiciones</a> y <a href="#"> Política de Privacidad</a> de TEAMAPP!</p>
    </div>
    <?php
    include_once 'footer.php';
     ?>
  </body>
</html>
