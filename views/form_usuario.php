<?php
require_once "../controllers/UsuarioController.php";

$usuarioController = new UsuarioController();
$usuarios = $usuarioController->findAll();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Produtos</title>
    <!-- Área para os Scripts CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">

	<script src="../js/gridUsuario.js"></script>
    <!-- Para utilizar ícones -->
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <!-- Título da Página -->
</head>

<body>
<?php
if (isset($_GET["id"])) {
	$usuarioController = new UsuarioController();
	$usuario = $usuarioController->findById($_GET["id"]);
}

if (isset($_POST["usuario"]) && isset($_POST["senha"])) {
	$usuarioController = new UsuarioController();

	// Construindo o objeto Usuário
	$usuario = new Usuario(null, $_POST["nome"], $_POST["usuario"], $_POST["senha"]);

	// Salvando ou atualizando o Usuário
	if (isset($_GET["id"])) {
		$usuario->setId($_GET["id"]);
		$usuarioController->update($usuario);
	} else {
		$usuarioController->save($usuario);
	}

	// Redirecionando para a página anterior
	header("Location: ?pg=usuarios");
	exit();
}
?>

<div class="container mt-2">
    <h1 class="text-center mb-0">Cadastro de Usuário</h1>
    <form method="POST">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo isset($usuario) ? $usuario->getNome() : ''; ?>">
        </div>
        <div class="form-group">
            <label for="usuario">Usuário</label>
            <input type="text" class="form-control" id="usuario" name="usuario" value="<?php echo isset($usuario) ? $usuario->getLogin() : ''; ?>">
        </div>
        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" class="form-control" id="senha" name="senha">
        </div>
        <input type="submit" class="btn btn-primary" id="salvar" name="salvar" value="Salvar">
        <a href="form_login.php" class="btn btn-secondary btn-danger">Voltar</a>
    </form>
</div>

<!-- Área para os Scripts Java Scripts -->
	<script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
</body>

</html>