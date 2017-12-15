<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('css/bootstrap/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('css/font-awesome/css/font-awesome.css') }} ">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}" type="text/css">
  <link rel="shortcut icon" href="{{ asset('/images/favicon.ico')}}" type="image/x-icon">
  <link rel="icon" href="{{ asset('images/favicon.ico')}}" type="image/x-icon">
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
          <li class="nav-items foto-perfil"><img src="{{ asset('storage/'. Auth::user()->photo) }}" alt=""></li>
          <li class="nav-items"><a href="/{{ Auth::user()->username }}" class="header_link user">{{ Auth::user()->username }}</a></li>
          <li class="nav-items">
            <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            Salir</a>
          </li>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
        </form>
        @else
          <li class="nav-items"><a href="{{ route('register') }}" class="header_link">Registrate</a></li>
          <li class="nav-items"><a href="{{ route('login') }}" class="header_link">Ingresar</a></li>
          <li class="nav-items"><a href="/faq" class="header_link">¿Qué es <i>TeamUp!?</i></a></li>
        @endif
    </ul>
  </nav>
  {{-- <span class="burger-icon"><i class="fa fa-bars menu" aria-hidden="true"></i></span> --}}
  <div class="burger-icon dropdown">
    <button class="dropbtn"><i class="fa fa-bars" aria-hidden="true"></i></button>
    <div id="myDropdown" class="dropdown-content">
      @if(Auth::check())
        <li class="nav-items foto-perfil"><img src="{{ asset('storage/'. Auth::user()->photo) }}" alt=""></li>
        <li class="nav-items"><a href="/{{ Auth::user()->username }}" class="header_link user">{{ Auth::user()->username }}</a></li>
        <li class="nav-items">
          <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          Salir</a>
        </li>
      @else
        <li><a href="{{ route('register') }}" class="header_link">Registrate</a></li>
        <li ><a href="{{ route('login') }}" class="header_link">Ingresar</a></li>
        <li ><a href="/faq" class="header_link">¿Qué es <i>TeamUp!?</i></a></li>
      @endif
      </div>
    </div>
  </header>
  
  <div class="container flexbox">
    <div class="left-nav">
      {{--  <div class="dashMenu">
        <input class="buscar" type="text" name="buscar" placeholder="Buscar">
      </div>  --}}
      <ul class="dashMenu">
       <li class="main-item" id="miCuenta">> MI CUENTA</li>
        <ul class="dropdown-left" id="dropdown-left" >
          <a href="/{{ Auth::user()->username }}"><li>Mi Perfil</li></a>
          <a href="/{{ Auth::user()->username }}/editar"><li>Editar Perfil</li></a>
          {{--  <a href="/{{Auth::user()->username }}/eliminar/{{Auth::user()->id}}"><li>Eliminar Cuenta</li></a>  --}}
        </ul>
        <li class="main-item" id="partidos">> PARTIDOS</li>
        <ul class="dropdown-left" id="partidosItems" >
          <a href="/partidos/nuevo"><li>Crear Partido</li></a>
          <a href="/partidos"><li>Mis Partidos</li></a>
          <a href="#"><li>Me interesan</li></a>
        </ul>
       
      </ul>
    </div>
    <section class="dashSection">

  @yield('content')

  </section>
    </div>
  <footer class="footer_outer">
    <div class="redes">
      <ul>
        <li><a href="http://twitter.com/"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
        <li> <a href="http://facebook.com/"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
        <li><a href="http://instagram.com/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
      </ul>
    </div>
    <div class="footer_inner">
      {{-- <div class="logo">
      <img src="{{ asset('../images/logo-home.png') }}" alt="logo">
    </div> --}}
    {{-- <div class="cia">
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
</div> --}}
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
<script src="css/bootstrap/js/bootstrap.min.js"></script>
<!-- script para redireccion de registro -->
<script src="/js/main.js"></script>
</body>
</html>
