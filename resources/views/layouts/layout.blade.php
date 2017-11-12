<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="css/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="css/styles.css" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,600" rel="stylesheet">
  <title>@yield('title')</title>
</head>
<body>
  <!-- HEADER -->
  <header>
    <div class="head_left">
      <!-- DIV VACIO -->
    </div>
    <h1><a href="index" class="header_link"><img class="logo" src="images/logo-home.png" alt="logo TeamUp!"></a></h1>
    <nav class="menu">
      <ul>
        <?php if ($auth->estaLogueado($db)) {
          $usuario = $auth->usuarioLogueado($db);
          $nameUsuario = Auth::user()->name;
          $fotoPath = $usuario->getFotoPath();
          ?>

          <li class="nav-items foto-perfil"><img  src="<?=$fotoPath?>" alt="RE"></li>
          <li class="nav-items"><a href="#" class="header_link user"><?=$nameUsuario?></a></li>
          <li class="nav-items"><a href="/logout" class="header_link">Logout</a></li>
          <?php } else { ?>
            <li class="nav-items"><a href="/registro" class="header_link">Registrate</a></li>
            <li class="nav-items"><a href="/login" class="header_link">Login</a></li>
            <li class="nav-items"><a href="/faq" class="header_link">¿Qué es <i>TeamUp!?</i></a></li>
            <?php } ?>
          </ul>
        </nav>
        <span class="burger-icon"><i class="fa fa-bars menu" aria-hidden="true"></i></span>
      </header>

      @yield('content')

      <footer class="footer_outer">
        <div class="redes">
          <ul>
            <li><a href="http://twitter.com/"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            <li> <a href="http://facebook.com/"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            <li><a href="http://instagram.com/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
          </ul>
        </div>
        <div class="footer_inner">
          <div class="logo">
            <img src="images/logo-home.png" alt="logo">
          </div>
          <div class="cia">
            <ul>
              <li><h3>Compañia</h3></li>
              <li class="foot_links"><a href="#">Acerca de</a></li>
              <li class="foot_links"><a href="#">Prensa</a></li>
              <li class="foot_links"><a href="#">Noticias</a></li>
            </ul>
          </div>
          <div class="comunidades">
            <ul>
              <li><h3>Comunidades</h3></li>
              <li class="foot_links"><a href="#">Para deportistas</a></li>
              <li class="foot_links"><a href="#">Marcas</a></li>
            </ul>
          </div>
          <div class="enlaces">
            <ul>
              <li><h3>Enlaces Utiles</h3></li>
              <li class="foot_links"><a href="#">Ayuda</a></li>
              <li class="foot_links"><a href="#">Regalo</a></li>
            </ul>
          </div>
        </div>
        <div class="legales">
          <ul>
            <li> <a href="#">Legal</a></li>
            <li> <a href="#">Privacidad</a></li>
            <li> <a href="#">Cookies</a></li>
            <li> <a href="#">Sobre anuncios</a></li>
          </ul>
        </div>
        <div class="copyright">
          <p>&copy;2017  TEAMUP</p>
        </div>
      </footer>

      <!-- SCRIPTS -->
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="bootstrap/js/bootstrap.min.js"></script>
      <!-- script para redireccion de registro -->

    </body>
    </html>
