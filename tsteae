<?php

    session_start();

	include_once("../conexao.php");
	$filterEmp = $_SESSION['usuarioEmpresa'];
	$temp1 = mysqli_real_escape_string($conn, $_POST['appt-time1']);
	$temp2 = mysqli_real_escape_string($conn, $_POST['appt-time2']);
	$temp3 = mysqli_real_escape_string($conn, $_POST['appt-time3']);
	$temp4 = mysqli_real_escape_string($conn, $_POST['appt-time4']);

	$temp5 = mysqli_real_escape_string($conn, $_POST['appt-time5']);
	$temp6 = mysqli_real_escape_string($conn, $_POST['appt-time6']);
	$temp7 = mysqli_real_escape_string($conn, $_POST['appt-time7']);
	$temp8 = mysqli_real_escape_string($conn, $_POST['appt-time8']);

	$temp9 = mysqli_real_escape_string($conn, $_POST['appt-time9']);
	$temp10 = mysqli_real_escape_string($conn, $_POST['appt-time10']);
	$temp11 = mysqli_real_escape_string($conn, $_POST['appt-time11']);
	$temp12 = mysqli_real_escape_string($conn, $_POST['appt-time12']);

	$temp13 = mysqli_real_escape_string($conn, $_POST['appt-time13']);
	$temp14 = mysqli_real_escape_string($conn, $_POST['appt-time14']);
	$temp15 = mysqli_real_escape_string($conn, $_POST['appt-time15']);
	$temp16 = mysqli_real_escape_string($conn, $_POST['appt-time16']);

	$temp17 = mysqli_real_escape_string($conn, $_POST['appt-time17']);
	$temp18 = mysqli_real_escape_string($conn, $_POST['appt-time18']);
	$temp19 = mysqli_real_escape_string($conn, $_POST['appt-time19']);
	$temp20 = mysqli_real_escape_string($conn, $_POST['appt-time20']);

	$temp21 = mysqli_real_escape_string($conn, $_POST['appt-time21']);
	$temp22 = mysqli_real_escape_string($conn, $_POST['appt-time22']);
	$temp23 = mysqli_real_escape_string($conn, $_POST['appt-time23']);
	$temp24 = mysqli_real_escape_string($conn, $_POST['appt-time24']);

	$temp25 = mysqli_real_escape_string($conn, $_POST['appt-time25']);
	$temp26 = mysqli_real_escape_string($conn, $_POST['appt-time26']);
	$temp27 = mysqli_real_escape_string($conn, $_POST['appt-time27']);
	$temp28 = mysqli_real_escape_string($conn, $_POST['appt-time28']);


	$result_valor = "UPDATE horarios SET HorInicio='$temp1', HorFim='$temp2', HorInicio2='$temp3', HorFim2='$temp4', ter1='$temp5', ter2='$temp6', ter3='$temp7', ter4='$temp8' , quar1='$temp9', quar2='$temp10', quar3='$temp11', quar4='$temp12' , quin1='$temp13', quin2='$temp14', quin3='$temp15', quin4='$temp16', sex1='$temp17', sex2='$temp18', sex3='$temp19', sex4='$temp20' , sab1='$temp21', sab2='$temp22', sab3='$temp23', sab4='$temp24', domin1='$temp25', domin2='$temp26', domin3='$temp27', domin4='$temp28' WHERE empresa = '$filterEmp'";
	$resultado_valor = mysqli_query($conn, $result_valor);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>
<!-- https: -->
	<body> <?php
		if(mysqli_affected_rows($conn) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../painel.php'>
				<script type=\"text/javascript\">
					alert(\"Horários alterados com sucesso.\");
				</script>
			";
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../painel.php'>
				<script type=\"text/javascript\">
					alert(\"Horários não foram alterados com sucesso.\");
				</script>
			";
		}?>
	</body>
</html>
<?php $conn->close(); ?>