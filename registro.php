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
          <!--Otros Campos de registro
<div class="regInfoPersonal"
  <label for="cumple">Fecha de Nacimiento: </label>
  <input type="date" name="cumple" id="cumple"><br><br>
    <fieldset>
      <legend>Sexo</legend>
      <input type="radio" name="Sex" value="Female" checked>  Femenino
      <input type="radio" name="Sex" value="Masculino"> Masculino
    </fieldset>
      <br><br>
<h3>Dirección:</h3><br>
    <label for="calle">Calle:</label>
    <input type="text" id="calle" name="calle"> <br><br>
    <label for="numero">Número: </label>
    <input type="number" id="numero" name="numero" min="0" max="10.000"> <br><br>
    <label for="cp">Código Postal: </label>
    <input type="number" id="cp" name="cp" min="0" max="100.000"> <br><br>
    <label for="ciudad">Ciudad:</label>
    <input type="text" id="ciudad" name="ciudad"> <br><br>
    <label for="provincia">Provincia:</label>
    <input type="text" id="provincia" name="provincia"> <br><br>
<h4>Donde te podemos contactar? </h4><br>
    <label for="telefono">Teléfono</label>
      <select name="telefono" id="telefono">
        <option value="celular">Celular</option>
        <option value="Fijo">Fijo</option><br>
      <input type="tel" name="tel" id="tel"><br><br>
</div>
<div class="regPreferencias">
  <fieldset>
    <legend>Qué deportes te gustan?</legend><br>
      <input type="checkbox" name="Futbol" value="Futbol" checked>  Futbol<br>
      <input type="checkbox" name="Basquet" value="Basquet"> Basquet<br>
      <input type="checkbox" name="Volley" value="Volley"> Volley<br>
      <input type="checkbox" name="Hockey" value="Hockey"> Hockey<br>
      <input type="checkbox" name="Golf" value="Golf"> Golf<br>
      <input type="checkbox" name="Rgby" value="Rugby"> Rugby<br>
      <input type="checkbox" name="Softball" value="Softball"> Softball<br>
  </div>
  </fieldset><br>--->
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
