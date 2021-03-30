<?php
require_once ('../../connection/sessionScriptController.php'); 
require_once ('../../connection/connection.php'); 
require_once ('../../DAO/PacienteDAO.php'); 
require_once ('../../model/Paciente.php'); 

//var_dump($_POST['paciente_nascimento']);
$opcao = $_POST['opcao'];
if ($opcao == 'cadastrar')
{
    
    $pacienteController = new \PacienteController();
    $pacienteController->createPaciente($_POST['paciente_cpf'],$_POST['paciente_nome'],$_POST['paciente_nascimento'],$_POST['paciente_telefone'],$_POST['paciente_endereco'],$_POST['paciente_email'],$host,$dbname,$user,$password);
    $pacienteController=null;
    
    
}
else{
    
            if ($opcao == 'excluir')
            {   
               
                $pacienteController = new \PacienteController();
                $pacienteController->deletePaciente($_POST['paciente_cpf'],$host,$dbname,$user,$password);
                $pacienteController=null;
                //var_dump($_POST['paciente_cpf']);
               // header('Location:../../view/restritoPacienteHome.php');
            
            }
            else{

                        if ($opcao == 'detalhar')
                        {
                            
                            $pacienteController = new \PacienteController();
                            $paciente=$pacienteController->consultaUmPaciente($_POST['paciente_cpf'],$host,$dbname,$user,$password);
                            session_start();
                            $_SESSION['cpf_detalhar']=$paciente->getCpf();
                            $_SESSION['nome_detalhar']=$paciente->getNome();
                            $_SESSION['dataNascimento_detalhar']=$paciente->getDataNascimento();
                            $_SESSION['telefone_detalhar']=$paciente->getTelefone();
                            $_SESSION['endereco_detalhar']=$paciente->getEndereco();
                            $_SESSION['email_detalhar']=$paciente->getEmail();
                            $pacienteController=null;
                           

                            // $resposta= array(
                            //     "cpf" => $paciente->getCpf(),
                            //     "nome" => $paciente->getNome(),
                            //     "dataNascimento" => $paciente->getDataNascimento(),
                            //     "telefone" => $paciente->getTelefone(),
                            //     "endereco" => $paciente->getEndereco(),
                            //     "email"  => $paciente->getEmail(),
                            // );
                            
                            header('Location:../../view/restritoPacienteDetalha.php');
                            // header('Location:../../view/restritoPacienteHome.php'.'?'.http_build_query($resposta));
                            //http_build_query
                        }
                        else{


                                if ($opcao == 'editar')
                                {
                                    
                                    $pacienteController = new \PacienteController();
                                    $paciente=$pacienteController->consultaUmPaciente($_POST['paciente_cpf'],$host,$dbname,$user,$password);
                                    // session_start();
                                    $_SESSION['cpf_detalhar']=$paciente->getCpf();
                                    $_SESSION['nome_detalhar']=$paciente->getNome();
                                    $_SESSION['dataNascimento_detalhar']=$paciente->getDataNascimento();
                                    $_SESSION['telefone_detalhar']=$paciente->getTelefone();
                                    $_SESSION['endereco_detalhar']=$paciente->getEndereco();
                                    $_SESSION['email_detalhar']=$paciente->getEmail();
                                    $pacienteController=null;
                                

                                    // $resposta= array(
                                    //     "cpf" => $paciente->getCpf(),
                                    //     "nome" => $paciente->getNome(),
                                    //     "dataNascimento" => $paciente->getDataNascimento(),
                                    //     "telefone" => $paciente->getTelefone(),
                                    //     "endereco" => $paciente->getEndereco(),
                                    //     "email"  => $paciente->getEmail(),
                                    // );
                                    
                                    header('Location:../../view/restritoPacienteEdita.php');
                                    // header('Location:../../view/restritoPacienteHome.php'.'?'.http_build_query($resposta));
                                    //http_build_query
                                }
                                else{if ($opcao == 'executa_edicao')
                                    {
                                        
                                        $pacienteController = new \PacienteController();
                                        $pacienteController->updatePaciente($_POST['paciente_cpf'],$_POST['paciente_nome'],$_POST['paciente_nascimento'],$_POST['paciente_telefone'],$_POST['paciente_endereco'],$_POST['paciente_email'],$host,$dbname,$user,$password);
                                        
                                        
                                        $pacienteController=null;
    
                                        // $resposta= array(
                                        //     "cpf" => $paciente->getCpf(),
                                        //     "nome" => $paciente->getNome(),
                                        //     "dataNascimento" => $paciente->getDataNascimento(),
                                        //     "telefone" => $paciente->getTelefone(),
                                        //     "endereco" => $paciente->getEndereco(),
                                        //     "email"  => $paciente->getEmail(),
                                        // );
                                        
                                       // header('Location:../../view/restritoPacienteHome.php');
                                        // header('Location:../../view/restritoPacienteHome.php'.'?'.http_build_query($resposta));
                                        //http_build_query
                                    }




                             }

                        }


                }
        // header('Location:../../view/restritoPacienteHome.php');
    }




    
