<?php
	    session_start();

	include_once("../conexao.php");
	//	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$id = mysqli_real_escape_string($conn, $_POST['id']);
    $result_produtos = "DELETE FROM produtos WHERE id = '$id'";
	$resultado_produtos = mysqli_query($conn, $result_produtos);
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
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../produto.php'>
				<script type=\"text/javascript\">
					alert(\"Produto Apagado com Sucesso.\");
				</script>
			";
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../produto.php'>
				<script type=\"text/javascript\">
					alert(\"Produto não foi Apagado com Sucesso.\");
				</script>
			";
		}
?>
	</body>
</html>
<?php $conn->close(); ?>