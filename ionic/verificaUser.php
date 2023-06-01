<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

		include"config.php";


$email = $_GET['email'];//aqui você resgata o login digitado
$sql = "select * from usuarios where email='$email' ";//selecionar tudo da tabela quando login for igual ao $login
$query = mysql_query($sql); //executa o query
$busca = mysql_num_rows($query); //pega o total das linhas encontradas

if (($busca)=='0'){
          echo true;
}else{
        echo false;
      }
 $conn->close();
      ?>