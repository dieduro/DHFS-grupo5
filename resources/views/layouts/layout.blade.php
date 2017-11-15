<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('css/font-awesome/css/font-awesome.css') }} ">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}" type="text/css">
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,600" rel="stylesheet">
  <title>@yield('title')</title>
</head>
<body>
  <!-- HEADER -->
  <header>
    <div class="head_left">
      <!-- DIV VACIO -->
    </div>
    <h1><a href="/" class="header_link"><img class="logo" src="{{ asset('images/logo-home.png') }}" alt="logo TeamUp!"></a></h1>
    <nav class="menu">
      <ul>
        @if(Auth::check())
          <li class="nav-items foto-perfil"><img  src="{{ asset('storage/' . $user->path) }}" alt="RE"></li>
          <li class="nav-items"><a href="/perfil/{{Auth::user()->id}}" class="header_link user">{{ Auth::user()->name }}</a></li>
          <li class="nav-items">
              <a href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                  Logout
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
          </li>
        @else
          <li class="nav-items"><a href="{{ route('register') }}" class="header_link">Registrate</a></li>
          <li class="nav-items"><a href="{{ route('login') }}" class="header_link">Login</a></li>
        @endif
          <li class="nav-items"><a href="/faq" class="header_link">¿Qué es <i>TeamUp!?</i></a></li>

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
        <img src="{{ asset('images/logo-home.png') }}" alt="logo">
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
          <li class="foot_links"><a href="/faq">Ayuda</a></li>
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
