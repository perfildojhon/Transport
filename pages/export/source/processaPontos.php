<?php
session_start();

//Incluir a conexao com BD
include_once("conexaoBanco.php");

//Receber os dados do formulário
//$arquivo = $_FILES['arquivo'];
//var_dump($arquivo);
$arquivo_tmp = $_FILES['arquivo']['tmp_name'];

//ler todo o arquivo para um array
$dados = file($arquivo_tmp);
//var_dump($dados);

foreach($dados as $linha){
	$linha = trim($linha);
	$valor = explode(' ', $linha);
	var_dump($valor);
	
	$idPontos = $valor[0];
	$valLatitude = $valor[1];
	$valLongitude = $valor[2];
	$nomPonto = $valor[3];
	$valPosMetr = $valor[4];
	
	$sql = "INSERT INTO pontos(idPontos, valLatitude, valLongitude, nomPonto, valPosMetr) VALUES('$idPontos', '$nomPonto','$valPosMetr', '$valLatitude', '$valLongitude')";
	
	if(mysqli_query($connect,$sql)):
		echo "Sucesso";
	  else:
		echo "Erro !";		
	  endif;
	  
}
$_SESSION['msg'] = "<p style='color: green;'>Arquivo de Pontos carregado com sucesso!</p>";
header("Location: ../index.php");



