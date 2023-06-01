<?php
	include_once("../conexao.php");
	session_start();
	error_reporting(0);
ini_set(“display_errors”, 0 );
	$dia = mysqli_real_escape_string($conn, $_POST['dia']);
	$horario = mysqli_real_escape_string($conn, $_POST['horario']);
	//$created = mysqli_real_escape_string($conn, $_POST['created']);
	//teria que adicionar created aqui denovo \/
$filterEmp = $_SESSION['usuarioEmpresa'];
	$result_adicionais = "INSERT INTO TempoAPP ( diaSemana, horarios, empresa ) VALUES ('$dia', '$horario', '$filterEmp')";
	$resultado_adicionais = mysqli_query($conn, $result_adicionais);
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
					alert(\"Horario cadastrado com sucesso.\");
				</script>
			";
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../tips.php'>
				<script type=\"text/javascript\">
					alert(\"Horario cadastrado com sucesso.\");
				</script>
			";
		}?>
	</body>
</html>
<?php $conn->close(); ?>