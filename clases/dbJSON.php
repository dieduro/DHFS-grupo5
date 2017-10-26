<?php

include_once("usuario.php");
include_once("db.php");

class dbJSON extends db {
  //FUNCIONES json
  public function traerTodos() {
    $archivo = file_get_contents("usuarios.json");
    $array = explode(PHP_EOL, $archivo);
    // eliminamos la última linea del array que es un espacio vacío
    array_pop($array);

    $arrayFinal = [];
    foreach ($array as $usuario) {
      $arrayFinal[] = json_decode($usuario, true);
    }
    return $arrayFinal;
  }
  public function guardarUsuario($usuario) {
    // codificamos en JSON
    $usuarioJSON = json_encode($usuario);
    // guardamos en JSON con espacios y APPENDEAMOS
    file_put_contents("usuarios.json", $usuarioJSON . PHP_EOL, FILE_APPEND);
  }
  public function traerPorMail($email) {
    $todos = traerTodos();
    foreach ($todos as $usuario) {
      if ($usuario["email"] == $email) {
        return $usuario;
      }
    }
    return NULL;
  }

}

?>
