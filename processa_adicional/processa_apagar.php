<?php
	    session_start();

	include_once("../conexao.php");
	//	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$number = '1';


    $result_categorias = "UPDATE adicionais SET modified=NOW(), desativado = '$number' WHERE id = '$id'";
	$resultado_categorias = mysqli_query($conn, $result_categorias);

	    $result_categoriass = "UPDATE categorias_adicionais SET modified=NOW(), desativado = '$number' WHERE adicional_id = '$id'";
	$resultado_categoriass = mysqli_query($conn, $result_categoriass);
	// ------------
?>
<
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> <?php
		if(mysqli_affected_rows($conn) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../adicionais.php'>
				<script type=\"text/javascript\">
					alert(\"Adicional Apagado com Sucesso.\");
				</script>
			";
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../adicionais.php'>
				<script type=\"text/javascript\">
					alert(\"Adicional Apagado com Sucesso.\");
				</script>
			";
		}
?>
	</body>
</html>
<?php $conn->close(); ?>