


function abrirMenu() {

    abrir = document.getElementById('navegacao');
    
    abrir.innerHTML = `
                       
                        <div id="menuMobile" > 
                                <button  class="botaoNav" onclick=fecharMenu() >Fechar</button>
                                <ul class="ulMenuMobile">
                                    <li><a href="../../index.php" > Home </a></li>
                                    <li><a href="sobreMim.php"  onclick=fecharMenu()> Sobre Mim </a></li>
                                    <li><a href="../../index.php#mainContainerTres"  onclick=fecharMenu()> Tratamentos </a></li>
                                    <li><a href="#footerContainer"  onclick=fecharMenu()> Contato </a></li>
                                    <li><a href="" > Acesso Médico </a></li>
                                </ul>
                      </div>
                      
                      `;

}


function fecharMenu() {

    fechar = document.getElementById('navegacao');
    fechar.innerHTML = `   `;
}

