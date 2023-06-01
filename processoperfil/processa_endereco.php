<?php
    session_start();

    $_SESSION['usuarioNome'];

	include_once("../conexao.php");

	$cidade = mysqli_real_escape_string($conn, $_POST['cidade']);
	$empresa = mysqli_real_escape_string($conn, $_POST['empresa']);
	$bairro = mysqli_real_escape_string($conn, $_POST['bairro']);
	$rua = mysqli_real_escape_string($conn, $_POST['rua']);
	$uf = mysqli_real_escape_string($conn, $_POST['uf']);
	$complemento = mysqli_real_escape_string($conn, $_POST['complemento']);

	$cep = mysqli_real_escape_string($conn, $_POST['cep']);
	$numero = mysqli_real_escape_string($conn, $_POST['numero']);
	
	if  ($_SESSION['usuarioNiveisAcessoId'] != "3") {
					echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../perfil.php'>
				<script type=\"text/javascript\">
					alert(\"Apenas administrador pode alterar endereço.\");
				</script>
			";
			goto a;
	}
	$result_enderecos = "UPDATE endereco SET modified=NOW(), cidade='$cidade', uf='$uf', complemento='$complemento', CEP='$cep', empresa='$empresa', bairro='$bairro', rua='$rua', numero='$numero' WHERE id_usuarios = '10'";
	$resultado_enderecos = mysqli_query($conn, $result_enderecos);
a:
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> <?php
		if(mysqli_affected_rows($conn) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../perfil.php'>
				<script type=\"text/javascript\">
					alert(\"Endereco alterado com Sucesso.\");
				</script>
			";
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../perfil.php'>
				<script type=\"text/javascript\">
					alert(\"Endereco não foi alterado.\");
				</script>
			";
		}?>
	</body>
</html>

<?php $conn->close(); ?>






