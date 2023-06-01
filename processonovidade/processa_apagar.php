<?php
	    session_start();

	include_once("../conexao.php");
	//	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$id = mysqli_real_escape_string($conn, $_POST['id']);
    $result_novidades = "DELETE FROM novidades WHERE id = '$id'";
	$resultado_novidades = mysqli_query($conn, $result_novidades);
	// ------------
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> <?php
		if(mysqli_affected_rows($conn) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../home.php'>
				<script type=\"text/javascript\">
					alert(\"Novidade Apagada com Sucesso.\");
				</script>
			";
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../home.php'>
				<script type=\"text/javascript\">
					alert(\"Novidade não foi Apagada com Sucesso.\");
				</script>
			";
		}
?>
	</body>
</html>
<?php $conn->close(); ?>