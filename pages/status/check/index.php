<?php
  //Conexão com banco de dados
  $servername = "localhost"; //endereço do servidor
  $username="root";
  $password="serra";
  $db_name="mydb";

  // public mysqli::stat(): string|false;

  //pdo - somente orientado objeto
  $connection = new mysqli($servername, $username, $password, $db_name);

  //codifica com o caracteres ao manipular dados do banco de dados
  mysqli_set_charset($connection, "utf8");

  if(mysqli_connect_error()):
    echo "Falha na conexão: ". mysqli_connect_error();
  else:
    echo "conectado. <br>";
  endif;


  session_start();
  if(session_status() === PHP_SESSION_ACTIVE):
    //
    echo 'Sessão Ativa. ID de sessão: <br>'.session_id();
    session_destroy();
  elseif (session_status() !== PHP_SESSION_ACTIVE):
    echo 'Sessão Inativa.<br>';
  endif;

  $connection -> close();
?>
