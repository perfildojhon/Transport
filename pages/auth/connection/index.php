<?php
  // Construcao da Conexao com banco de dados via PDO
  $hostname = "localhost"; // Endereço do servidor
  $charset = 'utf8mb4';
  $db="mydb"; // database
  $dsn = "mysql:host=$hostname;dbname=$db; charset=$charset"; // construcao do DSN
  // opcoes do PDO
  $options = [
      PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES   => false,
  ];
  // Autentificacao com o servidor
  $username="root"; // precisa ser isolado como variavel de ambiente
  $password="serra"; // precisa ser isolado como variavel de ambiente
  // Tabela a se acessar
  $table="session";
  // Mensagem Padrao
  $message="Sem conexão com o servidor.";

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
