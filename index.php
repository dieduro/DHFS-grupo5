    <!--HEADER-->
    <?php
    include_once 'header.php';
     ?>
    <!-- CONTENIDO -->
    <section class="mega">
      <div class="container">
        <div class="caption">
          <h2>Estás a un click de empezar a jugar</h2>
          <a class="btn-solid" href="registro.php" role="button">REGISTRATE</a>
          <a class="btn-solid" href="login.php" role="button">INICIÁ SESIÓN</a>
        </div>
      </div>
     </section>
     <!-- BUSCADOR -->
         <section class="container">
           <div class="section_tit">
              <h3>Buscador de Partidos</h3>
           </div>

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
               <button class="btn-solid-sm" type="submit" name="buscar">Buscar</button>
             </form>
           </div>
        </section>

    <!-- ÚLTIMOS -->
         <section class="container">
            <div class="section_tit">
                  <h3>PARTIDOS POR COMPLETARSE</h3>
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
                <img src="images/volley.jpg" alt="">
                <div class="overlay">
                  <p class="evento_deporte">Volley</p>
                  <p class=evento_zona>Vicente Lopez</p>
                </div>
                <div class="evento_datos">
                   <p class="faltan">Falta 1!</p>
                   <p class="evento_fecha">viernes 18 - 20:00</p>
                </div>
              </div>
              <div class="evento">
                <img src="images/rugby.jpg" alt="">
                <div class="overlay">
                  <p class="evento_deporte">Rugby</p>
                  <p class=evento_zona>Belgrano</p>
                </div>
                <div class="evento_datos">
                   <p class="faltan">Faltan 5!</p>
                   <p class="evento_fecha">viernes 18 - 20:00</p>
                </div>
              </div>
              <div class="evento">
                <img src="images/futbol_fem.jpg" alt="">
                <div class="overlay">
                  <p class="evento_deporte">Futbol Femenino</p>
                  <p class=evento_zona>San Isidro</p>
                </div>
                <div class="evento_datos">
                   <p class="faltan">Faltan 2!</p>
                   <p class="evento_fecha">jueves 17 - 21:00</p>
                </div>
              </div>
              <div class="evento">
                <img src="images/hockey.jpg" alt="">
                <div class="overlay">
                  <p class="evento_deporte">Hockey</p>
                  <p class=evento_zona>San Fernando</p>
                </div>
                <div class="evento_datos">
                   <p class="faltan">Faltan 5!</p>
                   <p class="evento_fecha">jueves 17 - 21:0</p>
                </div>
              </div>
              <div class="evento">
                <img src="images/squash.jpg" alt="">
                <div class="overlay">
                  <p class="evento_deporte">Squash</p>
                  <p class=evento_zona>Floresta</p>
                </div>
                <div class="evento_datos">
                   <p class="faltan">Falta 1!</p>
                   <p class="evento_fecha">jueves 17 - 21:0</p>
                </div>
              </div>
            </div>
          </div>
        </section>

         <!-- RECOMENDADOS -->
           <section class="container prox-part">
             <div class="section_tit">
               <h3>Partidos Recomendados</h3>
             </div>
              <ul class="lista-prox-part">
                <li>
                   <div class="deporte">
                     <img src="images/volley.jpg" alt="futbol">
                     <h5>Voley</h5>
                     <h6 class="data-day">Belgrano - Miercoles 20hs</h6>
                   </div>
                </li>
                <li>
                  <div class="deporte">
                    <img src="images/futbol.jpg" alt="futbol">
                    <h5>Futbol</h5>
                    <h6 class="data-day">El Palomar - Jueves 19:30hs</h6>
                  </div>
                </li>
                <li>
                  <div class="deporte">
                    <img src="images/rugby.jpg" alt="futbol">
                    <h5>Rugby</h5>
                    <h6 class="data-day">El Palomar - Jueves 19:30hs</h6>
                  </div>
                </li>
                <li>
                  <div class="deporte">
                    <img src="images/hockey.jpg" alt="futbol">
                    <h5>Hockey</h5>
                    <h6 class="data-day">El Palomar - Jueves 19:30hs</h6>
                  </div>
                </li>
                <li>
                  <div class="deporte">
                    <img src="images/basket2.jpg" alt="futbol">
                    <h5>Basket</h5>
                    <h6 class="data-day">El Palomar - Jueves 19:30hs</h6>
                  </div>
                </li>
                <li>
                  <div class="deporte">
                    <img src="images/squash.jpg" alt="futbol">
                    <h5>Squash</h5>
                    <h6 class="data-day">El Palomar - Jueves 19:30hs</h6>
                  </div>
                </li>
               </ul>
           </section>
           <!-- FOOTER -->
             <?php
             include_once 'footer2.php';
              ?>
