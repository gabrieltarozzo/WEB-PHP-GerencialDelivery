<?php
	include_once("../conexao.php");
	session_start();
	error_reporting(0);
ini_set(“display_errors”, 0 );
	$nome = mysqli_real_escape_string($conn, $_POST['nome']);
	$valor = mysqli_real_escape_string($conn, $_POST['valor']);
	//$created = mysqli_real_escape_string($conn, $_POST['created']);
	//teria que adicionar created aqui denovo \/
$filterEmp = $_SESSION['usuarioEmpresa'];
	$result_adicionais = "INSERT INTO adicionais ( nome, valor, empresa ) VALUES ('$nome', '$valor', '$filterEmp')";
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
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../adicionais.php'>
				<script type=\"text/javascript\">
					alert(\"Adicional cadastrado com sucesso.\");
				</script>
			";
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../adicionais.php'>
				<script type=\"text/javascript\">
					alert(\"Adicional não foi cadastrado.\");
				</script>
			";
		}?>
	</body>
</html>
<?php $conn->close(); ?>