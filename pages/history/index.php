<!DOCTYPE html>
<html lang="pt" dir="ltr">
  <head>
    <meta charset="utf-8" content="text/html">
    <meta name="keywords" content="Faça viagens mais rápido.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/common/source/css/general.css">
    <link rel="stylesheet" href="/common/source/css/reset.css">
    <link rel="stylesheet" href="source/css/history.css">
    <title>Histórico de Viagens</title>
  </head>
  <body>
    <?php
      // inicia uma sessao ou resume a sessao existente
      session_start();

      if(!isset($_SESSION['username']) && isset($_SESSION['user_acess_status']) && $_SESSION['user_acess_status'] !== "connected"):
        require_once("../auth/index.php");
      endif;
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
                  <img src="/common/media/profile.jpg" alt="picture" width="35" height="35" style="border-radius: 35px;">
                </div>
                <div class="username-placer">
                  <h2 id="username"><?php echo $_SESSION['username']; ?></h2>
                </div>
              </div>
            </div>
            <div class="navigation-menu" id="navigation" hidden>
              <ul id="navigation-topics">
                <li id="option_two" onclick="location.href='/auth/logout'"> sair </li>
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
          <div class="trip-label-placer">
            <h3 id="trip-label-item">Histórico de Viagem</h3>
          </div>
          <div class="trip-history-list">
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
        </div>
      </aside>

      <div class="roudmap-placer">

      </div>
    </main>
    <script src="elastic.js" charset="utf-8">init()</script>
  </body>
</html>
