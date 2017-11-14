@extends ('layouts.layout')

@section('title')
  TeamUp!
@endsection

@section('content')
  <!-- CONTENIDO -->
  <section class="mega">
    <div class="container">
      <div class="caption">
        @if (Auth::guest())
          <h2>Estás a un click de empezar a jugar</h2>
          <a class="btn-solid" href="{{ route('register') }}" role="button">REGISTRATE</a>
          <a class="btn-solid" href="{{ route('login') }}" role="button">INICIÁ SESIÓN</a>
        @else
          <h2>¡Ya estás listo para empezar a jugar!</h2>
        @endif
      </div>
    </div>
  </section>

  <!-- CREADOR DE PARTIDOS -->
  <section class="container">
    <a class="btn-solid" href="/partido/nuevo" role="button">Creá un partido!</a>


  </section>



  <!-- BUSCADOR -->
  <section class="container">
    <div class="section_tit">
      <h3>Buscador de Partidos</h3>
    </div>

    <div class="buscador">
      <form class="buscador-form" action="#">
        <select class="select" name="deporte" placeholder="Deporte">
          <option value="">Deporte</option>
          @foreach ($sports as $sport)
            <option value="{{ $sport->name }}">{{ $sport->name }}</option>
          @endforeach
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
        <input type="date" name="date" value="" placeholder="Fecha">
        <button class="btn-solid-sm" type="submit" name="buscar">Buscar</button>
      </form>
    </div>
  </section>

  <!-- ÚLTIMO MOMENTO -->
  <section class="container section">
    <div class="section_tit">
      <h3>¡PARTIDOS DE ULTIMO MOMENTO!</h3>
      <a class="ver_todos"href="#">ver todos</a>
    </div>
    <div class="slider">
      <div class="flechas">
        <div class="flecha_izq">
          <button type="button" name="button">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
          </button>
        </div>
        <div class="flecha_der">
          <button type="button" name="button">
            <i class="fa fa-arrow-right" aria-hidden="true"></i>
          </button>
        </div>
      </div>
      <div class="eventos">
        <div class="evento">
          <img src="images/volleyU.jpg" alt="">
          <div class="overlay">
            <p class="evento_deporte">Volley</p>
            <p class=evento_zona>Vicente Lopez</p>
          </div>
          <div class="evento_datos">
            <p class="faltan">Falta 1!</p>
            <p class="evento_fecha">HOY - 20:00</p>
          </div>
        </div>
        <div class="evento">
          <img src="images/rugbyU.jpg" alt="">
          <div class="overlay">
            <p class="evento_deporte">Rugby</p>
            <p class=evento_zona>Belgrano</p>
          </div>
          <div class="evento_datos">
            <p class="faltan">Faltan 5!</p>
            <p class="evento_fecha">HOY - 20:00</p>
          </div>
        </div>
        <div class="evento">
          <img src="images/pingpongU.jpg" alt="">
          <div class="overlay">
            <p class="evento_deporte">PingPong</p>
            <p class=evento_zona>San Isidro</p>
          </div>
          <div class="evento_datos">
            <p class="faltan">Faltan 2!</p>
            <p class="evento_fecha">MAÑANA - 15:00</p>
          </div>
        </div>
        <div class="evento">
          <img src="images/hockeyU.jpg" alt="">
          <div class="overlay">
            <p class="evento_deporte">Hockey</p>
            <p class=evento_zona>San Fernando</p>
          </div>
          <div class="evento_datos">
            <p class="faltan">Faltan 5!</p>
            <p class="evento_fecha">MAÑANA - 19:30</p>
          </div>
        </div>
        <div class="evento">
          <img src="images/basketU.jpg" alt="">
          <div class="overlay">
            <p class="evento_deporte">Basket</p>
            <p class=evento_zona>Floresta</p>
          </div>
          <div class="evento_datos">
            <p class="faltan">Falta 1!</p>
            <p class="evento_fecha">MAÑANA- 21:30</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- RECOMENDADOS -->
  <section class="container section">
    <div class="section_tit">
      <h3>Partidos Recomendados</h3>
    </div>
    <ul class="lista-prox-part">
      <li>
        <div class="deporte">
          <a href="#">
            <img src="{{ asset ('images/volley.jpg') }}" alt="futbol">
          </a>
          <h5>Voley</h5>
          <h6 class="data-day">Belgrano - Miercoles 5, 20hs</h6>
        </div>
      </li>
      <li>
        <div class="deporte">
          <a href="#">
            <img src="{{ asset ('images/futbol.jpg') }}" alt="futbol">
          </a>
          <h5>Futbol</h5>
          <h6 class="data-day">El Palomar - Jueves 3, 19:30hs</h6>
        </div>
      </li>
      <li>
        <div class="deporte">
          <a href="#">
            <img src="{{ asset ('images/rugby.jpg') }}" alt="futbol">
          </a>
          <h5>Rugby</h5>
          <h6 class="data-day">El Palomar - Jueves 18, 19:30hs</h6>
        </div>
      </li>
      <li>
        <div class="deporte">
          <a href="">
            <img src="images/hockey.jpg" alt="futbol">
          </a>
          <h5>Hockey</h5>
          <h6 class="data-day">El Palomar - Sábado 21, 19:30hs</h6>
        </div>
      </li>
      <li>
        <div class="deporte">
          <a href="#">
            <img src="images/basket2.jpg" alt="futbol">
          </a>
          <h5>Basket</h5>
          <h6 class="data-day">El Palomar - Jueves 5, 19:30hs</h6>
        </div>
      </li>
      <li>
        <div class="deporte">
          <a href="#">
            <img src="images/squash.jpg" alt="futbol">
          </a>
          <h5>Squash</h5>
          <h6 class="data-day">El Palomar - Lunes 16, 19:30hs</h6>
        </div>
      </li>
    </ul>
  </section>
  <div class="container section">
      <button class="btn-solid" type="submit" name="ver_mas">VER MÁS PARTIDOS</button>
  </div>
@endsection
