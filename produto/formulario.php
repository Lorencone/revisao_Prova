<?php
include_once "../Conexao.php";

include_once "../cabecalho.php";

include_once "Produto.php";
$produto = new Produto();

include_once "../marca/Marca.php";
$marcas = new Marca();
// Recuperando os dados da marca
$amarcas = $marcas->recuperarDados();

include_once "../modelo/Modelo.php";
$modelos = new Modelo();
// Recuperando os dados da marca
$amodelos = $modelos->recuperarDados();

if (!empty($_GET['id_produto'])) {
    $produto->carregarPorId($_GET['id_produto']);
}
?>

<div class="panel box-shadow-none content-header">
    <div class="panel-body">
        <div class="col-md-12">
            <h3 class="animated fadeInLeft"><span class="fa fa-users"></span> Produtos</h3>
        </div>
    </div>
</div>
<div class="col-md-offset-1 col-md-10 panel">
    <div id="mensagem" role="alert"></div>
    <div class="col-md-12 panel-body" style="padding-bottom:30px;">
        <!--Primeira coluna do Formulário  -->
        <form enctype="multipart/form-data" action="processamento.php?acao=salvar" method="post" class="form-horizontal">
            <div class="col-md-6">
                <!-- ID do produto -->
                <input type="hidden" name="id_produto" value="<?=$produto->getId_produto();?>">
                <!-- Nome -->
                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    <input type="text" class="form-text" id="nome" name="nome" required
                           value="<?=$produto->getNome(); ?>">
                    <div id="mensagemNome" role="alert"></div>
                    <span class="bar"></span>
                    <label> <i class="fa fa-user"></i> Nome</label>
                </div>
                <!-- Valor -->
                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    <input type="text" class="form-text" id="valor" name="valor" required
                           value="<?= $produto->getValor(); ?>">
                    <span class="bar"></span>
                    <label> <i class="icons icon-credit-card"></i> Valor</label>
                </div>
                <!-- Descricao -->
                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    <input type="text" class="form-text" id="descricao" name="descricao" required
                           value="<?= $produto->getDescricao(); ?>">
                    <span class="bar"></span>
                    <label> <i class="fa fa-sort-numeric-asc"></i> Descrição</label>
                </div>
            </div>
            <!--Segunda coluna do Formulário  -->
            <div class="col-md-6">
                <!-- Marca -->
                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    <select class="form-text" id="id_marca" name="id_marca">
                        <option>Selecione</option>
                        <?php
                        foreach ($amarcas as $marca) { ?>

                            <option value="<?= $marca['id_marca']?>" <?php ($produto->getId_marca() == $marca['id_marca'])? "selected" : null; ?>><?= $marca['nome'] ?></option>

                        <?php } ?>
                    </select>
                    <span class="bar"></span>
                    <label> <i class="fa fa-sort-numeric-asc"></i> Marca</label>
                </div>
                <!-- Id do Modelo -->
                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    <select class="form-text" id="id_modelo" name="id_modelo">
                        <option>Selecione</option>
                        <?php
                        foreach ($amodelos as $modelo) { ?>

                            <option value="<?= $modelo['id_modelo'] ?>" <?php ($produto->getId_modelo() == $modelo['id_modelo'])? "selected" : null; ?>>><?= $modelo['nome'] ?></option>

                        <?php } ?>
                    </select>
                    <span class="bar"></span>
                    <label> <i class="fa fa-sort-numeric-asc"></i> Modelo</label>
                </div>
                <!-- Foto -->
                <div class="form-group" style="margin-top:40px !important;">
                    <label> <i class="fa fa-file-photo-o"></i> Foto</label>
                    <input type="file" class="form-text" id="foto" name="foto" required value="<?= $produto->getFoto(); ?>">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success"><span class="fa fa-thumbs-o-up"> </span> Salvar
                        </button>
                        <a class="btn btn-danger" href="index.php"><span class="fa fa-reply"> </span> Voltar</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
include_once "../rodape.php";
?>

<script>
    $(function () {

        $('#id_marca').change(function () {

            $('#id_modelo').load('../Modelo/processamento.php?acao=procurarMarca&id_marca=' + $('#id_marca').val());

        })

    })
</script>