<?php require_once('../controller/produto/controllerProdutoHome.php')  ?>
<main>
    <div id="mainContainer">
        <div id="MainContainerUm">
            <div class="flex-collum">
                <h1 class="H1">Produto</h1>
               
               <a href="restritoProdutoCadastra.php">
                   <button id="botaoVerde" formaction="restritoProdutoCadastra.php">Cadastrar</button>
                </a>
                   
                
            </div>
            <div class="flex-collum">
                <form id="formBusca"  method="GET">
                    <input id="inputBusca" class="inputText" type="text" name="nomeBusca" placeholder="Nome do Produto"  onclick="clicou(this)">
                    <button id="botaoVerde" formaction="restritoProdutoHome.php">Buscar</button>
                </form>
            </div>
        </div>


        <div id="mainContainerDois">

            <table>
                <thead class="noneThead">
                    <tr >
                        <td >Codigo</td>
                        <td>Nome</td>
                        <td colspan="3">Valor</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista as $linha) : ?>
                        <tr >
                            <td ><p class="none">Codigo : </p> <p> <?php echo $linha['codigo'] ?></p> </td>

                            <td ><p class="none">Nome : </p> <p><?php echo $linha['nome'] ?></p> </td>

                            <td ><p class="none">Valor : </p> <p> <?php echo $linha['valor'] ?></p> </td>


                            <td  class="tdBotao">
                                <form  method="POST">
                                    <input type=hidden name="opcao" value="detalhar">
                                    <input type=hidden name="produto_codigo" value="<?php echo $linha['codigo'] ?>">
                                    <button id="botaoDetalhar" formaction="../controller/produto/controllerProduto.php">Detalhar</button>
                                </form>
                            </td>

                            <td class="tdBotao">
                                <form class="noneBotao" method="POST" >
                                    <input type=hidden name="opcao" value="editar">
                                    <input type=hidden name="produto_codigo" value="<?php echo $linha['codigo'] ?>">
                                    <button id="botaoAmarelo" formaction="../controller/produto/controllerProduto.php">Editar</button>
                                </form>
                            </td>

                            <td class="tdBotao">
                                <form class="noneBotao" method="POST" onsubmit=" return popupExcluirPaciente(' ',1,<?php echo $linha['cpf'] ?>); ">
                                    <input type=hidden name="opcao" value="excluir">
                                    <input type=hidden name="produto_codigo" value="<?php echo $linha['codigo'] ?>">
                                    <button id="botaoVermelho" formaction="../controller/produto/controllerProduto.php">Excluir</button>
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