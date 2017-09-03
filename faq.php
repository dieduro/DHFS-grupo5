<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/styles.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,600" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <title>TeamApp!</title>
  </head>
  <body>
    <!--HEADER-->
    <header>
      <nav>
        <i class="fa fa-bars" aria-hidden="true"></i>
      </nav>
      <div class="encabezado">
        <a href="index.html" class="back">Volver</a>
        <img class="logo" src="images/logo-home.png" alt="logo">
        <div class="container caption"><h1>Preguntas Frecuentes</h1></div>
      </div>
    </header>
    <!--PREGUNTAS DESPLEGABLES-->
    <div class="faq-container">
      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <!--PREGUNTA #1-->
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingOne">
        <h4 class="panel-title">
          <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            ¿Qué es TEAMAPP?
          </a>
        </h4>
      </div>
      <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body">
          TEAMAPP es una plataforma pensada para conectar jugadores con equipos, y equipos con canchas.<br/> ¿Viste esa vez que te agarraron ganas de jugar <i>badminton</i> y no se te ocurrió con quién? Encontra equipos de todos los deportes en TEAMAPP!
        </div>
      </div>
    </div>
    <!--PREGUNTA #2-->
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingTwo">
        <h4 class="panel-title">
          <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            ¿Qué puedo hacer con TEAMAPP?
          </a>
        </h4>
      </div>
      <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
        <div class="panel-body">
           Contactá equipos que buscan jugadores, creá un equipo y encontrá los jugadores que te faltan u ofrecé tu cancha a esos equipos que buscan donde jugar.
          <br>

        </div>
      </div>
    </div>
    <!--PREGUNTA #3-->
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingThree">
        <h4 class="panel-title">
          <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            ¿Cómo me sumo a un equipo?
          </a>
        </h4>
      </div>
      <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
        <div class="panel-body">
            En TEAMAPP vas a poder buscar equipos del deporte que te interesa según la zona, la fecha y franja horaria en que quieras jugar y de acuerdo a tu nivel. Sumarte a un equipo/partido es un compromiso de asistencia. Acordate que el administrador del equipo te puede dejar una review; anda con buena onda ;-) !

        </div>
      </div>
    </div>
    <!--PREGUNTA #4-->
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingThree">
        <h4 class="panel-title">
          <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
            ¿Cómo creo un equipo?
          </a>
        </h4>
      </div>
      <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
        <div class="panel-body">
          Creá tu equipo con fecha flexible o con fecha específica, contanos cuántos te faltan, en qué zona juegan y conocé a tus próximos compañeros de equipo. <br>
          Organizá un partido con otro equipo y hacé la reserva directa de la cancha en la que vas a jugar.
        </div>
      </div>
    </div>
    <!--PREGUNTA #5-->
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingThree">
        <h4 class="panel-title">
          <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
            Tengo una cancha, ¿puedo ofrecerla?
          </a>
        </h4>
      </div>
      <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
        <div class="panel-body">
          Totalmente! Animate a publicar tus horarios vacantes y TEAMAPP te contactará con los equipos que quieren jugar.
        </div>
      </div>
    </div>
  </div>

</div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
     <!-- Include all compiled plugins (below), or include individual files as needed -->
     <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
