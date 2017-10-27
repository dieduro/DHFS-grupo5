<?php
include_once("db.php");

class Validator {

  // VALIDACIONES
  //VALIDA FORMULARIO DE REGISTRO
  public function validarInformacion($informacion, db $db) {
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
    else if ($db->traerPorMail($informacion["email"]) != NULL) {
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
    // if ($_FILES["foto-perfil"]["error"]!=4){
    //   $errorDeLaFoto = $_FILES["foto-perfil"]["error"];
    //   $nombreDeLaFoto = $_FILES["foto-perfil"]["name"];
    //   $tamañoFoto = $_FILES["foto-perfil"]["size"];
      // $extension = pathinfo($nombreDeLaFoto, PATHINFO_EXTENSION);
      // if ($errorDeLaFoto != UPLOAD_ERR_OK) {
      //   $arrayDeErrores["foto-perfil"] = "Hubo un error al cargar la foto";
      // }
      // else if ($tamañoFoto > 2097152) {
      //   $arrayDeErrores["foto-perfil"] = "La foto tiene que pesar menos 2 Mb";
      // }
      // else if ($extension != "jpg" && $extension != "jpeg" && $extension != "png" && $extension != "gif") {
      //   $arrayDeErrores["foto-perfil"] = "Debés subir una imagen JPG, JPEG, PNG o GIF";
      // }
    // }
    //revisamos que haya chequeado los legales
    if (!isset($informacion["legals"])) {
      $arrayDeErrores["legals"] = "Para poder usar el servicio debés aceptar compartir tu información";
    }
    return $arrayDeErrores;
  }

  // VALIDA FORMULARIO DE LOGIN
  function validarLogin($informacion, db $db) {
    $arrayDeErrores = [];

    if (strlen($informacion["email"]) == 0) {
      $arrayDeErrores["email"] = "No completaste tu email";
    }
    else if (filter_var($informacion["email"], FILTER_VALIDATE_EMAIL) == false) {
      $arrayDeErrores["email"] = "El mail que ingresaste no es válido";
    }
    else if ($db->traerPorMail($informacion["email"]) == NULL) {
      $arrayDeErrores["email"] = "El usuario no existe";
    }
    else {
      //validar la contraseña
      $usuario = $db->traerPorMail($informacion["email"]);
      // comparamos pass ingresada con pass guardada
      if (password_verify($informacion["password"], $usuario["password"] == false)) {
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

}

?>
