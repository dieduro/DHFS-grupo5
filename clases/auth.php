<?php

include_once("db.php");

class Auth {
  public function _construct() {
    session_start();
    if (!$this->estaLogueado() && isset($_COOKIE["usuarioLogueado"])) {
      $this->loguear($_COOKIE["usuarioLogueado"]);
    }
  }

  public function loguear($email) {
    $_SESSION["usuarioLogueado"] = $email;
  }

  // chequeamos que en session haya un "usuario logueado"
  public function estaLogueado() {
    if (isset($_SESSION["usuarioLogueado"])) {
      return true;
    }
    else {
      return false;
    }
  }

  // chequeamos si esta logueado
  public function usuarioLogueado(db $db) {
    if ($this->estaLogueado()) {
      return $db->traerPorMail($_SESSION["usuarioLogueado"]);
    } else {
      return NULL;
    }
  }

  // seteamos la cookie
  public function recordarUsuario($email) {
    setcookie("usuarioLogueado", $email, time() + 60*60*24*7);
  }

  public function logout() {
    session_destroy();
    setcookie("usuarioLogueado", " ", -1);
    header("Location:index.php");exit();
  }
}

?>
