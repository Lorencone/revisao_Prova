<?php
include_once("../Conexao.php");

class Marca{

    protected $id_marca;
    protected $nome;


    public function getId_marca()
    {
        return $this->id_marca;
    }


    public function setId_marca($id_marca)
    {
        $this->id_marca = $id_marca;

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

    public function recuperarDados()
    {
        $conexao = new Conexao();

        $sql = "select * from marca";
        return $conexao->recuperarDados($sql);
    }

    public function carregarPorId($id_marca)
    {
        $conexao = new Conexao();

        $sql = "select * from marca WHERE  id_marca = $id_marca";

        $dados = $conexao->recuperarDados($sql);

        $this->id_marca = $dados[0]['id_marca'];
        $this->nome = $dados[0]['nome'];

    }

    public function inserir($dados)
    {
        $nome = $dados['nome'];

        $conexao = new Conexao();

        $sql = "insert into marca (nome) values ('$nome')";

        return $conexao->executar($sql);
    }

    public function alterar($dados)
    {
        $id_marca = $dados['id_marca'];
        $nome = $dados['nome'];

        $conexao = new Conexao();

        $sql = "update marca set

                nome = '$nome'
                        
                where id_marca = '$id_marca'";

        return $conexao->executar($sql);
    }

    public function excluir($id_marca)
    {
        $conexao = new Conexao();

        $sql = "delete from marca where id_marca = $id_marca";
        return $conexao->executar($sql);
    }

}