<?php
  require_once("funciones.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="css/styles.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,600" rel="stylesheet">
    <title>TeamUp!</title>
</head>
<body>
      <!-- HEADER -->
  <header>
    <div class="head-left">
        <!-- DIV VACIO -->
    </div>
    <h1><a href="index.php" class="header_link"><img class="logo" src="images/logo-home.png" alt="logo TeamUp!"></a></h1>

    <nav class="menu">
      <ul>
        <?php if (estaLogueado()) {
            $userImg = "images/users_img/".usuarioLogueado()["email"].".jpg";
          if(file_exists($userImg)){
            $userImgSrc = $userImg;
          }
          else {
            $userImgSrc = "images/users_img/userDefault.png";
          }
          
        ?>
          <li class="nav-items foto-perfil"><img src=<?=$userImgSrc?> alt="">
          <li class="nav-items"><a href="#" class="header_link user"><?=usuarioLogueado()["name"]?></a></li>
          <li class="nav-items"><a href="logout.php" class="header_link">Logout</a></li>
      <?php }else{?>
          <li class="nav-items"><a href="registro.php" class="header_link">Registrate</a></li>
          <li class="nav-items"><a href="login.php" class="header_link">Login</a></li>
          <li class="nav-items"><a href="faq.php" class="header_link">¿Qué es <i>TeamUp!?</i></a></li>
        <?php } ?>
      </ul>
    </nav>
      <span class="burger-icon"><i class="fa fa-bars menu" aria-hidden="true"></i></span>
  </header>
