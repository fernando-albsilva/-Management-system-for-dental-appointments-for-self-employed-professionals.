function verifica_paciente_cpf(el) {

    
    var str =el.value;
    var  str_aux="";
    var i;
    var j;
    


     /* testa se a string tem caracteres diferentes de numero */
     var teste = 0;

    for ( i = 0; i < str.length; i++) {

        if (str[i] < '0' || str[i] > '9') {
            teste = 1;

        }


    }
   
   
     /*retira caracteres do input cpf */
    if (teste == 1) {
        j=0;
        mensagem = "CPF do paciente não pode conter espaço ou caracteres diferentes de numero!<br><br> Todos caracteres indevidos foram removidos automaticamente.";
        popupMensagem(teste,mensagem);
        //alert("CPF do paciente não pode conter caracteres diferentes de numero!");
        for ( i = 0; i < str.length; i++) {

            //alert(str[i]);
            if (str[i] < '0' || str[i] > '9') {
                teste = 1;
               // alert("letra="+str[i]);
            }else{
                str_aux+=str[i];
               // alert("numero="+str[i]);
                j++;
            }
        }
       //alert("string aux ="+str_aux);
        el.value=str_aux;
    }

    
    /* testa se a string tem menos de 14 caracteres */
    if (str.length > 14) {
        //alert(" CPF nao pode ter mais de 14 caracteres, os ultimos foram removidos automaticamente!");
        if(teste == 1){
            el.value=str_aux.slice(0,-(str_aux.length-14));
            //alert(str_aux);
        }else{
            //retira os ultimos caracteres retornando os 14 primeiros
            el.value=str.slice(0,-(str.length-14));
        }
        //el.value= str_aux.slice(14);

    }


   

}


// <input type="button" id="botaoVerde"  value="OK" onclick=" popupMensagem(0,"aa") ">  
function verifica_paciente_nome(el){

    var str =el.value;
    var  str_aux="";
    var i;
    var j;
    


     /* testa se a string tem caracteres diferentes de letras */
    var teste = 0;

    for ( i = 0; i < str.length; i++) {

        if ((str[i] < 'a' || str[i] > 'z') && (str[i] < 'A' || str[i] > 'Z') && (str[i] != ' ') )
        {
            teste = 1;
            //alert("tem numero");
        }


    }


     /*retira numeros ou caracteres especiais do input nome */
     if (teste == 1) {
        j=0;
        mensagem="Nome do paciente não pode conter caracteres diferentes de letras!<br><br> Todos caracteres indevidos foram removidos automaticamente.";
        popupMensagem(teste,mensagem);
        for ( i = 0; i < str.length; i++) {

            //alert(str[i]);
            if ( (str[i] < 'a' || str[i] > 'z') && (str[i] < 'A' || str[i] > 'Z')  && (str[i] != ' ') )   {
                teste = 1;
               // alert("letra="+str[i]);
            }else{
                str_aux+=str[i];
               // alert("numero="+str[i]);
                j++;
            }
        }
        //alert("string aux ="+str_aux);
        el.value=str_aux;
    }


     /* testa se a string tem menos de 14 caracteres */
     if (str.length > 60) {
        //alert(" Nome do paciente não pode ter mais de 60 caracteres, os ultimos caracteres foram removidos automaticamente!");
        if(teste == 1){
            el.value=str_aux.slice(0,-(str_aux.length-60));
            //alert(str_aux);
        }else{
            //retira os ultimos caracteres retornando os 14 primeiros
            el.value=str.slice(0,-(str.length-60));
        }
        //el.value= str_aux.slice(14);

    }



}


function verifica_paciente_telefone(el){
     
    var str =el.value;
    var  str_aux="";
    var i;
    var j;
    

   

     /* testa se a string tem caracteres diferentes de numero */
     var teste = 0;

    for ( i = 0; i < str.length; i++) {

        if ((str[i] < '0' || str[i] > '9') && ( str[i] != '-')){
            teste = 1;

        }


    }
   
   
     /*retira caracteres do input cpf */
    if (teste == 1) {
        j=0;
        mensagem="Telefone não pode conter espaço ou caracteres diferentes de número <br><br> Todos caracteres indevidos foram removidos automaticamente.";
        popupMensagem(teste,mensagem);
        for ( i = 0; i < str.length; i++) {

            //alert(str[i]);
            if (str[i] < '0' || str[i] > '9') {
                teste = 1;
               // alert("letra="+str[i]);
            }else{
                str_aux+=str[i];
               // alert("numero="+str[i]);
                j++;
            }
        }
       //alert("string aux ="+str_aux);
        el.value=str_aux;
    }

   
    /* testa se a string tem menos de 20 caracteres */
    if (str.length > 20) {
        alert(" Telefone não pode ter mais de 20 caracteres, os ultimos caracteres foram removidos automaticamente");
        if(teste == 1){
            el.value=str_aux.slice(0,-(str_aux.length-20));
            //alert(str_aux);
        }else{
            //retira os ultimos caracteres retornando os 20 primeiros
            el.value=str.slice(0,-(str.length-20));
        }
        //el.value= str_aux.slice(14);

    }

}



function verifica_paciente_endereco(el){
    var str =el.value;
   

     /* testa se a string tem menos de 200 caracteres */
     if (str.length > 200) {
        alert(" Endereco não pode ter mais de 200 caracteres, os ultimos caracteres foram removidos automaticamente");
       
            //retira os ultimos caracteres retornando os 200 primeiros
            el.value=str.slice(0,-(str.length-200));
        

    }


}


function verifica_paciente_email(el){
    var str=el.value;

     /* testa se a string tem menos de 60 caracteres */
     if (str.length > 60) {
        alert(" Email nao pode ter mais de 60 caracteres, os primeiros foram removidos automaticamente");
       
            //retira os ultimos caracteres retornando os 60 primeiros
            el.value=str.slice(0,(str.length-60));
        

    }



}





function popupMensagem(teste,mensagem){
    if(teste==1){
    var elemento = document.getElementById('popup_mensagem');
    elemento.setAttribute('class','  ');
     elemento.innerHTML = ` 
                        <div id="popupContainer">
                            <h1> Aviso! </h1>
                            <h2> ` + mensagem + ` </h2>
                                <div id="popupContainer2">
                                <input id="botaoVerde" type="button" value="Ok" onclick=" popupMensagem(0,'aa') " >
                                </div>
                        </div>
                          `;
    }else{
        var elemento = document.getElementById('popup_mensagem');
        elemento.setAttribute('class','none');
        elemento.innerHTML=' ';
    }
    
}