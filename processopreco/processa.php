<?php
    session_start();


	include_once("../conexao.php");
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$valor = mysqli_real_escape_string($conn, $_POST['valor']);
		$tempo = mysqli_real_escape_string($conn, $_POST['tempo']);

	
	//echo "$valor";

	$result_precos = "UPDATE precos SET modified=NOW(), valores='$valor', tempoEntrega='$tempo' WHERE id = '$id'";
		
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
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../precos.php'>
				<script type=\"text/javascript\">
					alert(\"Valor e tempo de entrega alterado com Sucesso.\");
				</script>
			";
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../precos.php'>
				<script type=\"text/javascript\">
					alert(\"Valor e tempo de entrega não foi alterado.\");
				</script>
			";
		}?>
	</body>
</html>
<?php $conn->close(); ?>