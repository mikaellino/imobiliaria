<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Imóvel</title>
</head>
<body>
    <form name="cadImovel" id="cadImovel" action="" method="post">
        <label for="descricao">Descrição: </label>
        <!-- Campo para inserir a descrição do imóvel -->
        <input type="text" name="descricao" id="descricao" value="<?php echo isset($imovel) ? $imovel->getDescricao() : ''; ?>"><br/>
        
        <label for="foto">Foto: </label>
        <!-- Campo para inserir a URL da foto do imóvel -->
        <input type="text" name="foto" id="foto" value="<?php echo isset($imovel) ? $imovel->getFoto() : ''; ?>"><br/>
        
        <label for="valor">Valor: </label>
        <!-- Campo para inserir o valor do imóvel -->
        <input type="number" step="0.01" name="valor" id="valor" value="<?php echo isset($imovel) ? $imovel->getValor() : ''; ?>"><br/>
        
        <label for="tipo">Tipo: </label>
        <!-- Seleção do tipo de imóvel: Apartamento ou Casa -->
        <select name="tipo" id="tipo">
            <option value="0">**SELECIONE**</option>
            <option value="A" <?php echo isset($imovel) && $imovel->getTipo() == 'A' ? 'selected' : ''; ?>>Apartamento</option>
            <option value="C" <?php echo isset($imovel) && $imovel->getTipo() == 'C' ? 'selected' : ''; ?>>Casa</option>
        </select><br/><br/>
        
        <!-- Campo oculto para armazenar o ID do imóvel -->
        <input type="hidden" name="id" id="id" value="<?php echo isset($imovel) ? $imovel->getId() : ''; ?>"/>
        
        <input type="submit" name="btnSalvar" id="btnSalvar"/>
    </form>
</body>
</html>

<?php
if (isset($_POST['btnSalvar'])) {
    require_once 'controller/ImovelController.php';
    // Chama o método salvar do controlador
    call_user_func(array('ImovelController', 'salvar'));
    // Redireciona para a página de listagem de imóveis
    header('Location: index.php?page=imovel&action=listar');
}
?>