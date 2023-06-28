<?php
require_once "C:/xampp/htdocs/pw2_2023/controllers/UsuarioController.php";

// Inicia a sessão
session_start();

if (isset($_POST["login"]) && isset($_POST["senha"])) {
	$usuarioController = new UsuarioController();
	$usuarioController->login($_POST["login"], $_POST["senha"]);
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formulário de Login</title>
	<!-- Área para os Scripts CSS -->
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<!-- Título da Página -->

	<style>
		body {
			background-image: url('../images/logistica.avif');
			background-size: cover;
			background-position: center;
			height: 100vh;
			display: flex;
			align-items: center;
			justify-content: center;
			/* background-color: rgba(0, 0, 0, 0.8); */
		}

		.card {
			max-width: 400px;
			margin: 0 auto;
		}

		.custom-heading {
			font-family: "Arial Black", sans-serif;
			font-size: 30px;
			font-weight: bold;
			color: #000;
		}
	</style>
</head>

<body>
	<div class="container">

		<div class="card rounded">
			<div class="card-body">
				<form method="POST">
					<div class="form-group">
						<h1 class="text-center custom-heading">Controle de Produtos</h1>
					</div>
					<div class="form-group">
						<label for="login">Login:</label>
						<input type="text" class="form-control" id="login" name="login" placeholder="Digite seu login" required>
					</div>
					<div class="form-group">
						<label for="senha">Senha:</label>
						<input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha" required>
					</div>
					<?php
					if (isset($_SESSION["mensagem"])) {
					?>
						<div class="alert alert-warning " role="alert">
							<strong>ERRO:</strong>
							<?php
							echo $_SESSION["mensagem"];
							unset($_SESSION["mensagem"]);
							?>
						</div>
					<?php } ?>
					<button type="submit" class="btn btn-primary btn-block">Login</button>
				</form>
			</div>
		</div>
	</div>

	<!-- Área para os Scripts Java Scripts -->
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/scripts.js"></script>
</body>

</html>