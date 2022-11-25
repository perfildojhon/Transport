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
	$valor = explode('  ', $linha);
	var_dump($valor);
	
	$idRotas = $valor[0];
	$nomRota = $valor[1];
	$valQuilomet = $valor[2];
	$dscSeqPontosRota = $valor[3];

	$sql = "INSERT INTO Rotas(idRotas, nomRota, valQuilomet, dscSeqPontosRota) VALUES('$idRotas', '$nomRota', '$valQuilomet', '$dscSeqPontosRota')";
	
	if(mysqli_query($connect,$sql)):
		echo "Sucesso";

	else:
		echo "Erro !";

	endif; 

	$id_pontos = explode(' ', $dscSeqPontosRota);
	
	
	foreach($id_pontos as $id){

		$sql = "INSERT INTO rotas_pontos(Rotas_idRotas, Pontos_idPontos) VALUES('$idRotas', '$id')";
		
		
		if(mysqli_query($connect,$sql)):
			echo "Sucesso";

		  else:
			echo "Erro !";

		  endif;
		
	} 
	
}
$_SESSION['msg'] = "<p style='color: green;'>Carregado os dados com sucesso!</p>";
header("Location: TelaExportacaoDados.php");




