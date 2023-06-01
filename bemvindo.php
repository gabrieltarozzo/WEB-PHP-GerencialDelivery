
        <?php

    session_start();

         if  ($_SESSION['usuarioNiveisAcessoId'] == "3") {
        goto A;
}
if  ($_SESSION['usuarioNiveisAcessoId'] != "2") {

}

A:
      echo " <script type=\"text/javascript\">
        alert(\"Bem vindo.\" ); </script>"; 

   ?>


   <?php
        header("Location: pedidos.php"); 
         sleep(2); ?>

