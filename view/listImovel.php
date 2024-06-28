<h1>Imóveis</h1>
<hr>
<div>
    <table>
        <thead>
            <tr>
                <th>Descrição</th>
                <th>Foto</th>
                <th>Valor</th>
                <th>Tipo</th>
                <th><a href="index.php?page=imovel&action=cadastrar">Novo</a></th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Inclui o controlador de Imóveis
            require_once 'controller/ImovelController.php';
            // Chama o método listar do controlador para obter a lista de imóveis
            $imoveis = call_user_func(array('ImovelController', 'listar'));
            // Verifica se há imóveis para exibir
            if (isset($imoveis) && !empty($imoveis)) {
                foreach ($imoveis as $imovel) {
                    ?>
                    <tr>
                        <td><?php echo $imovel->getDescricao(); ?></td>
                        <td><?php echo $imovel->getFoto(); ?></td>
                        <td><?php echo $imovel->getValor(); ?></td>
                        <td><?php echo $imovel->getTipo() == 'A' ? 'Apartamento' : 'Casa'; ?></td>
                        <td>
                            <a href="index.php?page=imovel&action=editar&id=<?php echo $imovel->getId(); ?>">Editar</a>
                            <a href="index.php?page=imovel&action=excluir&id=<?php echo $imovel->getId(); ?>">Excluir</a>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="5">Nenhum registro encontrado</td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>