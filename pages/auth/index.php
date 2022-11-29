<?php
  // variables
  $table = "session";
  // inicia a sessao ou resume uma sessao existente
  if(!isset($_SESSION))
  {
      session_start();
      $_SESSION['auth_verificated'] = null;
  }
  // persiste o id da sessao no arquivo de cache
  $_SESSION['current_session_id'] = session_id();
  // verifica se é a primeira conexao,
    // e caso for, a variavel de controle de acesso recebe o valor de desconectado
  if(!isset($user_acess_status)) {
    $user_acess_status = "disconnected";
  }
  //// abre a conexao com o banco de dados
  require_once('connection/index.php');
  // define a query que verfica no banco a tabela de sessao
  $sql = "SELECT session(user_id, session_dsc) FROM $table";
  // retorna o historico de sessao da tabela session
    // dentre as sessoes que AINDA ESTAO ativas
    // (precisa de um delimitador de resultados)
  $stmt = $connection->query("SELECT * FROM session");
  // verifica dentro da consulta do banco a existencia da sessao atual nos registros
  while ($row = $stmt->fetch()) {
    // Se houver uma sessao compativel com a sessao atual
      // e ela estiver com o status ativo (true / 1)
      // o primeiro bloco sera executado e o loop finalizado
    if($row['session_dsc'] === session_id() && $row['session_active']===1) {
      // persiste o id do usuario conectado no cache de sessao
      $_SESSION['user_id'] = $row['user_id'];
      // persiste a id da sessao associada ao usuario conectado no cache da sessao
      $_SESSION['user_session_id'] = $row['session_id'];
      // define o status de acesso como conectado
      $user_acess_status = "connected";
      // finaliza o loop
      break;
    } // fecha-chave - if
  } // fecha-chave > while

  // Buffer de dados
  $_SESSION['user_acess_status'] = $user_acess_status;
  //
  $_SESSION['auth_verificated'] = true;

  // ************ REDIRECTS ***************************************************

  // se a sessao atual for a sessao ativa do usuario, a verificacao terminara
    // e o usuario prosseguira para a homepage (tela inicial)
  // se a sessao atual for a sessao ativa, o user_id estara definido
  if (isset($_SESSION['user_id']) && isset($_SESSION['username'])):
    //
    header('location: /home');
  // Se não houver sessao ativa para o usuario a pagina redirecionara para a autentificacao
  elseif(!isset($_SESSION['user_id'])):
    // redirecionamento para a autentificacao
    header('location: /auth/login');
    echo "precisa ser autenticado";
  // se a sessao ja estiver aberta e o usuario ja estiver autenticado, o redirecionamento
    // o levara para a homepage
  elseif(!isset($_SESSION['auth_verificated']) && $_SESSION['auth_verificated'] !== null):
    $table = "usuario";
    $sql = "SELECT nomUser as 'username', dscEmail as 'email' FROM $table where idUser = ".$_SESSION['user_id']."";
    //
    $result = $connection->query($sql);
    //
    $data = $result-> fetchAll();
    // echo "<br> usuários: " . count($data);
    foreach ($data as $user => $value) {
      // code...
      $_SESSION['username'] = $value['username'];
      $_SESSION['email'] = $value['email'];
    } // fecha-chave > while
    header('location: /home');
  endif;
?>
