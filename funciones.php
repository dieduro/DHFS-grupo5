<?php



/*
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

*/


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
  $newPass = password_hash($password, PASSWORD_DEFAULT);
  return $newPass;
}





 ?>
