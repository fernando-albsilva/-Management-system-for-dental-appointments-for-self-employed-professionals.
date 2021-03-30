

function popupExcluirPaciente(teste,opcao,cpf){
  
    if(opcao==1){
    var elemento = document.getElementById('popup');
    elemento.setAttribute('class','  ');
     elemento.innerHTML = ` 
                        <div id="popupContainer">
                            <h1> Aviso! </h1>
                            <h2> Deseja excluir esse paciente permanentemente ? </h2>
                                <div id="popupContainer2">
                                    <form class="noneBotao" method="POST">
                                        <input type=hidden name="opcao" value="excluir">
                                        <input type=hidden name="paciente_cpf" value="`+cpf+`">
                                        <input type="submit" id="botaoVerde" value="Sim" formaction="../controller/paciente/controllerPaciente.php">
                                    </form>
                                    <input type="button" id="botaoVermelho"  value="Não" onclick=" popupExcluirPaciente(false,0) ">  
                                </div>
                        </div>
                          `;
    }else{
        var elemento = document.getElementById('popup');
        elemento.setAttribute('class','none');
        elemento.innerHTML=' ';
    }
    if(teste!=true)
    {    
       
        return false;
    }else{
        alert("confirmou");
        return true;
    }
    
}
