<?php
require_once 'controller/UsuarioController.php';
require_once 'controller/ImovelController.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário e Imóvel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <nav>
        <a href="index.php?page=usuario&action=listar">Gerenciar Usuários</a>
        <a href="index.php?page=imovel&action=listar">Gerenciar Imóveis</a>
    </nav>
    <?php 
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        $action = $_GET['action'] ?? '';
        
        if ($page == 'usuario') {
            if ($action == 'editar') {
                // Carrega o formulário de edição de usuário
                $usuario = call_user_func(array('UsuarioController', 'editar'), $_GET['id']);
                require_once 'view/cadUsuario.php';
            } elseif ($action == 'listar') {
                // Lista todos os usuários cadastrados
                require_once 'view/listUsuario.php';
            } elseif ($action == 'excluir') {
                // Exclui um usuário
                call_user_func(array('UsuarioController', 'excluir'), $_GET['id']);
                require_once 'view/listUsuario.php';
            } else {
                // Página padrão para cadastro de usuário
                require_once 'view/cadUsuario.php';
            }
        } elseif ($page == 'imovel') {
            if ($action == 'editar') {
                // Carrega o formulário de edição de imóvel
                $imovel = call_user_func(array('ImovelController', 'editar'), $_GET['id']);
                require_once 'view/cadImovel.php';
            } elseif ($action == 'listar') {
                // Lista todos os imóveis cadastrados
                require_once 'view/listImovel.php';
            } elseif ($action == 'excluir') {
                // Exclui um imóvel
                call_user_func(array('ImovelController', 'excluir'), $_GET['id']);
                require_once 'view/listImovel.php';
            } else {
                // Página padrão para cadastro de imóvel
                require_once 'view/cadImovel.php';
            }
        }
    } else {
        // Caso nenhum parâmetro seja passado, exibe o formulário de cadastro de usuário por padrão
        require_once 'view/cadUsuario.php';
    }
    ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
