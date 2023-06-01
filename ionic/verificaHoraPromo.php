<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

      include"config.php";

//PAGINA ESPECIFICA PARA O TURBO DOG - fazer a promoção de almoço aparecer de tarde e desaparecer a noite
  $filterEmp=$_GET["idEmpresa"];

  $result_c = "SELECT * FROM horarios where empresa = $filterEmp";
  $resultado_c = mysqli_query($conn, $result_c);
  $total_c = mysqli_num_rows($resultado_c);

  $rows_c = mysqli_fetch_assoc($resultado_c);

  $ini = $rows_c['HorInicio']; //dar um jeito de vir em 08:00 por exemplo
  $fim = $rows_c['HorFim']; //dar um jeito de vir em 08:00 por exemplo

    $controle = $rows_c['controle']; //se for 0 online, 1 offline


date_default_timezone_set('America/Sao_Paulo');
$date = date('w Y-m-d H:i');

     if(date('H:i') >= $ini AND date('H:i') <= $fim){
      $modif = "UPDATE categoria_produtos SET situacao_id = 1 where id = 125";
      $modif = mysqli_query($conn, $modif);
  echo true;
  }

  else {
          $modif = "UPDATE categoria_produtos SET situacao_id = 2 where id = 125";
      $modif = mysqli_query($conn, $modif);
  echo 0;
}

//echo $date; 0 é igual a domingo / 1 é igual a segunda-feira / 2 é igual a terça feira...

 $conn->close();

?>
