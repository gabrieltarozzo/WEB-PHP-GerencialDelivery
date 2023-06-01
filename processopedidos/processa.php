<?php
    session_start();

    $_SESSION['usuarioNome'];

	include_once("../conexao.php");
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$status = mysqli_real_escape_string($conn, $_POST['status']);
	$id_usuarios = mysqli_real_escape_string($conn, $_POST['id_usuarios']);

  
   $filterEmp = $_SESSION['usuarioEmpresa'];

    if($filterEmp == 11) {
      $serverKey = ""; 
      $empresa = "com.delivery.dmamis";
    }

    if($filterEmp == 10) {
      $serverKey = ""; 
      $empresa = "com.delivery.fornalha";
    }

    if($filterEmp == 9) {
      $serverKey = "";
      $empresa = "com.delivery.fratter";
    }

    if($filterEmp == 8) {
      $serverKey = "";
      $empresa = "com.delivery.gemeos";
    }
    if($filterEmp == 7) {
      $serverKey = "";
      $empresa = "com.delivery.decolagem";
    }

     if($filterEmp == 6) {
      $serverKey = "";
      $empresa = "com.delivery.harisrp";
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
      $empresa= "com.delivery.atalos3";
    }



if(isset($_POST["cancelado"])){
 $result_categoriaswe = "SELECT  `usuarios` . *, token FROM usuarios
     where `id` = '$id_usuarios'  ";
     $resultado_categoriaswe = mysqli_query($conn, $result_categoriaswe);
     $rows_x = mysqli_fetch_assoc($resultado_categoriaswe);

$cancelado2 = mysqli_real_escape_string($conn, $_POST['cancelado2']);
    $token =  $rows_x['token'];

    $textMessage = "$cancelado2";
    $textMessage2 = 'Pedido foi cancelado';


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
      "to" => "$token",
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



		$result_pedidos = "UPDATE pedidos SET modified=NOW(), status='Cancelado' WHERE id = '$id'";
	$resultado_pedidos = mysqli_query($conn, $result_pedidos);

  $result_pedidos = "UPDATE pedidos SET modifiedConf=NOW() WHERE id = '$id'";
  $resultado_pedidos = mysqli_query($conn, $result_pedidos);

		if(mysqli_affected_rows($conn) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../pedidos.php'>
				<script type=\"text/javascript\">
					alert(\"Status Alterado para Cancelado!.\");
				</script>
			";
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../pedidos.php'>
				<script type=\"text/javascript\">
					alert(\"Status não foi alterado.\");
				</script>
			";
		} ?> <?php
}

	if(isset($_POST["entregue"])){

    $result_categoriaswe = "SELECT  `usuarios` . *, token FROM usuarios
    where `id` = '$id_usuarios'  ";
    $resultado_categoriaswe = mysqli_query($conn, $result_categoriaswe);
    $rows_x = mysqli_fetch_assoc($resultado_categoriaswe);
    $token =  $rows_x['token'];
    $textMessage = 'Gostou? Deixe sua avaliação do nosso aplicativo na loja!';
    $textMessage2 = 'Obrigado pela preferência!';

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
      "to" => "$token",
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


		$result_pedidos = "UPDATE pedidos SET status='Finalizado' WHERE id = '$id'";
	  $resultado_pedidos = mysqli_query($conn, $result_pedidos);

		if(mysqli_affected_rows($conn) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../pedidos.php'>
				<script type=\"text/javascript\">
					alert(\"Status Alterado para finalizado!.\");
				</script>
			";
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../pedidos.php'>
				<script type=\"text/javascript\">
					alert(\"Status não foi alterado.\");
				</script>
			";
		}?> <?php
    }

	if(isset($_POST["ementrega"])){


     $result_categoriaswe = "SELECT  `usuarios` . *, token FROM usuarios
     where `id` = '$id_usuarios'  ";
     $resultado_categoriaswe = mysqli_query($conn, $result_categoriaswe);
     $rows_x = mysqli_fetch_assoc($resultado_categoriaswe);

    $token =  $rows_x['token'];

    $textMessage = 'Seu pedido saiu para entrega!';
    $textMessage2 = 'Entrega';


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
      "to" => "$token",
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


	$result_pedidos = "UPDATE pedidos SET status='Em Entrega' WHERE id = '$id'";
	$resultado_pedidos = mysqli_query($conn, $result_pedidos);

		if(mysqli_affected_rows($conn) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../pedidos.php'>
				<script type=\"text/javascript\">
					alert(\"Status Alterado para em entrega!.\");
				</script>
			";
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../pedidos.php'>
				<script type=\"text/javascript\">
					alert(\"Status não foi alterado.\");
				</script>
			";
		}?> <?php
}

  	if(isset($_POST["confirmar"])){

  		//teste


     $result_categoriaswe = "SELECT  `usuarios` . *, token FROM usuarios
     where `id` = '$id_usuarios'  ";
     $resultado_categoriaswe = mysqli_query($conn, $result_categoriaswe);
     $rows_x = mysqli_fetch_assoc($resultado_categoriaswe);

    $token =  $rows_x['token'];

    $textMessage = 'Seu pedido foi confirmado!';
    $textMessage2 = 'Confirmação';


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
      "to" => "$token",
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


  		//fim do teste
	$result_pedidos = "UPDATE pedidos SET modified=NOW(), status='Confirmado' WHERE id = '$id'";
	$resultado_pedidos = mysqli_query($conn, $result_pedidos);


?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> <?php
		if(mysqli_affected_rows($conn) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../pedidos.php'>
				<script type=\"text/javascript\">
					alert(\"Status alterado para Confirmado.\");
				</script>
			";
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../pedidos.php'>
				<script type=\"text/javascript\">
					alert(\"status não foi alterado para confirmado\");
				</script>
			";
		}?>
	</body>
</html>
<?php $conn->close(); ?>
<?php } ?>








