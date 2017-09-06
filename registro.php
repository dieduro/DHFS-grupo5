<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/styles.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/styles.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,600" rel="stylesheet">
    <title>Registrate</title>
  </head>
<body>
  <!--header-->
  <?php
  include_once 'header.php';
   ?>
<!--campos de registro obligatorios-->
<br><br>
  <div class="container panel">
    <div class="loginBtn-cont" >
      <button class="loginBtn loginBtn--facebook">
        Conectate con Facebook
      </button>
      <hr>
    </div>

    <h2>Creá tu cuenta</h2><br>

    <form id="registro" method="post" class="panel">
      <div class="regDatosObligatorios">
        <input type="text" name="nombreyapellido" id="nombreApellido" placeholder="Nombre y Apellido"required><br><br>
        <input type="text" name="email" id="email" placeholder="e-mail"required><br><br>
        <input type="password" name="contraseña" id="contraseña" placeholder="Contraseña"required><br><br>
        <input type="password" name="contraseña" id="contraseña" placeholder="Repetir Contraseña"required><br><br><br>

        <div class="legals">
          <input type="checkbox" name="" value="Compartir mis datos de registro con los proveedores de contenido de TeamApp para fines de marketing"><p> Compartir mis datos de registro con los proveedores de contenido de TEAMAPP para fines de marketing.</p><br><br><br><br>
          <p> Si haces click en "Regístrate" aceptarás los <a href="#"> Términos y Condiciones</a> y <a href="#"> Política de Privacidad</a> de TEAMAPP </p><br><br><br>
        </div>
      </div>

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
        <button type="submit" name="submit" id="submit">Regístrate</button><br><br><br>
        <p>¿Ya tienes cuenta?
        <a href="login.php">Inicia Sesión</a>
      </p>
    </form>
  </div>
</body>
</html>
