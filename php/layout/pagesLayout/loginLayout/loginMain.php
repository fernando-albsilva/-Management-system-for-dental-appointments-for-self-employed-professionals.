
    <main>
                <div id="formContainer">    
                    <form id="formLogin" action="restrito/controller/login/fazLogin.php" method="POST">
                        <label class="formLoginMensagem">Bem Vindo</label>
                        <label class="formLoginEtiqueta">Usuário <input type="text" name="user" class="formtTextInputUsuario" ></label>
                        <label class="formLoginEtiqueta">Senha <input type="password" name="password" class="formtTextInputSenha"></label>
                       <div style="color:red; margin-top:20px;margin-bottom:0px">
                       
                       <?php 
                            if(isset($_SESSION['testa_usuario']))
                                {
                                    if($_SESSION['testa_usuario']=='invalido')
                                    {
                                        echo "usuario ou senha invalido(s)";
                                        session_destroy();
                                    }
                                }else{
                                    session_destroy();
                                }
                                
                                ?>
                        </div>        
                       
                        <input type="submit"  id="botaoForm" class="botaoLogin" value="Entrar">
                    </form>

                </div>

    </main>