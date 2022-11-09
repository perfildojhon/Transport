<!DOCTYPE html>
<html lang="pt" dir="ltr">
  <head>
    <meta charset="utf-8" content="text/html">
    <meta name="keywords" content="Faça viagens mais rápido.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="general.css">
    <link rel="stylesheet" href="reset.css">
    <title>Home</title
  </head>
  <?php
session_start();

//include('verificarLogin.php');

?>
  <body>
    <!-- Header Banner -->
    <header>
      <!-- Headline: Container que representa o conteúdo de Header -->
      <div class="headline">
        <!-- headcast: Agrupamento dos conteúdos de Headline para serem manipulados de forma
        separadas pelo CSS -->
        <div class="headcast">
          <div class="brandline">
            <div class="brand">
              <h1 id="label">Transport</h1>
            </div>

            <div class="profile">
              <div class="hatch">
                <div class="pic">
                  <button id="profile-menu-agent" type="button">
                    <img id="miniature" src="profile.jpg" alt="Profile picture" width="35" height="35">
                  </button>
                </div>
                <h2>
                  <?php
                    echo $_SESSION['nome'];
                  ?>
                </h2>
                </h2>
                <nav>
                  <ul>
                    <li>
                      <button type="button" name="button" onclick="gotToHistory()"> Histórico de Viagem </button>
                    </li>
                    <li>
                      <form action="logout.php" method="post">
                        <input type="submit" name="button" value="Sair"></input>
                      </form>
                    </li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <main>
      <article class="content">
        <aside class="trip-details-planner">
          <div class="trip-details-conditions">
            <div class="trip-conditions">
              <div class="label-placing">
                <h1 class="label">Plano de Viagem</h1>
              </div>
              <div class="search">

                <form class="travel-plan-letter" action="index.html" method="post">

                  <label for="trip-start-condition">Partida</label>
                  <input id="trip-start-condition" type="search" name="search" placeholder="Qual o seu endereço de origem?">

                  <label for="trip-arrival-condition">Destino</label>
                  <input id="trip-arrival-condition" type="search" name="search" placeholder="Pra onde você quer ir?" >

                  <input id="submit-trip" type="submit" name="search" value="confirmar">

                  <input id="cancel-trip" type="button" name="cancel" value="cancelar">
                </form>
              </div>
            </div>
          </div>
        </aside>

        <section class="placeholder-map-area">
          <div class="map-placer">

          </div>
        </section>
      </article>
    </main>
  </body>
</html>
