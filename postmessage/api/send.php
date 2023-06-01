<?php


error_reporting(0);
session_start();

   include_once("../../conexao.php");

    $textMessage = $_POST['textMessage'];
    $textMessage2 = $_POST['textMessage2'];
    $filterEmp = $_SESSION['usuarioEmpresa'];

    if($filterEmp == 6) {
      $serverKey = "";
      $empresa = "com.delivery.haris";
    }

    if($filterEmp == 5) {
      $serverKey = "";
      $empresa = "com.delivery.delicias";
    }

    if($filterEmp == 4) {
      $serverKey = "";
      $empresa = "com.delivery.hortifruti";
    }

    if($filterEmp == 3) {
      $serverKey = "";
      $empresa = "com.delivery.alelanches";
    }

    if($filterEmp == 2) {
      $serverKey = "";
      $empresa = "com.delivery.turbodog";
    }

    if($filterEmp == 1) {

   // $empresa = "com.delivery.atalos";
      $serverKey = "";
      $empresa= "com.delivery.atalos2";
    }

    if( $textMessage == '' or  $textMessage == null) {
         echo "
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../index.php'>
            <script type=\"text/javascript\">
               alert(\"Necessário que escreva uma mensagem.\");
            </script>
         ";
         exit();
    }

   # echo $textMessage;
    # $textMessage= " teste de emoticons \xf0\x9f\x98\x84 \xE2\x9C\x8C \xF0\x9F\x9A\x80 \xF0\x9F\x9A\xA8";

   # Parâmetros

   $data = array(
      "notification" => array(
            "title" => "$textMessage2",
            "body" => $textMessage,
            "sound" =>  "default",
            "image-type" => "circle",
            "click_action" =>  "FCM_PLUGIN_ACTIVITY",
            "icon" =>  "notification_icon"
         ),
      "to" => "/topics/all",
      "priority" => "high",
      "restricted_package_name" => "$empresa"
   );

   $data_string = json_encode($data);

   $ch = curl_init('https://fcm.googleapis.com/fcm/send');
   curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
   curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($ch, CURLOPT_HTTPHEADER, array(
     "Content-Type: application/json",
      "Authorization: key=" . $serverKey)
   );

   $result = curl_exec($ch);

   // echo $result;
   curl_close($ch);
   $ch=null;

   echo "
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../index.php'>
            <script type=\"text/javascript\">
               alert(\"Notificação enviada com sucesso.\");
            </script>
         ";


?>
