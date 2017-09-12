  <!--header-->
  <?php
  include_once 'header.php';
   ?>
<!--campos de registro obligatorios-->
<div class="register_img">
  <div class="container caja">
    <div class="con_fb">
      <a class="btn-solid-lg" href="registro.php" role="button">REGISTRATE con facebook</a>
      <hr>
    </div>
    <form class="form" id="registro" method="post">
      <div>
        <input type="text" name="name" id="name" placeholder="Nombre y Apellido" required>
        <input type="text" name="email" id="email" placeholder="Email" required>
        <input type="password" name="contraseña" id="password" placeholder="Contraseña" required>
        <input type="password" name="contraseña" id="password" placeholder="Repetir Contraseña" required>
        <div class="legals">
          <input type="checkbox" name="" value="">
          <h6 style="color:#555555">Compartir mis datos de registro con los proveedores de contenido de TEAMUP! para fines de marketing.</h6>
          <hr>
          <h6>Si hacés click en "Registrarme" aceptarás los <a href="#">Términos y Condiciones</a> y <a href="#">Política de Privacidad</a> de TEAMup! </h6>          
        </div>
        <button class="btn-solid-lg" type="submit" name="register" id="register">REGISTRARME</button>
      </div>
    </form>
    <div class="linkeo">
      <h6>¿Ya tienes cuenta? <a href="login.php">Inicia Sesión</a></h6>
    </div>
  </div>
</div>

<!-- FOOTER -->
  <?php
  include_once 'footer2.php';
   ?>
