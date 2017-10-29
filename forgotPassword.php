<?php
require_once("soporte.php");
require_once("clases/usuario.php");
include_once("header.php");

  if (!$_POST){
  ?>
<body>
  <h1>Olvide mi Contraseña!</h1>
  <br><hr><br>
  <form class="form" action="forgotPassword.php" id="login" method="POST">
  <input type="text" name="email" id="email" placeholder="Email">
  <button class="btn-solid-lg" type="submit" name="iniciarSesion" id="iniciarSesion">Reestablecer Contraseña</button>
  </form>


<?php
  }else{
  $errores = $validator->validarRecuPass($_POST);
  if(count($errores)==0){
     $email = $_POST["email"];
     ?>
     <p>Te acabamos de mandar un mail para que puedas reestablecer tu contraseña.</p>
     <form class="" action="passwordResetMail.php" method="post">
       <input type="text" name="email" id="email" value="<?=$email?>" placeholder="Email">
       <button type="submit" name="button">[DEMO] Ir al mail.</button>
     </form>
     <?php
  }

}
 ?>




 </body>
