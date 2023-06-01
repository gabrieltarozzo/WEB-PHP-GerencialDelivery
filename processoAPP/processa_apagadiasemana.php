<?php
	    session_start();

	include_once("../conexao.php");
	//	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$id = mysqli_real_escape_string($conn, $_POST['id']);

$filterEmp = $_SESSION['usuarioEmpresa']; 
    $result_categorias = "DELETE FROM TempoAPP WHERE id = '$id' and empresa = '$filterEmp' ";
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
					alert(\"Horario apagado com Sucesso.\");
				</script>
			";
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../tips.php'>
				<script type=\"text/javascript\">
					alert(\"Horário apagado com sucesso.\");
				</script>
			";
		}
?>
	</body>
</html>
<?php $conn->close(); ?>