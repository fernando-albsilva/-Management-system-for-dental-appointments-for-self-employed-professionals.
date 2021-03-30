<?php
require_once ('../../connection/sessionScriptController.php'); 
require_once ('../../connection/connection.php'); 
require_once ('../../DAO/ProdutoDAO.php'); 
require_once ('../../model/Produto.php'); 

//var_dump($_POST['paciente_nascimento']);
$opcao = $_POST['opcao'];
if ($opcao == 'cadastrar')
{
    
    $produtoController = new \ProdutoController();
    $produtoController->createProduto($codigo=null,$_POST['produto_nome'],$_POST['produto_valor'],$host,$dbname,$user,$password);
    $produtoController=null;
    
    
}
else{
    
            if ($opcao == 'excluir')
            {   
               
                $produtoController = new \ProdutoController();
                $produtoController->deleteProduto($_POST['produto_codigo'],$host,$dbname,$user,$password);
                $produtoController=null;
                //var_dump($_POST['paciente_cpf']);
               // header('Location:../../view/restritoPacienteHome.php');
            
            }
            else{

                        if ($opcao == 'detalhar')
                        {
                            
                            $produtoController = new \ProdutoController();
                            $produto=$produtoController->consultaUmProduto($_POST['produto_codigo'],$host,$dbname,$user,$password);
                            session_start();
                            $_SESSION['codigo_detalhar']=$produto->getCodigo();
                            $_SESSION['nome_detalhar']=$produto->getNome();
                            $_SESSION['valor_detalhar']=$produto->getValor();
                            
                            $produtoController=null;
                           

                            // $resposta= array(
                            //     "codigo" => $produto->getCodigo(),
                            //     "nome" => $produto->getNome(),
                            //     "valor" => $produto->getValor(),
                            // );
                            
                            header('Location:../../view/restritoProdutoDetalha.php');
                            
                        }
                        else{


                                if ($opcao == 'editar')
                                {
                                    
                                    $produtoController = new \ProdutoController();
                                    $produto=$produtoController->consultaUmProduto($_POST['produto_codigo'],$host,$dbname,$user,$password);
                                    // session_start();
                                    $_SESSION['codigo_detalhar']=$produto->getCodigo();
                                    $_SESSION['nome_detalhar']=$produto->getNome();
                                    $_SESSION['valor_detalhar']=$produto->getValor();
                                   
                                    $produtoController=null;
                                

                                   
                                    // $resposta= array(
                                    //     "codigo" => $produto->getCodigo(),
                                    //     "nome" => $produto->getNome(),
                                    //     "valor" => $produto->getValor(),
                                    // );
                                    
                                    header('Location:../../view/restritoProdutoEdita.php');
                                   
                                }
                                else{if ($opcao == 'executa_edicao')
                                    {
                                        
                                        $produtoController = new \ProdutoController();
                                        $produtoController->updateProduto($_POST['produto_codigo'],$_POST['produto_nome'],$_POST['produto_valor'],$host,$dbname,$user,$password);
                                        
                                        
                                        $produtoController=null;
    
                                        
                                    // $resposta= array(
                                    //     "codigo" => $produto->getCodigo(),
                                    //     "nome" => $produto->getNome(),
                                    //     "valor" => $produto->getValor(),
                                    // );
                                        
                                       // header('Location:../../view/restritoProdutoHome.php');
                                        
                                    }




                             }

                        }


                }
        // header('Location:../../view/restritoProdutoHome.php');
    }




    
class ProdutoController {



    public function createProduto($codigo,$nome,$valor,$host,$dbname,$user,$password) : void
    {
        
            $produtoDAO = new \ProdutoDAO();
      

            $produto = new \Produto($codigo,$nome,$valor);
    
            $produtoDAO->createProduto($host,$dbname,$user,$password,$produto);
            $produtoDAO = null;
            $produto = null;
            $resultado = null;
            $_SESSION['mensagem_resultado']= "Produto Cadastrado Com sucesso!";
            $_SESSION['mensagem_resultado_erro']= "  ";
            header('Location:../../view/restritoProdutoResultado.php');
      
        
    }

    public function deleteProduto($codigo,$host,$dbname,$user,$password) :void
    {
        $produtoDAO = new \ProdutoDAO();
        $resultado=$produtoDAO->consultaUmProduto($host,$dbname,$user,$password,$codigo);
        $produto = new \Produto($resultado[0]['codigo'],$resultado[0]['nome'],$resultado[0]['valor']);
        //print_r($resultado);
        $produtoDAO->deleteProduto($host,$dbname,$user,$password,$produto);
        //consulta se paciente foi excluido
        $resultado=$produtoDAO->consultaUmProduto($host,$dbname,$user,$password,$codigo);
        if($resultado==false)
        {
            $produtoDAO = null;
            $produto =null;
            $resultado = null;
            $_SESSION['mensagem_resultado']= "Produto Excluido Com sucesso!";
            $_SESSION['mensagem_resultado_erro']= "  ";
            header('Location:../../view/restritoPacienteResultado.php');
    
        }
        else
        {
            $produtoDAO = null;
            $produto =null;
            $resultado = null;
            $_SESSION['mensagem_resultado']= "Produto não pode ser excluido!";
            $_SESSION['mensagem_resultado_erro']= "Motivo: Existe Consulta referenciando esse Produto, Para excluir o Produto primeiro é necessário excluir as consultas que referenciam o mesmo";
            header('Location:../../view/restritoProdutoResultado.php');

        }

    }
    public function consultaUmProduto($codigo,$host,$dbname,$user,$password)
    {
        $produtoDAO = new \ProdutoDAO();
        $resultado=$produtoDAO->consultaUmProduto($host,$dbname,$user,$password,$codigo);
        if($resultado==null)
        {
            return false;
        }
        else{
        $produto = new \Produto($resultado[0]['codigo'],$resultado[0]['nome'],$resultado[0]['valor']);
        return $produto;
        }
    }

    public function updateProduto($codigo,$nome,$valor,$host,$dbname,$user,$password) : void
    {
        $produto = new \Produto($codigo,$nome,$valor);
        //var_dump($paciente);
        $produtoDAO = new \ProdutoDAO();
        $produtoDAO->updateProduto($host,$dbname,$user,$password,$produto);
        $produtoDAO = null;
        $produto = null;
        $_SESSION['mensagem_resultado']= "Produto Editado Com sucesso!";
        $_SESSION['mensagem_resultado_erro']= "  ";
            header('Location:../../view/restritoProdutoResultado.php');
        
    }
}