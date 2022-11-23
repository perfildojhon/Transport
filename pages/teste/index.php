<?php
//Conexão com banco de dados
$servername = "localhost"; //endereço do servidor
$username="root";
$password="serra";
$db_name="mydb";

$usertable="usuario";

//pdo - somente orientado objeto
$connection = mysqli_connect($servername,$username, $password) or die ("html>script language='JavaScript'>alert('Unable to connect to database! Please try again later.'),history.go(-1)/script>/html>");
$database = mysqli_select_db($connection, $db_name);
//codifica com o caracteres ao manipular dados do banco de dados
//mysqli_set_charset($connect, "utf8");

$query = "SELECT * FROM $usertable";

$result = mysqli_query($connection, $query);

$yourfield =  "nomUser";

if(mysqli_connect_error()):
	echo "Falha na conexão: ". mysqli_connect_error();
endif;

if($result){
		while($row = mysqli_fetch_array($result)){
			$name = $row["$yourfield"];
      $id = $row["idUser"];
			echo "<p>ID: ".$id." Name: ".$name."</p><br/>";
		}
	}
?>
