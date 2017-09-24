<?php
  include_once "funciones.php";
  session_destroy();
  setcookie("usuarioLogueado", " ", time(), -1);
  header("Location:index.php");exit();
?>
