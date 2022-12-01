<?php
session_start();

//Incluir a conexao com BD
include_once('../../../pages/auth/connection/index.php');

//Receber os dados do formulário
//$arquivo = $_FILES['arquivo'];
$arquivo_tmp = $_FILES['arquivo']['tmp_name'];
var_dump($arquivo_tmp);

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
	echo $sql;
	$update_rotas = $connection->query($sql);
	//if(mysqli_query($connect,$sql)):
	//	echo "Sucesso";

	//else:
	//	echo "Erro !";

	//	endif; 

	$id_pontos = explode(' ', $dscSeqPontosRota);
	
	
	//foreach($id_pontos as $id){

	//	$sql = "INSERT INTO rotas_pontos(Rotas_idRotas, Pontos_idPontos) VALUES('$idRotas', '$id')";
		
		
	//	if(mysqli_query($connect,$sql)):
	//		echo "Sucesso";

	//	  else:
	//		echo "Erro !";

	//	  endif;
		
	//} 
	
}
//$sql = "Select idRotas from Rotas where idRotas=";
	
	//$consulta_rotas = $connection->query($sql);
//foreach($dados as $linha){
	
//	$idRotas = $valor[0];

//	$consulta_rotas = $connection->query($sql. idRotas);
//	$result = $consulta_rotas->fetchAll();
	
//	if(count($result) === 1):
//		echo "A rota " . idRotas . " foi adicionada ao banco <br>";
//	 elseif(count($result) === 0):
//		echo "A rota " . idRotas . " não foi adicionada ao banco <br>";
//	 endif; 

$_SESSION['msg'] = "<p style='color: green;'>Arquivos de Rotas carregado com sucesso!</p>";
header("Location: ../index.php");
?>




