<?php
require_once "C:/xampp/htdocs/pw2_2023/models/Usuario.php";
require_once "C:/xampp/htdocs/pw2_2023/models/Conexao.php";
require_once "C:/xampp/htdocs/pw2_2023/controllers/Bcrypt.php";

class UsuarioController
{
    public function login($login, $senha)
    {
        try {


            $conexao = Conexao::getInstance();

            $stmt = $conexao->prepare("SELECT * FROM usuario WHERE login = :login");

            $stmt->bindParam(":login", $login);

            $stmt->execute();

            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($resultado) {

                $usuario = new Usuario($resultado["id"], $resultado["nome"], $resultado["login"], $resultado["senha"]);

                if (Bcrypt::check($senha, $usuario->getSenha())) {
                    $_SESSION['id_usuario'] = $usuario->getId();
                    $_SESSION['nome_usuario'] = $usuario->getNome();
                    $_SESSION['login_usuario'] = $usuario->getLogin();

                    header("Location: ../index.php");
                } else {
                    $_SESSION['mensagem'] = 'Senha incorreta';
                    return false;
                }
            } else {
                $_SESSION['mensagem'] = 'Usuário não encontrado';
                return false;
            }
        } catch (PDOException $e) {
            echo "Erro ao buscar a usuario: " . $e->getMessage();
        }
    }
    public function logout()
    {
    }
    public function findAll()
    {

        $conexao = Conexao::getInstance();

        $stmt = $conexao->prepare("SELECT * FROM usuario");

        $stmt->execute();
        $usuarios = array();

        while ($usuario = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $usuarios[] = new Usuario($usuario["id"], $usuario["nome"], $usuario["login"]);
        }

        return $usuarios;
    }
    public function save(Usuario $usuario)
    {
        $conexao = Conexao::getInstance();

        $stmt = $conexao->prepare("INSERT INTO usuario (nome, login, senha) VALUES (:nome, :login, :senha)");
        var_dump($usuario);
        $stmt->bindParam(":nome", $usuario->getNome());
        $stmt->bindParam(":login", $usuario->getLogin());
        $stmt->bindParam(":senha", Bcrypt::hash($usuario->getSenha()));

        $stmt->execute();

        $usuario = $this->findById($conexao->lastInsertId());

        return $usuario;
    }
    public function update(Usuario $usuario)
    {
        $conexao = Conexao::getInstance();

        var_dump($usuario);
        if ($usuario->getSenha() == null) {
            $stmt = $conexao->prepare("UPDATE usuario SET nome = :nome, login = :login WHERE id = :id");
        } else {
            $stmt = $conexao->prepare("UPDATE usuario SET nome = :nome, login = :login, senha = :senha WHERE id = :id");
            $stmt->bindParam(":senha", Bcrypt::hash($usuario->getSenha()));
        }

        $stmt->bindParam(":nome", $usuario->getNome());
        $stmt->bindParam(":login", $usuario->getLogin());
        $stmt->bindParam(":id", $usuario->getId());

        $stmt->execute();

        $usuario = $this->findById($conexao->lastInsertId());

        return $usuario;
    }
    public function delete($id)
    {
        try {
            $conexao = Conexao::getInstance();
            $usuario = $this->findById($id);
            if ($_SESSION["login"] != $usuario->getLogin()) {
                // Excluir o usuario
                $stmt = $conexao->prepare("DELETE FROM usuario WHERE id = :id");
                $stmt->bindParam(":id", $id);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    $_SESSION['mensagem'] = 'Usuário excluído com sucesso!';
                    return true;
                } else {
                    $_SESSION['mensagem'] = 'O usuário não foi encontrado.';
                    return false;
                }
            } else {
                $_SESSION['mensagem'] = 'Não é possível excluir o usuário que está logado...';
                return false;
            }
        } catch (PDOException $e) {
            $_SESSION['mensagem'] = 'Erro ao excluir o usuário: ' . $e->getMessage();
            return false;
        }
    }
    public function findById($id)
    {
        try {
            $conexao = Conexao::getInstance();

            $stmt = $conexao->prepare("SELECT * FROM usuario WHERE id = :id");

            $stmt->bindParam(":id", $id);

            $stmt->execute();

            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

            $usuario = new Usuario($resultado["id"], $resultado["nome"], $resultado["login"]);


            return $usuario;
        } catch (PDOException $e) {
            echo "Erro ao buscar a usuario: " . $e->getMessage();
        }
    }
}
