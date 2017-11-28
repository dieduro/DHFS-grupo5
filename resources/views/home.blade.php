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
          <a class="btn-solid" href="/partidos/nuevo" role="button">Creá un partido!</a>
        @endif
      </div>
    </div>
  </section>
  <!-- BUSCADOR -->
  <section class="container">
    <div class="section_tit">
      <h3>Buscador de Partidos</h3>
    </div>

    <div class="buscador-mobile">
      <button class="buscador-mobile-btn" type="submit" name="buscar">Buscar</button>
    </div>
    <div class="buscador">
      <form class="buscador-form" action='search' method="GET">
      
        <select class="select" name="deporte" placeholder="Deporte">
          <option value="">Deporte</option>
          @foreach ($sports as $sport)
            <option value="{{ $sport->name }}">{{ $sport->name }}</option>
          @endforeach
        </select>
        <select class="select" name="zona" id="" placeholder="Zona">
          <option value="xZona">Cualquier Zona</option>
          <option value="capFed">Capital Federal</option>
          <option value="bsasNorte">BsAs - Zona Norte</option>
          <option value="bsasOesta">BsAs - Zona Oesta</option>
          <option value="bsasSur">BsAs - Zona Sur</option>
          <option value="cordoba">Cordoba</option>
          <option value="mdq">Mar del Plata</option>
          <option value="rosario">Rosario</option>
        </select>
        <input type="date" name="date" value="" placeholder="Fecha">
        <button class="btn-solid-sm" type="submit">Buscar</button>
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
          <img src="{{ asset('images/volleyU.jpg') }}" alt="">
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
          <img src="/images/hockeyU.jpg" alt="">
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

  <!-- MINI FAQ -->
  <section class="container section">
    <div class="section_tit">
      <h3>¿Cómo funciona?</h3>
    </div>
    <div class="faq_index">
      <div class="faq_card">
        <i class="fa fa-search" aria-hidden="true"></i>
        <p class="faq_title">Buscá partidos</p>
        <p>
          ¿Tenés ganas de sumarte a un partido ya armado? Unite a los partidos del deporte que quieras, y esperá a ser aceptado. Podés interactuar con el resto de los jugadores y así encontrate para hacer jugar.
        </p>
      </div>
      <div class="faq_card">
        <i class="fa fa-plus" aria-hidden="true"></i>
        <p class="faq_title">Creá partidos</p>
        <p >
          Convertite en el organizador del partido y reclutá jugadores. Podés iniciar la convocatoria con la cantidad de jugadores que ya hayas conseguido y habilitar los puestos que te faltan.
        </p>
      </div>
      <div class="faq_card">
        <i class="fa fa-users" aria-hidden="true"></i>
        <p class="faq_title">Conocé gente</p>
        <p>
          Hacete de una buena reputación y las convocatorias a jugar van a llegar hacia vos! Descubrí personas con tus mismos intereses deportivos y sumá amistades para jugar.
        </p>
      </div>
    </div>
  </section>

  <!-- RECOMENDADOS -->
  <section class="container section">
    <div class="section_tit">
      <h3>Partidos Recomendados</h3>
    </div>
    <ul class="lista-prox-part">
      @foreach ($matches as $match)
        <li>
          <div class="deporte">
            <a href="#">
              <img src="{{ asset($match->photo) }}" alt="futbol">
            </a>
            <h5>{{ $match->sport->name }}</h5>
            <h6 class="data-day">{{ $match->place }} - {{ $match->date }}</h6>
          </div>
        </li>
      @endforeach
    </ul>
  </section>
  <div class="container section">
    <button class="btn-solid" type="submit" name="ver_mas">VER MÁS PARTIDOS</button>
  </div>


@endsection
