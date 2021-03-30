<?php require_once('../controller/paciente/controllerPacienteHome.php')  ?>
<main>
    <div id="mainContainer">



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

            <form class="noneBotao" method="POST" >
                <input type=hidden name="opcao" value="editar" >
                <input type=hidden name="paciente_cpf" value="<?php echo $_SESSION['cpf_detalhar'] ?>" >
                <button id="botaoAmarelo" formaction="../controller/paciente/controllerPaciente.php">Editar</button>
            </form>

            <form class="noneBotao" method="POST"  onsubmit=" return popupExcluirPaciente(' ',1,<?php echo $_SESSION['cpf_detalhar'] ?>); ">
                <input type=hidden name="opcao" value="excluir">
                <input type=hidden name="paciente_cpf" value="<?php echo $_SESSION['cpf_detalhar'] ?>" >
                <button id="botaoVermelho" formaction="../controller/paciente/controllerPaciente.php">Excluir</button>
            </form>

            <a href="restritoPacienteHome.php"><button id="botaoVoltar">Voltar</button></a>




        </div>

    </div>
    <div id="popup" class="none"></div>

</main>