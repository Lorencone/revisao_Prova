<?php
include_once "../Conexao.php";

include_once "../cabecalho.php";

include_once "../marca/Marca.php";
$marcas = new Marca();
// Recuperando os dados da marca
$amarcas = $marcas->recuperarDados();

include_once "Modelo.php";
$modelo = new Modelo();

if (!empty($_GET['id_modelo'])) {
    $modelo->carregarPorId($_GET['id_modelo']);
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
        <div class="col-md-12">
            <form enctype="multipart/form-data" action="processamento.php?acao=salvar" method="post" class="form-horizontal">
                <!-- ID do produto -->
                <input type="hidden" name="id_modelo" value="<?php echo $modelo->getid_modelo(); ?>">
                <!-- Nome -->
                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    <input type="text" class="form-text" id="nome" name="nome" required
                           value="<?php echo $modelo->getNome(); ?>">
                    <div id="mensagemNome" role="alert"></div>
                    <span class="bar"></span>
                    <label> <i class="fa fa-user"></i>Nome</label>
                </div
                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    <select class="form-text" id="id_marca" name="id_marca">
                    <option>Selecione</option>
                        <?php
                        foreach ($amarcas as $marca) { ?>
                            <option value="<?= $marca['id_marca']?>" <?php ($modelo->getId_marca() == $marca['id_marca'])? "selected" : null; ?>> <?= $marca['nome'] ?> </option>
                        <?php } ?>
                    </select>
                    <span class="bar"></span>
                    <label> <i class="fa fa-sort-numeric-asc"></i>Marca</label>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success"><span class="fa fa-thumbs-o-up"> </span> Salvar
                        </button>
                        <a class="btn btn-danger" href="index.php"><span class="fa fa-reply"> </span> Voltar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include_once "../rodape.php";
?>
