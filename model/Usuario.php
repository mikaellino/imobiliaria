<?php
require_once 'Banco.php';
require_once 'Conexao.php';

class Usuario extends Banco {
    private $id;
    private $login;
    private $senha;
    private $permissao;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getLogin() {
        return $this->login;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function getPermissao() {
        return $this->permissao;
    }

    public function setPermissao($permissao) {
        $this->permissao = $permissao;
    }

    // Método para salvar ou atualizar um usuário
    public function save() {
        $result = false;
        $conexao = new Conexao();
        $query = "INSERT INTO usuario (id, login, senha, permissao) VALUES (NULL, :login, :senha, :permissao)";

        if ($conn = $conexao->getConection()) {
            if ($this->id > 0) {
                // Atualiza um usuário existente
                $query = "UPDATE usuario SET login = :login, senha = :senha, permissao = :permissao WHERE id = :id";           
                $stmt = $conn->prepare($query);
                if ($stmt->execute(array(':id' => $this->id, ':login' => $this->login, ':senha' => $this->senha, ':permissao' => $this->permissao))) {
                    $result = $stmt->rowCount();
                }
            } else {
                // Insere um novo usuário
                $stmt = $conn->prepare($query);
                if ($stmt->execute(array(':login' => $this->login, ':senha' => $this->senha, ':permissao' => $this->permissao))) {
                    $result = $stmt->rowCount();
                }
            }
        }
        return $result;
    }

    // Método para remover um usuário pelo ID
    public function remove($id) {
        $result = false;
        $conexao = new Conexao();
        $conn = $conexao->getConection();
        $query = "DELETE FROM usuario WHERE id = :id";
        $stmt = $conn->prepare($query);
        if ($stmt->execute(array(':id' => $id))) {
            $result = true;
        }
        return $result;
    }

    // Método para encontrar um usuário pelo ID
    public function find($id) {
        $conexao = new Conexao();
        $conn = $conexao->getConection();
        $query = "SELECT * FROM usuario WHERE id = :id";
        $stmt = $conn->prepare($query);
        if ($stmt->execute(array(':id' => $id))) {
            if ($stmt->rowCount() > 0) {
                $result = $stmt->fetchObject(Usuario::class);
            } else {
                $result = false;
            }
        }
        return $result;
    }

    // Método para listar todos os usuários
    public function listAll() {
        $conexao = new Conexao();
        $conn = $conexao->getConection();
        $query = "SELECT * FROM usuario";
        $stmt = $conn->prepare($query);
        $result = array();
        if ($stmt->execute()) {
            while ($rs = $stmt->fetchObject(Usuario::class)) {
                $result[] = $rs;
            }
        } else {
            $result = false;
        }
        return $result;
    }

    // Método abstrato não implementado
    public function count() {
        // Implementação futura
    }
}
?>