<?php

include_once("db.php");
include_once("usuario.php");

class dbMySQL extends Db {
  private $conn;

  public function __construct() {
    //CONECTAMOS CON LA BASE DE DATOS
    $dsn = 'mysql:host=localhost;charset=utf8mb4;port:3306, ';
    $username = "root";
    $password = "root"; // ana tiene pass vacia, diego tiene pass "root"
    try {
      $this->conn = new PDO ($dsn, $username, $password);
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

  //CREA LA BASE DE DATOS
  function createDB() {
    $base = "CREATE DATABASE teamup_db";
    $query = $this->conn->prepare($base);
    $query->execute();
  }
  //SELECCIONA LA DB A USAR
  function useDB() {
    $useDB = "USE teamup_db;";
    $query = $this->conn->prepare($useDB);
    $query->execute();
  }

  //CREACION DE TABLA USERS
  function createUsersTable() {
    $sql = "CREATE TABLE users (
      id INT AUTO_INCREMENT PRIMARY KEY,
      name VARCHAR(40),
      email VARCHAR(40) UNIQUE,
      password VARCHAR(70) UNIQUE,
      fotoPath VARCHAR(70) NOT NULL,
      token VARCHAR(70) UNIQUE
    ) AUTO_INCREMENT=1";
    $query = $this->conn->prepare($sql);
    $query->execute();
  }
  //Inicializa la base
  public function initDB(){
    $this->createDB();
    $this->useDB();
    $this->createUsersTable();
  }
  // guardar usuario en DB
  public function guardarUsuario($usuario) { //si le pongo un & pasa el valor por referencia y no hace falta el Return
    $this->useDB();
    $sql = 'INSERT INTO users VALUES (default, :name, :email, :password, :fotoPath, :token);
    ';
    $query = $this->conn->prepare($sql);
    $query->bindValue(":name", $usuario->getName());
    $query->bindValue(":email", $usuario->getEmail());
    $query->bindValue(":password", $usuario->getPassword());
    $query->bindValue(":fotoPath", $usuario->getFotoPath());
    $query->bindValue(":token",$usuario->getToken());
    $query->execute();
    $usuario->setId($this->conn->lastInsertId());
    return $usuario;
  }

  // extrae todos los USUARIOS de la DB
  public function traerTodos() {
    $sql = "SELECT * from users";
    $query = $this->conn->prepare($sql);
    $query->execute();
    $resultados = $query->fetchAll(PDO::FETCH_ASSOC);
    $arrayFinal = [];
    foreach($resultados as $usuario) {
      $arrayFinal[] = new Usuario ($usuario["name"], $usuario["email"], $usuario["password"], $usuario["fotoPath"], $usuario["token"]);
    }
    return $arrayFinal;
  }
  public function traerPorMail($email) {
    $this->useDB();
    $sql = "SELECT * from users where email = :email";
    $query = $this->conn->prepare($sql);
    $query->bindValue(":email", $email);
    $query->execute();
    $usuario = $query->fetch(PDO::FETCH_ASSOC);
    if($usuario) {
      $usuario = new Usuario ($usuario["id"],$usuario["name"], $usuario["email"], $usuario["password"], $usuario["fotoPath"], $usuario["token"]);
    }
    return $usuario;
  }

  function getFotoPath($usuario) {
    $sql = "SELECT u.fotoPath as ruta FROM users u WHERE email = :email;";
    $query = $this->conn->prepare($sql);
    $query->bindValue(":email", $usuario->getMail());
    $query->execute();
    $fotoPath = $query->fetch(PDO::FETCH_ASSOC); // VER QUE ONDA ESTO
    return $fotoPath;
  }

  function hashPass($password) {
    $newPass = password_hash($password, PASSWORD_DEFAULT);
    return $newPass;
  }

  function updatePassword($password, $email) {
    $newPass = password_hash($password, PASSWORD_DEFAULT);
    try {
      $this->useDB();
      $sql = "UPDATE users SET password = :password where email = :email";
      $query = $this->conn->prepare($sql);
      $query->bindValue(":password", $newPass); //??
      $query->bindValue(":email", $email);
      $query->execute();
    } catch (Exception $e) {
      echo $e->getMessage();
      echo "cagamos dijo RAMOOOOOS";exit;
    }
  }
}


?>
