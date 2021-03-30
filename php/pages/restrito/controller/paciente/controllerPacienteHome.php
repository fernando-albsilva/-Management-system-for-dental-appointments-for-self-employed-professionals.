<?php

require_once ('../connection/connection.php'); 
require_once ('../DAO/PacienteDAO.php'); 

    

    if(!isset($_GET['nomeBusca']))
    {
       $pacienteDAO = new \PacienteDAO; 
       $lista = $pacienteDAO->consultaTodosPacientes($host,$dbname,$user,$password);
        
         

    }else{
        $pacienteDAO = new \PacienteDAO; 
        $lista = $pacienteDAO->consultaNomePaciente($host,$dbname,$user,$password,$_GET['nomeBusca']);
    
    }