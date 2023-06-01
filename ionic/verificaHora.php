<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

      include"config.php";

         $filterEmp=$_GET["idEmpresa"];

  $result_c = "SELECT * FROM horarios where empresa = $filterEmp";
  $resultado_c = mysqli_query($conn, $result_c);
  $total_c = mysqli_num_rows($resultado_c);

  $rows_c = mysqli_fetch_assoc($resultado_c);

  $ini = $rows_c['HorInicio']; //dar um jeito de vir em 08:00 por exemplo
  $fim = $rows_c['HorFim']; //dar um jeito de vir em 08:00 por exemplo
  $ini2 = $rows_c['HorInicio2']; //dar um jeito de vir em 08:00 por exemplo
  $fim2 = $rows_c['HorFim2']; //dar um jeito de vir em 08:00 por exemplo

    $ini3 = $rows_c['ter1']; //dar um jeito de vir em 08:00 por exemplo
  $fim3 = $rows_c['ter2']; //dar um jeito de vir em 08:00 por exemplo
  $ini4 = $rows_c['ter3']; //dar um jeito de vir em 08:00 por exemplo
  $fim4 = $rows_c['ter4']; //dar um jeito de vir em 08:00 por exemplo


    $ini5 = $rows_c['quar1']; //dar um jeito de vir em 08:00 por exemplo
  $fim5 = $rows_c['quar2']; //dar um jeito de vir em 08:00 por exemplo
  $ini6 = $rows_c['quar3']; //dar um jeito de vir em 08:00 por exemplo
  $fim6 = $rows_c['quar4']; //dar um jeito de vir em 08:00 por exemplo

    $ini7 = $rows_c['quin1']; //dar um jeito de vir em 08:00 por exemplo
  $fim7 = $rows_c['quin2']; //dar um jeito de vir em 08:00 por exemplo
  $ini8 = $rows_c['quin3']; //dar um jeito de vir em 08:00 por exemplo
  $fim8 = $rows_c['quin4']; //dar um jeito de vir em 08:00 por exemplo

    $ini9 = $rows_c['sex1']; //dar um jeito de vir em 08:00 por exemplo
  $fim9 = $rows_c['sex2']; //dar um jeito de vir em 08:00 por exemplo
  $ini10 = $rows_c['sex3']; //dar um jeito de vir em 08:00 por exemplo
  $fim10 = $rows_c['sex4']; //dar um jeito de vir em 08:00 por exemplo

    $ini11 = $rows_c['sab1']; //dar um jeito de vir em 08:00 por exemplo
  $fim11 = $rows_c['sab2']; //dar um jeito de vir em 08:00 por exemplo
  $ini12 = $rows_c['sab3']; //dar um jeito de vir em 08:00 por exemplo
  $fim12 = $rows_c['sab4']; //dar um jeito de vir em 08:00 por exemplo

    $ini13 = $rows_c['domin1']; //dar um jeito de vir em 08:00 por exemplo
  $fim13 = $rows_c['domin2']; //dar um jeito de vir em 08:00 por exemplo
  $ini14 = $rows_c['domin3']; //dar um jeito de vir em 08:00 por exemplo
  $fim14 = $rows_c['domin4']; //dar um jeito de vir em 08:00 por exemplo

    $controle = $rows_c['controle']; //se for 0 online, 1 offline



date_default_timezone_set('America/Sao_Paulo');
$date = date('w Y-m-d H:i');

//segunda
//if(date('w') == 1){
//$h_inicial = $fim;
//$h_final = "24:00";
//$h_inicial = explode(':',$h_inicial);
//$h_final = explode(':',$h_final);
//$h_inicial = mktime($h_inicial[0],$h_inicial[1],00,1,1,0);
//$h_final = mktime($h_final[0],$h_final[1],00,1,1,0);
//$time = $h_inicial + $h_final;
//$resultado = date("H:i",$time);
//echo $resultado;
 // if(date('H:i') >= $ini AND date('H:i') <= $resultado){
 // echo true;
  // }
 //   else{
 //    if(date('H:i') >= $ini AND date('H:i') <= $fim){

 // echo true;
 //  }

 // else {
 // echo 0;
//}
//}
//}
//terça
if(date('w') == 1){
   if($controle == 0) {
     if(date('H:i') >= $ini AND date('H:i') <= $fim OR date('H:i') >= $ini2 AND date('H:i') <= $fim2){
  echo true;
  }
}
  else {
  echo 0;
}
}
//terça
if(date('w') == 2){
   if($controle == 0) {
     if(date('H:i') >= $ini3 AND date('H:i') <= $fim3 OR date('H:i') >= $ini4 AND date('H:i') <= $fim4){
  echo true;
  }
}
  else {
  echo 0;
}
}
//quarta
if(date('w') == 3){
   if($controle == 0) {
     if(date('H:i') >= $ini5 AND date('H:i') <= $fim5 OR date('H:i') >= $ini6 AND date('H:i') <= $fim6){
  echo true;
  }
}
  else {
  echo 0;
}
}
//quinta
if(date('w') == 4){
   if($controle == 0) {
     if(date('H:i') >= $ini7 AND date('H:i') <= $fim7 OR date('H:i') >= $ini8 AND date('H:i') <= $fim8){
  echo true;
  }
}
  else {
  echo 0;
}
}
//sexta
if(date('w') == 5){
   if($controle == 0) {
     if(date('H:i') >= $ini9 AND date('H:i') <= $fim9 OR date('H:i') >= $ini10 AND date('H:i') <= $fim10){
  echo true;
  }
}
  else {
  echo 0;
}
}

// sabado e domingo \/

//domingo
//if(date('w') == 0){
 // echo 0;
//}
if(date('w') == 0){
   if($controle == 0) {
     if(date('H:i') >= $ini13 AND date('H:i') <= $fim13 OR date('H:i') >= $ini14 AND date('H:i') <= $fim14){
  echo true;
  }
}
  else {
  echo 0;
}
}
//sabado
//if(date('w') == 6){
//  echo 0;
//}
if(date('w') == 6){
  if($controle == 0) {
     if(date('H:i') >= $ini11 AND date('H:i') <= $fim11 OR date('H:i') >= $ini12 AND date('H:i') <= $fim12){
  echo true;
  }
  }
  else {
  echo 0;
}
}
//echo $date; 0 é igual a domingo / 1 é igual a segunda-feira / 2 é igual a terça feira...

 $conn->close();

?>
