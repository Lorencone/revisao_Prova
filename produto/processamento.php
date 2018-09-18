<?php
include_once 'Produto.php';

$produto = new Produto();

switch ($_GET['acao']){
    case 'salvar':

        if(!empty($_POST['id_produto'])){
            $produto->alterar($_POST);
        } else {
            $produto->inserir($_POST);
        }
        break;
    case 'excluir':
        $produto->excluir($_GET['id_produto']);
        break;
}

header('location: index.php');