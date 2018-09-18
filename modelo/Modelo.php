<?php
include_once("../Conexao.php");

class Modelo{

    protected $id_modelo;
    protected $nome;
    protected $id_marca;

    public function getId_modelo()
    {
        return $this->id_modelo;
    }


    public function setId_modelo($id_modelo)
    {
        $this->id_modelo = $id_modelo;

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

    public function getId_marca()
    {
        return $this->id_marca;
    }


    public function setId_marca($id_marca)
    {
        $this->id_marca = $id_marca;

        return $this;
    }

    public function recuperarDados()
    {
        $conexao = new Conexao();

        $sql = "select * from modelo";
        return $conexao->recuperarDados($sql);
    }

    public function carregarPorId($id_modelo)
    {
        $conexao = new Conexao();

        $sql = "select * from modelo WHERE  id_modelo = $id_modelo";
        
        $dados = $conexao->recuperarDados($sql);

        $this->id_modelo = $dados[0]['id_modelo'];
        $this->nome = $dados[0]['nome'];
        $this->id_marca = $dados[0]['id_marca'];

    }

    public function procurarMarca($id_marca){

        $conexao = new Conexao();

        $sql = "select * from modelo where id_marca = '$id_marca'";
        return $conexao->recuperarDados($sql);
    }

    public function inserir($dados)
    {
        $nome = $dados['nome'];
        $id_marca = $dados['id_marca'];

        $sql = "insert into modelo (nome, id_marca)
                            values ('$nome','$id_marca')";

        $conexao = new Conexao();

        return $conexao->executar($sql);
    }

    public function alterar($dados)
    {
        $id_modelo = $dados['id_modelo'];
        $nome = $dados['nome'];
        $id_marca = $dados['id_marca'];

        $conexao = new Conexao();

        $sql = "update modelo set
        nome = '$nome',       
        id_marca = '$id_marca'
        
        where id_modelo = '$id_modelo'";

        return $conexao->executar($sql);
    }

    public function excluir($id_modelo)
    {
        $conexao = new Conexao();

        $sql = "delete from modelo where id_modelo = $id_modelo";
        return $conexao->executar($sql);
    }

}