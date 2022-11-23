<!DOCTYPE html>
<html lang="pt" dir="ltr">
  <head>
    <meta charset="utf-8" content="text/html">
    <meta name="keywords" content="Faça viagens mais rápido.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="source/css/general.css">
    <link rel="stylesheet" href="source/css/reset.css">
    <title>Histórico de Viagens</title>
  </head>
  <body>
    <?php session_start();
    include('auth.php');
    ?>
    <header>
      <div class="headline">
        <div class="banner">
          <div class="brandline" onclick="location.href='/home'">
            <h1 id="brandpage">Transport</h1>
          </div>
          <div class="user-agent-navigation">
            <div class="navigation-painel" onclick="ChangePopupState()">
              <div class="user-profile-data">
                <div class="profile-picture">
                  <img src="media/profile.jpg" alt="picture" width="35" height="35" style="border-radius: 35px;">
                </div>
                <div class="username-placer">
                  <h2 id="username"><?php echo $_SESSION['nome']; ?></h2>
                </div>
              </div>
            </div>
            <div class="navigation-menu" id="navigation" hidden>
              <ul id="navigation-topics">
                <li id="option_two" onclick="location.href='/logout'"> sair </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- Main Components for this page -->
    <main>
      <!--  -->
      <aside class="side-panel">
        <div class="user-trip-histories">
          <div class="history-list">
            <ul class="trip-list">
              <li class="trip-details">
                <div class="trip-detail-inline">
                  <div class="trip-destinations-details">
                    <div class="destination-detail trip-origin-data">
                      <h2>{Partida}</h2>
                    </div>
                    <span> para </span>
                    <div class="destination-detail trip-origin-data">
                      <h2>{Destino}</h2>
                    </div>
                  </div>
                  <div class="trip-date-details">
                    <div class="date-detail trip-data-information">
                      <h2>{datetime}</h2>
                    </div>
                    <span> as </span>
                    <div class="date-detail trip-time-information">
                      <h2>{time}</h2>
                    </div>
                  </div>
                </div>
              </li>
              <li class="trip-details">
                <div class="trip-detail-inline">
                  <div class="trip-destinations-details">
                    <div class="destination-detail trip-origin-data">
                      <h2>{Partida}</h2>
                    </div>
                    <span> para </span>
                    <div class="destination-detail trip-origin-data">
                      <h2>{Destino}</h2>
                    </div>
                  </div>
                  <div class="trip-date-details">
                    <div class="date-detail trip-data-information">
                      <h2>{datetime}</h2>
                    </div>
                    <span> as </span>
                    <div class="date-detail trip-time-information">
                      <h2>{time}</h2>
                    </div>
                  </div>
                </div>
              </li>
              <li class="trip-details">
                <div class="trip-detail-inline">
                  <div class="trip-destinations-details">
                    <div class="destination-detail trip-origin-data">
                      <h2>{Partida}</h2>
                    </div>
                    <span> para </span>
                    <div class="destination-detail trip-origin-data">
                      <h2>{Destino}</h2>
                    </div>
                  </div>
                  <div class="trip-date-details">
                    <div class="date-detail trip-data-information">
                      <h2>{datetime}</h2>
                    </div>
                    <span> as </span>
                    <div class="date-detail trip-time-information">
                      <h2>{time}</h2>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </aside>

      <div class="roudmap-placer">

      </div>
    </main>
    <script src="elastic.js" charset="utf-8">init()</script>
  </body>
</html>
