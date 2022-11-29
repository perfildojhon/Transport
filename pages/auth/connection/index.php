<?php
  // requer variáveis de ambiente
    // se falhar, crie um arquivo com as variaveis de ambiente em env/variables.php;
  require_once('../env/variables.php');
  // opcoes do PDO
  $options = [
      PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES   => false,
  ];
  // Autentificacao com o servidor
  // Tabela a se acessar
  $table="session";
  // Mensagem Padrao
  $message="Sem conexão com o servidor."; // mensagem padrao de resposta

  //pdo - somente orientado objeto
  try {
    //
    $connection = new PDO($dsn, $username, $password, $options);
    $message="Servidor conectado.";
  } catch (PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
  }
  //
  // echo $message;
?>
