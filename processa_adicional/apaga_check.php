<?php
	    session_start();

	include_once("../conexao.php");
	//	$id = mysqli_real_escape_string($conn, $_POST['id']);
$filterEmp = $_SESSION['usuarioEmpresa'];

$_checkbox = $_POST['checkmat'];
foreach($_checkbox as $_valor){
    // echo $_valor;
}

		//echo $result[0]; // vetor1
		//echo $result[1]; // vetor2
		//echo $result[2]; // vetor3





    $result_categorias = "DELETE FROM categorias_adicionais WHERE checkbox_id = '$_valor' AND empresa = '$filterEmp' and desativado = 0	";
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
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../adicionais.php'>

			";
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../adicionais.php'>

			";
		}
?>
	</body>
</html>
<?php $conn->close(); ?>