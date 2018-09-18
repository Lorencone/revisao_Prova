<?php
include_once 'Modelo.php';

$modelo = new Modelo();

switch ($_GET['acao']){
    case 'salvar':

        if(!empty($_POST['id_modelo'])){
            $modelo->alterar($_POST);
        } else {
            $modelo->inserir($_POST);
        }
        break;
    case 'excluir':
        $modelo->excluir($_GET['id_modelo']);
        break;
    case 'procurarMarca':
        $modelos = $modelo->procurarMarca($_GET['id_marca']);

        foreach ($modelos as $amodelos) {
            echo "<option value='{$amodelos['id_modelo']}'>{$amodelos['nome']}</option>";
        }
        die;
        break;
}

header('location: index.php');