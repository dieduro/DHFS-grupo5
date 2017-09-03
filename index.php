<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/styles.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,600" rel="stylesheet">
    <title>TeamUp!</title>
  </head>
  <body>
  <!-- HEADER -->
      <header class="container">
        <div class="encabezado">
            <h1>
            <img class="logo" src="images/logo-home.png" alt="logo TeamUp!">
            </h1>
            <nav class="menu">
            <span><i class="fa fa-bars menu" aria-hidden="true"></i></span>
              <!--
              <div class="menu-content">
                <ul>
                  <li><a href="#">Ayuda</a></li>
                  <li><a href="#">Ofrecé una cancha</a></li>
                  <li><a href="#">Organizá un Partido</a></li>
                  <li><a href="#">Descargar</a></li>
                  <li><a href="#">Registrate</a></li>
                  <li><a href="#"><Iniciar></Iniciar> Sesión</a></li>
                  <div class="logo-menu"><img src="images/logo-menu.png" alt="logo"></div>
                </ul>
              </div>
            -->
             <nav>
      </header>

<!-- IMG GRANDE -->
    <div class="container">
      <img class="img-home" src="images/hockey-home.jpg" alt="Foto de Home">
      <div class="overlay">
        <div>
          <p class="caption">Estás a un click de empezar a jugar</p>
          <button class="btn-register" type="button">REGISTRATE</button>
        </div>
      </div>
    </div>
<!-- BUSCADOR -->
    <div class="container">
      <h2>Buscador de Partidos</h2>
      <div class="buscador">
        <form class="buscador-form" action="#">
          <select class="select" name="deporte" placeholder="Deporte">
            <option value="xDeporte">Deporte</option>
            <option value="baseball">Baseball</option>
            <option value="basket">Basket</option>
            <option value="floorball">Floorball</option>
            <option value="futbol">Futbol</option>
            <option value="futbolAme">Futbol Americano</option>
            <option value="handball">Handball</option>
            <option value="hockey">Hockey</option>
            <option value="padel">Padel</option>
            <option value="paintball">Paintball</option>
            <option value="polo">Polo</option>
            <option value="rugby">Rugby</option>
            <option value="softball">Softball</option>
            <option value="squash">Squash</option>
            <option value="tenis">Tenis</option>
            <option value="voley">Voley</option>
            <option value="waterpolo">Waterpolo</option>
          </select>
          <select class="select" name="zona" id="" placeholder="Zona">
            <option value="xZona">Zona</option>
            <option value="capFed">Capital Federal</option>
            <option value="bsasNorte">BsAs - Zona Norte</option>
            <option value="bsasOesta">BsAs - Zona Oesta</option>
            <option value="bsasSur">BsAs - Zona Sur</option>
            <option value="cordoba">Cordoba</option>
            <option value="mdq">Mar del Plata</option>
            <option value="rosario">Rosario</option>
          </select>
          <select class="select" name="fecha" id="">
            <option value="xFecha">Fecha</option>
            <option value="semana">Esta Semana</option>
            <option value="quincena">Próximos 15 días</option>
            <option value="mes">Próximo Mes</option>
            <option value="trimes">Próximos 3 Meses</option>
            <option value="medioAno">Próximos 6 Meses</option>
          </select>
          <button class="btn-submit" type="submit" name="buscar">Buscar</button>
        </form>
      </div>
    </div>
      <div class="container">
        <div>
          <h2>Partidos por Completarse</h2>
        </div>
        <div class="deporte">
          <h3>Hockey</h3>
          <h6>Belgrano - Miercoles 20hs</h6>
          <img src="images/futbol-th.jpg" alt="futbol">

        </div>
        <div class="deporte">
          <h3>Rugby</h3>
          <h6>El Palomar - Jueves 19:30hs</h6>
          <img src="images/futbol-th.jpg" alt="futbol">

        </div>

      </div>
      <div><a href="faq.html">FAQ's</a></div>

    <footer class="container">
      <div class="logo"><a href="#"></a></div>
      <div class="footer-links">
        <div class="footer-list">
          <ul>
            <li></li>
          </ul>
        </div>
        <div class="footer-list">
          <ul>
            <li></li>
          </ul>
        </div>
        <div class="footer-list">
          <ul>
            <li></li>
          </ul>
        </div>
      </div>
      <div class="social-icons">
        <i class="fa fa-facebook" aria-hidden="true"></i>
        <i class="fa fa-instagram" aria-hidden="true"></i>
        <i class="fa fa-twitter" aria-hidden="true"></i>
      </div>
    </footer>


  </body>
</html>
