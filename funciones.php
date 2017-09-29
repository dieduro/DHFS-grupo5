<?php
session_start();
if (!estaLogueado() && isset($_COOKIE["usuarioLogueado"])) {
  loguear($_COOKIE["usuarioLogueado"]);
}

function validarInformacion($informacion) {
  $arrayDeErrores = [];

  foreach ($informacion as $key => $value) {
    // sacamos espacios vacíos
    $informacion[$key] = trim($value);
    }

  if (strlen($informacion["email"]) == 0) {
    $arrayDeErrores["email"] = "No completaste tu email";
  }
  else if (filter_var($informacion["email"], FILTER_VALIDATE_EMAIL) == false) {
    $arrayDeErrores["email"] = "El mail que ingresaste no es válido";
  }
  else if (traerPorMail($informacion["email"]) != NULL) {
    $arrayDeErrores["email"] = "Ya existe una cuenta creada con ese email";
  }

  //chequeamos la password
  if (strlen($informacion["password"]) < 8) {
    $arrayDeErrores["password"] = "La contraseña tiene que tener al menos 8 caracteres";
  }
  // y si es igual a la ingresada por confirmacion
  else if ($informacion["password"] != $informacion["cpassword"]) {
    $arrayDeErrores["cpassword"] = "Las contraseñas no son iguales";
  }

  //chequeamos la foto
  $errorDeLaFoto = $_FILES["foto-perfil"]["error"];
  $nombreDeLaFoto = $_FILES["foto-perfil"]["name"];
  $tamañoFoto = $_FILES["foto-perfil"]["size"];
  $extension = pathinfo($nombreDeLaFoto, PATHINFO_EXTENSION);
  if ($errorDeLaFoto != UPLOAD_ERR_OK) {
    $arrayDeErrores["foto-perfil"] = "Hubo un error al cargar la foto";
  }
  else if ($tamañoFoto > 2097152) {
    $arrayDeErrores["foto-perfil"] = "La foto tiene que pesar menos 2 Mb";
  }
  else if ($extension != "jpg" && $extension != "jpeg" && $extension != "png" && $extension != "gif") {
    $arrayDeErrores["foto-perfil"] = "Debés subir una imagen JPG, JPEG, PNG o GIF";
  }
  //revisamos que haya chequeado los legales
  if (!isset($informacion["legals"])) {
    $arrayDeErrores["legals"] = "Para poder usar el servicio debés aceptar compartir tu información";
  }
  return $arrayDeErrores;
}

// validamos el login
function validarLogin($informacion) {
  $arrayDeErrores = [];

  if (strlen($informacion["email"]) == 0) {
    $arrayDeErrores["email"] = "No completaste tu email";
  }
  else if (filter_var($informacion["email"], FILTER_VALIDATE_EMAIL) == false) {
    $arrayDeErrores["email"] = "El mail que ingresaste no es válido";
  }
  else if (traerPorMail($informacion["email"]) == NULL) {
    $arrayDeErrores["email"] = "El usuario no existe";
  }
  else {
    //validar la contraseña
    $usuario = traerPorMail($informacion["email"]);
    // comparamos pass ingresada con pass guardada
    if (password_verify($informacion["password"], $usuario["password"]) == false) {
      $arrayDeErrores["password"] = "La contraseña no coincide";
    }
  }
  return $arrayDeErrores;
}

// armamos el usuario
function armarUsuario($data) {
  return [
  "name" => $data["name"],
  "email" => $data["email"],
  // hasheamos el password
  "password" => password_hash($data["password"], PASSWORD_DEFAULT),
  ];
}

// guardar usuario en json
function guardarUsuario($usuario) {
  // codificamos en JSON
  $usuarioJSON = json_encode($usuario);
  // guardamos en JSON con espacios y APPENDEAMOS
  file_put_contents("usuarios.json", $usuarioJSON . PHP_EOL, FILE_APPEND);
}

function traerTodos() {
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

function traerPorMail($email) {
  $todos = traerTodos();
  foreach ($todos as $usuario) {
    if ($usuario["email"] == $email) {
      return $usuario;
    }
  }
  return NULL;
}

function loguear($email) {
  $_SESSION["usuarioLogueado"] = $email;
}

// chequeamos que en session haya un "usuario logueado"
function estaLogueado() {
  if (isset($_SESSION["usuarioLogueado"])) {
    return true;
  }
  else {
    return false;
  }
}

// chequeamos si esta logueado
function usuarioLogueado() {
  if (estaLogueado()) {
    return traerPorMail($_SESSION["usuarioLogueado"]);
  } else {
    return NULL;
  }
}

// seteamos la cookie
function recordarUsuario($email) {
  setcookie("usuarioLogueado", $email, time() + 60*60*24*7);
}

 ?>
