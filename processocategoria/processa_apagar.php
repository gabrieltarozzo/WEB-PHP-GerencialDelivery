<?php
	    session_start();

	include_once("../conexao.php");
	//	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$id = mysqli_real_escape_string($conn, $_POST['id']);
    $result_categorias = "DELETE FROM categoria_produtos WHERE id = '$id'";
	$resultado_categorias = mysqli_query($conn, $result_categorias);
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
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../categorias.php'>
				<script type=\"text/javascript\">
					alert(\"Categoria Apagada com Sucesso.\");
				</script>
			";
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../categorias.php'>
				<script type=\"text/javascript\">
					alert(\"Categoria não foi Apagada com Sucesso.\");
				</script>
			";
		}
?>
	</body>
</html>
<?php $conn->close(); ?>