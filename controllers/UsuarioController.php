<?php
require_once "../models/Usuario.php";
require_once "../models/Conexao.php";

class UsuarioController
{
    public function login($login, $senha)
{
    try {
        $conexao = Conexao::getInstance();
        
        $stmt = $conexao->prepare("SELECT * FROM usuario WHERE login = :login");

        $stmt->bindParam(":login", $login);

        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario != null) {
            // Verificar se a senha informada é válida
            if (password_verify($senha, $usuario['senha'])) {
                // Credenciais válidas, definir o nome do usuário na sessão
                session_start();
                $_SESSION["usuario"] = $login;

                // Redirecionar para a página inicial
                header("Location: ../index.php");
                exit();
            } else {
                // Senha inválida
                echo "Senha inválida. Por favor, tente novamente.";
            }
        } else {
            // Usuário não encontrado
            echo "Usuário não encontrado. Por favor, tente novamente.";
        }
    } catch (PDOException $e) {
        echo "Erro ao realizar o login: " . $e->getMessage();
    }
}



    public function logout()
    {
        session_start();
        unset($_SESSION["usuario"]);
        header("Location: ../index.php");
    }

    public function findAll()
    {
        $conexao = Conexao::getInstance();

        $stmt = $conexao->prepare("SELECT * FROM usuario");

        $stmt->execute();

        $usuarios = array();

        while ($usuario = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $usuarios[] = new Usuario($usuario["id"], $usuario["nome"], $usuario["login"], $usuario["senha"]);
            
        }

        return $usuarios;
    }

    public function save(Usuario $usuario)
    {
        // Implemente a lógica para salvar um usuário no banco de dados
        $conexao = Conexao::getInstance();
    
        $stmt = $conexao->prepare("INSERT INTO usuario (nome, login, senha) VALUES (:nome, :login, :senha)");
    
        $stmt->bindParam(":nome", $usuario->getNome());
        $stmt->bindParam(":login", $usuario->getLogin());
    
        // Criptografar a senha usando password_hash()
        $senhaCriptografada = password_hash($usuario->getSenha(), PASSWORD_DEFAULT);
        $stmt->bindParam(":senha", $senhaCriptografada);
    
        $stmt->execute();
    
        $usuario = $this->findById($conexao->lastInsertId());
    
        return $usuario;
    }



    public function update(Usuario $usuario)
{
    // Implemente a lógica para atualizar um usuário no banco de dados
    $conexao = Conexao::getInstance();

    $stmt = $conexao->prepare("UPDATE usuario SET nome = :nome, login = :login, senha = :senha WHERE id = :id");

    $stmt->bindParam(":nome", $usuario->getNome());
    $stmt->bindParam(":login", $usuario->getLogin());
    
    // Verifique se a senha foi fornecida antes de atualizá-la
    if (!empty($usuario->getSenha())) {
        $senhaCriptografada = password_hash($usuario->getSenha(), PASSWORD_DEFAULT);
        $stmt->bindParam(":senha", $senhaCriptografada);
    } else {
        // Mantenha a senha existente se não for fornecida uma nova senha
        $senhaAtual = $this->findById($usuario->getId())->getSenha();
        $stmt->bindParam(":senha", $senhaAtual);
    }

    $stmt->bindParam(":id", $usuario->getId());

    $stmt->execute();

    $usuarioAtualizado = $this->findById($usuario->getId());

    return $usuarioAtualizado;
}


    public function delete(Usuario $usuario)
    {
        // Implemente a lógica para excluir um usuário do banco de dados
    }

    public function findById($id)
    {
        try {
            $conexao = Conexao::getInstance();

            $stmt = $conexao->prepare("SELECT * FROM usuario WHERE id = :id");

            $stmt->bindParam(":id", $id);

            $stmt->execute();

            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($resultado) {
                $usuario = new Usuario($resultado["id"], $resultado["nome"], $resultado["login"], $resultado["senha"]);
                return $usuario;
            } else {
                echo "Usuário não encontrado.";
            }
        } catch (PDOException $e) {
            echo "Erro ao buscar o usuário: " . $e->getMessage();
        }
    }
}
