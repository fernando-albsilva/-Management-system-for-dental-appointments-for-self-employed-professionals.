function pergunta() {

    r = confirm("Está exclusão será permanente. \n Tem certeza que deseja excluir?");
    
    if (r == false) {
        
        return false;
        //javascript: location.href='Paciente_home.php';
       

    }else{
        return true;
    }
    
}
