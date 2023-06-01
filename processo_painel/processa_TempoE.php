<?php
    session_start();

	include_once("../conexao.php");
	$filterEmp = $_SESSION['usuarioEmpresa'];
	
	$ApxEntrega = $_GET['ApxEntrega'];

	$result_valor = "UPDATE EMPRESAS SET ApxEntrega='$ApxEntrega' WHERE ID_EMPRESA = '$filterEmp'";

	$resultado_valor = mysqli_query($conn, $result_valor);

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
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../painel.php'>
				<script type=\"text/javascript\">
					alert(\"Tempo de entrega alterado com sucesso.\");
				</script>
			";
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../painel.php'>
				<script type=\"text/javascript\">
					alert(\"Tempo de entrega não foi alterada com Sucesso.\");
				</script>
			";
		}?>
	</body>
</html>
<?php $conn->close(); ?>

