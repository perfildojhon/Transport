<?php
  session_start();
  $current_session = session_id();
  //
  include_once("../connection/index.php");
  //
  $stmt = $connection->query("SELECT session_id from $table where session_dsc='$current_session' AND session_active=true");
  //
  while ($row = $stmt->fetch())
  {
    $new_query = $connection->query("UPDATE $table SET session_active = false where session_id = '".$row["session_id"]."'");
  }
  // limpa a variavel de sessao
  $_SESSION = null;
  // cria uma nova id de sessao
  session_regenerate_id();
  // destroi a sessao atual
  session_destroy();
  //
  header('Location: /auth/login');
  //
  $connection = null;
?>
