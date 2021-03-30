<?php



class ProdutoDAO
{





    public function consultaTodosProdutos($host, $dbname, $user, $password)
    {

        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

        $stmt = $pdo->prepare(" select codigo , nome , valor from produto");

        $stmt->execute();

        $lista = $stmt->fetchAll();

        return $lista;
    }

    public function consultaUmProduto($host, $dbname, $user, $password, $codigo)
    {

        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

        $stmt = $pdo->prepare(" select codigo , nome , valor from produto where codigo = :a  ");


        $stmt->bindVAlue(':a', $codigo);

        $stmt->execute();

        $resultado = $stmt->fetchAll();

        return $resultado;
    }


    public function consultaNomeProduto($host, $dbname, $user, $password, $nomeBusca)
    {

        $pdo = new PDO("mysql:host=$host;dbname=$dbname",$user,$password);
                           
        $stmt = $pdo->prepare(" select codigo , nome , valor  from produto where nome like :a  ");
        
        $nomeBusca="%".$nomeBusca."%";

        $stmt->bindVAlue(':a',$nomeBusca);
 
        $stmt->execute();

        $lista = $stmt->fetchAll();
         
        return $lista;
    }

    public function createProduto($host, $dbname, $user, $password, $produto)
    {


        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

        $stmt = $pdo->prepare(" insert into produto ( codigo , nome , valor ) values  ( :a , :b , :c )  ");

        
        $codigo =  $produto->getCodigo();
        $nome =  $produto->getNome();
        $valor = $produto->getValor();
        

        
        // echo ($codigo);
        // echo ($nome);
        // echo ($valor);
        

        $stmt->bindVAlue(':a', $codigo);
        $stmt->bindVAlue(':b', $nome);
        $stmt->bindVAlue(':c', $valor);

        $stmt->execute();
    }

    public function deleteProduto($host, $dbname, $user, $password,$produto)
    {

        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

        $stmt = $pdo->prepare(" delete from produto where codigo = :a  ");

        
        $codigo =  $produto->getCodigo();
        

         //echo ($cpf);
       

        $stmt->bindVAlue(':a', $codigo);
        
        $stmt->execute();
    }

    public function updateProduto($host, $dbname, $user, $password, $produto)
    {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

        $stmt = $pdo->prepare(" update produto set codigo = :a , nome = :b , valor = :c where codigo = :c ");

        $codigo =  $produto->getCodigo();
        $nome =  $produto->getNome();
        $valor = $produto->getValor();
       
        $stmt->bindVAlue(':a', $codigo);
        $stmt->bindVAlue(':b', $nome);
        $stmt->bindVAlue(':c', $valor);
       

        $stmt->execute();


        
    }

}

