<?php



class PacienteDAO
{





    public function consultaTodosPacientes($host, $dbname, $user, $password)
    {

        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

        $stmt = $pdo->prepare(" select cpf , nome , dataNascimento , telefone , endereco , email from paciente");

        $stmt->execute();

        $lista = $stmt->fetchAll();

        return $lista;
    }

    public function consultaUmPaciente($host, $dbname, $user, $password, $cpf)
    {

        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

        $stmt = $pdo->prepare(" select cpf , nome , dataNascimento , telefone , endereco , email from paciente where cpf = :a  ");


        $stmt->bindVAlue(':a', $cpf);

        $stmt->execute();

        $resultado = $stmt->fetchAll();

        return $resultado;
    }


    public function consultaNomePaciente($host, $dbname, $user, $password, $nomeBusca)
    {

        $pdo = new PDO("mysql:host=$host;dbname=$dbname",$user,$password);
                           
        $stmt = $pdo->prepare(" select cpf , nome , dataNascimento , telefone , endereco , email from paciente where nome like :a  ");
        
        $nomeBusca="%".$nomeBusca."%";

        $stmt->bindVAlue(':a',$nomeBusca);
 
        $stmt->execute();

        $lista = $stmt->fetchAll();
         
        return $lista;
    }

    public function createPaciente($host, $dbname, $user, $password, $paciente)
    {


        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

        $stmt = $pdo->prepare(" insert into paciente ( cpf , nome , dataNascimento , telefone , endereco , email ) values  ( :a , :b , :c , :d , :e , :f )  ");

        
        $cpf =  $paciente->getCpf();
        $nome =  $paciente->getNome();
        $dataNascimento = $paciente->getDataNascimento();
        $telefone =  $paciente->getTelefone();
        $endereco =  $paciente->getEndereco();
        $email = $paciente->getEmail();

        // echo ($cpf);
        // echo ($nome);
        // echo ($dataNascimento);
        // echo ($telefone);
        // echo ($endereco);
        // echo ($email);

        $stmt->bindVAlue(':a', $cpf);
        $stmt->bindVAlue(':b', $nome);
        $stmt->bindVAlue(':c', $dataNascimento);
        $stmt->bindVAlue(':d', $telefone);
        $stmt->bindVAlue(':e', $endereco);
        $stmt->bindVAlue(':f', $email);

        $stmt->execute();
    }

    public function deletePaciente($host, $dbname, $user, $password,$paciente)
    {

        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

        $stmt = $pdo->prepare(" delete from paciente where cpf = :a  ");

        
        $cpf =  $paciente->getCpf();
        

         //echo ($cpf);
       

        $stmt->bindVAlue(':a', $cpf);
        
        $stmt->execute();
    }

    public function updatePaciente($host, $dbname, $user, $password, $paciente)
    {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

        $stmt = $pdo->prepare(" update paciente set cpf = :a , nome = :b , dataNascimento = :c , telefone = :d , endereco = :e , email = :f where cpf = :g ");

        $cpf =  $paciente->getCpf();
        $nome =  $paciente->getNome();
        $dataNascimento = $paciente->getDataNascimento();
        $telefone =  $paciente->getTelefone();
        $endereco =  $paciente->getEndereco();
        $email = $paciente->getEmail();

        $stmt->bindVAlue(':a', $cpf);
        $stmt->bindVAlue(':b', $nome);
        $stmt->bindVAlue(':c', $dataNascimento);
        $stmt->bindVAlue(':d', $telefone);
        $stmt->bindVAlue(':e', $endereco);
        $stmt->bindVAlue(':f', $email);
        $stmt->bindVAlue(':g', $cpf);

        $stmt->execute();


        
    }

}

