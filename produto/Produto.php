<?php
include_once("../Conexao.php");

class Produto{

    protected $id_produto;
    protected $nome;
    protected $valor;
    protected $descricao;
    protected $Id_produto;
    protected $id_modelo;
    protected $id_marca;

    public function getId_produto()
    {
        return $this->id_produto;
    }


    public function setId_produto($id_produto)
    {
        $this->id_produto = $id_produto;

        return $this;
    }


    public function getNome()
    {
        return $this->nome;
    }


    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }


    public function getValor()
    {
        return $this->valor;
    }


    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }


    public function getDescricao()
    {
        return $this->descricao;
    }


    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }


    public function getfoto()
    {
        return $this->foto;
    }


    public function setfoto($foto)
    {
        $this->foto = $foto;

        return $this;
    }

    public function getId_modelo()
    {
        return $this->id_modelo;
    }


    public function setId_modelo($id_modelo)
    {
        $this->id_modelo = $id_modelo;

        return $this;
    }

    public function getId_marca()
    {
        return $this->id_marca;
    }

    public function setId_marca($id_marca)
    {
        $this->id_marca = $id_marca;
    }

    public function recuperarDados()
    {
        $conexao = new Conexao();

        $sql = "select * from produto";
        return $conexao->recuperarDados($sql);
    }

    public function carregarPorId($id_produto)
    {
        $conexao = new Conexao();

        $sql = "select * from produto WHERE  id_produto = $id_produto";
        
        $dados = $conexao->recuperarDados($sql);

        $this->id_produto = $dados[0]['id_produto'];
        $this->nome = $dados[0]['nome'];
        $this->valor = $dados[0]['valor'];
        $this->descricao = $dados[0]['descricao'];
        $this->foto = $dados[0]['foto'];
        $this->id_modelo = $dados[0]['id_modelo'];
        $this->id_marca = $dados[0]['id_marca'];

    }

    public function inserir($dados)
    {
        $nome = $dados['nome'];
        $valor = $dados['valor'];
        $descricao = $dados['descricao'];
        $foto = $_FILES['foto']['name'];
        $id_modelo = $dados['id_modelo'];
        $id_marca = $dados['id_marca'];

        $this->uploadFoto();

        $conexao = new Conexao();

        $sql = "insert into produto (nome, valor, descricao,
                                     foto, id_modelo, id_marca)
                            values ('$nome', '$valor', '$descricao',
                            '$foto', '$id_modelo', '$id_marca')";

        return $conexao->executar($sql);
    }

    public function alterar($dados)
    {
        $id_produto = $dados['id_produto'];
        $nome = $dados['nome'];
        $valor = $dados['valor'];
        $descricao = $dados['descricao'];
        $foto = $_FILES['foto']['name'];
        $id_modelo = $dados['id_modelo'];
        $id_marca = $dados['id_marca'];

        $this->uploadFoto();

        $conexao = new Conexao();

        $sql = "update produto set
        nome = '$nome',
        valor = '$valor',
        descricao = '$descricao',
        foto =  '$foto',
        id_modelo = '$id_modelo',
        id_marca = '$id_marca'        
        where id_produto = '$id_produto'";

//        print_r("$sql");
//        die;

        return $conexao->executar($sql);
    }

    public function excluir($id_produto)
    {
        $conexao = new Conexao();

        $sql = "delete from produto where id_produto = $id_produto";
        return $conexao->executar($sql);
    }

    public function uploadFoto(){
        if ($_FILES['foto']['error'] == UPLOAD_ERR_OK){

            $origem = $_FILES['foto']['tmp_name'];
            $destino = '../upload/produto/' . $_FILES['foto']['name'];
            move_uploaded_file($origem, $destino);
        }
    }
}