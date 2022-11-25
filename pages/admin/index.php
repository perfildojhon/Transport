<!DOCTYPE html>
<html lang="pt" dir="ltr">
  <head>
    <meta charset="utf-8" content="text/html">
    <meta name="keywords" content="Faça viagens mais rápido.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/source/css/general.css">
    <link rel="stylesheet" href="/source/css/reset.css">
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
                    <form action="telaPrincipal.php" method="post">
                        <input type="submit" name="button" value="Voltar"></input>
                      </form>
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
        
        <?php
        if(isset($_SESSION['msg'])){
          echo $_SESSION['msg'];
          unset($_SESSION['msg']);
        }
        ?>
        <div>
            <h1 id="titulo">Exporte Arquivo</h1>
            <p id="subtitulo">Exporte os arquivos de rotas e pontos para o banco de dados</p>
            <br>
        </div>
          <div class=container>        
            <fieldset class="grupo">
                <div class="campo">
                    <form method="POST" action="processaPontos.php" enctype="multipart/form-data">
                        <label class="nome"><strong>Exporte arquivo de "PONTOS"</strong></label>
                        <br>  
                        <input type="file" name="arquivo" id="nome"><br><br>
                    
                        <input class="botao" type="submit" value="Importar">
                    </form>
                    <br>
                    <br>
                    <form method="POST" action="processaRotas.php" enctype="multipart/form-data">
                        <label class="nome"><strong>Exporte arquivo de "ROTAS"</strong></label>
                        <br>  
                        <input type="file" name="arquivo" id="nome"><br><br>
                    
                        <input class="botao" type="submit" value="Importar">
                    </form>
                </div>            
            </fieldset>
          </div>           
    </main>
  </body>
</html>
<style>

#titulo{
  text-align: center;
}
#subtitulo{
  text-align: center; 
}
.container { 
    width: 700px; 
    margin-left: auto;
    margin-right: auto;
    border : 2px; 
}  
</style>