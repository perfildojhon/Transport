<!DOCTYPE html>
<html>
	<head>
	  <meta charset="UTF-8" />
	  <meta http-equiv="refresh" content="">
	  <title>Entrar</title>
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="/common/source/css/reset.css">
		<link rel="stylesheet" type="text/css" href="/common/source/css/general.css">
		<link rel="stylesheet" type="text/css" href="/common/source/css/auth.css">
	</head>
	<body>
		<?php
			// variables
			$_SESSION['user_id'] = null; // arquivo de sessao do cache
		  $_SESSION['user_session_id'] = null;
			// Se não houver uma sessao ativa, uma nova sera aberta
			if(session_status() !== PHP_SESSION_ACTIVE) {
				// salvando os dados da sessao
				session_start();
			}
			//
			if(!isset($_SESSION['auth_verificated'])) {
				//
				require_once('../index.php');
			}
			//
			$current_session = session_id();
			$_SESSION['current_session'] = $current_session;
			// verificando se os dados foram enviados pelo formulario
			if (isset($_POST['btn-entrar'])){
				// sanitizacao e criptografia dos dados que serao enviados ao servidor
				$email =filter_input(INPUT_POST, 'email_cad',FILTER_SANITIZE_EMAIL);//Remove todos caracteres, exceto letras, números e !#$%&'*+-=?^_`{|}~@.[].
				$senha = md5($_POST['senha_cad']);
				// abrindo conexao com o banco no padrao PDO
				include_once("../connection/index.php");
				// A query da consulta sera declarada como uma constante para ser utilizada pelo metodo PDO
					// A consulta sera preparada e executada
						// o resultado da consulta sera alocado em verify, que recebera um array com o(s) resultado(s)
				$sql = "SELECT idUser as ID, nomUser as name, dscEmail as email FROM usuario where dscEmail='" . $email . "' and dscRaschSenhas ='" . $senha . "'";
				$verify = $connection->query($sql);
				// $verify->execute();
				$result = $verify->fetchAll();
				// O bloco seguinte verifica a existencia do cadastro do usuario no banco de dados
				if(count($result) === 0):
					//
					echo "Email ou senha incorretos";
				// se um resultado for encontrado
				elseif(count($result) === 1):
					// fetch dos dados em um array
					$data = $verify->fetchAll();
					// o resultado pode vir em mais de uma linha, portanto um array bidimentional
						// a.k.a.: [array[data, data, data], array[data, data, data]]
					// para cada resultado uma linha sera tirada -> array[0] ou arra[1]
						// e cada linha possui um array contento os valores da query -> array[name, ID, email]

					// o foreach irá desenrolar cada resultado em linha, para que os valores dentro da linha seja acessível;
					foreach ($result as $line => $value) {
						// code...
						$_SESSION['username'] = $value['name'];
						$_SESSION['usermail'] =  $value['email'];
						$_SESSION['user_id'] = $value['ID'];
						//
						if(isset($_SESSION['user_id']) && $_SESSION['user_id'] !== $value['ID']) {
							//
							$_SESSION['user_acess_status'] == "already connected";
						}
					}
				endif;
				//

				//
				if ($_SESSION['user_acess_status'] = "connected"):
					// code...
					$table_user = "usuario";
					$field_name = "dscEmail";
					// captura no banco de dados o ID do Usuario que está logando
					$current_user = ("SELECT idUser as ID FROM $table_user where $field_name = '$email'");
					// consulta o banco de dados e executa a query
					$find_user = $connection->query($current_user);
					// faz o fetch dos dados, transformando o objeto PDO result em Array
					$fetch_user = $find_user->fetchAll();
					//
					foreach ($fetch_user as $user => $value) {
						// o campo var de $value['>var<'] presisa ser o mesmo nome da coluna da tabela
							// ou o alias informado no SELECT > SELECT column_name as >alias< ...
						$user_id = $value['ID'];
						//
						if(isset($_SESSION['user_id']) && $_SESSION['user_id'] !== $value['ID']) {
							//
							$_SESSION['user_acess_status'] == "already connected";
						}
					}
					//
					$sql = "INSERT INTO $table(user_id, session_dsc, session_active) values($user_id, '$current_session', true);";
					$send = $connection->query($sql);
					header('location: /home' );
				else:
					header('location: /login');
				endif;
			}
		?>
		<main>
			<header>
				<div class="headline">
	        <div class="banner">
	          <div class="brandline">
	            <h1 id="brandpage" onclick="location.href='/home'">Transport</h1>
	          </div>
	        </div>
	      </div>
			</header>
			<div class="container">
				<a class="links" id="paracadastro"></a>
				<a class="links" id="paralogin"></a>
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
							<a href="../signup">Cadastre-se</a>
						</p>
					</div>
				</div>
			</div>
		</main>
	</body>
</html>
