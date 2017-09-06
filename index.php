<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/master.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,600" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.css">
    <title></title>
  </head>
  <body>
    <!--header-->
    <?php
    include_once 'header.php';
     ?>
    <section class="mega">
      <div class="container">
        <div class="caption">
          <h2>Estás a un click de empezar a jugar</h2>
          <a class="btn-solid" href="registro.php" role="button">REGISTRATE</a>
          <a class="btn-solid" href="login.php" role="button">INGRESÁ</a>
        </div>
      </div>
     </section>
     <!-- BUSCADOR -->
         <div class="container">
           <h3>Buscador de Partidos</h3>
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
         </div>
         <!-- RECOMENDADOS -->
           <div class="container">
             <div>
               <h4>Partidos por Completarse</h4>
             </div>
             <div class="deporte">
               <img src="images/futbol-th.jpg" alt="futbol">
               <h5>Hockey</h5>

               <h6>Belgrano - Miercoles 20hs</h6>
             </div>
             <div class="deporte">
               <img src="images/futbol-th.jpg" alt="futbol">
               <h5>Rugby</h5>
               <h6>El Palomar - Jueves 19:30hs</h6>
             </div>
           </div>
           <!-- FOOTER -->
             <?php
             include_once 'footer.php';
              ?>
       </body>
     </html>
