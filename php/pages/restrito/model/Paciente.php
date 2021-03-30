<?php

    class Paciente{

    private  $cpf;
    private  $nome;
    private  $dataNascimento;
    private  $telefone;
    private  $endereco;
    private  $email;

    function __construct($cpf,$nome,$dataNascimento,$telefone,$endereco,$email)
    {
        $this->setCpf(strtoupper($cpf));
        $this->setNome(strtoupper($nome));
        $this->setDataNascimento(strtoupper($dataNascimento));
        $this->setTelefone(strtoupper($telefone));
        $this->setEndereco(strtoupper($endereco));
        $this->setEmail(strtoupper($email));
      
    }

    public function setCpf(String $cpf)
    {
        $this->cpf=$cpf;
    }

    public function getCpf()
    {
       return $this->cpf;
    }

    public function setNome(String $nome)
    {
        $this->nome=$nome;
    }

    public function getNome()
    {
       return $this->nome;
    }

    public function setDataNascimento(String $dataNascimento)
    {
        $this->dataNascimento=$dataNascimento;
    }

    public function getDataNascimento()
    {
       return $this->dataNascimento;
    }

    public function setTelefone(String $telefone)
    {
        $this->telefone=$telefone;
    }

    public function getTelefone()
    {
       return $this->telefone;
    }

    public function setEndereco(String $endereco)
    {
        $this->endereco=$endereco;
    }

    public function getEndereco()
    {
       return $this->endereco;
    }

    public function setEmail(String $email)
    {
        $this->email=$email;
    }

    public function getEmail()
    {
       return $this->email;
    }





 }

?>