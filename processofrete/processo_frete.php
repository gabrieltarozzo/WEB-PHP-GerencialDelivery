
</html>
<!-- <META HTTP-EQUIV=Refresh CONTENT="3; URL=../home.php"> -->
<?php
	include_once("../conexao.php");
	$result = mysqli_real_escape_string($conn, $_GET['result']);

	//$created = mysqli_real_escape_string($conn, $_POST['created']);

	//teria que adicionar created aqui denovo \/
	$result_frete = "INSERT INTO endereco (frete) VALUES ('$result') where id=2";


	$resultado_frete = mysqli_query($conn, $result_frete);
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
					alert(\"Cadastrado!.\");
				</script>
			";
			?>


			<?php
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../precos.php'>
				<script type=\"text/javascript\">
					alert(\"não foi cadastrado.\");
				</script>
			";
		}?>
	</body>
</html>



<?php $conn->close(); ?>