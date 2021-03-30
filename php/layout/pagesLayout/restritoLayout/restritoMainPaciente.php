<?php require_once('../controller/paciente/controllerPacienteHome.php')  ?>
<main>
    <div id="mainContainer">
        <div id="MainContainerUm">
            <div class="flex-collum">
                <h1 class="H1">Paciente</h1>
               
               <a href="restritoPacienteCadastra.php">
                   <button id="botaoVerde" formaction="restritoPacienteCadastra.php">Cadastrar</button>
                </a>
                   
                
            </div>
            <div class="flex-collum">
                <form id="formBusca"  method="GET">
                    <input id="inputBusca" class="inputText" type="text" name="nomeBusca" placeholder="Nome do Paciente"  onclick="clicou(this)">
                    <button id="botaoVerde" formaction="restritoPacienteHome.php">Buscar</button>
                </form>
            </div>
        </div>


        <div id="mainContainerDois">

            <table>
                <thead class="noneThead">
                    <tr >
                        <td >Cpf</td>
                        <td>Nome</td>
                        <td >Telefone</td>
                        <td colspan="3">E-mail</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista as $linha) : ?>
                        <tr >
                            <td ><p class="none">Cpf: </p> <p> <?php echo $linha['cpf'] ?></p> </td>

                            <td ><p class="none">Nome: </p> <p><?php echo $linha['nome'] ?></p> </td>

                            <td ><p class="none">Tel: </p> <p> <?php echo $linha['telefone'] ?></p> </td>

                            <td ><p class="none">Email: </p> <p><?php echo $linha['email'] ?></p> </td>

                            <td  class="tdBotao">
                                <form  method="POST">
                                    <input type=hidden name="opcao" value="detalhar">
                                    <input type=hidden name="paciente_cpf" value="<?php echo $linha['cpf'] ?>">
                                    <button id="botaoDetalhar" formaction="../controller/paciente/controllerPaciente.php">Detalhar</button>
                                </form>
                            </td>

                            <td class="tdBotao">
                                <form class="noneBotao" method="POST" >
                                    <input type=hidden name="opcao" value="editar">
                                    <input type=hidden name="paciente_cpf" value="<?php echo $linha['cpf'] ?>">
                                    <button id="botaoAmarelo" formaction="../controller/paciente/controllerPaciente.php">Editar</button>
                                </form>
                            </td>

                            <td class="tdBotao">
                                <form class="noneBotao" method="POST" onsubmit=" return popupExcluirPaciente(' ',1,<?php echo $linha['cpf'] ?>); ">
                                    <input type=hidden name="opcao" value="excluir">
                                    <input type=hidden name="paciente_cpf" value="<?php echo $linha['cpf'] ?>">
                                    <button id="botaoVermelho" formaction="../controller/paciente/controllerPaciente.php">Excluir</button>
                                </form>
                            </td> 
                            
                        </tr>

                    <?php endforeach ?>
                </tbody>





            </table>

        </div>

    </div>
    <div id="popup" class="none"></div>

</main>