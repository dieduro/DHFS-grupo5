<?php
require_once("funciones.php");

 $token = getToken($_POST["email"]);
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
