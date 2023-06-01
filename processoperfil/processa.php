<?php
    session_start();

    $_SESSION['usuarioNome'];

	include_once("../conexao.php");
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$senhaNova = mysqli_real_escape_string($conn, $_POST['senhaNova']);
	$senhaAntiga = mysqli_real_escape_string($conn, $_POST['senhaAntiga']);

	$nomeuser = $_SESSION['usuarioNome'];
    $result_senhas = "SELECT * FROM usuarios where nome='$nomeuser'";
    $resultado_senhas = mysqli_query($conn, $result_senhas);
  	$rows_senhas = mysqli_fetch_assoc($resultado_senhas);
  	$id_senha = $rows_senhas['senha'];

  	if($senhaAntiga == $id_senha){
	$result_senhas = "UPDATE usuarios SET modified=NOW(), senha='$senhaNova' WHERE id = '$id'";
	$resultado_senhas = mysqli_query($conn, $result_senhas);

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
					alert(\"Senha alterada com Sucesso.\");
				</script>
			";
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../perfil.php'>
				<script type=\"text/javascript\">
					alert(\"Senha não foi alterado com Sucesso.\");
				</script>
			";
		} ?>
	</body>
</html>
<?php $conn->close(); ?>
<?php
}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../perfil.php'>
				<script type=\"text/javascript\">
					alert(\"Senha antiga inválida.\");
				</script>
			";
		}?>

<?php $conn->close(); ?>






