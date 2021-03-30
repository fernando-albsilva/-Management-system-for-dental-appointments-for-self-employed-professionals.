
<main>
    <div id="mainContainer">
        <div id="MainContainerUm">

            <div class="flex-collum">
               
                <h1 class="H1">Aviso !</h1>
                <h2 class="H2"><?php echo $_SESSION['mensagem_resultado'] ?></h2>
                <h2 class="H2"><?php echo $_SESSION['mensagem_resultado_erro'] ?></h2>

                <a href="restritoPacienteHome.php"><input class="botaoAzul" type="button" value="Voltar Para Tela de Paciente" ></a>

            </div>

        </div>



    </div>
    

</main>

<?php           
      $_SESSION['mensagem_resultado']= null;
      $_SESSION['mensagem_resultado_erro']= null;
?>
