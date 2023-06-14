<?php
require_once "controllers/UsuarioController.php";
include_once "restrict.php";

$usuarioController = new UsuarioController();
$usuarios = $usuarioController->findAll();

if (isset($_SESSION['mensagem'])) {
    echo "<script>alert('" . $_SESSION['mensagem'] . "')</script>";
    unset($_SESSION['mensagem']); // Limpar a variável de sessão após exibir o alerta
}
?>

<div class="container mt-2">
    <h1 class="text-center mb-0">Lista de Cadastro</h1>
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
        <!-- <input type="submit" class="btn btn-primary" id="salvar" name="salvar" value="Salvar"> -->
        <div>
            <input type="submit" class="btn btn-primary" id="salvar" name="salvar" value="<?php echo isset($usuario) ? $usuario->getLogin() : 'Salvar'; ?>">
            <button class="btn btn-success" onclick="limparCampos()">Novo</a>
        </div>

        
    </form>
</div>

<div class="container mt-4">
    <h2>Usuários cadastrados</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Usuário</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($usuarios)): ?>
                <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?php echo $usuario->getId(); ?></td>
                        <td><?php echo $usuario->getNome(); ?></td>
                        <td><?php echo $usuario->getLogin(); ?></td>
                        <td>
                            <button class="btn btn-info" onclick="selecionarUsuario(<?php echo $usuario->getId(); ?>, '<?php echo $usuario->getNome(); ?>', '<?php echo $usuario->getLogin(); ?>')">Selecionar</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Área para inclusão de bibliotecas JS -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/scripts.js"></script>
<script src="js/gridUsuario.js"></script>
