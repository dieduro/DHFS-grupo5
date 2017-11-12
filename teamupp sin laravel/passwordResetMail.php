<?php
require_once("soporte.php");
require_once("clases/usuario.php");

setcookie("emailRecuperacion", $_POST["email"], time() + 900);

$usuario = $db->traerPorMail($_POST["email"]);

if ($usuario){
  $token = $usuario->getToken();
  $url = "passwordReset.php?token=" . $token;

  ?>

  <body>
    <p>
      DE: teamup@soporte.com.ar <br>
      PARA: <?=$_POST["email"]?> <br>
      ASUNTO: Reestablecé tu Contraseña <br>
    </p>
    <hr>
    <br>
    <p>Accedé a este link para reestablecer tu contraseña: </p><br><br>
    <a href="<?=$url?>"><?=$url?></a>
  </body>

<?php }else{  ?>
  <h1>TU USUARIO NO EXISTE!</h1>
  <h3>No te hagas el vivo perejil ;-)</h3>
  <a href="index.php">Nos vimo en disney..........>>>>>></a>

<?php } ?>
