<?php
include_once("restrict.php");
require_once "controllers/UsuarioController.php";

if (isset($_GET["id"])) {
	$usuarioController = new UsuarioController();
	$usuario = $usuarioController->findById($_GET["id"]);
}

// Salva quando recebe dados do formulário
if (
	isset($_POST["nome"]) &&
	isset($_POST["login"])
) {
	$usuarioController = new UsuarioController();

	// Construindo o Usuario
	$usuario = new Usuario(null, $_POST["nome"], $_POST["login"], $_POST["senha"]);

	// Salvando ou Atualizando Usuario
	if (isset($_GET["id"])) {
		$usuario->setId($_GET["id"]);
		$usuarioController->update($usuario);
	} else {
		$usuarioController->save($usuario);
	}

	// Voltando pra tela anterior
	header("Location: ?pg=usuarios");

	// Encerra a execução do script php
	exit();
}

?>


<div class="container mt-2">
	<h1 class="text-center mb-0">Cadastro de Usuario</h1>
	<form method="POST">
		<div class="form-group">
			<label for="nome">Nome</label>
			<input type="text" class="form-control" id="nome" name="nome" value="<?php echo isset($usuario) ? $usuario->getNome() : ''; ?>" required>
		</div>
		<div class="form-group">
			<label for="login">Login</label>
			<input type="text" class="form-control" id="login" name="login" value="<?php echo isset($usuario) ? $usuario->getLogin() : ''; ?>" required>
		</div>
		<div class="form-group">
			<label for="senha">Senha</label>
			<input type="password" class="form-control" id="senha" name="senha" required>
		</div>
		<input type="submit" class="btn btn-primary" id="salvar" name="salvar" value="Salvar">
	</form>
</div>