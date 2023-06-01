<?php
    session_start();


	include_once("../conexao.php");
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$diaSemana = mysqli_real_escape_string($conn, $_POST['diaSemana']);
		$horario  = mysqli_real_escape_string($conn, $_POST['horario']);

	
	//echo "$valor";

	$result_precos = "UPDATE TempoAPP SET diaSemana='$diaSemana', horarios='$horario' WHERE id = '$id'";
	$resultado_precos = mysqli_query($conn, $result_precos);


?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> <?php
		if(mysqli_affected_rows($conn) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../tips.php'>
				<script type=\"text/javascript\">
					alert(\"Horario e dia da semana alterado com Sucesso.\");
				</script>
			";
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../tips.php'>
				<script type=\"text/javascript\">
					alert(\"Horario e dia da semana não foi alterado.\");
				</script>
			";
		}?>
	</body>
</html>
<?php $conn->close(); ?>