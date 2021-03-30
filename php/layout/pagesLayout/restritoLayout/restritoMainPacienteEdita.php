<?php require_once('../controller/paciente/controllerPacienteHome.php')  ?>
<main>
   

<div id="mainContainer">


        <h1 class="H1">Tela de Edição</h1>
        <div id="mainContainerUm">

            <table>
                <thead>
                    <tr>
                        <td>Dados do Paciente</td>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>
                            <p>Nome: <?php echo $_SESSION['nome_detalhar'] ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Cpf: <?php echo $_SESSION['cpf_detalhar'] ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Nascimento aaaa/mm/dd: <?php echo $_SESSION['dataNascimento_detalhar'] ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Telefone: <?php echo $_SESSION['telefone_detalhar'] ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>E-mail: <?php echo $_SESSION['email_detalhar'] ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Endereço: <?php echo $_SESSION['endereco_detalhar'] ?></p>
                        </td>
                    </tr>


                </tbody>





            </table>

        </div>

        <div id="MainContainerDois">

            <form class="noneBotao" method="POST" onsubmit=" return popupExcluirPaciente(' ',1,<?php echo $_SESSION['cpf_detalhar'] ?>); ">
                <input type=hidden name="opcao" value="excluir">
                <input type=hidden name="paciente_cpf" value="<?php echo $_SESSION['cpf_detalhar'] ?>">
                <button id="botaoVermelho" formaction="../controller/paciente/controllerPaciente.php">Excluir</button>
            </form>

            <a href="restritoPacienteHome.php"><button id="botaoAzul">Voltar</button></a>




        </div>

    </div>
    <div id="ContainerTres">
        <div id="MainContainerTres">
       
                    <h1 class="H1">Ficha de Edição</h1>
            <div class="flex-collum">
                <form method="POST">
                    

                    <div class="espacoForm">
                        <h2 class="H2">CPF :</h2>
                        <input class="inputText" type="text" name="paciente_cpf" maxlength="14" value="<?php echo $_SESSION['cpf_detalhar'] ?>"  onchange="verifica_paciente_cpf(this)">
                        <h3 class="H3"> Ex : 123456789 </h3>
                    </div>

                    <div class="espacoForm">
                        <h2 class="H2">Nome Completo Paciente :</h2>
                        <input class="inputText" type="text" name="paciente_nome" maxlength="60" value="<?php echo $_SESSION['nome_detalhar'] ?>" onchange="verifica_paciente_nome(this)">
                        <h3 class="H3"> Ex : Joao dos Santos </h3>
                    </div>

                    <div class="espacoForm">
                        <h2 class="H2">Data de nascimento :</h2>
                        <input class="inputText" type="date" name="paciente_nascimento" value="<?php echo $_SESSION['dataNascimento_detalhar'] ?>" maxlength="8">
                        <h3 class="H3"> Ex : DD/MM/AAAA </h3>
                    </div>

                    <div class="espacoForm">
                        <h2 class="H2">Telefone :</h2>
                        <input class="inputText" type="tel" name="paciente_telefone" maxlength="20"  value="<?php echo $_SESSION['telefone_detalhar'] ?>" onchange="verifica_paciente_telefone(this)">
                        <h3 class="H3"> Ex : DDD Número ( Celular = 21-999-999-999 ) ( Fixo = 21-271-168-88 ) </h3>
                    </div>

                    <div class="espacoForm">
                        <h2 class="H2">Endereço :</h2>
                        <input class="inputText" type="text" name="paciente_endereco" maxlength="200" value="<?php echo $_SESSION['telefone_detalhar'] ?>" onchange="verifica_paciente_endereco(this)">
                        <h3 class="H3"> Ex : Av. Roberto Silveira, 241, Icaraí, Niterói , Rj </h3>
                    </div>

                    <div class="espacoForm">
                        <h2 class="H2">E-mail :</h2>
                        <input class="inputText" type="email" name="paciente_email" maxlength="60" value="<?php echo $_SESSION['email_detalhar'] ?> "onchange="verifica_paciente_email(this)">
                        <h3 class="H3"> Ex : joao@gmail.com </h3>
                    </div>
                    <input TYPE="hidden" name="opcao" value="executa_edicao">
                    <button id="botaoVerde" formaction="../controller/paciente/controllerPaciente.php">Confirmar Ediçao</button>

                </form>



            </div>

        </div>

    </div>

    <div id="popup" class="none"></div>
</main>