


function abrirMenu() {

    abrir = document.getElementById('navegacao');
    
    abrir.innerHTML = `
                       
                        <div id="menuMobile" > 
                                <button  id="botaoNavFechar" class="botaoNav"  onclick=fecharMenu() >Fechar</button>
                                <ul class="ulMenuMobile">
                                    <li><a href="restritoHomePage.php" onclick=fecharMenu() > Home </a></li>
                                    <li><a href="restritoPacienteHome.php" onclick=fecharMenu() > Paciente </a></li>
                                    <li><a href="restritoProdutoHome.php" onclick=fecharMenu() > Produto </a></li>
                                    <li><a href="restritoTratamentoHome.php"  onclick=fecharMenu()> Tratamento </a></li>
                                    <li><a href="restritoConsultaHome.php"  onclick=fecharMenu()> Consulta </a></li>
                                    <li><a href="restritoFaturamentoHome.php"  onclick=fecharMenu()> Faturamento </a></li>
                                    <li><a href="restritoAjudaHome.php"  onclick=fecharMenu()> Ajuda </a></li>
                                    <li><a href="../controller/login/fazLogout.php" > Sair </a></li>
                                </ul>
                      </div>
                      
                      `;

}


function fecharMenu() {

    fechar = document.getElementById('navegacao');
    fechar.innerHTML = `   `;
}

