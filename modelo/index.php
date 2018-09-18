<?php
// Incluindo a classe de eleitor
include_once 'Modelo.php';


$modelos = new Modelo();
// Recuperando os dados de eleitores
$amodelos = $modelos->recuperarDados();

include_once "../marca/Marca.php";
$marcas = new Marca();
// Recuperando os dados da marca
$amarcas = $marcas->recuperarDados();

// Incluindo o incio da aplicação
include_once '../cabecalho.php';
?>
    <div class="panel box-shadow-none content-header">
        <div class="panel-body">
            <div class="col-md-12">
                <h3 class="animated fadeInLeft">Modelos</h3>
            </div>
        </div>
    </div>

    <div class="col-md-12 top-20 padding-0">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <a class="btn btn-warning" href="formulario.php">Novo</a>
                </div>
                <div class="panel-body">
                    <div class="responsive-table">

                        <table id="datatables-example" class="table table-bordered table-hover table-striped table-condensed">
                            <thead>
                            <tr>
                                <th colspan="2" width="5%">Ações</th>
                                <th>Nome</th>
                                <th>Marca</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($amodelos as $modelo) {?>
                                <tr>
                                    <td>
                                        <a href='formulario.php?id_modelo=<?=$modelo['id_modelo']?>'><span class='icons icon-note'></span></a>
                                    </td>
                                    <td>
                                        <a href='processamento.php?acao=excluir&id_modelo=<?=$modelo['id_modelo']?>'><span class='fa fa-trash-o'></span></a>
                                    </td>
                                    <td><?=$modelo['nome'];?></td>
                                    <td><?=$modelo['id_marca'];?></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
// Incluindo o termino da aplciação
include_once '../rodape.php';
?>