class PacienteController {



    public function createPaciente($cpf,$nome,$dataNascimento,$telefone,$endereco,$email,$host,$dbname,$user,$password) : void
    {
        
        $pacienteDAO = new \PacienteDAO();
        //faz uma pesquisa para saber se ja existe um paciente cadastrado com o mesmo cpf
        $resultado=$pacienteDAO->consultaUmPaciente($host,$dbname,$user,$password,$cpf);
        //somente faz o cadastro se não existir nenhum paciente cadastrado com o mesmo cpf
        if($resultado==false)
        {

            $paciente = new \Paciente($cpf,$nome,$dataNascimento,$telefone,$endereco,$email);

            //tirei um paciente
            $pacienteDAO->createPaciente($host,$dbname,$user,$password,$paciente);
            $pacienteDAO = null;
            $paciente = null;
            $resultado = null;
            $_SESSION['mensagem_resultado']= "Paciente Cadastrado Com sucesso!";
            $_SESSION['mensagem_resultado_erro']= "  ";
            header('Location:../../view/restritoPacienteResultado.php');
      
        }
        //se ja existir um paciente cadastrado no mesmo cpf não efetua o cadastro, redirecionando para uma pagina contendo o aviso de :
        //cpf duplicado
        else{
                $pacienteDAO = null;
                $resultado = null;
                // "paciente ja existe cpf duplicado";
                $_SESSION['mensagem_resultado']= "Paciente não pode ser cadastrado!";
                $_SESSION['mensagem_resultado_erro']= "Motivo: Já existe um paciente cadastrado com o mesmo CPF.";
                header('Location:../../view/restritoPacienteResultado.php');
 
        }
        
    }

    public function deletePaciente($cpf,$host,$dbname,$user,$password) :void
    {
        $pacienteDAO = new \PacienteDAO();
        $resultado=$pacienteDAO->consultaUmPaciente($host,$dbname,$user,$password,$cpf);
        $paciente = new \Paciente($resultado[0]['cpf'],$resultado[0]['nome'],$resultado[0]['dataNascimento'],$resultado[0]['telefone'],$resultado[0]['endereco'],$resultado[0]['email']);
        //print_r($resultado);
        $pacienteDAO->deletePaciente($host,$dbname,$user,$password,$paciente,$paciente);
        //consulta se paciente foi excluido
        $resultado=$pacienteDAO->consultaUmPaciente($host,$dbname,$user,$password,$cpf);
        if($resultado==false)
        {
            $pacienteDAO = null;
            $paciente =null;
            $resultado = null;
            $_SESSION['mensagem_resultado']= "Paciente Excluido Com sucesso!";
            $_SESSION['mensagem_resultado_erro']= "  ";
            header('Location:../../view/restritoPacienteResultado.php');
    
        }
        else
        {
            $pacienteDAO = null;
            $paciente =null;
            $resultado = null;
            $_SESSION['mensagem_resultado']= "Paciente não pode ser excluido!";
            $_SESSION['mensagem_resultado_erro']= "Motivo: Existe Consulta referenciando esse paciente, Para excluir o paciente primeiro é necessário excluir as consultas que referenciam o mesmo";
            header('Location:../../view/restritoPacienteResultado.php');

        }

    }
    public function consultaUmPaciente($cpf,$host,$dbname,$user,$password)
    {
        $pacienteDAO = new \PacienteDAO();
        $resultado=$pacienteDAO->consultaUmPaciente($host,$dbname,$user,$password,$cpf);
        if($resultado==null)
        {
            return false;
        }
        else{
        $paciente = new \Paciente($resultado[0]['cpf'],$resultado[0]['nome'],$resultado[0]['dataNascimento'],$resultado[0]['telefone'],$resultado[0]['endereco'],$resultado[0]['email']);
        return $paciente;
        }
    }

    public function updatePaciente($cpf,$nome,$dataNascimento,$telefone,$endereco,$email,$host,$dbname,$user,$password) : void
    {
        $paciente = new \Paciente($cpf,$nome,$dataNascimento,$telefone,$endereco,$email);
        //var_dump($paciente);
        $pacienteDAO = new \PacienteDAO();
        $pacienteDAO->updatePaciente($host,$dbname,$user,$password,$paciente);
        $pacienteDAO = null;
        $paciente = null;
        $_SESSION['mensagem_resultado']= "Paciente Editado Com sucesso!";
        $_SESSION['mensagem_resultado_erro']= "  ";
            header('Location:../../view/restritoPacienteResultado.php');
        
    }
}