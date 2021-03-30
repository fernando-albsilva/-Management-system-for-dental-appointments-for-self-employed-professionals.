<?php

    class Produto{

    private $codigo;
    private  $nome;
    private  $valor;
   

    function __construct($codigo,$nome,$valor)
    {
        $this->setCodigo($codigo);
        $this->setNome(strtoupper($nome));
        $this->setValor(strtoupper($valor));
    }


    public function setCodigo(String $codigo)
    {
        $this->codigo=$codigo;
    }

    public function getCodigo()
    {
       return $this->codigo;
    }
    public function setNome(String $nome)
    {
        $this->nome=$nome;
    }

    public function getNome()
    {
       return $this->nome;
    }

    
    public function setValor(String $valor)
    {
        $this->valor=$valor;
    }

    public function getValor()
    {
       return $this->valor;
    }


 }

?>