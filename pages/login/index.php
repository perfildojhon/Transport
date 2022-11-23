<!DOCTYPE html>
<html>
	<head>
	  <meta charset="UTF-8" />
	  <meta http-equiv="refresh" content="">
	  <title>Formulário de Login e Registro com HTML5 e CSS3</title>
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <link rel="stylesheet" type="text/css" href="source/css/login.css" />
	</head>


	<body>

		<img src="r.jpg" alt="">
			<div class="container">

				<a class="links" id="paracadastro"></a>
				<a class="links" id="paralogin"></a>

				<?php
				if(session_status() !== PHP_SESSION_ACTIVE){
					session_start();
				}


				//verificar se o email e senha foram enviados pelo formulario


				if (isset($_POST['btn-entrar'])){
					echo "entrou.";



					//consultar no banco de dadps
					$email =filter_input(INPUT_POST, 'email_cad',FILTER_SANITIZE_EMAIL);//Remove todos caracteres, exceto letras, números e !#$%&'*+-=?^_`{|}~@.[].
					$senha = md5($_POST['senha_cad']);



					//Conexão
					include_once 'conexaoBanco.php';


					$sql="SELECT * FROM usuario where dscEmail='" . $email . "' and dscRaschSenhas ='" . $senha . "'";
					//echo $sql;


					$resultado= mysqli_query($connect,$sql);
					//echo "linhas: " . mysqli_num_rows($resultado);

					//Conexão
					$erro ='';



					if (mysqli_num_rows($resultado)===0):
						//falhou o login
						$erro = 'É necessário logar para acessar o sistema';
						echo "<p>" . $erro . "</p>";
					else:
						//funcionou
						$dados =mysqli_fetch_array($resultado);
						$_SESSION['nome'] = $dados['nomUser'];
						//echo "usuario: " . $dados['nomUser'];
						header('Location: /home');

					endif;



				}

				?>




				<div class="content">
					<!--FORMULÁRIO DE LOGIN-->
					<div id="login">
						<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
								<h1>Autenticação</h1>
								<p>
									<label for="email_cad">E-mail</label>
									<input id="email_cad" name="email_cad" required="required" type="text" placeholder="ex. contato@htmlecsspro.com"/>
								</p>

								<p>
									<label for="senha_cad">Senha</label>
									<input id="senha_cad" name="senha_cad" required="required" type="password" placeholder="" />
								</p>

								<p>
									<input type="submit" value="Logar" name="btn-entrar"/>
								</p>

						</form>
						<p class="link">
							Ainda não tem conta?
							<a href="cadastro.php">Cadastre-se</a>
						</p>
					</div>
				</div>
			</div>
	</body>
</html>
