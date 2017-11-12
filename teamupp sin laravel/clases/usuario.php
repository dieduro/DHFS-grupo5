<?php

class Usuario {
  private $id;
  private $name;
  private $email;
  private $password;
  protected $token;
  private $fotoPath;

  public function __construct($id = NULL, $name, $email, $password, $fotoPath = NULL, $token = NULL) {
    if ($id == NULL) {
      $this->password = password_hash($password, PASSWORD_DEFAULT);
      $this->setToken(md5(uniqid(rand())));
    } else {
      $this->password = $password;
      $this->token = $token;
    }
    $this->id = $id;
    $this->name = $name;
    $this->email = $email;
    $this->fotoPath = $fotoPath;
  }

  public function setId($id) {
    $this->id = $id;
  }
  public function getId() {
    return $this->id;
  }
  public function setName($name) {
    $this->name = $name;
  }
  public function getName() {
    return $this->name;
  }
  public function setEmail($email) {
    $this->email = $email;
  }
  public function getEmail() {
    return $this->email;
  }
  public function setPassword($password) {
    $this->password = $password;
  }
  public function getPassword() {
    return $this->password;
  }
  public function setFotoPath($fotoPath) {
     $this->fotoPath = $fotoPath;
   }
   public function getFotoPath() {
     return $this->fotoPath;
   }


  public function setToken($token) {
     $this->token = $token;
  }
  public function getToken() {
   return $this->token;
   }
  public function guardarFoto() {
    $archivo = $_FILES["foto-perfil"]["tmp_name"];
    $nombreDeLaFoto = $_FILES["foto-perfil"]["name"];
    $extension = pathinfo($nombreDeLaFoto, PATHINFO_EXTENSION);
    $fotoPath = "images/users_img/" . $_POST["email"] . ".$extension";
    move_uploaded_file($archivo, $fotoPath);
    $this->setFotoPath($fotoPath);
    return $fotoPath;

  }

}

?>
