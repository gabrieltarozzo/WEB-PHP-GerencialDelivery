<?php
	include_once("../conexao.php");
	session_start();

  //  $value = mysqli_real_escape_string($conn, $_POST['categoria_id']);
  // $categoria_id = implode(',', $_POST['categoria_id']);
	//
	//$adicional_id = mysqli_real_escape_string($conn, $_POST['adicional_id']);

		$filterEmp = $_SESSION['usuarioEmpresa'];
		$checkbox_id = $_POST['checkbox_id'];

		$result=explode(",", implode($checkbox_id));


		//echo $result[0]; // vetor1
		//echo $result[1]; // vetor2
		//echo $result[2]; // vetor3
		$adicional_id = $result[0];
		$categoria_id = $result[1];
		$i = $result[2];





$filterEmp = $_SESSION['usuarioEmpresa'];

//$sql = sprintf( 'INSERT INTO categorias_adicionais VALUES (adicional_id)', implode( '), (' , $adicional_id ) );
//$DB->query( $sql );
//$resultado_adicionais = mysqli_query($conn, $sql);

	$result_adicionais = "INSERT INTO categorias_adicionais ( categoria_id, adicional_id, checkbox_id, empresa ) VALUES ('$categoria_id', '$adicional_id', '$i', '$filterEmp' )";
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
			";
		}else{
			echo "
<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../adicionais.php'>
			";
		}?>
	</body>
</html>
<?php $conn->close(); ?>