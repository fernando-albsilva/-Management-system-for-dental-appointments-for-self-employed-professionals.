<?php


/*Função retira espaço em branco, caracteres especias da string*/
function revisaTextoUsuario(String $texto)
{
   $tamanho = strlen($texto);
    $i=0;
    $textoRevisado='';
    $teste=false;

    for($i=0;$i<$tamanho;$i++)
    {
        
        if( ($texto[$i] >= 'a' && $texto[$i] <='z' )   ||      ($texto[$i] >= 'A' && $texto[$i] <= 'Z' )            )
        {
            $textoRevisado.=$texto[$i];
            $teste=true;
        }
        



    }

    /*se houver algum texto valido retorna o mesmo se não retorna false*/
    if($teste)
    {
        return $textoRevisado;
    }else
        {
            return $teste;
        }

}





function revisaTextoSenha(String $texto)
{
   $tamanho = strlen($texto);
    $i=0;
    $textoRevisado='';
    $teste=false;

    for($i=0;$i<$tamanho;$i++)
    {
        
        if( ($texto[$i] >= 'a' && $texto[$i] <='z' )   ||      ($texto[$i] >= 'A' && $texto[$i] <= 'Z' )   ||    ($texto[$i] >= '0' && $texto[$i] <= '9' )      )
        {
            $textoRevisado.=$texto[$i];
            $teste=true;
        }
        



    }

    /*se houver algum texto valido retorna o mesmo se não retorna false*/
    if($teste)
    {
        return $textoRevisado;
    }else
        {
            return $teste;
        }

}