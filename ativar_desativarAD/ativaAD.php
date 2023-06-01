<?php
    session_start();

	include_once("../conexao.php");
	$id = mysqli_real_escape_string($conn, $_GET['id']);
	$got = mysqli_real_escape_string($conn, $_GET['got']);

	if ($got == 0){
		$idAD = 1;
	}
    else{
		$idAD = 0;
	}
	

	$result_categorias = "UPDATE categoria_produtos SET modified=NOW(), adicional='$idAD' WHERE id = '$id'";

	$resultado_categorias = mysqli_query($conn, $result_categorias);

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
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../categorias.php'>
				<script type=\"text/javascript\">
					alert(\"Opção de adicionais alterada com sucesso.\");
				</script>
			";
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../categorias.php'>
				<script type=\"text/javascript\">
					alert(\"Opção de adicionais não foi colocada com Sucesso.\");
				</script>
			";
		}

	?>
	</body>
</html>
<?php $conn->close(); ?>