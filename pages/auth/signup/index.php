<!DOCTYPE html>
<html>
	<head>
	  <meta charset="UTF-8" />
	  <meta http-equiv="refresh" content="">
	  <title>Formulário de Login e Registro com HTML5 e CSS3</title>
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <link rel="stylesheet" type="text/css" href="/common/source/css/auth.css">
	</head>

	<body>
		<img src="r.jpg" alt="">
			<div class="container">

				<a class="links" id="paracadastro"></a>
				<a class="links" id="paralogin"></a>
		  <?php
			  //Iniciar  Sessão
			  //session_start();

			  if(isset($_POST['Cadastrar'])):
				echo "<p>entrou!</p>";

				//Conexão
				require_once 'conexaoBanco.php';

				$nome=mysqli_escape_string($connect,$_POST['nome_cad']);
				$sobrenome=mysqli_escape_string($connect,$_POST['Snome_cad']);
				$CPF=mysqli_escape_string($connect,$_POST['CPF_cad']);
				$email=mysqli_escape_string($connect,$_POST['email_cad']);
				$senha=mysqli_escape_string($connect,$_POST['senha_cad']);
				$Rsenha=mysqli_escape_string($connect,$_POST['Rsenha_cad']);
				$endereco=mysqli_escape_string($connect,$_POST['End_cad']);
				$dataDeNascimento=mysqli_escape_string($connect,$_POST['Dat_cad']);

				$senha = md5($senha);

				$sql= "INSERT INTO usuario(nomUser,dateNascm,dscEmail,numCPF,sobrenome,dscRaschSenhas,endereco) VALUES ('$nome','$dataDeNascimento','$email','$CPF','$sobrenome','$senha','$endereco')";

				if(mysqli_query($connect,$sql)):
				  echo "Sucesso";
				else:
				  echo "Erro !";
				endif;

			  endif;

		  ?>


		  <!--FORMULÁRIO DE CADASTRO-->
		<div class="container">

		<div class="content">
		  <div id="cadastro">


			<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			  <h1>Cadastro</h1>

			  <p>
				<label for="nome_cad">Nome</label>
				<input id="nome_cad" name="nome_cad" required="required" type="name" placeholder="nome" />
			  </p>

				  <p>
				<label for="Snome_cad">Sobrenome</label>
				<input id="Snome_cad" name="Snome_cad" required="required" type="name" placeholder="nome" />
			  </p>

				  <p>
				<label for="CPF_cad">CPF</label>
				<input id="CPF_cad" name="CPF_cad" required="required" type="text" placeholder="000.000.000-00"/>

			  <p>
				<label for="email_cad">E-mail</label>
				<input id="email_cad" name="email_cad" required="required" type="text" placeholder="contato@gmail.com"/>
			  </p>

			  <p>
				<label for="senha_cad">Senha</label>
				<input id="senha_cad" name="senha_cad" required="required onchange" type="password" placeholder="No mínimo 8 caracteres, 1 letra minúscula, 1 maiúscula e 1 número" />
			  </p>

			  <p>
				<label for="Rsenha_cad">Repita a senha</label>
				<input id="Rsenha_cad" name="Rsenha_cad" required="required onchange" type="password" placeholder="No mínimo 8 caracteres, 1 letra minúscula, 1 maiúscula e 1 número"/>
			  </p>

			  <p>
				<label for="End_cad">Endereço</label>
				<input id="End_cad" name="End_cad" required="required" type="text" placeholder="ex. rua, número, cidade, estado"/>
			  </p>

			  <p>
				<label for="Dat_cad">Data de Nascimento</label>
				<input id="Dat_cad" name="Dat_cad" required="required" type="date" placeholder="00/00/0000"/>
			  </p>

			  <p>
				<button type="submit" name="Cadastrar"> Enviar </button>
			  </p>

			  <p class="link">
				Já tem conta?
				<a href="/auth"> Ir para Login </a>
			  </p>
			</form>

		  </div>

		</div>
		</div>
	</body>
</html>
