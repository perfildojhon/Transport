<!DOCTYPE html>
<html lang="pt" dir="ltr">
  <head>
    <meta charset="utf-8" content="text/html">
    <meta name="keywords" content="Faça viagens mais rápido.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/common/source/css/general.css">
    <link rel="stylesheet" href="source/css/export.css">
    <link rel="stylesheet" href="/common/source/css/reset.css">
    <title>Exportar dados</title
  </head>
  <?php
session_start();

//include('verificarLogin.php');

?>
  <body>
    <!-- Header Banner -->
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
    <main>
      <!--  -->
      <?php
      if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
      }
      ?>
      <article class="dashboard">
        <!--  -->
        <div class="transfer">
          <!--  -->
          <div class="lead">
            <h1 id="titulo">Atualizar Rotas</h1>
            <p id="subtitulo">Exporte os arquivos de rotas e pontos para o banco de dados</p>
            <br>
          </div>
          <!--  -->
          <nav class="select-mode">
            <ul>
              <li>
                <button type="button" name="set_rotas" id="set_rotas" onclick="alternate_input_rotas()">
                  <h2>Rotas</h2>
                </button>
              </li>
              <li>
                <button type="button" name="set_pontos" id="set_pontos" onclick="alternate_input_pontos()">
                  <h2>Pontos</h2>
                </button>
              </li>
            </ul>
          </nav>
          <form class="as_stops" method="POST" action="processaPontos.php" enctype="multipart/form-data">
            <!--  -->
            <fieldset id="input_rotas" hidden>
              <label class="nome"><strong>Exporte arquivo de "ROTAS"</strong></label>
              <input type="file" name="arquivo" id="nome">
            </fieldset>
            <!--  -->
            <fieldset id="input_pontos" hidden>
              <label for="arquivo" class="nome"><strong>Exporte arquivo de "PONTOS"</strong></label>
              <input type="file" name="arquivo" id="nome"><br><br>
            </fieldset>
            <fieldset id="send_file">
              <input class="botao" type="submit" value="Importar">
            </fieldset>
          </form>
        </div>
      </article>
    </main>
    <script src="/common/source/js/elastic.js" charset="utf-8">init()</script>
  </body>
  <script src="source/js/alternator.js" charset="utf-8"></script>
</html>
<style>
