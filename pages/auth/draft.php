<?php
  // variables
  $_SESSION['user_id'] = null; // arquivo de sessao do cache
  $_SESSION['user_session_id'] = null;
  $db = 'session'; // nome da tabela

  // verifica se é a primeira conexao,
    // e caso for, a variavel de controle de acesso recebe o valor de desconectado
  if(!isset($user_acess_status)) {
    $user_acess_status = "disconnected";
  }
  // inicia a sessao php
  session_start();
  // coleta o id da sessao php atual para ser confrontada com o banco de dados
  $current_session = session_id();
  // abre a conexao com o banco de dados
  require_once('connection/index.php');
  // define a query que verfica no banco a tabela de sessao
  $sql = "SELECT session(user_id, session_dsc) FROM $db";
  // Procura na tabela Session quais sessoes estao ativas e retorna o(s) valor(es)
  $stmt = $connection->query("SELECT * FROM session");
  // verifica dentro da consulta do banco a existencia da sessao atual nos registros
  while ($row = $stmt->fetch())
  {
    // Se houver uma sessao compativel com a sessao atual
      // e ela estiver com o status ativo (true / 1)
      // o primeiro bloco sera executado e o loop finalizado
    if($row['session_dsc'] === session_id() && $row['session_active']===1):
      // define o status da sessão do usuario muda para conectado
      $user_acess_status = "connected";
      //
      $_SESSION['user_id'] = $row['user_id'];
      $_SESSION['user_session_id'] = $row['session_id'];
      break;
    // Se houver uma sessao compativel com a sessao atual
      // e ela estiver com o status inativo (false / 0)
      // o segundo bloco sera executado e o loop finalizado
    // elseif ($row['session_dsc'] === session_id() && $row['session_active']===0):
    //   // define o status da sessão do usuario muda para conectado
    //   $user_acess_status = "connected";
    //   // atualiza o status de uma sessão que previamente estava fechada como aberta
    //   $new_query = $connection->query("UPDATE $table SET session_active = true where session_id = '".$row["session_id"]."'");
    //   // imprime na página do auth o status da conexão.
    //     // não ecoa para outras páginas nos redirecionamentos
    //   echo "$user_acess_status <br>";
    //   break;
    endif;
    // imprime na página do auth qual sessao do banco de dados esta sendo analisada
    echo "sessão " . $row['session_id'] . ": ";
    }
  // Armazena o status da sessao do usuario para ser utilizado posteriormente
  $_SESSION['user_acess_status'] = $user_acess_status;


  if($user_acess_status !== "connected"):
    //
    if (isset($_SESSION['user_id'])) {
      // code...
      echo "usuário: " . $_SESSION['user_id'];
    }
    echo '<br>';

    // redirecionamento as paginas de destino

    if (isset($_SESSION['user_session_id']) && isset($_SESSION['username'])) {
      // code...
      echo "sessão: " . $_SESSION['user_session_id'];
    }
    header('location: /auth/login');
    exit;
    //
    elseif(session_status() === PHP_SESSION_ACTIVE):
      // antes de finalmente chegar até a pagia home sera verificado
        // se o username foi definido, e caso nao,
        // uma consulta sera feita para recuperar o nome de usuario
      if(!isset($_SESSION['username'])) {
        //
        $verify_name = $connection->query("SELECT nomUser as 'username' FROM usuario where idUser = ". $_SESSION['user_id'] . "");
        //
        $get_username = $verify_name -> fetchAll();
        //
        foreach ($get_username as $name => $value) {
          // code...
          $_SESSION['username'] = $value['username'];
          break;
        }
      }
      header('location: /home');
  endif;
  //
  // Modo Debug do Auth. Para ver os dados desse doc marque os headers com comentarios
  //
  echo $_SESSION['user_acess_status'];
  echo '<br>';
  if (isset($_SESSION['user_id'])) {
    // code...
    echo "usuário: " . $_SESSION['user_id'];
  }
  echo '<br>';
  if (isset($_SESSION['user_session_id'])) {
    // code...
    echo "sessão: " . $_SESSION['user_session_id'];
  }
  //fecha a conexao
  $connection = null;
?>
