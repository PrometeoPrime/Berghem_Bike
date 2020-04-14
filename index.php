<?php
  include 'common.php';
  $logged = false;
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Bike Sharing</title>

    <meta name="viewport"
      content="
          width = 'device-width',
          initial-scale = 1.0 ,
          minimum-scale = 0.75 ,
          maximum-scale = 1.5 ,
          user-scalable = no ">

    <script src="./ts/build/src/responsive.js" type="module"></script>

    <link rel="stylesheet" type="text/css" href="style.css">

    <script type="module">

      // IMPORTO LE CLASSI NECESSARIE
      import { ResponsiveManager } from './ts/build/src/responsive.js';

      initialize();

      function initialize()
      {
        let resp = new ResponsiveManager();
      }

    </script>

  </head>
  <body>
    <!-- MODALE/LIGHTBOX, NASCOSTO DEFAULT -->
    <div class="modal_overlay" id="modal_container">
      <div class="modal_content">
        <header class="modal_container">
          <span onclick=""
           class="modal_button">×</span>
          <h2>Login</h2>
        </header>
          <form class= "form_style" action="user_managment/login.php" method="POST" id="login_form">
            <div>
              Username
            </div>
            <input type="text" name="username">
            <div>
              Password
            </div>
            <input type="password" name="password">
          </form>
          <footer class="modal_container">
            <button type="submit" form="login_form" class = "submit_button">Login</button>
          </footer>
      </div>
    </div>

    <!-- CONTENITORE PRINCIPALE FLEX ROW | | | -->
    <div class="background fullheight" id ="id-page-loader">
      <img class="loader" src="images/common/loading-1-dark.gif" >
    </div>
    
    <div class="div_row background hidden" id="id-page-container">
      <!-- CONTENITORE MENU INLINE FLEX -->
      <div class="div_navbar" id="id-navbar">
        <img src = "images/common/logo.png" class = "logo" id="id-logo"> 

        <div class="menu_left" id="id-menu-left">
            <a href="index.php"  type="button">Home</a>
            <a href="prices.php"  type="button">Prezzi</a>
            <a href="contact.php"  type="button">Contatti</a>
        </div>

        <div class="menu_right" id='id-menu-right-1'>
        <a href="user_managment/login.php"  type="button">Accedi</a>
        <a href="user_managment/register.php"  type="button">Registrati</a>
        </div>

        <div class="menu_right hidden" id='id-menu-right-2'>
            <a href="user_managment/user/dashboard.php"  type="button">Dashboard</a>
            <a href="user_managment/account.php"  type="button">Account</a>
            <a href="user_managment/logout.php"  type="button">Logout</a>
        </div>

        <div class="menu_right hidden" id='id-menu-right-dropdown-container'>
            <img id="id-menu-right-dropdown" src = "images/common/dropdown-menu-icon-16.png">
        </div>


      </div>

      <!--CONTENITORE CENTRALE FLEX COLUMN -->
      <div id="id-main-content-container" class="div_center">

          <!-- IMMAGINE HOME -->
          <div class="bikelogohomebig"></div> 

          <!-- TITOLO HEADER -->
          <div class="div_internal_row">
            <div class="div_internal_column text_center">
              <h1>
                Stanco di camminare? Inizia a pedalare!
              </h1>
              <h3>
                  Offriamo un servizio di Bike Sharing a basso costo, disponibile 24/7.
              </h3>
              <div class="spacer30"></div>
              <h2>
                Quali sono i vantaggi del Bike Sharing?
              </h2>
            </div>
          </div>
          <div class="spacer30"></div>
          <!-- I VANTAGGI DEL BIKE SHARING 3 COLONNE -->
          <div class="div_internal_row">
            <div class="div_internal_column column_width_1e5">
              <img src = "images/common/health.png" class = "icon">
              <h3>
              Sostenibile e salutare
              </h3>
              <p class="text_left margin0">
              Ridurre la tua impronta sull’ambiente può sembrare insignificante, ma è vitale per un futuro più prospero!
              </p>
            </div>
            <div class="div_internal_column  column_width_1e5">
              <img src = "images/common/bicycle.png" class = "icon">
              <h3>
              Una soluzione efficente
              </h3>
              <p class="text_left margin0">
              Pensato per viaggi di prossimità dove i mezzi pubblici non possono arrivare.
              </p>
            </div>
            <div class="div_internal_column column_width_1e5">
            <img src = "images/common/helmet.svg" class = "icon">
              <h3>
              Maggiore sicurezza stradale
              </h3>
              <p class="text_left margin0">
              Se ci fossero più biciclette in circolazione i guidatori sarebbero più consapevoli dei ciclisti, abbassando la probabilità di incidenti! 
              </p>
            </div>
          </div>
      </div>
      <footer class="div_page_footer">
      Site made by Davide Cuni
      </footer>
    </div>

  </body>
</html>
