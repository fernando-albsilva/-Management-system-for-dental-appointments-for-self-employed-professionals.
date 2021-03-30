<?php

require_once ('../connection/connection.php'); 
require_once ('../DAO/ProdutoDAO.php'); 

    

    if(!isset($_GET['nomeBusca']))
    {
       $produtoDAO = new \ProdutoDao; 
       $lista = $produtoDAO->consultaTodosProdutos($host,$dbname,$user,$password);
        
         

    }else{
        $produtoDAO = new \ProdutoDao; 
        $lista = $produtoDAO->consultaNomeProduto($host,$dbname,$user,$password,$_GET['nomeBusca']);
    
    }