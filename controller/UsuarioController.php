<?php
require_once 'model/Usuario.php';

class UsuarioController {
    // Método para salvar um usuário
    public static function salvar() {
        $usuario = new Usuario();
        $usuario->setId($_POST['id']);
        $usuario->setLogin($_POST['login']);
        $usuario->setSenha($_POST['senha1']); // Usando senha1 do formulário
        $usuario->setPermissao($_POST['permissao']);
        $usuario->save();
    }
    
    // Método para listar todos os usuários
    public static function listar() {
        $usuarios = new Usuario();
        return $usuarios->listAll();
    }
    
    // Método para editar um usuário pelo ID
    public static function editar($id) {
        $usuario = new Usuario();
        return $usuario->find($id);
    }
    
    // Método para excluir um usuário pelo ID
    public static function excluir($id) {
        $usuario = new Usuario();
        $usuario->remove($id);
    }
    
    // Método para buscar um usuário pelo login
    public static function buscarPorLogin($login) {
        $usuario = new Usuario();
        return $usuario->findByLogin($login);
    }
}
?>