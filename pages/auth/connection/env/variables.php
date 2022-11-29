<?php
// Construcao da Conexao com banco de dados via PDO
$hostname = "localhost"; // Endereço do servidor
$charset = 'utf8mb4';
$db="db name"; // database
$dsn = "mysql:host=$hostname;dbname=$db; charset=$charset"; // construcao do DSN
// Autentificacao com o servidor
$username="username"; // precisa ser isolado como variavel de ambiente
$password="password"; // precisa ser isolado como variavel de ambiente
?>
