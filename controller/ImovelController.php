<?php
require_once 'model/Imovel.php';

class ImovelController {
    // Método para salvar um imóvel
    public static function salvar() {
        $imovel = new Imovel();
        $imovel->setId($_POST['id']);
        $imovel->setDescricao($_POST['descricao']);
        $imovel->setFoto($_POST['foto']);
        $imovel->setValor($_POST['valor']);
        $imovel->setTipo($_POST['tipo']);
        $imovel->save();
    }
    
    // Método para listar todos os imóveis
    public static function listar() {
        $imoveis = new Imovel();
        return $imoveis->listAll();
    }
    
    // Método para editar um imóvel pelo ID
    public static function editar($id) {
        $imovel = new Imovel();
        return $imovel->find($id);
    }
    
    // Método para excluir um imóvel pelo ID
    public static function excluir($id) {
        $imovel = new Imovel();
        $imovel->remove($id);
    }
    
    // Método adicional para obter um imóvel pelo ID
    public static function obter($id) {
        $imovel = new Imovel();
        return $imovel->find($id);
    }
}
?>