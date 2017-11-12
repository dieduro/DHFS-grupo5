<?php

include_once("usuario.php");

abstract class Db {
  public abstract function traerTodos();
  public abstract function traerPorMail($email);
  public abstract function guardarUsuario($usuario);
}

?>
