<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
</head>
<body>
<form name="cadUsuario" id="cadUsuario" action="" method="post">
        <label for="login">Login: </label>
        <input type="text" class="form-control col-sm-8" name="login" id="login"
        value="<?php echo isset($usuario)?$usuario->getLogin():''?>"><br/>
        <label for="Senha1">Senha: </label>
        <input type="password" class="form-control col-sm-8" name ="senha1" id="senha1"
        value="<?php echo isset($usuario)?$usuario->getSenha():''?>"><br/>
        <label for="senha2">Confirmação da Senha: </label>
        <input type="password" name="senha2" id="senha2"><br/>
        <label for="permissao">Tipos de permissão</label>
        <select name="permissao" id="permissao">
            <option value="0">**SELECIONE**</option>
            <option value="A" <?php echo isset($usuario) && $usuario->getPermissao()=='A'?'selected':'' ?>>Administrador</option>
            <option value="C" <?php echo isset($usuario) && $usuario->getPermissao()=='A'?'selected':'' ?>>Comum</option>
        </select><br/><br/>
        <input type="hidden" name="id" id="id"
        value="<?php echo isset($usuario)?$usuario->getId():''; ?>"/>
        <input type="submit" name="btnSalvar" id="btnSalvar"/>
    </form>
</body>
</html>

<?php
if(isset($_POST['btnSalvar'])){
    require_once 'controller/UsuarioController.php';
    call_user_func(array('UsuarioController','salvar'));
    header('Location: index.php?page=usuario&action=listar');
}
?>