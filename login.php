    <!--header-->
    <?php
    include_once 'header.php';
     ?>
    <div class="container">
      <div class="con_fb">
        <a class="btn-solid-lg" href="login.php" role="button">INGRESÁ con facebook</a>
        <hr>
      </div>
      <form class="form" id="login.php" action="index.php" method="post">
        <input type="text" name="email" id="email" placeholder="Email" required>
        <input  type="password" name="contraseña" id="contraseña" placeholder="Contraseña" required>
        <div class="recordarme">
          <input type="checkbox" name="recordame" value="recordame">
          <label for="recordame">Recordame</label>
        </div>
        <button class="btn-solid-lg" type="submit" name="iniciarSesion" id="iniciarSesion">INICIAR SESION</button>
      </form>
      <div class="linkeo">
        <h6><a href="#">¿Olvidaste tu nombre de usuario o contraseña?</a></h6>
        <br>
        <h6>¿No tienes cuenta? <a href="registro.html">Registrate</a></h6>
      </div>
      <div class="legals">
        <hr>
        <h6>Si haces click en "INGRESÁ CON FACEBOOK" y no eres usuario de TEAMAPP, quedarás registrado y aceptarás los  <a href="tts.php">Términos y Condiciones</a> y <a href="#"> Política de Privacidad</a> de TEAMAup!</p>
      </div>

    </div>
    <?php
    include_once 'footer.php';
     ?>
  </body>
</html>
