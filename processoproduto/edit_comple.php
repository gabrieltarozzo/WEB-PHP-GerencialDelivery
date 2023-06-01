<?php
	include_once("../conexao.php");
    session_start();
    $temcomple = '0';
	//$nome = mysqli_real_escape_string($conn, $_POST['nome']);
	//$descricao = mysqli_real_escape_string($conn, $_POST['descricao']);
	//$categoria_produtos_id = mysqli_real_escape_string($conn, $_POST['categoria_produtos_id']);
	//$valor = mysqli_real_escape_string($conn, $_POST['valor']);
	//$codigo = mysqli_real_escape_string($conn, $_POST['codigo']);
	//$situacao_id = mysqli_real_escape_string($conn, $_POST['situacao_id']);
	////$promo_valor = mysqli_real_escape_string($conn, $_POST['promo_valor']);
	//$metricaValor = mysqli_real_escape_string($conn, $_POST['metricaValor']);
	//$tipoValor = mysqli_real_escape_string($conn, $_POST['tipoValor']);

	//complementos
	$last_id = $_GET['id'];

	if ($last_id == NULL or $last_id == '' or $last_id == ' ') {
		die;
	}

	$nomeCategoria = $_POST['nomeCategoria'];
	$qtdMin = $_POST['qtdMin'];
	$qtdMax = $_POST['qtdMax'];
	$complementoObriga = $_POST['complementoObriga'];
	$nomeComplemento = $_POST['nomeComplemento'];
	$descComplemento =  $_POST['descComplemento'];
	$valorComplemento = $_POST['valorComplemento'];
	$valorDesconto = $_POST['valorDesconto'];
	$maiorValor = $_POST['maiorValor'];
	$numbercomple = $_POST['numbercomple'];
	$numbercat = $_POST['numbercat'];

	$filterEmp = $_SESSION['usuarioEmpresa'];


//Primeiro Delete
    $sql="DELETE FROM complementos where idProduto = '$last_id' and empresa = '$filterEmp'";
    $res=mysqli_query($conn,$sql);
//Fim do Primeiro Delete

for($i = 0; $i < count($nomeComplemento); $i++){

if($nomeComplemento[$i] <> '' OR $nomeComplemento[$i] <> ' ' OR $nomeComplemento[$i] <> NULL) {

  $date = $nomeComplemento[$i];
  $date2 = $descComplemento[$i];
  $date3 = $valorComplemento[$i];
  $date8 = $numbercomple[$i];
   $date10 = $valorDesconto [$i];

 //$results=$this->db->insert('subject', $data);



 $result_produtos2 = "INSERT INTO complementos (nomeComplemento, descComplemento, valorComplemento, valorDesconto, idProduto, empresa, numbercomple) VALUES ('$date', '$date2', '$date3', '$date10', '$last_id', '$filterEmp', '$date8')";
 $resultado_produtos2 = mysqli_query($conn, $result_produtos2);

     $sql="DELETE FROM complementos where nomeComplemento=''";
    $res=mysqli_query($conn,$sql);

 }
}

//Segundo Delete
    $sql="DELETE FROM categoriaComplementos where idProduto = '$last_id' and empresa = '$filterEmp'";
    $res=mysqli_query($conn,$sql);
//Fim do segundo Delete

for($i = 0; $i < count($nomeCategoria); $i++){

 if($nomeCategoria[$i] <> '' OR $nomeCategoria[$i] <> ' ' OR $nomeCategoria[$i] <> NULL) {
  $date4 = $nomeCategoria[$i];
  $date5 = $qtdMin[$i];
  $date6 = $qtdMax[$i];
  $date7 = $complementoObriga[$i];
  $date9 = $numbercat[$i];
   $date11 = $maiorValor[$i];



 	$result_produtos = "INSERT INTO categoriaComplementos (categoriaComplemento, qtdMin, qtdMax, CompleObriga, numbercomple, empresa , idProduto, pizza ) VALUES('$date4', '$date5', '$date6', '$date7', '$date9', '$filterEmp', '$last_id', '$date11')";
		$resultado_produtos = mysqli_query($conn, $result_produtos);

    $sql="DELETE FROM categoriaComplementos where categoriaComplemento=''";
    $res=mysqli_query($conn,$sql);
}
}
		
//$query = mysql_query("INSERT INTO categorias (nome, created) VALUES ('$nome', NOW())");
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> <?php
		if(mysqli_affected_rows($conn) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../produto.php'>
				<script type=\"text/javascript\">
					alert(\"Complemento Editado com Sucesso.\");
				</script>
			";
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../produto.php'>
				<script type=\"text/javascript\">
					alert(\"Complemento Editado com Sucesso.\");
				</script>
			";
		}?>
	</body>
</html>
<?php $conn->close(); ?>