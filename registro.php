<?php
require_once("soporte.php");
require_once("clases/usuario.php");

if ($auth->estaLogueado()) {
  header("Location:index.php");
}

$arrayErrores = [];
$emailDefault = "";
$nameDefault = "";

// si vino por POST
if ($_POST) {
  //Validamos
  $arrayErrores = $validator->validarInformacion($_POST, $db);


  // si la validacion es correcta
  if (count($arrayErrores) == 0) {

    // 1) Creamos el usuario
    $usuario = new Usuario(null,$_POST["name"], $_POST["email"], $_POST["password"], null, null);


    if($_FILES["foto-perfil"]["error"] !=4){
      // 2) Guardamos la foto
      $fotoPath = $usuario->guardarFoto();
    } else {
      $usuario->setfotoPath("images/users_img/userDefault.png");
    }

    $con = $db->guardarUsuario($usuario);
    
    // 3) Seteamos la cookie para que ya quede LOGUEADO
    $auth->recordarUsuario($_POST["email"]);
    $auth->loguear($_POST["email"]);


    // 4) Redirigimos
    header("Location:redirection.php");exit;
  }
  $emailDefault = $_POST["email"];
  $nameDefault = $_POST["name"];
}

// HEADER
require_once("header.php");
?>

<!-- empieza el formulario -->
<div class="register_img">
  <div class="container caja">
    <div class="con_fb">
      <a class="btn-solid-lg" href="registro.php" role="button">REGISTRATE con facebook</a>
      <hr>
    </div>
    <form class="form" action="registro.php" id="registro" enctype="multipart/form-data" method="POST">
      <div>
        <input type="text" name="name" id="name" placeholder="Nombre y Apellido" value="<?=$nameDefault?>">
        <input type="text" name="email" id="email" placeholder="Email" value="<?=$emailDefault?>" >
        <?php if (isset($arrayErrores["email"])) { ?>
          <div class="errores">
            <?php echo $arrayErrores["email"]; ?></div>
          <?php } ?>
          <input type="password" name="password" id="password" placeholder="Contraseña" >
          <?php if (isset($arrayErrores["password"])) { ?>
            <div class="errores">
              <?php echo $arrayErrores["password"]; ?></div>
            <?php } ?>
            <input type="password" name="cpassword" id="cpassword" placeholder="Repetir Contraseña" >
            <input type="file" name="foto-perfil" value="">
            <?php if (isset($arrayErrores["foto-perfil"])) { ?>
              <div class="errores">
                <?php echo $arrayErrores["foto-perfil"]; ?></div>
              <?php } ?>
            <div class="legals">
              <input type="checkbox" name="legals" value="">
              <h6 style="color:#555555">Acepto los términos y condiciones de servicio.</h6>
              <?php if (isset($arrayErrores["legals"])) { ?>
                <div class="errores">
                  <?php echo $arrayErrores["legals"]; ?></div>
                <?php } ?>
                <hr>
                <h6>Si hacés click en "Registrarme" aceptarás los <a href="#">Términos y Condiciones</a> y <a href="#">Política de Privacidad</a> de TEAMup! </h6>
              </div>
              <button class="btn-solid-lg" type="submit" name="button" id="register">REGISTRARME</button>
            </div>
          </form>
          <div class="linkeo">
            <h6>¿Ya tienes cuenta? <a href="login.php">Inicia Sesión</a></h6>
          </div>
        </div>
      </div>

      <!-- FOOTER -->
      <?php
      require_once("footer2.php");
      ?>
