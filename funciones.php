<?php
session_start();
if (!estaLogueado() && isset($_COOKIE["usuarioLogueado"])) {
  loguear($_COOKIE["usuarioLogueado"]);
}
//CONECTAMOS CON LA BASE DE DATOS
$dsn = 'mysql:host=localhost;charset=utf8mb4;port:3306';
$username = "root";
$password = "root";
try {
  $db = new PDO ($dsn, $username, $password);
} catch (Exception $e) {
  echo $e-> getMessage();
}


//FUNCIONES json
function traerTodosJSON() {
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
  useDB();
  global $db;
  $sql = "SELECT * from users where email = :email";
  $query = $db->prepare($sql);
  $query->bindValue(":email", $email);
  $query->execute();
  $usuario = $query->fetch(PDO::FETCH_ASSOC);
  return $usuario;
}
function guardarUsuarioJSON($usuario) {
  // codificamos en JSON
  $usuarioJSON = json_encode($usuario);
  // guardamos en JSON con espacios y APPENDEAMOS
  file_put_contents("usuarios.json", $usuarioJSON . PHP_EOL, FILE_APPEND);
}


//FUNCIONES DB
//CREA LA BASE DE DATOS
function createDB() {
  global $db;
  $base = "CREATE DATABASE teamup_db;";
  $query = $db->prepare($base);
  $query->execute();
}
//SELECCIONA LA DB A USAR
function useDB() {
  global $db;
  $useDB = "USE teamup_db;";
  $query = $db->prepare($useDB);
  $query->execute();
}
//CREACION DE TABLA USERS
function createUsersTable() {
  global $db;
  $sql = "CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(40),
    email VARCHAR(40) UNIQUE,
    password VARCHAR(70) UNIQUE,
    fotoPath VARCHAR(70) NOT NULL,
    token VARCHAR(70) UNIQUE
  )AUTO_INCREMENT=1";
  $query = $db->prepare($sql);
  $query->execute();
}
// llena la DB con datos de usuarios.json
function exportToDB(){
  $arrayUsersJson = traerTodosJSON();
  foreach ($arrayUsersJson as $user) {
    guardarUsuarioDB($user);
  }
}
//Inicializa la base
function initDB(){
  createDB();
  useDB();
  createUsersTable();
}

// guardar usuario en DB
function guardarUsuarioDB($usuario) { //si le pongo un & pasa el valor por referencia y no hace falta el Return
  useDB();
  global $db;
  $sql = "INSERT INTO users VALUES (default,:name, :email, :password, :fotoPath, :token)";
  $query = $db->prepare($sql);
  $query->bindValue(":name", $usuario["name"]);
  $query->bindValue(":email", $usuario["email"]);
  $query->bindValue(":password", $usuario["password"]);
  $query->bindValue(":fotoPath", $usuario["fotoPath"]);
  $query->bindValue(":token", $usuario["token"]);
  $query->execute();
  $usuario["id"] = $db->lastInsertId();
  return $usuario;
}
// extrae todos los USUARIOS de la DB
function traerTodosDB() {
  useDB();
  global $db;
  $sql = "SELECT * from users";
  $query = $db->prepare($sql);
  $query->execute();
  $arrayFinal = $query->fetchAll(PDO::FETCH_ASSOC);
  return $arrayFinal;
}


// VALIDACIONES
//VALIDA FORMULARIO DE REGISTRO
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
  if (strlen($informacion["password"]) < 6) {
    $arrayDeErrores["password"] = "La contraseña tiene que tener al menos 8 caracteres";
  }
  // y si es igual a la ingresada por confirmacion
  else if ($informacion["password"] != $informacion["cpassword"]) {
    $arrayDeErrores["cpassword"] = "Las contraseñas no son iguales";
  }

  //chequeamos la foto
  if ($_FILES["foto-perfil"]["error"]!=4){
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
  }
  //revisamos que haya chequeado los legales
  if (!isset($informacion["legals"])) {
    $arrayDeErrores["legals"] = "Para poder usar el servicio debés aceptar compartir tu información";
  }
  return $arrayDeErrores;
}
// VALIDA FORMULARIO DE LOGIN
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
//VALIDA RECUPERO DE PASSWORD_DEFAULT
function validarRecuPass($informacion) {
  $arrayDeErrores = [];

  if (strlen($informacion["email"]) == 0) {
    $arrayDeErrores["email"] = "No completaste tu email";
  }
  else if (filter_var($informacion["email"], FILTER_VALIDATE_EMAIL) == false) {
    $arrayDeErrores["email"] = "El mail que ingresaste no es válido";
  }
  return $arrayDeErrores;

}
// VALIDA RESETEO DE PASSWORD
function validarResetPassword($informacion) {
  $arrayDeErrores = [];
  //chequeamos la password
  if (strlen($informacion["password"]) < 6) {
    $arrayDeErrores["password"] = "La contraseña tiene que tener al menos 8 caracteres";
  }
  // y si es igual a la ingresada por confirmacion
  else if ($informacion["password"] != $informacion["cpassword"]) {
    $arrayDeErrores["password"] = "Las contraseñas no son iguales";
  }

  return $arrayDeErrores;
}


// ARMA USUARIO (hashea password)
function armarUsuario($data, $fotoPath) {
  return [
  "name" => $data["name"],
  "email" => $data["email"],
  // hasheamos el password
  "password" => password_hash($data["password"], PASSWORD_DEFAULT),
  "fotoPath" => $fotoPath,
  "token" => md5(uniqid(rand()))
  ];
}

// guardar usuario en json
function guardarUsuario($usuario) {
  // codificamos en JSON
  $usuarioJSON = json_encode($usuario);
  // guardamos en JSON con espacios y APPENDEAMOS
  file_put_contents("usuarios.json", $usuarioJSON . PHP_EOL, FILE_APPEND);
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

function getFotoPath($usuario) {
  useDB();
  global $db;
  $sql = "SELECT u.fotoPath as ruta FROM users u WHERE email = :email;";
  $query = $db->prepare($sql);
  $query->bindValue(":email", $usuario["email"]);
  $query->execute();
  $fotoPath = $query->fetch(PDO::FETCH_ASSOC);
  return $fotoPath;
}

function getToken($email) {
  $todos = traerTodosDB();
  foreach ($todos as $usuario) {
    if ($usuario["email"] == $email) {
      return $usuario["token"];
    }
  }
  return NULL;


}

function hashPass($password) {
  password_hash($password, PASSWORD_DEFAULT);
  return $newPass;
}

function updatePassword($newPass, $token) {
  try {
    useDB();
    global $db;
    $sql = "UPDATE users SET password = :password where token = :token";
    $query = $db-> prepare($sql);
    $query->bindValue(":password", $newPass);
    $query->bindValue(":token", $token);
    $query->execute();

  } catch (Exception $e) {
    echo $e->getMessage();
    echo "cagamos dijo RAMOOOOOS";exit;
  }


}



 ?>
