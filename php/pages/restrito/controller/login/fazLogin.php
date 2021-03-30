<?php 
        require_once ('../../connection/connection.php');
        require_once ('validaTextoLogin.php');

       $usuario=revisaTextoUsuario($_POST['user']);
       $senha =revisaTextoSenha($_POST['password']);
       
        
        try{
                $pdo = new PDO("mysql:host=$host;dbname=$dbname",$user,$password);
                           
                $stmt = $pdo->prepare(" select userName , nome from sistema_usuario where userName = :a and userPassword = :b");
                $stmt->bindParam('a',$usuario);
                $stmt->bindParam('b',$senha);

                $stmt->execute();
               
                $linha = $stmt->fetch(PDO::FETCH_ASSOC);
                
                
                
                if(!$linha){ 
                        /*usuario nao existe*/ 
                        session_start();
                        $_SESSION['testa_usuario']='invalido';
                        header('Location:../../../login.php');  
                       // die("erro");  
                }else{
                                if($linha['userName'] = $usuario )
                                {
                                     /* Usuario existe */
                                     session_start();
                                     $_SESSION['user']=$usuario;  
                                     $_SESSION['nome']=$linha['nome']; 
                                     header('Location:../../../restrito/view/restritoHomePage.php');
                                }
                        }          
        }catch(PDOException $e)
        {
               
                die(" Erro Login : ". $e->getMessage());
                 
        }

        
      
 ?>       