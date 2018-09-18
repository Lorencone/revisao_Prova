<?php
include_once 'Marca.php';

$marca = new Marca();

switch ($_GET['acao']){
    case 'salvar':

        if(!empty($_POST['id_marca'])){
            $marca->alterar($_POST);
        } else {
            $marca->inserir($_POST);
        }
        break;
    case 'excluir':
        $marca->excluir($_GET['id_marca']);
        break;
}

header('location: index.php');