
<main>
    <div id="mainContainer">
        <div id="MainContainerUm">

            <div class="flex-collum">
                <form method="POST">
                    <h1 class="H1">Paciente</h1>
                    <h1 class="H1">Ficha de Cadastro</h1>

                    <div class="espacoForm">
                        <h2 class="H2">CPF :</h2>
                        <input class="inputText" type="text" name="paciente_cpf" maxlength="14" onchange="verifica_paciente_cpf(this)" required>
                        <h3 class="H3"> Ex : 123456789 </h3>
                    </div>

                    <div class="espacoForm">
                        <h2 class="H2">Nome Completo Paciente :</h2>
                        <input class="inputText" type="text" name="paciente_nome" maxlength="60" onchange="verifica_paciente_nome(this)" required>
                        <h3 class="H3"> Ex : Joao dos Santos </h3>
                    </div>

                    <div class="espacoForm">
                        <h2 class="H2">Data de nascimento :</h2>
                        <input class="inputText" type="date" name="paciente_nascimento" maxlength="8" required>
                        <h3 class="H3"> Ex : DD/MM/AAAA </h3>
                    </div>

                    <div class="espacoForm">
                        <h2 class="H2">Telefone :</h2>
                        <input class="inputText" type="tel" name="paciente_telefone"  maxlength="20" onchange="verifica_paciente_telefone(this)" required >
                        <h3 class="H3"> Ex : DDD Número ( Celular =  21-999-999-999 )  ( Fixo = 21-271-168-88 ) </h3>
                    </div>

                    <div class="espacoForm">
                        <h2 class="H2">Endereço :</h2>
                        <input class="inputText" type="text" name="paciente_endereco" maxlength="200" onchange="verifica_paciente_endereco(this)" required>
                        <h3 class="H3"> Ex : Av. Roberto Silveira, 241, Icaraí, Niterói , Rj </h3>
                    </div>

                    <div class="espacoForm">
                        <h2 class="H2">E-mail :</h2>
                        <input class="inputText" type="email" name="paciente_email" maxlength="60" onchange="verifica_paciente_email(this)" required>
                        <h3 class="H3"> Ex : joao@gmail.com </h3>
                    </div>
                        <input TYPE="hidden" name="opcao" value="cadastrar">
                        <button id="botaoVerde" formaction="../controller/paciente/controllerPaciente.php">Cadastrar</button>
                   
                </form>





            </div>

        </div>



    </div>
    <div id="popup_mensagem" class="none"></div>

</main>