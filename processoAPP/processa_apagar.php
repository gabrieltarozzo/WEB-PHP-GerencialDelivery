<?php
	    session_start();

	include_once("../conexao.php");
	//	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$id = mysqli_real_escape_string($conn, $_POST['id']);

$filterEmp = $_SESSION['usuarioEmpresa']; 
    $result_categorias = "DELETE FROM extras WHERE id = '$id' and empresa = '$filterEmp' ";
	$resultado_categorias = mysqli_query($conn, $result_categorias);

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
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../tips.php'>
				<script type=\"text/javascript\">
					alert(\"Forma de pagamento apagada com Sucesso.\");
				</script>
			";
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../tips.php'>
				<script type=\"text/javascript\">
					alert(\"Forma de pagamento apagada com sucesso.\");
				</script>
			";
		}
?>
	</body>
</html>
<?php $conn->close(); ?>