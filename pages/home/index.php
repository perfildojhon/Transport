<!DOCTYPE html>
<html lang="pt" dir="ltr">
  <head>
    <meta charset="utf-8" content="text/html">
    <meta name="keywords" content="Faça viagens mais rápido.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/common/source/css/reset.css">
    <link rel="stylesheet" href="/common/source/css/general.css">
    <link rel="stylesheet" href="/common/source/css/home.css">
    <title>Home</title>
  </head>
  <?php
    //
    if(!isset($_SESSION))
    {
        session_start();
    }
    if(!isset($_SESSION['username']) && isset($_SESSION['user_acess_status']) && $_SESSION['user_acess_status'] !== "connected"):
      require_once("../auth/index.php");
    endif;
  ?>
  <body>
    <header>
      <div class="headline">
        <div class="banner">
          <div class="brandline">
            <h1 id="brandpage" onclick="location.href='/home'">Transport</h1>
          </div>
          <div class="user-agent-navigation">
            <div class="navigation-painel" onclick="ChangePopupState()">
              <div class="user-profile-data">
                <div class="profile-picture">
                  <img src="/common/media/profile.jpg" alt="picture" width="35" height="35" style="border-radius: 35px;">
                </div>
                <div class="username-placer">
                  <h2 id="username">
                    <?php
                      if(isset($_SESSION['username'])):
                        echo $_SESSION['username'];
                      else:
                        echo "username";
                      endif;
                    ?>
                  </h2>
                </div>
              </div>
            </div>
            <div class="navigation-menu" id="navigation" hidden>
              <ul id="navigation-topics">
                <li id="option_one" onclick="location.href='/history'"> Histórico de Viagem </li>
                <li id="option_one" onclick="location.href='/export'"> Exportar Arquivo </li>
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
        <div class="trip-details-conditions">
          <div class="planner-label-placer">
            <h3 id="planner-label-item">Plano de Viagem</h3>
          </div>

          <div class="trip-conditions">
            <form class="travel-plan-letter" action="index.html" method="post">

                  <label for="trip-start-condition">Partida</label>
                  <input id="trip-start-condition" type="search" name="search" placeholder="Pra onde você quer ir?">
                  <br>
                  <label for="trip-arrival-condition">Destino</label>
                  <input id="trip-arrival-condition" type="search" name="search" placeholder="Em qual destino quer chegar?" >

                  <input id="submit-trip" type="submit" name="confirm" value="confirmar">

                  <input id="cancel-trip" type="button" name="cancel" value="cancelar">
                </form>
          </div>
        </div>
      </aside>

      <div class="roudmap-placer">
      </div>
    </main>
    <script src="elastic.js" charset="utf-8">init()</script>
  </body>
</html>
